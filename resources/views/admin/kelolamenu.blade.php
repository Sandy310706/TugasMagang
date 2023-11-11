@extends('layouts.admin.app')

@section('title', 'Admin | Kelola Menu')
@section('headerNav', 'Kelola Menu')
@section('kelola menu')
<div id="alert-area" class="w-full flex justify-center">
    {{--  --}}
</div>
<div class="w-full relative">
    <div class="flex mb-2 h-auto tablet:pl-4">
        <div class="w-full flex">
            <div class="w-4/5">
                <button onclick="openModal()" id="showModal" class="showModal mb-2 p-2 w-44 bg-gradient-to-r from-blue-400 to-blue-700 text-white rounded-md font-outfit  hover:from-blue-500 hover:to-blue-800">Tambah Menu</button>
            </div>
        </div>
    </div>
    <div class="w-full">
        <table id="tabel-menu" class="table-fixed  w-full rounded-lg font-outfit text-xs h-12">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
        </table>
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-screen h-screen bg-black bg-opacity-60 hidden absolute top-0 right-0" style="z-index: 900;" id="background">
    </div>
    <div id="modal" class="modal w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8  {{ $errors->any() ? 'block' : 'hidden' }} blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
        <div class="mb-2">
            <h1 class="text-4xl font-outfit">Tambah Data</h1>
        </div>
        <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form  id="FormTambah" method="POST" enctype="multipart/form-data" class="p-3">
            @csrf
            <div class="mb-2 flex flex-col">
                <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="Errornama" class="hidden pt-1 text-xs text-red-500"></p>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="harga" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ old('harga') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('harga') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="Errorharga" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="kategori" class="mb-1 font-outfit">Kategori</label>
                <select name="kategori" id="kategori" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>
                <p id="Errorkategori" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="stok" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Stok Barang</label>
                <input type="number" id="stok" name="stok" value="{{ old('stok') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('stok') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="Errorstok" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="file" class="font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Foto</label>
                <input type="file" id="file" name="foto" value="{{ old('foto') }}" class="rounded p-1 text-sm {{ $errors->has('foto') ? 'text-red-500' : ''}}">
                <p id="Errorfile" class="text-xs text-red-500"></p>
            </div>
            <div class="flex justify-end">
                <button class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
            </div>
        </form>
    </div>
    @foreach ($data as $menu )
    <div id="modalEdit{{ $menu->id }}" class="modalEdit hidden w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute top-10 p-8 animate-showModal z-50 {{ $errors->any() ? 'block' : 'hidden' }} tablet:w-[80%] tablet:left-12" style="z-index: 9999">
        <div class="mb-2">
            <h1 class="text-4xl font-outfit">Edit Data</h1>
        </div>
        <button id="closeModalEdit" data-id="{{ $menu->id }}" class="closeModalEdit absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form id="FormEdit" action="/menu/edit/{{ $menu->id }}" method="POST" enctype="multipart/form-data" class="FormEdit p-3">
            @csrf
            @method('PUT')
            <div class="mb-2 flex flex-col">
                <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ $menu->nama }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                @error('nama')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="harga" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Harga</label>
                <input type="number" id="harga" name="harga" value="{{ $menu->harga }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('harga') ? 'border-red-500 ring-red-600' : ''}}">
                @error('harga')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="harga" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Stok</label>
                <input type="number" id="stok" name="stok" value="{{ $menu->stok }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('harga') ? 'border-red-500 ring-red-600' : ''}}">
                @error('stok')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="kategori" class="mb-1 font-outfit">Kategori</label>
                <select name="kategori" id="kategori" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option value="{{ $menu->kategori }}" selected>{{ $menu->kategori }}</option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="file" class="font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Foto</label>
                <input type="file" id="file" name="foto" class="rounded p-1 text-sm {{ $errors->has('foto') ? 'text-red-500' : ''}}">
                @error('foto')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <input type="hidden" id="edit-data-id" value="{{ $menu->id }}">
            <div class="flex justify-end">
                <button type="submit" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
            </div>
        </form>
    </div>
    @endforeach
