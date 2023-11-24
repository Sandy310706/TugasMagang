<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Gabarito:wght@400;500&family=Josefin+Sans&family=Merriweather:wght@300&family=Oswald:wght@200;500&family=Outfit:wght@500&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/kantinPage.css') }}">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark" id="mainNav">
        <div class="container-fluit d-flex container-content">
            <div class="menu-toggle">
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="navbar-brand ">
                <h3 class="navbars">Welcome To Kantin Sekolah</h3>
            </div>
            <div class="navbar-content justift-content-end">
                <div class="content-nav">
                    <ul class="navbar-nav text-uppercase">
                        <div class="nav-content">
                            <a class="nav-link" href="/">Home</a>
                            @auth @if (auth()->user()->role == 'admin')
                                <a class="nav-link" href="/admin/dashboard">Dashboard</a>
                            @endif
                            @endauth
                            <a class="nav-link" href="#feedback">Feedback</a>
                            <a class="nav-link" href="/menu">Kantin</a></li>
                            <div class="keranjangs">
                                <a class="nav-link" href="/carts" class="bi bi-cart">Keranjang</a>
                                <div class="ntif">
                                    <p>{{ $angka }}</p>
                                </div>
                            </div>
                            </div>
                        <div class="dropdown">
                            <div class="button-sidebar">
                                @guest
                                    <a href="/login" class="button-dropdown" onclick="openDropdown()" id="dropdownTrigger">Login</a>
                                @else
                                    <button class="button-dropdown" onclick="openDropdown()"
                                        id="dropdownTrigger">{{ $userNav->nama }}
                                        <i class="bi bi-caret-down-fill" id="dropdownIcon"></i>
                                    </button>
                                @endguest
                            </div>
                            <div class="dropdown-sidebar" id="dropdownMenu">
                                <div class="dropdown-content">
                                    <ul>
                                        @guest
                                            <li class="content-dropdown"><a class="nav-dropdown"
                                                    style="padding-top: 20px" href="/login"><i
                                                        class="bi bi-box-arrow-in-right"></i>login</a></li>
                                        @else
                                            <li class="content-dropdown"><a class="nav-dropdown" href="">Akun
                                            </li>
                                            <li class="content-dropdown"><a class="nav-dropdown histori"
                                                    href="/invoice">Histori Pesanan</li>
                                            <li class="content-dropdown"><a class="nav-dropdown histori"
                                                    href="/logakun/{{ auth()->user()->nama }}">Log Akun</li>
                                            <li class="content-dropdown"><a class="nav-dropdown"
                                                    style="padding-top: 20px" href="/login"><i
                                                        class="bi bi-box-arrow-in-right"></i>logout</a></li>
                                        @endguest
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<div class="svg-content">
    <svg xmlns="http://www.w3.org/2000/svg" width="377" height="512" viewBox="0 0 377 512" fill="none">
        <path
            d="M373.798 278.738C379.288 419.012 171.474 568.38 -42.1802 489.823C-183.791 448.915 20.8707 189.011 -204.571 99.6273C-323.148 22.7111 -292.244 -79.6737 -187.268 -132.795C-98.0457 -199.876 415.609 20.4405 373.798 278.738Z"
            fill="#96C291" />
    </svg>
</div>

<div class="container-gradient">
    <div class="hero-content">
        <div class="child-hero">
            <div class="gradient">
                <div class="gradient-content">
                    <div class="content-image">
                        <div class="image">
                            <img src="{{ asset('template/landingPage/assets/img/kantin 1.png') }}" alt="">
                        </div>
                        <div class="text-content">
                            <p class="name">{{$Kantin->namaKantin}}</p>
                        </div>
                    </div>
                    <div class="content-descript">
                        <div class="text-content2">
                            <div class="text-1">
                                <p class="Name-kasir"><i class="bi bi-person-circle"></i></p>
                                <p class="number"><i class="bi bi-telephone-fill"></i>Nomor Telpon</p>
                                <p class="email"><i class="bi bi-envelope-at-fill"> </i></p>
                            </div>
                            <div class="text-2">
                                <p class="produk"><i class="bi bi-collection"></i>produk:  <span class="nilai">100</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="menu-page">
    <div class="pembungkus-alert">
        <div class="custom-alert" id="alerts" style="display: none; font-sans"> <p>pesan sudah ditambahkan</p> </div>
    </div>
    <h1 class="menu">MENU</h1>
