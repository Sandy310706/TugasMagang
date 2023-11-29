@extends('layouts.superadmin.app')
@section('title', 'Super Admin | Detail Kantin')
@section('headerNav', 'Detail Kantin')
@section('detail kantin')
    <div class="w-full flex items-center flex-col">
        <div class="w-full flex justify-center">
            <div class="w-screen h-screen bg-black bg-opacity-60 hidden absolute top-0 right-0" style="z-index: 900;" id="background">
            </div>
            <div id="modal" class="modal w-[50%] lgMobile:w-[95%] mobile:w-[95%] bg-slate-200 shadow-sm shadow-black rounded-md absolute top-10 px-4 py-6 hidden blur-none transition-all tablet:w-[80%] tablet:left-12" style="z-index: 999;">
                <div class="mb-2">
                    <h1 id="modalHeading" class="text-2xl mb-6 font-outfit">Konfirmasi Menu Baru</h1>
                </div>
                <button id="closeModal" class="absolute top-0 right-0 p-2 m-2 text-gray-700 hover:text-red-500 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <div class="w-full flex flex-col justify-center">
                    @if ($jumlahData == 0)
                        Kosong
                    @else
                        @foreach ($data as $notKonfirmasi)
                            <div id="cardMenu" class="cardMenu{{ $notKonfirmasi->id }} w-full h-full flex items-center bg-white rounded-sm p-4 mb-2">
                                <img  src="{{ asset('storage/fileMenu/'. $notKonfirmasi->foto) }}" class="mr-4 h-20 w-25 rounded-md border-2 border-slate-600" alt="foto kantin">
                                <span id="namaMenu" class="w-[35%] font-outfit text-center">{{ $notKonfirmasi->nama }}</span>
                                <span id="hargaMenu" class="w-[35%] font-outfit text-center">Rp. {{ $notKonfirmasi->harga }}</span>
                                <div class="w-[20%] flex justify-center">
                                    <button data-id="{{ $notKonfirmasi->id }}" data-code="satu" id="terima" class="terima text-green-500 text-2xl mr-1"><i class="fa-regular fa-square-check"></i></button>
                                    <button data-id="{{ $notKonfirmasi->id }}" data-code="dua" id="tolak" class="text-red-500 text-2xl"><i class="fa-regular fa-square-minus"></i></button>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="w-full h-[250px] bg-white flex flex-col justify-between items-center rounded-xl">
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
                    <span>Nama Admin : {{ $admin->nama }}</span>
                    <span>No.Telpn Kantin : 08000000</span>
                    <span>Email Kantin : kantin@email.com</span>
                    <span>Jumlah Produk : {{ $jumlahProduk }}</span>
                </div>
            </div>
            <div class="w-full h-[25%] font-outfit text-xl flex items-end justify-evenly">
                <a href="#" class="border-b-2 border-blue-950">Menu Kantin</a>
                <a href="/superadmin/detailpesanan/{{ $kantinName }}" class="border-b-2 border-transparent">Pesanan</a>
                <a href="#" class="border-b-2 border-transparent">Pemasukan</a>
            </div>
        </div>
        <div class="w-full mt-2 flex justify-end">
            <button id="btnOpenModal" data-id="{{ $kantin->id }}" class="my-1 bg-sky-400 hover:bg-sky-600 focus:ring-1 focus:ring-sky-600 p-2 text-white font-outfit rounded-lg">Konfirmasi Menu</button>
        </div>
        <div class="w-full px-5 grid grid-cols-4 grid-flow-row gap-4">
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
    <script>
        $(document).ready(function(e){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#btnOpenModal').click(function(e){
                var id = $(this).data('id')
                e.preventDefault();
                $('#modal').removeClass('hidden')
                $('#modal').addClass('animate-showModal')
                $('#modal').removeClass("animate-hideModal");
                $('#background').removeClass('hidden')
            });
            $('body').on('click', '#closeModal', function(e){
                e.preventDefault()
                setTimeout(() => {
                    $('#modal').addClass("hidden")
                    $('#background').addClass('hidden')
                    $('#body').removeClass("overflow-hidden")
                }, 900);
                $('#modal').removeClass("animate-showModal");
                $('#modal').addClass("animate-hideModal");
            })
            $('body').on('click', '.terima', function(e){
                e.preventDefault()
                var id = $(this).data('id')
                $.ajax({
                    url: "/terimaKonfirmasi/"+id,
                    type: "POST",
                    success: function(data){
                        console.log(data);
                        setTimeout(() => {
                            $('.cardMenu'+id).addClass("hidden")
                        }, 500);
                        $('.cardMenu'+id).addClass("animate-hideCardMenu")
                    }
                })
            })
        })
    </script>
@endsection
