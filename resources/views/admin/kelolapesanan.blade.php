@extends('layouts.admin.app')
@section('title', 'Admin | Kelola Pesanan')
@section('headerNav', 'Kelola Pesanan')
@section('kelola pesanan')
    <div class="w-full">
        <table class="w-full">
            <thead class="bg-slate-500">
                <tr>
                    <th>No</th>
                    <th>Kode Pesanan</th>
                    <th>Nama Pemesan</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $pesanan )
                    <tr>
                        <td class="p-2 text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ $pesanan->kode }}</td>
                        <td class="text-center">{{ $pesanan->pemesan }}</td>
                        <td class="text-center">
                            @if($pesanan->status == 1)
                                <span class="text-green-500">Selesai</span>
                            @else
                                <span class="text-red-500">Belum Selesai</span>
                            @endif
                        </td>
                        <td class="text-center"><button><span class="text-red-500">Detail</span></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
