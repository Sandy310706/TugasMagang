@extends('layouts.user.app')

@section('title', 'Histori')

@section('histori')

    {{-- <div class="svg-container">
        <svg class="kuning-1" width="316" height="333" viewBox="0 0 316 333" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle cx="66.5" cy="83.5" r="249.5" fill="#D2DE32" />
        </svg>
        <svg class="hijau-2" width="165" height="176" viewBox="0 0 165 176" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle cx="139.5" cy="36.5" r="139.5" fill="#96C291" />
        </svg>
        <svg class="kuning-3" width="176" height="195" viewBox="0 0 176 195" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle cx="36.5" cy="139.5" r="139.5" fill="#96C291" />
        </svg>
        <svg class="hijau-4" width="359" height="288" viewBox="0 0 359 288" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <circle cx="249.5" cy="249.5" r="249.5" fill="#D2DE32" />
        </svg>

    </div> --}}
    <div class="container-fluid">
        <h1 class="text-center Histori">Histori Pemesanan</h1>
        @foreach ($detail as $invoice)
            <div class="container container-histori" style="margin-bottom: 20px;">
                <div class="card">
                    <div class="content">
                        <p>No Pesanan</p>
                        <div class="Detail">
                            <button tytpe="button" class="btns" id="openModalx"
                                call-modal="detailModal{{ $invoice->id }}">Detail Pesanan</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @foreach ($detail as $invoice)
    <div class="modal" tabindex="1000" id="detailModal{{ $invoice->id }}">
        <div class="modal-dialog">
            <div class="modal-content animate__animated animate__fadeInDown">
                <div class="modal-header">
                    <div class="header-child">
                        <div class="button-btn">
                            <button type="button" class="btn btn-closes" data-bs-dismiss="modal">x</button>
                        </div>
                        <h1 class="text-detail text-center">Detail Pesanan</h1>
                    </div>
                </div>
                <div class="hero-container">
                    <div class="content-item">
                        <div class="content-hero">
                            <div class="kode hero-item">
                                <p>{{ $invoice->keranjang_id }}</p>
                            </div>
                            <div class="name hero-item">
                                <p>{{ $invoice->token }}</p>
                            </div>
                            <div class="tanggal hero-item">
                                <p>{{ $invoice->created_at }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-child">
                        <div class="child-content">
                            <div class="food hero-child">
                                <p>{{ $invoice->keranjang->menu->nama }}</p>
                            </div>
                            <div class="stok hero-child">
                                <p>{{ $invoice->keranjang->jumlah }}</p>
                            </div>
                            <div class="total hero-child">
                                <p>{{ $invoice->keranjang->subtotal }}</p>
                            </div>
                            <div class="subtotal hero-child">
                                <p>{{$invoice->keranjang->total_harga}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="content-total">
                        <div class="child-total">
                            <div class="total hero-total">
                                <p>{{ $arraySum }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach



@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="main.js"></script>

    {{-- <script src="script.js/modal.js"></script> --}}
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // $('.btn').click(function() {
            //     console.log('Hello World');
            //     const id = $(this).data('id');
            //     const detailmodal = document.querySelector("#detailModal" + id);
            //     detailmodal.style.display = 'block';
            // });

            // $('.close').click(function() {
            //     let id = $(this).data('id')
            //     const detailmodal = document.querySelector("#detailModal" + id);
            //     detailmodal.style.display = 'none';
            //     console.log('Apaa');
            // });
            $('.modal').on('shown.bs.modal', function(){
                console.log('hello');
                $('.modal-backdrop').css('z-index','-99');
            });
        });


        function Begini(saat) {
            const id = saat.getAttribute('data-id')
            $.ajax({
                url: `/invoice/${id}`,
                dataType: 'json',
                type: 'POST',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                statusCode: {
                    500: function(response) {
                        console.log(response)
                    }
                },
                success: function(response) {
                    console.log('berhasil');
                },
                error: function(response) {
                    console.log('gagal');

                },
            });
        }
    </script>
    <script>
        var modal = document.getElementsByClassName("modal");
        var openModalButton = document.getElementById("openModal");
        var closeButton = document.querySelector(".close");
        var open = document.querySelectorAll("#openModalx");

        open.forEach(function(btnModal) {
            btnModal.addEventListener('click', function(e) {
                console.log(e.target.getAttribute('call-modal'));
                $('#' + e.target.getAttribute('call-modal')).modal("show");
            });
        });

    </script>
@endsection
@push('style')
    <link rel="stylesheet" href="css/histori.css">
@endpush
