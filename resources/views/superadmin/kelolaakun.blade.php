@extends('layouts.superadmin.app')

@section('title', 'SuperAdmin | Kelola Akun')
@section('headerNav', 'Kelola Akun')
@section('kelola akun')
<div class="w-full relative">
    <div class="flex h-auto tablet:pl-4">
        <div class="w-1/2">
            <button id="showModal" class="showModal mb-2 p-2 w-44 bg-gradient-to-r from-blue-400 to-blue-700 text-white rounded-md font-outfit  hover:from-blue-500 hover:to-blue-800">Tambah User</button>
        </div>
    </div>
    <div class="w-full">
        <table id="tabel-user" class="table-fixed w-full rounded-lg font-outfit text-xs h-12">
            <thead class="bg-transparent">
                <th>#</th>
                <th>Nama</th>
                <th>E-mail</th>
                <th>Role</th>
                <th>Sebagai Admin</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center bg-white">
            </tbody>
        </table>
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-screen h-[120vh] bg-black bg-opacity-60 hidden absolute top-0 right-0" style="z-index: 900;" id="background">
    </div>
    <div id="modal" class="hidden w-2/3 mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute top-3 p-8 blur-none tablet:w-[80%] tablet:left-12" style="z-index: 999;">
        <div class="mb-2">
            <h1 id="titleModal" class="text-4xl font-outfit"></h1>
        </div>
        <button id="closeModal" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form id="formAddUser" method="POST" enctype="multipart/form-data" class="p-3">
            <div id="inputNama" class="mb-1 flex flex-col">
                <label for="nama" id="labelNama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="ErrorNama" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div id="inputEmail" class="mb-1 flex flex-col h-[20%] box-content">
                <label for="harga" id="labelEmail" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Email</label>
                <input type="text" id="email" name="email" value="" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('email') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="ErrorEmail" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div id="inputPassword" class="mb-1 flex flex-col h-[20%] box-content">
                <label for="password" id="labelPassword" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Password</label>
                <input type="text" id="password" name="password" value="" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('password') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="ErrorPassword" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div id="selectRole" class="mb-1 flex flex-col h-[20%] box-content">
                <label for="role" id="labelRole" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Role</label>
                <select name="role" id="role" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option id="roleSelected" selected value=""></option>
                    <option value="guest">Guest</option>
                    <option value="admin">Admin</option>
                </select>
                <p id="ErrorRole" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div id="selectKantin" class="mb-1 flex flex-col h-[20%] box-content">
                <label for="kantin" id="labelKantin" class="mb-1 font-outfit">Sebagai Admin</label>
                <select name="kantin" id="kantin" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option id="adminSelected" selected value=""></option>
                    @foreach ($kantin as $data)
                        <option id="adminValue" value="{{ $data->id }}">{{ $data->namaKantin }}</option>
                    @endforeach
                </select>
                <span class="pt-1 text-xs text-slate-600 after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Jika role admin wajib di pilih</span>
            </div>
            <div class="flex justify-end">
                <button id="btnSubmit" type="submit" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white tracking-widest hover:from-blue-500 hover:to-blue-800"></button>
            </div>
        </form>
    </div>
    <div id="modalPassword" class="hidden w-2/3 mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute top-3 p-8 blur-none tablet:w-[80%] tablet:left-12" style="z-index: 999;">
        <div class="mb-2">
            <h1 id="titlePassword" class="text-4xl font-outfit"></h1>
        </div>
        <button id="closeModal" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form id="formEditPassword" method="POST" enctype="multipart/form-data" class="p-3">
            <div id="editPassword" class="mb-1 flex flex-col">
                <label for="newPassword" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Masukan password baru</label>
                <input type="text" id="newPassword" name="newPassword" value="" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="errorNewPassword" class="pt-1 text-xs text-red-500"></p>
            </div>
            <input type="hidden" value="" name="idUser" id="idUser">
            <div class="flex justify-end">
                <button id="btnPassword" type="submit" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white tracking-widest hover:from-blue-500 hover:to-blue-800"></button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready( function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const table = $('#tabel-user').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            language:{
                paginate:{
                    next:"<i class='fa-solid fa-chevron-right'></i>",
                    previous: "<i class='fa-solid fa-chevron-left'></i>"
                }
            },
            ajax: '/superadmin/getAkun',
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: 20 },
                {   data: 'nama', name: 'nama', searchable: true },
                {   data: 'email', name: 'email', searchable: true },
                {   data: 'role', name: 'role' },
                {   data: 'nama_kantin', name: 'nama_kantin' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        })
        $('#showModal').on('click', function(e) {
            e.preventDefault()
            $('#body').addClass('overflow-hidden')
            $('#titleModal').html("Tambah User")
            $('#btnSubmit').html('Tambahkan')
            $('#modal').removeClass('hidden')
            $('#modal').addClass('animate-showModal')
            $('#background').removeClass('hidden')
            $('#formAddUser').submit( function(e) {
                e.preventDefault()
                $('#btnSubmit').html('Menambahkan ...')
                $.ajax({
                    url: "/superadmin/addUser",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    success: function(response){
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Berhasil menambahkan User.',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            zIndex: 9999,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                setTimeout(() => {
                                    $('#modal').addClass('hidden')
                                    $('#background').addClass('hidden')
                                }, 900);
                                $('#btnSubmit').html('Tambahkan')
                                $('#formAddUser').trigger("reset")
                                $('#modal').addClass('animate-hideModal')
                                $('#tabel-user').DataTable().ajax.reload()
                                $('#modal').removeClass('animate-showModal')
                            }
                        })
                    },
                    error: function(error){
                        if(error.status == 422){
                            $('#btnSubmit').html('Tambahkan')
                            const errorText = error.responseJSON.errors
                            $('#ErrorNama').removeClass('hidden')
                            $('#ErrorEmail').removeClass('hidden')
                            $('#ErrorPassword').removeClass('hidden')
                            $('#ErrorRole').removeClass('hidden')
                            $('#ErrorNama').html(errorText.nama)
                            $('#ErrorEmail').html(errorText.email)
                            $('#ErrorPassword').html(errorText.password)
                            $('#ErrorRole').html(errorText.role)
                        }else{
                            Swal.fire('Gagal', 'Terjadi kesalahan saat menambah User.', 'error');
                            console.log(error);
                        }
                    }
                })
            })
        })
        $('body').on('click', '#closeModal', function(e){
            e.preventDefault()
            setTimeout(() => {
                $('#modal').addClass('hidden')
                $('#background').addClass('hidden')
                $('#btnSubmit').html('Tambahkan')
                $('#formAddUser').trigger("reset")
            }, 900);
            $('#modal').addClass('animate-hideModal')
            $('#modal').removeClass('animate-showModal')
        })
        $('body').on('click', '#btnEdit', function(e){
            e.preventDefault()
            $('#btnSubmit').html('Update')
            $('#inputPassword').addClass('hidden')
            let id = $(this).data('id')
            $.get('/user/'+id+'/edit', function(data){
                $('#modal').removeClass('hidden')
                $('#background').removeClass('hidden')
                $('#modal').addClass('animate-showModal')
                $('#titleModal').html('Ubah Data User')
                $('#nama').val(data.nama)
                $('#labelNama').removeClass("after:content-['*']")
                $('#email').val(data.email)
                $('#labelEmail').removeClass("after:content-['*']")
                $('#roleSelected').html(data.role)
                $('#roleSelected').val(data.role)
                $('#labelRole').removeClass("after:content-['*']")
                $('#adminSelected').val(data.kantin.id)
                $('#inputPassword').addClass('hidden')
                $('#btnSubmit').html('Update')
                $('#btnSubmit').click(function(e){
                    e.preventDefault()
                    $(this).html('Proses ...')
                    $.ajax({
                        url: '/user/'+ id + '/update',
                        type: "POST",
                        data: new FormData(document.getElementById('formAddUser')),
                        processData: false,
                        contentType: false,
                        success: function(response){
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil menambahkan User.',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                zIndex: 9999,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    setTimeout(() => {
                                        $('#modal').addClass('hidden')
                                        $('#background').addClass('hidden')
                                        $('#btnSubmit').html('Tambahkan')
                                    }, 900);
                                    $('#formAddUser').trigger("reset")
                                    $('#modal').addClass('animate-hideModal')
                                    $('#tabel-user').DataTable().ajax.reload()
                                    $('#modal').removeClass('animate-showModal')
                                }
                            })
                        },
                        error: function(error){
                            console.log(error)
                        }
                    })
                })
            })
        })
        $('body').on('click', '#btnEditPassword', function(e){
            e.preventDefault()
            let id = $(this).data('id')
            $.get('/user/'+id+'/edit', function(data){
                $('#idUser').val(data.id)
                $('#modalPassword').removeClass('hidden')
                $('#modalPassword').addClass('animate-showModal')
                $('#background').removeClass('hidden')
                $('#titlePassword').html('Ganti password')
                $('#btnPassword').html('Ganti Password')
                $('#body').addClass('overflow-hidden')
                $('#btnPassword').click( function(e){
                    $(this).html('Mengubah ...')
                    e.preventDefault()
                    $.ajax({
                        url: "/user/"+id+"/editPassword",
                        type: "post",
                        data: new FormData(document.getElementById('formEditPassword')),
                        processData: false,
                        contentType: false,
                        success: function(response){
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil mengubah password User.',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                zIndex: 9999,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    setTimeout(() => {
                                        $('#modalPassword').addClass('hidden')
                                        $('#background').addClass('hidden')
                                        $('#btnPassword').html('Tambahkan')
                                        $('#body').removeClass('overflow-hidden')
                                    }, 900);
                                    $('#formEditPassword').trigger("reset")
                                    $('#modalPassword').addClass('animate-hideModal')
                                    $('#tabel-user').DataTable().ajax.reload()
                                    $('#modalPassword').removeClass('animate-showModal')
                                }
                            })
                        },
                        error: function(error){
                            $('#errorNewPassword').removeClass('hidden')
                            $('#errorNewPassword').html(error.responseJSON.errors.newPassword)
                        }
                    })
                })
            })
        })
        $('body').on('click', '#closeModal', function(e){
            e.preventDefault()
            setTimeout(() => {
                $('#modalPassword').addClass('hidden')
                $('#background').addClass('hidden')
                $('#formPassword').trigger("reset")
            }, 900);
            $('#modalPassword').addClass('animate-hideModal')
            $('#modalPassword').removeClass('animate-showModal')
        })
        $('body').on('click', '.btnDelete', function(e){
            e.preventDefault();
            var id = $(this).data("id");
            var token = $('meta[name="csrf-token"]').attr('content');
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus Akun ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'DELETE',
                        url: '/kelolaakun/hapus/'+ id,
                        data: {
                            _token: token,
                        },
                        success: function(response) {
                            $('#tabel-user').DataTable().ajax.reload()
                            Swal.fire('Dihapus!', 'Item berhasil dihapus.', 'success');
                        },
                        error: function(error) {
                            Swal.fire('Error', 'Terjadi kesalahan saat menghapus item.', 'error');
                            Swal.fire('Dihapus!', 'Item berhasil dihapus.', 'success');
                            console.log(error);
                        }
                    })
                }
            })
        })
    })
</script>
@endsection
