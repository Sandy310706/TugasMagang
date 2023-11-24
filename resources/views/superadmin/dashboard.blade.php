@extends('layouts.superadmin.app ')
@section('title', 'Super Admin | Dashboard')
@section('headerNav', 'Dashboard')
@section('dashboard')
    <div class="w-full p-2">
        <div class="flex justify-center">
            <div class="w-full relative">
                <div id="modal" class="hidden w-[70%] p-2 bg-white rounded-lg absolute top-10 right-36 border-2 border-slate-500 z-10">
                    <button onclick="closeModal()" class="absolute top-0 right-1 text-xl text-slate-400"><i class="fa-solid fa-circle-xmark"></i></button>
                    <div class="w-full flex flex-col justify-center items-center py-10">
                        <div class="w-[90%] mb-2 rounded-sm flex ring-1 ring-slate-400">
                            <div class="w-full p-2 flex justify-center items-center">
                                <img class="w-20 h-15" src="{{ asset('storage/fileMenu/'.$konfirmasi->foto) }}" alt="">
                                <div class="w-[30%] ml-5 h-full font-balsamiq text-sm flex justify-center items-center">{{ $konfirmasi->nama }}</div>
                                <div class="w-[30%] ml-5 h-full font-balsamiq text-sm flex justify-center items-center">Rp. {{ $konfirmasi->harga }}</div>
                                <div class="w-[30%] ml-5 h-full flex justify-center items-center">
                                    <button id="terima" data-id="{{ $konfirmasi->id }}" class="text-green-500 text-4xl mr-1"><i class="fa-regular fa-square-check"></i></button>
                                    <button id="tolak" data-id="{{ $konfirmasi->id }}" class="text-red-500 text-4xl"><i class="fa-regular fa-rectangle-xmark"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full flex justify-between">
            <div class="w-[49%] h-28 rounded-xl bg-white flex flex-col justify-start">
                <div class="w-full h-[70%] flex items-center">
                    <div class="py-2 px-4 font-balsamiq text-3xl text-neutral-700">
                        <i class="fa-solid fa-user mr-5"></i>
                        <span>User</span>
                    </div>
                </div>
                <div class="w-full h-[30%] px-4 font-balsamiq text-neutral-500">
                    <p>{{ $user }} User</span></p>
                </div>
            </div>
            <div class="w-[49%] h-28 rounded-xl bg-white flex flex-col justify-start">
                <div class="w-full h-[70%] flex items-center">
                    <div class="py-2 px-4 font-balsamiq text-3xl text-neutral-700 flex items-center">
                        <span class="material-symbols-outlined mr-5" style="font-size: 1.875rem; line-height: 2.25rem;">
                            storefront
                        </span>
                        <span>Kantin</span>
                    </div>
                </div>
                <div class="w-full h-[30%] px-4 text-neutral-500 font-balsamiq">
                    <p>{{ $kantinJumlah }} <span> Kantin</span></p>
                </div>
            </div>
        </div>
        <div class="w-full">
            <h1 class="text-lg font-balsamiq pt-6">Pemberharuan Terbaru</h1>
            @foreach ($kantin as $kantins )
                <div class="w-full font-balsamiq mb-2">
                    <div class="w-full bg-white flex rounded-lg">
                        <div class="w-[20%] p-5 flex justify-center ">
                            <img class="scale-125 z-1" src="{{ asset('img/Kantin.png') }}" alt="">
                        </div>
                        <div class="w-[80%] p-5 flex">
                            <div class="w-[50%]">
                                <span class="w-[70%]">{{ $kantins->namaKantin }}</span>
                                <br>
                                <span class="w-[30%] text-neutral-500 text-sm">Pemberitahuan tentang kantin {{ $kantins->namaKantin }}</span>
                            </div>
                            <div class="w-[50%] flex justify-end items-center">
                                <button id="openModal" class="border-2 border-blue-700 rounded-lg px-5 h-[50%] bg-blue-700 bg-opacity-40 hover:bg-opacity-60">Lihat</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        $(document).ready( function(){
            $('body').on('click', '#openModal', function(){
                $('#modal').removeClass("hidden");
                $('#modal').addClass('animate-sementara')
            })

        })
        function closeModal(){
                $('#modal').addClass("hidden")
        }
    </script>
@endsection
