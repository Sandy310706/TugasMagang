@extends('layouts.app')

@section('title', 'Dasboard ')

@section('History')

<div class="mt-3">
    <button class="btn btn-primary mb-3" id="btnTambah">Tambah Akun</button>
    <table id="akunTable" class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Total harga</th>
            </tr>
        </thead>
    </table>
</div>
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content ">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                    <div class="row mb-1">
                        <label for="Nama" class="form-label">Nama : </label>
                        <input type="text" class="form-control" id="Nama" name="nama">
                    </div>
                    {{-- <div class="row mb-1">
                        <label for="nama pesanan" class="form-label">Pesanan : </label>
                        <input type="nama pesanan" class="form-control @error('Pesanan') is-invalid @enderror" id="Pesanan" name="Pesanan">
                        @error('Pesanan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div> --}}
                    <div class="modal-body">
                        <div class="row mb-1">
                            <label for="Total Harga" class="form-label">Total Harga : </label>
                            <input type="number" class="form-control" id="Totalharga" name="Total">
                        </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="Save" method="post">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

    $(document).ready( function () {
        $('#akunTable').DataTable({
            processing:true,
            serverside:true,
            ajax:"{{route('invoice')}}",
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                orderable: false,
                searcheble: false
            },
            {
                data: 'nama',
                name: 'Nama'
            },
            // {
            //     data: 'pesan_id',
            //     name: 'Nama pesanan'
            // },
            {
                data: 'total_harga',
                name: 'Total harga'
            }]
        });
    });
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    $('body').on('click', '#btnTambah', function(e){
        e.preventDefault();
        $('#invoiceModal').modal('show');
        $('#Save').click( function(){
            let nama = $('#Nama').val();
            // let pesan_id = $('#Pesanan').val();
            let total_harga = $('#Totalharga').val();
            $.ajax({
                url: "{{route('invoiceCreate')}}",
                type: 'POST',
                cache: false,
                data:{
                    nama: $('#Nama').val(),
                    // pesan_id: $('#Pesanan').val(),
                    total_harga: $('#Totalharga').val(),
                },
                success: function(response){
                    $('#akunTable').DataTable().ajax.reload()
                    $('#exampleModalLabel').modal('hide');
                }
            });
        });
    });
</script>
@endsection

