@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Detail Kantin')
@section('headerNav', 'Detail Kantin')
@section('detail kantin')
    <div class="w-full h-screen">
        <div class="w-full h-[40%] bg-white flex flex-col justify-between items-center rounded-xl">
            <div class="w-full h-[90%] flex">
                <div class="w-[45%] h-[90%] ml-3 bg-cover bg-center rounded-xl" style="background-image: url('/img/Bg-Cover.jpg')">
                    <div class="w-full h-full flex justify-between items-center rounded-xl backdrop-blur-[1.5px] backdrop-brightness-50">
                        <div class="w-[40%] ml-2">
                            <img src="{{ asset('img/Frederick.png') }}" alt="" class="rounded-full border-[3px] border-white h-32 w-32">
                        </div>
                        <div class="w-[60%] mr-2">
                            <h1 class="text-xl text-white font-outfit">Nama Kantin</h1>
                        </div>
                    </div>
                </div>
                <div class="w-[50%] grid grid-rows-3 grid-flow-col gap-5 font-sans text-lg">
                    <span>Nama Admin : Admin Sandy</span>
                    <span>No.Telpn Kantin : 08000000</span>
                    <span>Email Kantin : kantin@email.com</span>
                    <span>Jumlah Produk : 4</span>
                </div>
            </div>
            <div class="w-full bg-black h-full"></div>
        </div>
    </div>
@endsection
