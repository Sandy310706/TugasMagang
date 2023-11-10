<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Gabarito:wght@400;500&family=Merriweather:wght@300&family=Oswald:wght@200&family=Outfit&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/histori.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container-fluid d-flex justify-end">
            <div class="menu-toggle">
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h3 class="navbar-brand welcome">SMKN7Pontianak</h3>
            <div class="justift-content-end">
                <ul class="navbar-nav text-uppercase">
                    <div class="nav-content">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                    </div>
                    <div class="dropdown">
                        <div class="button-sidebar">
                            <button class="button-dropdown" onclick="openDropdown()" id="dropdownTrigger">Frederick<i
                                    class="bi bi-caret-down-fill"></i></button>
                        </div>
                        <div class="dropdown-sidebar" id="dropdownMenu">
                            <div class="dropdown-content">
                                <li class="content-dropdown histori"><a class="nav-dropdown" href="/invoice">Histori
                                        Pesanan</li>
                                @if (auth())
                                    <li class="content-dropdown"><a class="nav-dropdown" href="/logout"><i
                                                class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
                                @else
                                    <li class="content-dropdown"><a class="nav-dropdown" href="/login">Login</a>
                                    </li>
                                @endif
                            </div>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <h1 class="text-center Histori">Histori Pemesanan</h1>
<<<<<<< HEAD
    @foreach ($detail as $s )
    <div class="container container-histori" style="margin-bottom: 20px;">
        <div class="card">
            <div class="content">
                <p>No Pesanan</p>
                <div class="Detail">
                    <button class="btn" data-id="{{$s->id}}" id="openModal" onclick="Begini(this)">Buka Modal</button>
=======
    @foreach ($detail as $s)
        <div class="container container-histori" style="margin-bottom: 20px;">
            <div class="card">
                <div class="content">
                    <p>No Pesanan</p>
                    <div class="Detail">
                        <button class="btn" data-id="{{ $s->id }}" id="openModal" onclick="phei()">Buka
                            Modal</button>
                    </div>
>>>>>>> 5cb401cbedb26fde9398f71a863c073d8678d387
                </div>

            </div>
        </div>
    @endforeach
<<<<<<< HEAD
    @foreach ($detail as $p )
    <div id="detailModal{{$p->id}}" class="modal modal{{$p->id}}">
        <div class="modal-content">
            <span class="close" data-id="{{$p->id}}">&times;</span>
            <div class="hero-container">
                <h1 class="text-detail">Detail Pesanan</h1>
                <div class="content-item">
                    <div class="content-hero">
                        <div class="kode hero-item">
                            <p>Kode: {{$p->token}}</p>
                        </div>
                        <div class="name hero-item">
                            <p>Keranjang: {{$p->keranjang_id}}</p>
                        </div>
                        <div class="tanggal hero-item">
                            <p>Tanggal Pemesanan: {{$p->created_at}}</p>
                        </div>
                    </div>
                </div>
                <div class="content-total">
                    <div class="child-total">
                        <div class="total hero-total">
                            <p>{{$p->keranjang->arraySum}}</p>
=======
    @foreach ($detail as $p)
        <div id="detailModal{{ $p->id }}" class="modal modal{{ $p->id }}">
            <div class="modal-content">
                <span class="close" onclick="closemodal()">&times;</span>
                <div class="hero-container">
                    <h1 class="text-detail">Detail Pesanan</h1>
                    <div class="content-item">
                        <div class="content-hero">
                            <div class="kode hero-item">
                                <p></p>
                            </div>
                            <div class="name hero-item">
                                <p></p>
                            </div>
                            <div class="tanggal hero-item">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="content-child">
                        <div class="child-content">
                            <div class="food hero-child">
                                <p></p>
                            </div>
                            <div class="stok hero-child">
                                <p></p>
                            </div>
                            <div class="total hero-child">
                                <p></p>
                            </div>
                            <div class="subtotal hero-child">
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="content-total">
                        <div class="child-total">
                            <div class="total hero-total">
                                <p>Total : Rp.100.000</p>
                            </div>
>>>>>>> 5cb401cbedb26fde9398f71a863c073d8678d387
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <script>
<<<<<<< HEAD
       $(document).ready(function() {
=======
        $(document).ready(function() {
>>>>>>> 5cb401cbedb26fde9398f71a863c073d8678d387
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
<<<<<<< HEAD
            $('.btn').click( function() {
=======
            $('.btn').click(function() {
                console.log('Hello World');
>>>>>>> 5cb401cbedb26fde9398f71a863c073d8678d387
                const id = $(this).data('id');
                const detailmodal = document.querySelector("#detailModal" + id);
                detailmodal.style.display = 'block';
            });
<<<<<<< HEAD
            $('.close').click(function() {
                let id = $(this).data('id')
                const detailmodal = document.querySelector("#detailModal"+id);
                detailmodal.style.display = 'none';
            });
        });
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
=======
        });

        function phei() {
            console.log('Hello World');
        }

        function modalteguh(ta)
        const id = ta.getAttribute('data-id')
        $.ajax({
            type = "POST",
            url = "/invoice/" + $id,
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                console.log(response)
            },
        });
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

        // Sembunyikan modal saat latar belakang modal diklik
        window.addEventListener("click", function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
>>>>>>> 5cb401cbedb26fde9398f71a863c073d8678d387
            }
        });
       };
    </script>
<<<<<<< HEAD
    {{-- <script>
        function detailModal(id)
        {
            const detailModal = document.getElementById(".modal"+id)
            console.log(id);
            detailModal.style.display = 'block';
        }
    </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"></script>
    <script src="script.js/script.js"></script>
=======
    <script>
        function detailModal(id) {
            const detailModal = document.getElementById(".modal" + id)
            console.log(id);
            detailModal.style.display = 'block';
        }

        function openDropdown() {
            const dropdownTrigger = document.getElementById('dropdownTrigger');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownIcon = document.getElementById('dropdownIcon');

            if (dropdownMenu.style.display === "none") {
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
>>>>>>> 5cb401cbedb26fde9398f71a863c073d8678d387
</body>

</html>
