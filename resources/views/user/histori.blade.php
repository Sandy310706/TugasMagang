@extends('layouts.user.app')
@section('title', 'Histori')
@section('histori')

<div class="svg-container">
    <svg class="kuning-1" width="316" height="333" viewBox="0 0 316 333" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="66.5" cy="83.5" r="249.5" fill="#D2DE32"/>
    </svg>
    <svg class="hijau-2" width="165" height="176" viewBox="0 0 165 176" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="139.5" cy="36.5" r="139.5" fill="#96C291"/>
    </svg> 
    <svg class="kuning-3" width="176" height="195" viewBox="0 0 176 195" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="36.5" cy="139.5" r="139.5" fill="#96C291"/>
    </svg>
    <svg class="hijau-4" width="359" height="288" viewBox="0 0 359 288" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="249.5" cy="249.5" r="249.5" fill="#D2DE32"/>
    </svg> 
        
</div>
    <h1 class="text-center Histori">Histori Pemesanan</h1>
    @foreach ($detail as $invoice)
        <div class="container container-histori" style="margin-bottom: 20px;">
            <div class="card">
                <div class="content">
                    <p>No Pesanan</p>
                    <div class="Detail">
                        <button class="btn"  id="openModal" onclick="phei(this)">BukaModal</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
  
    @foreach ($detail as $invoice)
        <div id="detailModal{{ $invoice->id }}" class="modal modal{{ $invoice->id }}">
            <div class="modal-content">
                <span class="close" data-id="{{ $invoice->id }}" id="close">x</span>
                <div class="hero-container">
                    <h1 class="text-detail">Detail Pesanan</h1>
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
    @endforeach

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.btn').click(function() {
                console.log('Hello World');
                const id = $(this).data('id');
                const detailmodal = document.querySelector("#detailModal" + id);
                detailmodal.style.display = 'block';
            });

            $('.close').click(function() {
                let id = $(this).data('id')
                const detailmodal = document.querySelector("#detailModal" + id);
                detailmodal.style.display = 'none';
                console.log('Apaa');
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
        function detailModal(id) {
            const detailModal = document.getElementById(".modal" + id)
            console.log(id);
            detailModal.style.display = 'block';
        }

        
        var modal = document.getElementsByClassName("modal");
        var openModalButton = document.getElementById("openModal");
        var closeButton = document.querySelector(".close");
        open.addEventListener("click", function () {
            modal.style.display = "block";
        });

        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });


        window.addEventListener("click", function(event) {
            if (dropdownMenu.style.display === "none") {
                dropdownMenu.style.display = "block"
                dropdownIcon.style.transform = "rotate(50deg)"
                dropdownMenu.classList.add('animate-showDropdownMenu');
            } else {
                dropdownMenu.style.display = "none";
            }
        });
    </script>
    <script src="main.js"></script>
    <script src="script.js/script.js"></script>
    <script src="script.js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
@endsection
@push('style')
<link rel="stylesheet" href="css/histori.css">
@endpush


