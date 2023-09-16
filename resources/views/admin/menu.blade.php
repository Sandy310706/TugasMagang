@extends('layouts.app')

@section('title', 'Halaman Menu')

@section('Kelola Menu')
    <div class="container mt-3">
        <button class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Tambah</button>
        <table class="table table-hover my-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Menu</th>
                    <th>Harga Menu</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($data as $menu )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="" alt="foto menu"></td>
                        <td>{{ $menu->nama }}</td>
                        <td>{{ $menu->harga }}</td>
                        <td>{{ $menu->kategori }}</td>
                        <td>
                            <button class="btn btn-info my-3 text-white" data-bs-toggle="modal" data-bs-target="#EditMenu{{ $menu->id }}"><i class="bi bi-pencil-square text-white"></i> </button>
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