</div>
<div class="cards">
    <div class="content-hero">
        <div class="content-child">
            @foreach ($menu as $data)
                <div class="card-content">
                    <div class="card-image">
                        <img src="img/bipang.jpg" alt="">
                    </div>
                    <div class="content-text">
                        <p>{{ $data->nama }}</p>
                        <p>RP. {{ $data->harga }}</p>
                    </div>
                    <div class="content">
                        <button type="submit" onclick="inputData(this)" class="btn btn-submit"
                            data-id="{{ $data->id }}">Pesan</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="contact page-section">
    <div class="container contact-form">
        <form action="{{route('Feedback.Store' , $namaKantin )}}" method="post">
            @csrf
        <div class="text-center mt-5">
            <h2 class="feedback section-heading text-capatalize mb-5">Feedback Kantin</h2>
        </div>
        <div class="row align-items-stretch mb-5">
            <div class="col">
                <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control" rows="6" id="feedback" name="feedback" placeholder="Feedback*"
                            data-sb-validations="required" value=""></textarea>
                    <div class="invalid-feedback">A Feedback is required.</div>
                </div>
            </div>
        </div>
        <div class="text-end">
                <button class="button btn btn-info"  id="submitButton" type="submit">Kirim Feedback</button>
        </div>
        </form>
    </div>
</div>


<footer class="footer">
    <div class="footer-container">
        <div class="footer-content">
            <div class="copyright">
                <p>Copy right by Babang Frederick</p>
            </div>
            <div class="sosmed">
                <ul>
                    <a href=""><i class="bi bi-envelope-fill"> SMKN7Pontianak@gmail.com</i></a>
                    <a href=""><i class="bi bi-telephone-fill"></i> 1244234</a>
                    <a href=""><i class="bi bi-instagram"></i> SMKN7Pontianak</a>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    function inputData(bi) {
        const id = bi.getAttribute('data-id')
        $.ajax({
            url: `/carts/+${id}`,
            dataType: "json",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(response) {
                location.reload();
                console.log("berhasil");
                setTimeout(() => {
                    document.getElementById('alerts').ustyle.display = 'none';
                }, 5000);
                document.getElementById('alerts').style.display = 'block';
            },
            error: function(error) {
                console.log('gagal');
                console.log(error)
            }
        });
    };



    </script>
    <script>
    function openDropdown() {
        const dropdownTrigger = document.getElementById('dropdownTrigger');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownIcon = document.getElementById('dropdownIcon');

        if (dropdownMenu.style.display === "none") {
            dropdownMenu.style.display = "block"
            dropdownIcon.style.transform = "rotate(90deg)"
        } else {
            dropdownMenu.style.display = "none";
            dropdownIcon.style.transform = "rotate(180deg)"
        }
    }

    const menuToggle = document.querySelector('.menu-toggle input');
    const nav = document.querySelector('nav .navbar-nav');

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('slide');
    });


    document.addEventListener("DOMContentLoaded", function() {
        window.onscroll = function() {
            scrollFunction();
        };

        function scrollFunction() {
            var navbar = document.getElementById("mainNav");

            if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
                navbar.style.backgroundColor = "#96C291";
                navbar.style.padding = "10px";
            } else {
                navbar.style.backgroundColor = "transparent";
                navbar.style.padding = "0";
            }
        }
    });
</script>


<script src="script.js/script.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
</script>
</body>

</html>