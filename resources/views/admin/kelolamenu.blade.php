@extends('layouts.admin.app')

@section('title', 'Admin | Kelola Menu')
@section('headerNav', 'Kelola Menu')
@section('kelola menu')
<div class="w-full">
    <div class="flex mb-2 h-auto tablet:pl-4">
        <div class="w-1/2">
            <button id="showModal" onclick="OpenModal()" class="mb-2 p-2 w-44 bg-sky-500 text-white rounded-md font-outfit hover:bg-sky-600">Tambah Menu</button>
        </div>
    </div>
    <div class="w-full flex mx-auto justify-center items-center tablet:w-screen">
        <table class="table-fixed w-full p-4 rounded-lg font-outfit h-12">
            <thead class="bg-slate-400">
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center bg-white odd:bg-sky-300">
                @foreach ($data as $menu )
                    <tr class="group border-b border-gray-400">
                        <td class="group-hover:bg-slate-200 p-1">{{ $loop->iteration }}</td>
                        <td class="py-2 flex justify-center h-16 w-full group-hover:bg-slate-200"><img src="{{ asset('storage/fileMenu/'. $menu->foto) }}" alt="foto menu"></td>
                        <td class="p-2 group-hover:bg-slate-200">{{ $menu->nama }}</td>
                        <td class="p-2 group-hover:bg-slate-200">{{ $menu->kategori }}</td>
                        <td class="p-2 group-hover:bg-slate-200">Rp. {{ $menu->harga }}</td>
                        <td class="p-2 group-hover:bg-slate-200">
                            <button id="btnEdit" onclick="modalEdit({{ $menu->id }})" class="text-yellow-600">Edit</button>
                            <p class="inline"> | </p>
                            <form action="{{ route('Menu.Delete', $menu->id) }}" method="POST" class="inline"  >
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-confirm-delete="true" class="text-pink-600">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    <div id="modalEdit" class="hidden w-1/2 bg-slate-200 shadow-sm shadow-black rounded-md absolute left-[35%] top-10 p-8 animate-showModal z-50 {{ $errors->any() ? 'block' : 'hidden' }} tablet:w-[80%] tablet:left-12">
                        <div class="mb-2">
                            <h1 class="text-4xl font-outfit">Edit Data</h1>
                        </div>
                        <button id="closeModalEdit" onclick="closeEditModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <div class="">
                            <form action="{{ url('admin/updatemenu/'.$menu->id) }}" method="POST" enctype="multipart/form-data" class="p-3">
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
                                    <input type="text" id="harga" name="harga" value="{{ $menu->harga }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('harga') ? 'border-red-500 ring-red-600' : ''}}">
                                    @error('harga')
                                        <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-2 flex flex-col">
                                    <label for="kategori" class="mb-1 font-outfit">Kategori</label>
                                    <select name="kategori" id="kategori" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                                        <option value="{{ $menu->kategori }}"></option>
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
                                <div class="flex justify-end">
                                    <button type="submit" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination m-2">
        {{ $data->links('vendor.pagination.simple-tailwind') }}
    </div>
</div>
<div id="modal" class="hidden w-1/2 bg-slate-200 shadow-sm shadow-black rounded-md absolute left-[35%] top-10 p-8  {{ $errors->any() ? 'block' : 'hidden' }} blur-none z-50 tablet:w-[80%] tablet:left-12">
    <div class="p-4 mb-2">
        <h1 class="text-4xl font-outfit">Tambah Data</h1>
    </div>
    <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
    <div class="">
        <form action="{{ route('Menu.Store') }}" method="POST" enctype="multipart/form-data" class="p-3">
            @csrf
            <div class="mb-2 flex flex-col">
                <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                @error('nama')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="harga" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Harga</label>
                <input type="text" id="harga" name="harga" value="{{ old('harga') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('harga') ? 'border-red-500 ring-red-600' : ''}}">
                @error('harga')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="kategori" class="mb-1 font-outfit">Kategori</label>
                <select name="kategori" id="kategori" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option value="makanan">Makanan</option>
                    <option value="minuman">Minuman</option>
                </select>
            </div>
            <div class="mb-2 flex flex-col">
                <label for="file" class="font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Foto</label>
                <input type="file" id="file" name="foto" value="{{ old('foto') }}" class="rounded p-1 text-sm {{ $errors->has('foto') ? 'text-red-500' : ''}}">
            </div>
            <div class="flex justify-end">
                <button class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
            </div>
        </form>
    </div>
</div>
<script>
    function OpenModal() {
        const modal = document.getElementById("modal");
        const body = document.getElementById('AdminBody');

        modal.classList.remove('hidden');
        modal.classList.add('animate-showModal');
        body.classList.add('blur-lg');
    }
    function closeModal() {
        const modal = document.getElementById("modal");
        const body = document.getElementById('AdminBody');
        setTimeout(() => {
            modal.classList.add("hidden");
        }, 900);
        modal.classList.remove("animate-showModal")
        modal.classList.add("animate-hideModal");
        body.classList.remove('blur-lg');
    }
    function modalEdit(idData) {
        const modalEdit = document.getElementById("modalEdit");
        modalEdit.classList.remove("hidden");
        modalEdit.classList.add("animate-showModal");
        modalEdit.classList.remove('animate-hideModal')
    }
    function closeEditModal() {
        const modalEdit = document.getElementById("modalEdit");
        setTimeout(() => {
            modalEdit.classList.add("hidden");
        }, 900);
        modalEdit.classList.remove("animate-showModal")
        modalEdit.classList.add("animate-hideModal");
    }
</script>
@endsection
