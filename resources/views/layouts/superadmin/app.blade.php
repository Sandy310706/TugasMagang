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
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Outfit:wght@200;300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Archivo+Black&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://kit.fontawesome.com/c0dc21dad4.js" crossorigin="anonymous"></script>

    {{-- jQuery DataTable --}}
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <title>@yield('title')</title>
</head>
<body class="bg-slate-200">
    <div class="flex">
        @include('layouts.superadmin.sidebar')
        <div class="ml-[20%] w-full">
            @include('layouts.superadmin.navbar')
            <div class="container px-4 py-2">
                @yield('kelola akun')
                @yield('kelola kantin')
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    {{-- jQuery DataTable --}}
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</body>
</html>
