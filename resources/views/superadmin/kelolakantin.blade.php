@extends('layouts.superadmin.app')
@section('title', 'SuperAdmin | Kelola Akun')
@section('headerNav', 'Kelola Kantin')
@section('kelola kantin')
    <div class="w-full">
        <div class="w-1/5 mb-4">
            <button id="openModal" class="p-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white rounded-md font-outfit  hover:from-blue-500 hover:to-blue-800 tracking-wide">Tambah Kantin</button>
        </div>
        <div class="w-full">
            <table id="tabel-akun" class="w-full mt-2 table-fixed rounded-lg font-outfit text-xs h-12">
                <thead>
                    <th>#</th>
                    <th>Foto Kantin</th>
                    <th>Nama Kantin</th>
                    <th>#</th>
                </thead>
                <tbody>
                </tbody>
            </table
        </div>
        <div class="w-full flex justify-center">
            <div class="w-screen h-screen bg-black bg-opacity-60 hidden absolute top-0 right-0" style="z-index: 900;" id="background">
            </div>
            <div id="modal" class="modal hidden w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8  {{ $errors->any() ? 'block' : '' }} blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
                <div class="mb-2">
                    <h1 id="modalTitle" class="text-4xl font-outfit"></h1>
                </div>
                <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <form id="formKantin" method="POST" enctype="multipart/form-data" class="p-3">
                    <div class="mb-4 flex flex-col">
                        <label for="namaKantin" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama Kantin</label>
                        <input type="text" id="namaKantin" name="namaKantin" value="" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('namaKantin') ? 'border-red-500 ring-red-600' : ''}}">
                        <p class="pt-1 text-xs text-red-500"></p>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label for="fotoKantin" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Foto Kantin</label>
                        <input type="file" id="fotoKantin" name="fotoKantin" value="" class="">
                        <p class="pt-1 text-xs text-red-500"></p>
                    </div>
                    <div class="flex justify-end">
                        <button id="submitBtn" type="submit" class="submitBtn rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800 tracking-widest"></button>
                    </div>
                </form>
            </div>
            <div id="modalEdit" class="hidden w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute   top-10 p-8  {{ $errors->any() ? 'block' : '' }} blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
                @method('PUT')
                <div class="mb-2">
                    <h1 id="modalEditTitle" class="text-4xl font-outfit"></h1>
                </div>
                <button id="closeModalEdit" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <form id="formKantinEdit" method="POST" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <input type="hidden" name="id_kantin" id="id_kantin" value="">
                    <div class="mb-4 flex flex-col">
                        <label for="namaKantinEdit" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama Kantin</label>
                        <input type="text" id="namaKantinEdit" name="namaKantinEdit" value="" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('namaKantin') ? 'border-red-500 ring-red-600' : ''}}">
                        <p class="pt-1 text-xs text-red-500"></p>
                    </div>
                    <div class="mb-4 flex flex-col">
                        <label for="fotoKantinEdit" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Foto Kantin</label>
                        <input type="file" id="fotoKantinEdit" name="fotoKantinEdit" value="" class="">
                        <p class="pt-1 text-xs text-red-500"></p>
                    </div>
                    <div class="flex justify-end">
                        <button id="submitBtnEdit" type="button" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800 tracking-widest">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready( function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            const table = $('#tabel-akun').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{{ route("Superadmin.getKantin") }}',
                columns: [
                    {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: 'foto',
                        name: 'foto',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, full, meta) {
                            return '<img src="' + "{{ asset('storage/fotoKantin/') }}" + '/' + data + '" alt="foto kantin" class="py-0 flex justify-center h-14"/>';
                        }
                    },
                    {   data: 'namaKantin', name: 'Nama Kantin'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            })
            $('#openModal').click(function(){
                $('#modal').removeClass('hidden')
                $('#modal').addClass('animate-showModal')
                $('#submitBtn').html('Tambahkan')
                $('#background').removeClass('hidden')
                $('#modalTitle').html('Tambah Kantin')
                var isSubmitting = false;
                $('#formKantin').submit(function(e){
                    e.preventDefault()
                    $('.submitBtn').html('Menambahkan ...')
                    if (isSubmitting) {
                        return;
                    }
                    isSubmitting = true;
                    var dataSubmit = new FormData(this)
                    dataSubmit.append('_token', $('meta[name="csrf-token"]').attr('content'))
                    $.ajax({
                        url: "{{ route('Kantin.Create') }}",
                        type: "POST",
                        data: dataSubmit,
                        processData: false,
                        contentType:false,
                        success: function(response){
                            var isSubmitting = false;
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil menambahkan Kantin.',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                zIndex: 9999,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    setTimeout(() => {
                                        $('#modal').addClass('hidden')
                                        $('#background').addClass('hidden')
                                        $('#submitBtn').html('Tambahkan')
                                        $('#tabel-akun').DataTable().ajax.reload()
                                        // location.reload();
                                    }, 900);
                                    $('#modal').removeClass('animate-showModal')
                                    $('#modal').addClass('animate-hideModal')
                                    $('#formKantin').trigger("reset")
                                }
                            })
                        },
                        error: function(error){
                            Swal.fire('Gagal', 'Terjadi kesalahan saat menambah Kantin.', 'error');
                            $('#submitBtn').html('Tambahkan')
                            console.log(error);
                        }
                    })
                })
            })
            $('body').on('click', '#btnEdit', function(e){
                e.preventDefault()
                const id = $(this).data('id');
                let url = "/superadmin/"+id+"/edit"
                $.get(url, function(data){
                    $('#modalEdit').removeClass('hidden')
                    $('#background').removeClass('hidden')
                    $('#modalEditTitle').html('Edit Data '+ data.namaKantin)
                    $('#modalEdit').addClass('animate-showModal')
                    $('#namaKantinEdit').val(data.namaKantin)
                    $('#id_kantin').val(data.id)
                    $('#submitBtnEdit').click(function(e){
                        e.preventDefault()
                        $(this).html('proses..')
                        let urlEdit = "/superadmin/"+id+"/update"
                        $.ajax({
                            url: urlEdit,
                            type: 'POST',
                            data: new FormData(document.getElementById('formKantinEdit')),
                            dataType: 'json',
                            contentType: 'application/json',
                            processData: false,
                            contentType: false,
                            success: function(response){
                                Swal.fire({
                                title: 'Berhasil',
                                text: 'Berhasil meUpdate data Kantin.',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                zIndex: 9999,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    setTimeout(() => {
                                        $('#modalEdit').addClass('hidden')
                                        $('#background').addClass('hidden')
                                        $('#submitBtn').html('Tambahkan')
                                        $('#tabel-akun').DataTable().ajax.reload()
                                    }, 900);
                                    $('#modalEdit').removeClass('animate-showModal')
                                    $('#modalEdit').addClass('animate-hideModal')
                                }
                            })
                            },
                            error: function(error){
                                Swal.fire('Gagal', 'Terjadi kesalahan saat menambah Kantin.', 'error');
                                $('#submitBtnEdit').html('Update')
                            }
                        })
                    })
                })
            })
            $('#closeModalEdit').click(function() {
                setTimeout(() => {
                    $('#modalEdit').addClass('hidden')
                    $('#background').addClass('hidden')
                }, 900);
                $('#modalEdit').removeClass('animate-showModal')
                $('#modalEdit').addClass('animate-hideModal')
            })
            $('body').on('click', '.btnDelete', function(e){
                e.preventDefault();
                var id = $(this).data("id");
                var token = $('meta[name="csrf-token"]').attr('content');
                Swal.fire({
                    title: 'Konfirmasi',
                    text: 'Apakah Anda yakin ingin menghapus Kantin ini?',
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
                            url: '/kantin/'+id+'/delete',
                            data: {
                                _token: token,
                            },
                            success: function(response) {
                                $('#tabel-akun').DataTable().ajax.reload()
                                Swal.fire('Dihapus!', 'Kantin berhasil dihapus.', 'success');
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
    <script>
        function closeModal(){
            const modal = document.getElementById("modal")
            setTimeout(() => {
                modal.classList.add("hidden");
                document.getElementById('background').classList.add('hidden')
            }, 900);
            modal.classList.remove("animate-showModal");
            modal.classList.add("animate-hideModal");
        }
    </script>
@endsection
