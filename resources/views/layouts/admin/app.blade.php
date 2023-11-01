<!DOCTYPE html>
<html lang="id" class="scroll-smooth" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Outfit:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="/path/to/c3.css" rel="stylesheet">
    <script src="/path/to/d3.v5.min.js" charset="utf-8"></script>
    <script src="/path/to/c3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/c0dc21dad4.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        .duration-1000 {
            transition: opacity 2s ease-in-out;
        }
    </style>
    <link rel="icon" href="{{ asset('img/Phei.svg') }}" sizes="96x96">
    <title>@yield('title')</title>
</head>
<body class="bg-slate-200">
    <div class="flex">
        @include('layouts.admin.sidebar')
        <div class="w-4/5 lgMobile:w-full mobile:w-full lgTablet:w-full ml-[20%] lgMobile:ml-0 mobile:ml-0 lgTablet:ml-0 Tablet:w-full">
            @include('layouts.admin.navbar')
            <div class="w-full px-4 py-2">
                @yield('dashboard')
                @yield('kelola menu')
                @yield('kelola pesanan')
                @yield('feedback')
                @yield('keuangan')
            </div>
        </div>
      </div>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="/path/to/d3.v5.min.js" charset="utf-8"></script>
    <script src="/path/to/c3.min.js"></script>
    @include('sweetalert::alert')
</body>
</html>
