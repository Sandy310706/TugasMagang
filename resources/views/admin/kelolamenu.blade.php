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
                <button id="tambahData" class="mb-2 p-2 w-44 bg-gradient-to-r from-blue-400 to-blue-700 text-white rounded-md font-outfit  hover:from-blue-500 hover:to-blue-800">Ajukan Menu</button>
            </div>
        </div>
    </div>
    <div class="w-full">
        <table id="tabel-menu" class="table-fixed  w-full rounded-lg font-outfit text-xs h-12">
            <thead class="">
                <tr>
                    <th>#</th>
                    <th>FOTO</th>
                    <th>NAMA</th>
                    <th>KATEGORI</th>
                    <th>HARGA</th>
                    <th>PER</th>
                    <th>STATUS</th>
                    <th>STOK</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody id="tbody" class="bg-white">
            </tbody>
        </table>
    </div>
</div>
<div class="w-full flex justify-center">
    <div class="w-screen h-[200vh] bg-black bg-opacity-60 hidden absolute top-0 right-0" style="z-index: 900;" id="background">
    </div>
    <div id="modal" class="modal w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8  {{ $errors->any() ? 'block' : 'hidden' }} blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
        <div class="mb-2">
            <h1 id="modalHeading" class="text-4xl font-outfit"></h1>
        </div>
        <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form id="FormData" class="p-3">
            <div class="mb-2 flex flex-col">
                <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="Errornama" class="hidden pt-1 text-xs text-red-500"></p>
            </div>
            <div class="w-full flex justify-between">
                <div class="w-[58%] flex flex-col">
                    <label for="harga" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Harga</label>
                    <input type="number" id="harga" name="harga" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <p id="Errorharga" class="pt-1 mb-2 text-xs text-red-500"></p>
                </div>
                <div class="w-[40%] flex flex-col">
                    <label for="per" class="mb-1 font-outfit">per</label>
                    <input type="text" id="per" name="per" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <p id="" class="pt-1 text-xs text-slate-400">contoh: per porsi, buah, kg dst</p>
                </div>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="kategori" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Kategori</label>
                <select name="kategori" id="kategori" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option id="Skategori"></option>
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>
                <p id="Errorkategori" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="stok" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Stok Barang</label>
                <input type="number" id="stok" name="stok" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('stok') ? 'border-red-500 ring-red-600' : ''}}">
                <p id="Errorstok" class="pt-1 text-xs text-red-500"></p>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="foto" class="font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Foto</label>
                <input type="file" id="foto" name="foto" class="rounded p-1 text-sm">
                <p id="Errorfoto" class="text-xs text-red-500"></p>
            </div>
            <div class="flex justify-end">
                <button id="saveBtn" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800"></button>
            </div>
        </form>
    </div>
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
            language:{
                paginate:{
                    next:"<i class='fa-solid fa-chevron-right'></i>",
                    previous: "<i class='fa-solid fa-chevron-left'></i>"
                }
            },
            ajax: '{{ route("Admin.Menu.Ajax") }}',
            columns: [
                {   data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: 20 },
                {
                    data: 'foto',
                    name: 'foto',
                    orderable: false,
                    searchable: false,
                    render: function(data, type, full, meta) {
                        return '<img src="' + "{{ asset('storage/fileMenu/') }}" + '/' + data + '" alt="gambar menu" class="py-0 flex justify-center"/>';
                    }
                },
                {   data: 'nama', name: 'nama', searchable: true},
                {   data: 'kategori', name: 'kategori', width: 50 },
                {   data: 'harga', name: 'harga', width: 100,
                    render: function(data) {
                        return "Rp." + new Intl.NumberFormat().format(data);
                    }
                },
                {   data: 'per', name:'per', width: 18 },
                {   data: 'is_konfirmasi', name: 'is_konfirmasi',
                    render: function(data) {
                        if(data === 0){
                            return "<span class='text-orange-500'><i class='fa-solid fa-circle-exclamation'></i> Belum di Konfimasi</span>"
                        }else{
                            return "<span class='text-green-500'><i class='fa-solid fa-circle-check'></i> Sudah di Konfirmasi</span>"
                        }
                    }
                },
                {   data: 'stok', name: 'stok', width: 30},
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        })
        $('#tambahData').click( function() {
            $('#saveBtn').html('Kirim')
            $('#FormData').trigger("reset")
            $('#modal').removeClass('hidden')
            $('#background').removeClass('hidden')
            $('#modal').addClass('animate-showModal')
            $('#modalHeading').html('Mengajukan Menu baru.')
            var isSubmitting = false;
            $('#FormData').submit( function(e) {
                e.preventDefault()
                if (isSubmitting) {
                    return;
                }
                isSubmitting = true;
                $('#saveBtn').html('Mengirim...')
                $.ajax({
                    data: new FormData(this),
                    type: "POST",
                    url: "{{ route('Menu.Store') }}",
                    processData: false,
                    contentType:false,
                    success: function(response){
                        var isSubmitting = false;
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Menu berhasil diajukan!',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'OK',
                            zIndex: 9999,
                        }).then((result) => {
                            if (result.isConfirmed) {
                                setTimeout(() => {
                                    $('#modal').addClass('hidden')
                                    $('#background').addClass('hidden')
                                    $('#body').removeClass('overflow-hidden')
                                }, 900);
                                $('#saveBtn').html('Kirim')
                                $('#FormData').trigger("reset")
                                $('#modal').addClass('animate-hideModal')
                                $('#tabel-menu').DataTable().ajax.reload()
                                $('#modal').removeClass('animate-showModal')
                            }
                        })
                    },
                    error: function(error){
                        let pesanError = error.responseJSON.errors
                        $('#Errornama').removeClass('hidden')
                        $('#Errornama').html(pesanError.nama)
                        $('#Errorharga').removeClass('hidden')
                        $('#Errorharga').html(pesanError.harga)
                        $('#Errorstok').removeClass('hidden')
                        $('#Errorstok').html(pesanError.stok)
                        $('#Errorkategori').removeClass('hidden')
                        $('#Errorkategori').html(pesanError.kategori)
                        $('#Errorstok').removeClass('hidden')
                        $('#Errorstok').html(pesanError.stok)
                        $('#Errorfoto').removeClass('hidden')
                        $('#Errorfoto').html(pesanError.foto)
                        $('#saveBtn').html('Kirim')
                    }
                })
            })
        })
        $('body').on('click', '.btnEditMenu', function(e) {
            e.preventDefault()
            let id = $(this).data('id')
            $.get("/menu/edit/"+id, function(data) {
                $('#modalHeading').html('Edit Data '+ data.nama)
                $('#saveBtn').html('Edit')
                $('#body').addClass('overflow-hidden')
                $('#modal').addClass('animate-showModal')
                $('#background').removeClass('hidden')
                $('#modal').removeClass('hidden')
                $('#nama').val(data.nama)
                $('#per').val(data.per)
                $('#Skategori').html(data.kategori)
                $('#kategori').val(data.kategori)
                $('#harga').val(data.harga)
                $('#stok').val(data.stok)
                $('#saveBtn').click( function(e) {
                    e.preventDefault()
                    $(this).html('Mengirim...')
                    let form = new FormData(document.getElementById('FormData'))
                    console.log(form);
                    $.ajax({
                        type: "POST",
                        url: "/menu/"+id+"/update",
                        data: new FormData(document.getElementById('FormData')),
                        processData: false,
                        contentType: false,
                        success: function(response){
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Data ' +response.success.nama+ ' berhasil diubah!',
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'OK',
                                zIndex: 9999,
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    setTimeout(() => {
                                        $('#body').removeClass('overflow-hidden')
                                        $('#background').addClass('hidden')
                                        $('#modal').addClass('hidden')
                                    }, 900);
                                    $('#FormData').trigger("reset")
                                    $('#saveBtn').html('Kirim')
                                    $('#modal').removeClass('animate-showModal')
                                    $('#modal').addClass('animate-hideModal')
                                    $('#tabel-menu').DataTable().ajax.reload()
                                }
                            })
                        },
                        error: function(xhr){
                            $('#modal').removeClass('hidden')
                        }
                    })
                })
            })
        })
        $('body').on('click', '.closeModalEdit', function(e) {
            let id = $(this).data('id');
            setTimeout(() => {
                $('#modalEdit').addClass("hidden")
                $('#background').addClass('hidden')
                $('#body').removeClass("overflow-hidden")
            }, 900);
            $('#modalEdit').removeClass("animate-showModal");
            $('#modalEdit').addClass("animate-hideModal");
        })
        $('body').on('click', '.btnDeleteMenu', function(e){
            e.preventDefault();
            var id = $(this).data("id");
            var token = $('meta[name="csrf-token"]').attr('content');
            console.log(id);
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
