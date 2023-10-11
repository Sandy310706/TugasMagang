@extends('layouts.admin.app')
@section('title', 'Admin | Dashboard')
@section('headerNav', 'Dashboard')
@section('dashboard')
    <div class="w-full h-28 mt-3 flex justify-evenly flex-wrap tablet:w-screen">
        <div class="relative w-[212px] mb-2 h-32 bg-green-700 text-white rounded-md hover:bg-green-800">
            <div class="p-1">
                <h2 class="pl-1 font-font-semibold text-2xl">{{ $totalMenu }}</h2>
                <h1 class="pl-1 font-amaranth text-4xl">Menu</h1>
                <img src="{{ asset('img/Menu.svg') }}" alt="card-icon" class="scale-125 absolute right-4 top-0">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20 rounded-b-md">
                <div class="w-full flex p-1"><a href="{{ route('Admin.Menu') }}" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
        <div class="relative w-[212px] mb-2 h-32 bg-emerald-400 text-white rounded-md hover:bg-emerald-500">
            <div class="p-1">
                <h2 class="pl-1 font-semibold text-2xl">0</h2>
                <h1 class="pl-1 font-amaranth text-3xl">Pesanan</h1>
                <img src="{{ asset('img/Pesanan.svg') }}" alt="card-icon" class="scale-125 absolute right-3 top-4">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20 rounded-b-md">
                <div class="w-full flex p-1"><a href="" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
        <div class="relative w-[212px] mb-2 h-32 bg-amber-600 text-white rounded-md hover:bg-amber-700">
            <div class="p-1">
                <h2 class="pl-1 font-semibold text-2xl">{{ $totalMasukan }}</h2>
                <h1 class="pl-1 font-amaranth text-3xl">Feedback</h1>
                <img src="{{ asset('img/Feedback.svg') }}" alt="card-icon" class="absolute right-2 top-3">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20 rounded-b-md">
                <div class="w-full flex p-1"><a href="{{ route('Admin.Feedback') }}" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
        <div class="relative w-[212px] mb-2 h-32 bg-red-800 text-white rounded-md hover:bg-red-900" style="z-index: 1">
            <div class="p-1">
                <h2 class="pl-1 font-semibold text-2xl">{{ $totalAkun }}</h2>
                <h1 class="pl-1 font-amaranth text-3xl">Akun</h1>
                <img src="{{ asset('img/Users.svg') }}" alt="card-icon" class="absolute right-4 top-1">
            </div>
            <div class="absolute bottom-0 w-full bg-black bg-opacity-20 rounded-b-md">
                <div class="w-full flex p-1"><a href="" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a></div>
            </div>
        </div>
    </div>

@endsection
