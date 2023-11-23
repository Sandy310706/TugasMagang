@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Detail Kantin')
@section('headerNav', 'Detail Kantin')
@section('detail kantin')
    <div class="w-full h-screen">
        <div class="w-full h-[40%] bg-white flex flex-col justify-between items-center rounded-xl">
            <div class="w-full h-[75%] flex items-center">
                <div class="w-[45%] h-[90%] ml-3 bg-cover bg-center rounded-xl" style="background-image: url('/img/Bg-Cover.jpg')">
                    <div class="w-full h-full flex justify-between items-center rounded-xl backdrop-blur-[1.5px] backdrop-brightness-50">
                        <div class="w-[40%] ml-2">
                            <img src="{{ asset('storage/fotoKantin/'. $kantin->foto) }}" alt="" class="rounded-full border-[3px] border-white h-32 w-32">
                        </div>
                        <div class="w-[60%] mr-2">
                            <h1 class="text-xl text-white font-outfit">{{ $kantin->namaKantin }}</h1>
                        </div>
                    </div>
                </div>
                <div class="w-[50%] ml-3 grid grid-rows-3 gap-2 grid-flow-col font-outfit text-md">
                    <span>Nama Admin : Admin Sandy</span>
                    <span>No.Telpn Kantin : 08000000</span>
                    <span>Email Kantin : kantin@email.com</span>
                    <span>Jumlah Produk : 4</span>
                </div>
            </div>
            <div class="w-full h-[25%] font-outfit text-xl flex items-end justify-evenly">
                <a href="#" class="border-b-2 border-blue-950">Menu Kantin</a>
                <a href="#" class="border-b-2 border-transparent">Pesanan</a>
                <a href="#" class="border-b-2 border-transparent">Pemasukan</a>
            </div>
        </div>
        <div class="w-full mt-5 p-5 grid grid-cols-4 grid-flow-row gap-4">
            @foreach ($menu as $menuKantin )
                <div class="p-1 bg-white rounded-lg border-2 border-neutral-400 transition duration-300 transform hover:scale-[1.1]">
                    <div class="w-[90%] flex m-auto">
                        <img src="{{ asset('storage/fileMenu/'. $menuKantin->foto) }}" alt="foto menu" class="rounded-md h-24 w-full">
                    </div>
                    <div class="w-full flex flex-col justify-center items-center font-outfit">
                        <span class="text-lg">{{ $menuKantin->nama }}</span>
                        <span class="text-sm">Stok : {{ $menuKantin->stok }}</span>
                        <span class="text-md mb-0">Rp. {{ $menuKantin->harga }} </span>
                        <span class="text-xs text-slate-700">per {{ $menuKantin->per }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
