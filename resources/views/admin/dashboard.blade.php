@extends('layouts.admin.Admin')
@section('title', 'Admin | Dashboard')
@section('headerNav', 'Dashboard')

@section('dashboard')
    <div class="w-full h-28 flex justify-evenly">
        <div class="relative w-1/5 bg-green-700 text-white rounded-md">
            <div class="p-1">
                <h2 class="pl-1 font-font-semibold text-2xl">{{ $totalMenu }}</h2>
                <h1 class="pl-1 font-amaranth text-3xl">Menu</h1>
                <img src="{{ asset('img/Menu.svg') }}" alt="card-icon" class="absolute right-2 top-0">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20">
                <div class="w-full flex p-1"><a href="{{ route('Admin.Menu') }}" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
        <div class="relative w-1/5 bg-emerald-400 text-white rounded-md">
            <div class="p-1">
                <h2 class="pl-1 font-semibold text-2xl">10</h2>
                <h1 class="pl-1 font-amaranth text-3xl">Pesanan</h1>
                <img src="{{ asset('img/Pesanan.svg') }}" alt="card-icon" class="absolute right-3 top-2">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20">
                <div class="w-full flex p-1"><a href="" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
        <div class="relative w-1/5 bg-[#BF810A] text-white rounded-md">
            <div class="p-1">
                <h2 class="pl-1 font-semibold text-2xl">10</h2>
                <h1 class="pl-1 font-amaranth text-3xl">Feedback</h1>
                <img src="{{ asset('img/Feedback.svg') }}" alt="card-icon" class="absolute right-2 top-3">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20">
                <div class="w-full flex p-1"><a href="{{ route('Admin.Feedback') }}" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
        <div class="relative w-1/5 bg-red-800 text-white rounded-md">
            <div class="p-1">
                <h2 class="pl-1 font-semibold text-2xl">10</h2>
                <h1 class="pl-1 font-amaranth text-3xl">Akun</h1>
                <img src="{{ asset('img/Users.svg') }}" alt="card-icon" class="absolute right-4 top-1">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20">
                <div class="w-full flex p-1"><a href="" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
    </div>
@endsection
