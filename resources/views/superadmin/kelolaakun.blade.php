@extends('layouts.superadmin.app')

@section('title', 'SuperAdmin | Kelola Akun')
@section('headerNav', 'Kelola Akun')
@section('kelola akun')
<div class="w-full relative">
    <div class="flex mb-2 h-auto tablet:pl-4">
        <div class="w-1/2">
            <button id="showModal" onclick="OpenModal()" class="mb-2 p-2 w-44 bg-sky-500 text-white rounded-md font-outfit hover:bg-sky-600">Tambah Akun</button>
        </div>
    </div>
    <div class="w-full">
        <table class="table-fixed w-full rounded-lg font-outfit text-xs h-12">
            <thead class="bg-slate-400">
                <th>Nama</th>
                <th>E-mail</th>
                {{-- <th>Password</th> --}}
                <th>Role</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center bg-white odd:bg-sky-300">
                @foreach ($data as $dat)
                <tr class="group border-b border-gray-400">
                    <td class="py-2 flex justify-center h-16 w-full group-hover:bg-slate-200">{{ $dat->nama }}</td>
                    <td class="p-2 group-hover:bg-slate-200 selection:bg-green-700">{{ $dat->email }}</td>
                    {{-- <td class="p-2 group-hover:bg-slate-200">{{ $dat->password }}</td> --}}
                    <td class="p-2 group-hover:bg-slate-200">{{ $dat->role }}</td>
                    {{-- <td class="p-2 group-hover:bg-slate-200"></td> --}}
                    <td class="p-2 group-hover:bg-slate-200">
                        <button id="btnEdit" onclick="modalEdit({{ $dat->id }})" class="text-yellow-600"><i class="fa-regular fa-pen-to-square mobile:inline"></i><span class="mobile:hidden"> Edit</span></button>
                        <p class="inline"> | </p>
                        <form action="{{ route('Akun.Hapus', $dat->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" data-confirm-delete="true" class="text-pink-600"><i class="fa-solid fa-trash mobile:inline"></i><span class="mobile:hidden"> Hapus</span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="pagination m-2">
        {{-- {{ $data->links('vendor.pagination.simple-tailwind') }} --}}
    </div>
</div>
<div class="w-full flex justify-center">
    <div id="modal" class="hidden w-2/3 mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8  {{ $errors->any() ? 'block' : 'hidden' }} blur-none z-50 tablet:w-[80%] tablet:left-12">
        <div class="p-4 mb-2">
            <h1 class="text-4xl font-outfit">Tambah Data</h1>
        </div>
        <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form action="{{ route('tambah') }}" method="POST" enctype="multipart/form-data" class="p-3">
            @csrf
            <div class="mb-2 flex flex-col">
                <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama</label>
                <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                @error('nama')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="harga" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Email</label>
                <input type="text" id="email" name="email" value="{{ old('email') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('email') ? 'border-red-500 ring-red-600' : ''}}">
                @error('email')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="password" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Password</label>
                <input type="text" id="password" name="password" value="{{ old('password') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('password') ? 'border-red-500 ring-red-600' : ''}}">
                @error('password')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="role" class="mb-1 font-outfit">Role</label>
                <select name="role" id="role" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option value="admin">Admin</option>
                    <option value="guest">Guest</option>
                </select>
            </div>

            <div class="flex justify-end">
                <button type="submit" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
            </div>
        </form>
    </div>
    @foreach ($data as $menu )
    <div id="modalEdit" class="hidden w-2/3 mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute top-10 p-8 animate-showModal z-50 {{ $errors->any() ? 'block' : 'hidden' }} tablet:w-[80%] tablet:left-12">
        <div class="mb-2">
            <h1 class="text-4xl font-outfit">Edit Data</h1>
        </div>
        <button id="closeModalEdit" onclick="closeEditModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
        <form action="{{ url('superadmin/kelolaakun/edit/'.$menu->id) }}" method="POST" enctype="multipart/form-data" class="p-3">
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
                <label for="email" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Email</label>
                <input type="text" id="email" name="email" value="{{ $menu->email }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('email') ? 'border-red-500 ring-red-600' : ''}}">
                @error('email')
                    <p class="pt-1 text-xs text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-2 flex flex-col">
                <label for="role" class="mb-1 font-outfit">Role</label>
                <select name="role" id="role" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                    <option value="{{ $menu->role }}"></option>
                    <option value="admin">Admin</option>
                    <option value="guest">Guest</option>
                </select>
            </div>
        </form>
    </div>
    @endforeach
</div>
<script>
    function OpenModal() {
        const modal = document.getElementById("modal");
        const body = document.getElementById('AdminBody');

        modal.classList.remove('hidden');
        modal.classList.add('animate-showModal');
    }
    function closeModal() {
        const modal = document.getElementById("modal");
        const body = document.getElementById('AdminBody');
        setTimeout(() => {
            modal.classList.add("hidden");
        }, 900);
        modal.classList.remove("animate-showModal")
        modal.classList.add("animate-hideModal");
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