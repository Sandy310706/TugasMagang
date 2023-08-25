@extends('layouts.app')

@section('title', 'Halaman Menu')

@section('Kelola Menu')
    <div class="main-container m-2">
        <button type="submit" class="btn btn-primary">Tambah Menu</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Deskipsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($menu as $m)
                    <tr>
                        <td>{{ $m->nama }}</td>
                        <td>Rp.{{ $m->harga }}</td>
                        <td>{{ $m->deskripsi }}</td>
                        <td>
                            <button class="btn btn-warning">Edit</button>
                            <button class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
