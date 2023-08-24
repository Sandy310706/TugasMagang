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
            <div class="modal-content ">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="row mb-1">
                            <label for="Nama" class="form-label">Nama : </label>
                            <input type="text" class="form-control" id="Nama" name="nama">
                        </div>
                        <div class="row mb-1">
                            <label for="Email" class="form-label">Email : </label>
                            <input type="email" class="form-control" id="Email" name="email">
                        </div>
                        <div class="row mb-1">
                            <label for="Nama" class="form-label">Role : </label>
                            <select class="form-select" aria-label="Default select example" id="Role">
                                <option selected>Buka untuk melihat menu error</option>
                                @foreach ($role as $roles => $value )
                                    <option value="{{ $value }}">{{ $roles }}</option>
                                @endforeach
                              </select>
                        </div>
                        <div class="row mb-1">
                            <label for="Password" class="form-label">Passoword</label>
                            <input type="password" class="form-control" id="Password" name="password">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="Save" method="post">Save changes</button>
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
        })
        $('body').on('click', '#btnTambah', function(e){
            e.preventDefault();
            $('#KelolaModal').modal('show');

            $('#Save').click( function(){
                let nama = $('#Nama').val();
                let email = $('#Email').val();
                let role = $('Role').val();
                let password  = $
                $.ajax({
                    url: '{{ url('Ajax-Store') }}',
                    type: 'POST',
                    cache: false,
                    data:{
                        nama: $('#Nama').val(),
                        email: $('#Email').val(),
                        role: $('#Role').val(),
                        password: $('#Password').val()
                    },
                    success: function(response){

                    }
                });
            });
        });
    </script>
@endsection
