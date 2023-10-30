@extends('layouts.admin.app')
@section('title', 'Admin | Kelola Pesanan')
@section('headerNav', 'Kelola Pesanan')
@section('kelola pesanan')
<div class="w-full">
    <table class="table-fixed w-full mt-4 rounded-lg font-outfit text-xs h-12">
        <thead class="">
            <th>No</th>
            <th>Kode Pemasanan</th>
            <th>Nama Pemesan</th>
            <th></th>
        </thead>
        <tbody class="text-center bg-white odd:bg-sky-300">
            @foreach ($data as $pesanan )
                <tr class="group border-b even:bg-zinc-300 odd:bg-neutral-200 border-gray-400">
                    <td class="p-2 group-hover:bg-neutral-400">{{ $loop->iteration }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">{{ $pesanan->token }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">{{ $pesanan->user->nama }}</td>
                    <td class="p-2 group-hover:bg-neutral-400">
                        <button class="text-yellow-400">Detail</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
