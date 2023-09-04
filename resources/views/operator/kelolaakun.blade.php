@extends('layouts.app')

@section('title', 'Dashboard | Operator')

@section('Kelola Akun')
    <div class="mt-3">
        <button class="btn btn-primary mb-3" id="btnTambah">Tambah Akun</button>
        <table id="akunTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="modal fade" id="KelolaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger d-none"></div>
                    <div class="alert alert-success d-none"></div>
                        <div class="row mb-1">
                            <label for="Nama" class="form-label">Nama : </label>
                            <input type="text" class="form-control" id="Nama" name="nama">
                        </div>
                        <div class="row mb-1 form-outline">
                            <label for="Email" class="form-label">Email : </label>
                            <input type="email" class="form-control" id="Email" name="email">
                        </div>
                        <div class="row mb-1">
                            <label for="Nama" class="form-label">Role : </label>
                            <select class="form-select" aria-label="Default select example" id="Role" name="role">
                                @foreach ($role as $roles => $value )
                                    <option value="{{ $value }}">{{ $roles }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="row mb-1">
                            <label for="Password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="Password" name="password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secosndary" id="Close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="Save" method="post">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="KelolaModalEdit" tabindex="-1" aria-labelledby="KelolaModalEdit" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Akun</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger d-none"></div>
                    <div class="alert alert-success d-none"></div>
                    <div class="row mb-1">
                        <label for="NamaEdit" class="form-label">Nama : </label>
                        <input type="text" class="form-control" id="NamaEdit" name="nama">
                    </div>
                    <div class="row mb-1 form-outline">
                        <label for="EmailEdit" class="form-label">Email : </label>
                        <input type="email" class="form-control" id="EmailEdit" name="email">
                    </div>
                    <div class="row mb-1">
                        <label for="RoleEdit" class="form-label">Role : </label>
                        <select class="form-select" aria-label="Default select example" id="RoleEdit" name="role">
                            @foreach ($role as $roles => $value )
                                <option value="{{ $value }}">{{ $roles }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secosndary" id="Close" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="Save">Save</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function () {
            $('#akunTable').DataTable({
                processing:true,
                serverside:true,
                ajax:"{{ url('Ajax') }}",
                columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searcheble: false
                },
                {
                    data: 'nama',
                    name: 'Nama'
                },
                {
                    data: 'email',
                    name: 'Email'
                },
                {
                    data: 'role',
                    name: 'Role'
                },
                {
                    data: 'aksi',
                    name: 'Aksi'
                }]
            });
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('body').on('click', '#btnTambah', function(e){
            e.preventDefault();
            $('#KelolaModal').modal('show');
            $('#Save').click( function(){
                $.ajax({
                    url: '/Ajax',
                    type: 'POST',
                    data:{
                        nama: $('#Nama').val(),
                        email: $('#Email').val(),
                        role: $('#Role').val(),
                        password: $('#Password').val()
                    },
                    success: function(response){
                        if(response.errors){
                            console.log(response.errors);
                            $('.alert-danger').removeClass('d-none');
                            $('.alert-danger').append('<ul>');
                            $.each(response.errors, function(key, value) {
                                $('.alert-danger').find('ul').append('<li>' + value + '</li>');
                            })
                            $('.alert-danger').append('</ul>');
                        }else{
                            $('.alert-success').removeClass('d-none');
                            $('.alert-success').html(response.success);
                        }
                        $('#akunTable').DataTable().ajax.reload();
                    }
                });
            });
            $('#KelolaModal').on('hidden.bs.modal', function(){
                $('#Nama').val('');
                $('#Email').val('');
                $('#Role').val('');
                $('#Password').val('');
                $('.alert-danger').addClass('d-none');
                $('.alert-danger').html('');
                $('.alert-success').addClass('d-none');
                $('.alert-success').html('');
            });
        });
    </script>
@endsection
