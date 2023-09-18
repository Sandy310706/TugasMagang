@extends('layouts.Admin')

@section('title', 'Admin | Kelola Menu')
@section('headerNav', 'Kelola Menu')
@section('kelola menu')
<div class="w-full">
    <button data-modal-trigger="modal" id="showModal" class="my-2 p-2 bg-blue-400 text-white rounded-md font-outfit hover:bg-blue-500">Tambah Menu</button>
    <table class="table-fixed w-full p-4 rounded-lg font-outfit">
        <thead class="bg-slate-300">
            <th>No</th>
            <th>Foto</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Aksi</th>
        </thead>
        <tbody class="text-center">
            <tr class="group border-b border-gray-400">
                <td class="p-2 group-hover:bg-zinc-300">1</td>
                <td class="p-2 group-hover:bg-zinc-300"><img src="" alt="foto menu"></td>
                <td class="p-2 group-hover:bg-zinc-300">Nasi Goreng</td>
                <td class="p-2 group-hover:bg-zinc-300">Minuman</td>
                <td class="p-2 group-hover:bg-zinc-300">Rp. 100.000,00</td>
                <td class="p-2 group-hover:bg-zinc-300">
                    <a href="" class="text-yellow-600">Edit</a>
                    <p class="inline"> | </p>
                    <a href="" class="text-pink-600">Hapus</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div id="modal" class="wc-1/2 bg-slate-200 shadow-sm shadow-black rounded-md absolute top-5 hidden">
    <div class="p-4 mb-2">
        <h1 class="text-4xl font-outfit">Tambah Data</h1>
    </div>
    <div class="">
        <form action="" method="POST" class="p-3">
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
                <button data-modal-hide="defaultModal" type="button" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-slate-500 to-slate-800 text-white mr-2">Tutup</button>
                <button data-modal-hide="defaultModal" type="button" class="rounded-sm w-3/12 py-1 px-2 bg-gradient-to-r from-blue-400 to-blue-700 text-white">Input</button>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('js/admin.js') }}"></script>
@endsection
