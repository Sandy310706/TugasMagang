@extends('layouts.superadmin.app')
@section('title', 'SuperAdmin | Kelola Akun')
@section('headerNav', 'Kelola Kantin')
@section('kelola kantin')
    <div class="w-full">
        <div class="w-1/5">
            <button class="p-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white rounded-md font-outfit  hover:from-blue-500 hover:to-blue-800">Tambah Kantin</button>
        </div>
        <table class="w-full mt-2 table-fixed rounded-lg font-outfit text-xs h-12">
            <thead>
                <th class="w-1/5">No</th>
                <th>Nama Kantin</th>
                <th>Nama Admin</th>
                <th>Aksi</th>
            </thead>
            <tbody class="text-center">
                @foreach ( $data as $kantin )
                    <tr class="group border-b even:bg-zinc-300 odd:bg-neutral-200 border-gray-400">
                        <td class="w-1/5">{{ $loop->iteration }}</td>
                        <td>{{ $kantin->namaKantin }}</td>
                        <td>{{ $kantin->user->nama }}</td>
                        <td>
                            <button id="btnEdit" data-id="{{ $kantin->id }}" class="btnEdit text-yellow-600"><i class="fa-regular fa-pen-to-square mobile:inline"></i><span class="mobile:hidden"> Edit</span></button>
                            <p class="inline"> | </p>
                            <button id="btnDelete" class="btnDelete text-red-600" data-id="{{ $kantin->id }}" data-confirm-delete="true"><i class="fa-solid fa-trash"></i>    Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="w-full flex justify-center">
            <div id="modal" class="modal w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8  {{ $errors->any() ? 'block' : '' }} blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
                <div class="mb-2">
                    <h1 class="text-4xl font-outfit">Tambah Data</h1>
                </div>
                <button id="closeModal" onclick="closeModal()" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <form action="" id="FormTambah" method="POST" enctype="multipart/form-data" class="p-3">
                    @csrf
                    <div class="mb-2 flex flex-col">
                        <label for="nama" class="mb-1 font-outfit after:content-['*'] after:text-red-500 after:text-sm after:font-medium">Nama Kantin</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800 {{ $errors->has('nama') ? 'border-red-500 ring-red-600' : ''}}">
                    </div>
                    <div class="mb-2 flex flex-col">
                        <label for="kategori" class="mb-1 font-outfit">Admin Kantin</label>
                        <select name="kategori" id="kategori" class="rounded p-1 outline-none ring-1 ring-slate-600 border-slate-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                            <option value="makanan">Makanan</option>
                            <option value="minuman">Minuman</option>
                        </select>
                    </div>
                    <div class="flex justify-end">
                        <button class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white hover:from-blue-500 hover:to-blue-800">Input</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
