<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('template/adminlte/css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.css" />
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    @include('layouts.navbar')
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="z-2 sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="index.html">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        @if(Auth::user()->role == 'operator')
                            @auth
                                <div class="sb-sidenav-menu-heading">Fitur</div>
                                <a class="nav-link" href="{{ route('akunSetting') }}">
                                    <div class="sb-nav-link-icon"><i class="bi bi-person-fill"></i></div>
                                    Kelola Akun User
                                </a>
                            @endauth
                        @elseif(Auth::user()->role == 'admin')
                            @auth
                                <div class="sb-sidenav-menu-heading">Fitur</div>
                                <a class="nav-link" href="{{ route('menuSetting') }}">
                                    <div class="sb-nav-link-icon"><i class="bi bi-journals"></i></div>
                                    Kelola Menu
                                </a>
                                <a class="nav-link" href="#">
                                    <div class="sb-nav-link-icon"><i class="bi bi-cart-fill"></i></div>
                                    Kelola Pesanan
                                </a>
                                <a class="nav-link" href="{{ route('History') }}">
                                    <div class="sb-nav-link-icon"><i class="bi bi-cart-fill"></i></div>
                                    Invoice
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    @yield('Kelola Akun')
                    @yield('Kelola Menu')
                    @yield('History')
                </div>
            </main>
            @include('layouts.footer')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="{{ asset('template/adminlte/js/scripts.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
</body>
</html>