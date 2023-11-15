<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Gabarito:wght@400;500&family=Josefin+Sans&family=Merriweather:wght@300&family=Oswald:wght@200;500&family=Outfit:wght@500&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/kantinPage.css') }}">
    <title>Document</title>
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
                <div class="hero-nav">
                    <div class="content-nav">
                        <div class="navbar-nav text-uppercase">
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
                                        <p></p>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown">
                                <div class="button-sidebar">
                                    <button class="button-dropdown" onclick="openDropdown()"
                                        id="dropdownTrigger">Frederick
                                        <i class="bi bi-caret-right-fill" id="dropdownIcon"></i> </button>
                                </div>
                                <div class="dropdown-sidebar" id="dropdownMenu">
                                    <div class="dropdown-content">
                                        <ul>
                                            <li class="content-dropdown"><a class="nav-dropdown" href="">Akun
                                            </li>
                                            <li class="content-dropdown"><a class="nav-dropdown histori-page"
                                                    href="/invoice">Histori
                                                    Pesanan</li>
                                            @if (auth())
                                                <li class="content-dropdown"><a class="nav-dropdown"
                                                        style="padding-top: 20px" href="/logout"><i
                                                            class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
                                            @else
                                                <li class="content-dropdown"><a class="nav-dropdown"
                                                        href="/login">Login</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</nav>
<div class="menu-page">
    <h1 class="menu">MENU</h1>
</div>

<div class="cards">
    <div class="content-hero">
        <div class="content-child">
            @foreach ($menu as $m)
                <div class="card-content">
                    <div class="card-image">
                        <img src="img/bipang.jpg" alt="">
                    </div>
                    <div class="content-text">
                        <p>Ayam geprek</p>
                        <p>RP.100.000</p>
                    </div>
                    <div class="content">
                        <button>Pesan</button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="contact page-section">
    <div class="container contact-form">
        <div class="text-center mt-5">
            <h2 class="feedback section-heading text-capatalize mb-5">Feedback</h2>
        </div>
        <form method="POST" action="{{ route('Feedback') }}" data-sb-form-api-token="API_TOKEN"
            style="position: relative; z-index: 9999;">
            @csrf
            <div class="row align-items-stretch mb-5">
                <div class="col">
                    <div class="form-group form-group-textarea mb-md-0">
                        <textarea class="form-control" rows="6" id="feedback" name="feedback" placeholder="Feedback*"
                            data-sb-validations="required"></textarea>
                        <div class="invalid-feedback">A Feedback is required.</div>
                    </div>
                </div>
            </div>
            <div class="text-end"><button class="button btn btn-info" id="submitButton" type="submit">Kirim
                    Feedback</button></div>
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
    // $(document).ready(function() {
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    // });

    function inputData(bi) {
        const id = bi.getAttribute('data-id')
        $.ajax({
            url: '/carts/' + id,
            dataType: "json",
            type: "POST",
            data: {},
            success: function(response) {
                location.reload();
                console.log("berhasil");
                setTimeout(() => {
                    document.getElementById('alerts').ustyle.display = 'none';
                }, 10000);
                document.getElementById('alerts').style.display = 'block';
            },
            error: function(error) {
                console.log('gagal');
                console.log(error)
            }
        });
    }

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
                navbar.style.backgroundColor = "#000000";
                navbar.style.padding = "10px";
                navbar.h3.style.color = "#f0f0f0f0"
            } else {
                navbar.style.backgroundColor = "transparent";
                navbar.h3.style.color = "#898989";
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
