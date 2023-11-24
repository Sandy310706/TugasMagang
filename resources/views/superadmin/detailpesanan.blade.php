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
                            <img src="" alt="" class="rounded-full border-[3px] border-white h-32 w-32">
                        </div>
                        <div class="w-[60%] mr-2">
                            <h1 class="text-xl text-white font-outfit">Cipay</h1>
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
                <a href="#" class="border-b-2 border-transparent">Menu Kantin</a>
                <a href="#" class="border-b-2 border-blue-950">Pesanan</a>
                <a href="#" class="border-b-2 border-transparent">Pemasukan</a>
            </div>
        </div>
        <div class="w-full">
            <h1 class="text-lg font-balsamiq pt-6">Pemberharuan Terbaru</h1>
                <div class="w-full font-balsamiq mb-2">
                    <div class="w-full bg-white flex rounded-lg">
                        <div class="w-[20%] p-5 flex justify-center ">
                            <img class="scale-125 z-1" src="{{ asset('img/Kantin.png') }}" alt="">
                        </div>
                        <div class="w-[80%] p-5 flex">
                            <div class="w-[50%]">
                                <span class="w-[70%]">kantin kadrun 212</span>
                                <br>
                                <span class="w-[30%] text-neutral-500 text-sm">Pemberitahuan tentang kantin kuntul</span>
                            </div>
                            <div class="w-[50%] flex justify-end items-center">
                                <button id="openModal" class="border-2 border-blue-700 rounded-lg px-5 h-[50%] bg-blue-700 bg-opacity-40 hover:bg-opacity-60">Lihat</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
