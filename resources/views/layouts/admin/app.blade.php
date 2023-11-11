<!DOCTYPE html>
<html lang="id" class="scroll-smooth" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Outfit:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Archivo+Black&display=swap" rel="stylesheet">

    {{-- jQuery DataTable --}}
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/c0dc21dad4.js" crossorigin="anonymous"></script>

    <style>
        label{
            font-size: 15px;
            font-family: outfit;
        }
        #tabel-menu_info{
            font-size: 15px;
            font-family: outfit;
        }
    </style>
    <link rel="icon" href="{{ asset('img/Phei.svg') }}" sizes="96x96">
    <title>@yield('title')</title>
</head>
<body class="bg-slate-200 overflow-x-hidden" id="body">
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
    @include('sweetalert::alert')
    {{-- jQuery DataTable --}}
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- Laravel Charts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</body>
</html>
