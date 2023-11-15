<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/nav.css">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Gabarito:wght@400;500&family=Josefin+Sans&family=Merriweather:wght@300&family=Oswald:wght@200;500&family=Outfit:wght@500&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('style')
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.user.nav')
    @yield('landingpage')
    @yield('menupage')
    @yield('keranjang')
    @yield('histori')
    @yield('kantinPage')

</body>
</html>