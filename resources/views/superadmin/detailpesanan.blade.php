@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Detail Kantin')
@section('headerNav', 'Detail Kantin')
@section('detail kantin')
    <div class="w-full">
        <div class="w-full flex justify-center">
            <div class="w-screen h-screen bg-black bg-opacity-60 hidden absolute top-0 right-0" style="z-index: 900;" id="background">
            </div>
            @foreach ($data as $pesanan)
                <div id="modal" class="modal{{ $pesanan->id }} hidden w-2/3 lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute  top-10 p-8   blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
                    <div class="mb-2">
                        <h1 class="text-4xl font-outfit">Detail Pesanan</h1>
                    </div>
                    <button id="closeModal" data-id="{{ $pesanan->id }}" class="closeModal{{ $pesanan->id }} absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                    <div class="w-full flex flex-col justify-center mt-10">
                        <div class="w-1/2 border-b border-black">
                            <div id="tokenPesanan" class="text-md">Kode Pesanan : {{ $pesanan->token }}</div>
                            <div id="namaPemesan" class="text-md">Nama Pemesan : {{ $pesanan->user->nama }}</div>
                            <div id="waktuPesanan" class="text-md mb-1">Tanggal Pemesanan : {{ $pesanan->created_at }}</div>
                        </div>
                        <div class="w-full flex justify-evenly items-center mt-1 p-2 bg-white rounded-md border border-slate-400 font-outfit">
                            <img src="{{ asset('storage/fileMenu/'. $pesanan->keranjang->menu->foto) }}" alt="foto Menu" class="h-20 w-22 rounded-sm w-[22%]">
                            <span class="">{{ $pesanan->keranjang->menu->nama }}</span>
                            <span>{{ $pesanan->Keranjang->menu->kategori }}</span>
                            <span class="">Rp. {{ number_format($pesanan->keranjang->subtotal, 0, ',', '.') }}/{{ $pesanan->keranjang->menu->per }}</span>
                            <span class="">{{ $pesanan->keranjang->jumlah }}</span>
                        </div>
                        <div class="w-[30%] h-10 flex mt-4 items-center self-end border-dashed border-y-2 border-black">
                            <div class="font-outfit text-lg">Total : <span>Rp. {{ $pesanan->Keranjang->total_harga }}</span></div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="w-full h-[250px] bg-white flex flex-col justify-between items-center rounded-xl">
            <div class="w-full h-[75%] flex items-center">
                <div class="w-[45%] h-[90%] ml-3 bg-cover bg-center rounded-xl" style="background-image: url('/img/Bg-Cover.jpg')">
                    <div class="w-full h-full flex justify-between items-center rounded-xl backdrop-blur-[1.5px] backdrop-brightness-50">
                        <div class="w-[40%] ml-2">
                            <img src="{{ asset('storage/fotoKantin/'.$kantin->foto) }}" alt="" class="rounded-full border-[3px] border-white h-32 w-32">
                        </div>
                        <div class="w-[60%] mr-2">
                            <h1 class="text-xl text-white font-outfit">{{ $kantin->namaKantin }}</h1>
                        </div>
                    </div>
                </div>
                <div class="w-[50%] ml-3 grid grid-rows-3 gap-2 grid-flow-col font-outfit text-md">
                    <span>Nama Admin : {{ $admin->nama }}</span>
                    <span>No.Telpn Kantin : 08000000</span>
                    <span>Email Kantin : kantin@email.com</span>
                    <span>Jumlah Produk : {{ $jumlahProduk }}</span>
                </div>
            </div>
            <div class="w-full h-[25%] font-outfit text-xl flex items-end justify-evenly">
                <a href="/superadmin/detailKantin/{{ $kantin->namaKantin }}" class="border-b-2 border-transparent">Menu Kantin</a>
                <a href="#" class="border-b-2 border-blue-950">Pesanan</a>
                <a href="#" class="border-b-2 border-transparent">Pemasukan</a>
            </div>
        </div>
        <div class="w-full">
            <h1 class="text-lg font-balsamiq pt-6">Pemberharuan Terbaru</h1>
            <div class="w-full font-balsamiq mb-2">
                @foreach ($Pesanan as $pesan )
                    <div class="w-full bg-white flex rounded-lg">
                        <div class="w-full p-5 flex">
                            <div class="w-[50%]">
                                <span class="w-[70%]">Kode Pemesanan: {{ $pesan->token }}</span>
                                <br>
                                <span class="w-[30%] text-neutral-500 text-sm">di pesan oleh: {{ $pesan->user->nama }}</span>
                            </div>
                            <div class="w-[50%] flex justify-end items-center">
                                <button id="detailBtn" data-id="{{ $pesan->id }}" class="border-2 border-blue-700 rounded-lg px-5 h-[50%] bg-blue-700 bg-opacity-40 hover:bg-opacity-60">Lihat</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })
            $('body').on('click', '#detailBtn', function (e) {
                e.preventDefault()
                let id = $(this).data('id')
                $('.modal'+id).removeClass('hidden')
                $('.modal'+id).addClass('animate-showModal')
            })
            $('body').on('click', '#closeModal', function(e){
                var id = $(this).data('id')
                setTimeout(() => {
                    $('.modal'+id).addClass('hidden')
                }, 900);
                $('.modal'+id).removeClass("animate-showModal")
                $('.modal'+id).addClass("animate-hideModal")
            })
        })
    </script>
@endsection