</div>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        const table = $('#tabel-menu').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: '{{ route("Admin.Menu.Ajax") }}',
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                {
                    data: 'foto',
                    name: 'foto',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return '<img src="' + "{{ asset('storage/fileMenu/') }}" + '/' + data + '" alt="gambar menu" class="py-0 flex justify-center w-1/2"/>';
                    }
                },
                {   data: 'nama', name: 'nama',
                    render: function(data) {
                        return '<span class="p-2 group-hover:bg-neutral-400">'+ data +'</span>';
                    }
                },
                { data: 'kategori', name: 'kategori' },
                { data: 'harga', name: 'harga'},
                { data: 'stok', name: 'stok'},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });
        $("#FormTambah").submit(function(e) {
            e.preventDefault();
            var form = new FormData(this);
            const modal = document.getElementById("modal");
            const background = document.getElementById("background")
            const body = document.getElementById("body")
            $.ajax({
                type: 'POST',
                url: "{{ route('Menu.Store') }}",
                data: form,
                processData: false,
                contentType: false,
                success: function(success){
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil disimpan!',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        zIndex: 9999,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            setTimeout(() => {
                                modal.classList.add("hidden")
                                background.classList.add("hidden")
                                body.classList.remove("overflow-hidden")
                            }, 900);
                            modal.classList.remove("animate-showModal")
                            modal.classList.add("animate-hideModal")
                            $('#tabel-menu').DataTable().ajax.reload()
                            $('#FormTambah')[0].reset()
                        }
                    });
                },
                error: function(xhr){
                    var errors = xhr.responseJSON.errors;
                    console.log(errors);
                    $('#Errornama').removeClass('hidden').text(errors.nama)
                    $('#Errorharga').removeClass('hidden').text(errors.harga)
                    $('#Errorstok').removeClass('hidden').text(errors.stok)
                    $('#Errorkategori').removeClass('hidden').text(errors.kategori)
                    $('#Errorfile').removeClass('hidden').text(errors.foto)
                }
            })
        });
        $('body').on('click', '.btnEdit', function(e) {
            let id = $(this).data('id');
            const modalEdit = document.querySelector("#modalEdit"+id);
            const background = document.getElementById("background");
            background.classList.remove('hidden');
            modalEdit.classList.remove("hidden");
            modalEdit.classList.add("animate-showModal");
        });
        $('body').on('click', '.closeModalEdit', function(e) {
            let id = $(this).data('id');
            const modalEdit = document.querySelector("#modalEdit"+id);
            const background = document.getElementById("background");
            const body = document.getElementById("body")
            setTimeout(() => {
                modalEdit.classList.add("hidden")
                background.classList.add('hidden')
                body.classList.remove("overflow-hidden")
            }, 900);
            modalEdit.classList.remove("animate-showModal");
            modalEdit.classList.add("animate-hideModal");
        })
        $("#FormEdit").submit( function(e) {
            e.preventDefault()
            let formData = $(this).serialize()
            let id = $('.btnEdit').data('id')
            console.log(id);
            var token = $('meta[name="csrf-token"]').attr('content')
            const modal = document.getElementById("modal");
            const background = document.getElementById("background")
            const body = document.getElementById("body")
            $.ajax({
                type: 'PUT',
                url: "/menu/edit/"+id,
                data: formData,
                processData: false,
                contentType: false,
                success: function(response){
                    console.log(response);
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil disimpan!',
                        icon: 'success',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'OK',
                        zIndex: 9999,
                    }).then((result) => {
                        if (result.isConfirmed) {
                            setTimeout(() => {
                                modal.classList.add("hidden")
                                background.classList.add("hidden")
                                body.classList.remove("overflow-hidden")
                            }, 900);
                            modal.classList.remove("animate-showModal")
                            modal.classList.add("animate-hideModal")
                            $('#tabel-menu').DataTable().ajax.reload()
                            $('#FormTambah')[0].reset()
                        }
                    });
                },
                error: function(error){
                    console.log(error);
                    console.log(formData);
                    console.log(selectedFile);
                }
            });
        });
        $('body').on('click', '.btnDelete', function(e){
            e.preventDefault();
            var id = $(this).data("id");
            var token = $('meta[name="csrf-token"]').attr('content');
            console.log('/menu/delete/'+id);
            Swal.fire({
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin menghapus item ini?',
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
                        url: '/menu/delete/'+id,
                        data: {
                            _token: token,
                        },
                        success: function(response) {
                            Swal.fire('Dihapus!', 'Item berhasil dihapus.', 'success');
                            $('#tabel-menu').DataTable().ajax.reload()
                        },
                        error: function(error) {
                            Swal.fire('Error', 'Terjadi kesalahan saat menghapus item.', 'error');
                            Swal.fire('Dihapus!', 'Item berhasil dihapus.', 'success');
                            $('#tabel-menu').DataTable().ajax.reload()
                            console.log(error);
                        }
                    });
                }
            });
        })
    });
</script>
<script>
    function openModal() {
        const modal = document.getElementById("modal");
        const background = document.getElementById("background");
        const body = document.getElementById("body")
        body.classList.add('overflow-hidden')
        background.classList.remove('hidden');
        modal.classList.remove('hidden');
        modal.classList.add('animate-showModal');
    }
    function closeModal() {
        const modal = document.getElementById("modal");
        const body = document.getElementById('body');
        const background = document.getElementById("background");
        setTimeout(() => {
            modal.classList.add("hidden");
            background.classList.add('hidden');
            body.classList.remove("overflow-hidden")

        }, 900);
        modal.classList.remove("animate-showModal");
        modal.classList.add("animate-hideModal");
    }

    function closeModalEdit(id) {
        const modalEdit = document.querySelector(".modalEdit"+id);
        const background = document.getElementById("background");
        setTimeout(() => {
            modalEdit.classList.add("hidden");
            background.classList.add('hidden');
        }, 900);
        modalEdit.classList.remove("animate-showModal")
        modalEdit.classList.add("animate-hideModal");
    }
</script>
@endsection
