@extends('layouts.app')

@section('title', 'Kelola Menu Makanan')

@section('Kelola Menu Makanan')
    <div class="container">
        @if (session('berhasil'))
            <div class="alert alert-dismissible fade show mt-3 d-flex align-items-center" role="alert" style="background-color: green">
                <div class="text-white"><i class="bi bi-check-circle-fill"></i> {{ session('berhasil') }}</div>
                <button type="button" class="btn-close" tabindex="-1" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('editBerhasil'))
        <div class="alert alert-dismissible fade show mt-3 d-flex align-items-center" role="alert" style="background-color: green">
            <div class="text-white"><i class="bi bi-check-circle-fill"></i> {{ session('editBerhasil') }}</div>
            <button type="button" class="btn-close" tabindex="-1" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
        @if (session('hapus'))
        <div class="alert alert-dismissible fade show mt-3 d-flex align-items-center" role="alert" style="background-color: rgb(255, 0, 0)">
            <div class="text-white"><i class="bi bi-check-circle-fill"></i> {{ session('hapus') }}</div>
            <button type="button" class="btn-close" tabindex="-1" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <button class="btn btn-info my-3 text-white" data-bs-toggle="modal" data-bs-target="#TambahMenu"><i class="bi bi-plus-circle"></i> Tambah Menu </button>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Makanan</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $menu)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="" alt="foto menu makanan"></td>
                            <td>{{ $menu->nama }}</td>
                            <td>Rp. {{ $menu->harga }}</td>
                            <td>
                                <button class="btn btn-info my-3 text-white" data-bs-toggle="modal" data-bs-target="#EditMenu{{ $menu->id }}"><i class="bi bi-pencil-square text-white"></i></button>
                                <form class="d-inline" action="{{ route('Delete.Makanan', $menu->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        <div class="modal fade" id="EditMenu{{ $menu->id }}" tabindex="-1" aria-labelledby="EditMenu" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('Update.Makanan',$menu->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <label class="form-label" for="Nama" >Nama Menu</label>
                                        <input class="form-control mb-2" type="text" id="Nama" name="nama" value="{{ $menu->nama }}">
                                        <label class="form-label" for="Harga">Harga</label>
                                        <input class="form-control mb-2" type="number" id="Harga" name="harga" value="{{ $menu->harga }}">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Tambah Menu</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="TambahMenu" tabindex="-1" aria-labelledby="TambahMenu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <label class="form-label" for="Nama">Nama Menu</label>
                    <input class="form-control mb-2" type="text" id="Nama" name="nama">
                    <label class="form-label" for="Harga">Harga</label>
                    <input class="form-control mb-2" type="number" id="Harga" name="harga">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Tambah Menu</button>
                </form>
            </div>
        </div>
    </div>
@endsection
