@extends('layouts.admin.app')
@section('title', 'Admin | Dashboard')
@section('headerNav', 'Dashboard')
@section('dashboard')
    <div class="w-full lgTablet:w-screen tablet:w-screen flex flex-col items-center bg-opacity-90">
        {{-- <div class="w-1/2 py-4 px-2 absolute top-10 bg-white backdrop-blur-xl" style="z-index: 999">
            p
        </div> --}}
        <div class="w-full bg-white flex flex-col justify-between items-center rounded-xl border border-slate-500">
            <div class="w-full my-4 flex items-center">
                <div class="w-[45%] ml-3 bg-cover bg-center rounded-xl" style="background-image: url('/img/Bg-Cover.jpg')">
                    <div class="w-full h-full flex justify-between items-center rounded-xl backdrop-blur-[1.5px] backdrop-brightness-50">
                        <div class="w-[40%] ml-2 p-2">
                            <img src="{{ asset('storage/fotoKantin/'. $namaKantin->foto) }}" alt="" class="rounded-full border-[3px] border-white h-32 w-32">
                        </div>
                        <div class="w-[60%] mr-2">
                            <h1 class="text-xl text-white font-outfit">{{ $namaKantin->namaKantin }}</h1>
                        </div>
                    </div>
                </div>
                <div class="w-[50%] ml-3 grid grid-rows-3 gap-3 grid-flow-col font-outfit text-md">
                    <span class="flex w-full h-full items-center">Nama Admin : {{ $admin['nama'] }}</span>
                    <div class="flex w-full h-full items-center">
                        <span>No.Telpn Kantin : </span><span class="ml-1">08000000</span><input class="hidden ml-1 w-[33%] outline-none border-b border-black" type="text" value="000000"><button class="ml-2"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                    <div class="flex w-full h-full items-center">
                        <span>Email Kantin : </span><span id="spanEmail" class="ml-1">frederick@email.com</span><input id="inputEmail" class="hidden ml-1 w-[33%] outline-none border-b border-black" type="text" value="000000"><button id="btnEmail" class="ml-2"><i class="fa-regular fa-pen-to-square"></i></button>
                    </div>
                    <span>Jumlah Produk : {{ $totalMenu }} </span>
                    <button class="p-2 rounded-md bg-gradient-to-r from-blue-500 to-blue-700 hover:from-blue-600 hover:to-blue-800 focus:ring-1 focus:ring-blue-600 text-white">Edit profil</button>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-around my-4">
            <div class="relative w-[30%] mb-2 h-32 bg-green-700 text-white rounded-md hover:bg-green-800">
                <div class="p-1">
                    <h2 class="pl-1 font-font-semibold text-2xl">{{ $totalMenu }}</h2>
                    <h1 class="pl-1 font-amaranth text-3xl">Menu</h1>
                    <img src="{{ asset('img/Menu.svg') }}" alt="card-icon" class="absolute scale-110 lgTablet:scale-100 right-4 lgTablet:right-2 top-1">
                </div>
                <div class="absolute bottom-0 w-full bg-black bg-opacity-20 rounded-b-md">
                    <div class="w-full flex p-1">
                        <a href="{{ route('Admin.Menu') }}" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="relative w-[30%] mb-2 h-32 bg-emerald-400 text-white rounded-md hover:bg-emerald-500">
                <div class="p-1">
                    <h2 class="pl-1 font-semibold text-2xl">{{ $totalPesanan }}</h2>
                    <h1 class="pl-1 font-amaranth text-3xl">Pesanan</h1>
                    <img src="{{ asset('img/Pesanan.svg') }}" alt="card-icon" class="scale-100 lgTablet:scale-100 absolute right-4 lgTablet:-right-1 top-3">
                </div>
                <div class="absolute bottom-0 w-full bg-black bg-opacity-20 rounded-b-md">
                    <div class="w-full flex p-1">
                        <a href="" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
            <div class="relative w-[30%] mb-2 h-32 bg-amber-600 text-white rounded-md hover:bg-amber-700">
                <div class="p-1">
                    <h2 class="pl-1 font-semibold text-2xl">{{ $totalMasukan }}</h2>
                    <h1 class="pl-1 font-amaranth text-3xl lgTablet:text-3xl">Feedback</h1>
                    <img src="{{ asset('img/Feedback.svg') }}" alt="card-icon" class="absolute scale-110 lgTablet:scale-100 right-4 lgTablet:right-2 top-5">
                </div>
                <div class="absolute bottom-0 w-full bg-black bg-opacity-20 rounded-b-md">
                    <div class="w-full flex p-1">
                        <a href="{{ route('Admin.Feedback') }}" class="m-auto font-amaranth text-sm text-white">Selengkapnya<i class="bi bi-arrow-right-circle"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full grid grid-cols-4 grid-flow-row gap-4">
            @foreach ($menu as $menu )
                <div class="p-1 bg-white rounded-lg border-2 border-neutral-400 transition duration-300 transform hover:scale-[1.1] shadow-xl">
                    <div class="w-[90%] flex m-auto">
                        <img src="{{ asset('storage/fileMenu/'. $menu->foto) }}" alt="foto menu" class="rounded-md h-24 w-full">
                    </div>
                    <div class="w-full flex flex-col justify-center items-center font-outfit">
                        <span class="text-lg">{{ $menu->nama }}</span>
                        <span class="text-sm">Stok : {{ $menu->stok }}</span>
                        <span class="text-md mb-0">Rp. {{ $menu->harga }} </span>
                        <span class="text-xs text-slate-700">per {{ $menu->per }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="w-full mt-10">
        {!! $chartSatuMinggu->container() !!}
    </div>
    {!! $chartSatuMinggu->script() !!} --}}
    <script>
        $(document).ready(function(){
            $('#btnEmail').click(function(e){
                e.preventDefault();
                $('#inputEmail').removeClass('hidden')
                $('#spanEmail').addClass('hidden')
                $('#btnEmail').addClass('hidden')
            })
        })
    </script>
@endsection
