@extends('layouts.Admin')

@section('title', 'Admin | Pesanan')
@section('headerNav', 'Kelola Pesanan')
<div class="w-full">
    <div class="w-1/2 bg-slate-200 shadow-sm shadow-black rounded-md absolute top-5">
        <div class="p-4 mb-2">
            <h1 class="text-4xl font-outfit">Tambah Data</h1>
        </div>
        <div class="">
            <form action="{{ route('pesanan') }}" method="POST" enctype="multipart/form-data" class="p-3">
                @csrf
                <div class="mb-2 flex flex-col">
                    <label for="nama" class="mb-1 font-outfit">Nama</label>
                    <input type="text" id="nama" name="nama" class="rounded p-1 outline-none ring-1 ring-blue-600 border border-sky-500 bg-slate-300 shadow-slate-900 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                </div>
                <div class="mb-2 flex flex-col">
                    <label for="harga" class="mb-1 font-outfit">Harga</label>
                    <input type="text" id="harga" name="harga" class="rounded p-1 outline-none ring-1 ring-blue-600 border border-sky-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                </div>
                <div class="mb-2 flex flex-col">
                    <label for="kategori" class="mb-1 font-outfit">Kategori</label>
                    <select name="kategori" id="kategori" class="rounded p-1 outline-none ring-1 ring-blue-600 border border-sky-500 bg-slate-300 shadow-slate-800 focus:shadow-xl focus:ring-blue-700 focus:border-sky-800">
                        <option value="Makanan">Makanan</option>
                        <option value="Minuman">Minuman</option>
                    </select>
                </div>
                <div class="mb-2 flex flex-col">
                    <label for="file" class="mb-1 font-outfit">Foto</label>
                    <input type="file" id="file" name="file" class="rounded p-1">
                </div>
                <div class="flex justify-end">
                    <button class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-slate-500 to-slate-800 text-white mr-2">Tutup</button>
                    <button class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white">Input</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('pesanan')
