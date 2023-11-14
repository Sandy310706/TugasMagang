@extends('layouts.user.app')
@section('title', 'Histori')
@section('histori')
    <h1 class="text-center Histori">Histori Pemesanan</h1>
    @foreach ($detail as $invoice)
        <div class="container container-histori" style="margin-bottom: 20px;">
            <div class="card">
                <div class="content">
                    <p>No Pesanan</p>
                    <div class="Detail">
                        <button class="btn" data-id="{{ $invoice->id }}" id="openModal" onclick="phei()">BukaModal</button>
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

        function Begini(saat) {
        const id = saat.getAttribute('data-id')
        $.ajax({
            url: `/invoice/${id}`,
            dataType:'json',
            type:'POST',
            data:{
                "_token": "{{ csrf_token() }}",
            },
            statusCode: {
        500: function(response) {
           console.log(response)
                }
            },
            success: function(response){
                console.log('berhasil');
            },
            error: function(response){
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

        // Ambil elemen modal dan tombol yang akan membukanya
        var modal = document.getElementsByClassName("modal");
        var openModalButton = document.getElementById("openModal");
        var closeButton = document.querySelector(".close");

        // Tampilkan modal saat tombol dibuka
        openModalButton.addEventListener("click", function() {
            modal.style.display = "block";
        });

        // Sembunyikan modal saat tombol close diklik atau latar belakang modal diklik
        closeButton.addEventListener("click", function() {
            modal.style.display = "none";
        });


            if (dropdownMenu.style.display === "none") {

        // Sembunyikan modal saat latar belakang modal diklik
        window.addEventListener("click", function(event) {
            if (dropdownMenu.style.display === "none") j{

                dropdownMenu.style.display = "block"
                dropdownIcon.style.transform = "rotate(50deg)"
                dropdownMenu.classList.add('animate-showDropdownMenu');
            } else {
                dropdownMenu.style.display = "none";
            }
        }
    </script>
    <script src="script.js/script.js"></script>
    <script src="script.js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>

@endsection
@push('style')
<link rel="stylesheet" href="css/histori.css">
@endpush


