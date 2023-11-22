@extends('layouts.user.app')
@section('title','Keranjang')
@section('keranjang')


    <div class="svg-container">
        <svg class="svg-kuning" xmlns="http://www.w3.org/2000/svg" width="241" height="307" viewBox="0 0 241 307" fill="none">
            <path d="M237.798 73.7377C243.288 214.012 35.4739 363.38 -178.18 284.823C-319.791 243.915 -115.129 -15.9893 -340.571 -105.373C-459.148 -182.289 -428.244 -284.674 -323.268 -337.795C-234.046 -404.876 279.609 -184.559 237.798 73.7377Z" fill="#96C291"/>
        </svg>
        <svg class="svg-hijau" width="165" height="176" viewBox="0 0 165 176" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="139.5" cy="36.5" r="139.5" fill="#D2DE32"/>
        </svg>
    </div>
<div class="container-fluid Keranjang-page ">
    <h1 class="text-center">Keranjang</h1>
    <div class="content-nav">
        <div class="Header-checkbox">
            <p></p>
        </div>
        <div class="Header-table 0">
            <p>Nama</p>
        </div>
        <div class="Header-table satu harga-satuan ">
            <p>Harga Satuan</p>
        </div>
        <div class="Header-table 2">
            <p>Jumlah</p>
        </div>
        <div class="Header-table 3 total">
            <p>Total</p>
        </div>
        <div class="Header-table 4">
            <p>Hapus</p>
        </div>
    </div>
    @if($keranjang == null)
    <div class="container-img">
        <div class="content-img">
            <div class="hero-image">
                <div class="image">
                    <img src="img/img-keranjang.png" alt="">
                </div>
            </div>
        </div>
    </div>
    @else
    @foreach ($keranjangs as $keranjang)
    <div class="card-pembungkus">
        <div class="content">
            <div class="content-checkbox">
                <input type="checkbox" class="checkbox" data-harga="{{ $keranjang->total_harga }}">
            </div>
            <div class="content-table foto">
                <img src="{{ asset('storage/fileMenu/' . $keranjang->menu->foto) }}" alt="Menupage">
                <p>{{ $keranjang->menu->nama }}</p>
            </div>
            <div id="harga" class="content-table harga">
                <p>Rp. {{ $keranjang->menu->harga }}</p>
            </div>
            <div class="content-table btns">
                <div id="keranjang-{{ $keranjang->id }}" style="display: inline">
                    <button class="kurang" data-keranjang-id="{{ $keranjang->id }}"
                        data-menu-id="{{ $keranjang->menu_id }}"><i class="fa-solid fa-minus"></i></button>
                </div>
                <span data-menu-id="{{ $keranjang->menu_id }}" class="jumlah-item" style="padding: 10px;">{{ $keranjang->jumlah }}</span>
                <div id="keranjang-{{ $keranjang->id }}" style="display: inline;">
                    <button class="tambah" data-keranjang-id="{{ $keranjang->id }}" data-menu-id="{{ $keranjang->menu_id }}"><i class="fa-solid fa-plus"></i></button>
                </div>
            </div>
            <div class="content-table total">
                <span data-id="{{ $keranjang->id }}"  class="total">Rp. {{ $keranjang->total_harga }}</span>
            </div>
            <div class="content-table remove">
                <form action="{{ route('Keranjang.Delete', $keranjang->id) }}" method="POST">
                    @csrf
                    @method('Delete')
                    <button type="submit" style="border: none"><i class="bi bi-trash3-fill"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    <div class="checkbox-content">
        <input type="checkbox" class="checkbox-all" id="myCheckbox">
        <p>Pilih Semua</p>
    </div>
    @endif

<div class="container totals mt-3">
    <div class="checkout">
        <div class="subtotal mr-3">
            <p>Total Harga :   Rp.</p>
            <p id="total" data-harga="{{$keranjang->total_harga}}" class="ml-2"></p>
        </div>
        <div class="cekout">
            <div class="btnns">
               <a href="/invoice" type="sumbit" class="buttons" onclick="kirimData(this)">checkout</a>
            </div>
        </div>
    </div>
</div>


<div class="svg-container-2">
    <svg class="hijau-kanan" width="250" height="200" viewBox="0 0 352 390" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d_1859_1681)">
        <circle cx="253.5" cy="249.5" r="249.5" fill="#96C291"/>
        <circle cx="253.5" cy="249.5" r="249" stroke="black"/>
        <circle cx="253.5" cy="249.5" r="249" stroke="black" stroke-opacity="0.2"/>
        </g>
        <defs>
        <filter id="filter0_d_1859_1681" x="0" y="0" width="507" height="507" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
        <feFlood flood-opacity="0" result="BackgroundImageFix"/>
        <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
        <feOffset dy="4"/>
        <feGaussianBlur stdDeviation="2"/>
        <feComposite in2="hardAlpha" operator="out"/>
        <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
        <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_1859_1681"/>
        <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_1859_1681" result="shape"/>
        </filter>
        </defs>
    </svg>
    <svg class="kuning-kiri" width="197" height="206" viewBox="0 0 197 206" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="57.5" cy="139.5" r="139.5" fill="#D2DE32"/>
    </svg>
</div>


<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(".tambah").click(function() {
            const keranjangId = $(this).data("keranjang-id");
            const menuId = $(this).data("menu-id");
            console.log("/cartst/" + keranjangId + "/" + menuId);
            let spanJumlah = $("span[data-menu-id='" + menuId + "']");
            let totalHarga = $("span[data-id='" + keranjangId + "']");
            $.ajax({
                type: "GET",
                url: "/cartst/" + keranjangId + "/" + menuId,
                success: function(data) {
                    console.log(spanJumlah);
                    console.log(totalHarga);
                    spanJumlah.text(data.jumlah);
                    totalHarga.text("Rp. " + data.total_harga)
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
        $(".kurang").click(function() {
            const keranjangId = $(this).data("keranjang-id");
            const menuId = $(this).data("menu-id");
            const spanJumlah = $("span[data-menu-id='" + menuId + "']");
            const totalHarga = $("span[data-id='" + keranjangId + "']");
            $.ajax({
                type: "GET",
                url: "/cartsk/" + keranjangId + "/" + menuId,
                success: function(data) {
                    spanJumlah.text(data.jumlah);
                    totalHarga.text("Rp. " + data.total_harga)
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    });

    function kirimData(bi) {
        const id = bi.getAttribute('data-id')
        $.ajax({
            url: `/invoice/${id}`,
            dataType: "json",
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
            },
            statusCode: {
                    500: function(response) {
                        console.log(response)
                    }
                },
            success: function(response) {
                console.log(response.status);
                if (response.status == 1) {
                    console.log('Sudah dibayar');
                } else {
                    console.log('Belum di bayar');
                }
            },
            error: function(error) {
                console.log("gagal");
            }
        });
    };

    document.addEventListener('DOMContentLoaded', function () {
    // Ambil elemen-elemen checkbox
    var checkboxes = document.querySelectorAll('.checkbox');
    var totalHargaElem = document.getElementById('total');

    checkboxes.forEach(function (checkbox) {
    console.log(checkbox.getAttribute('data-harga'));
      checkbox.addEventListener('change', function () {
        // Hitung total harga saat checkbox berubah
        var totalHarga = 0;
        checkboxes.forEach(function (ini) {
          if (ini.checked) {
            var harga = parseFloat(ini.getAttribute('data-harga'));
            totalHarga +=  harga ;
          }
        });


        totalHargaElem.textContent  = new Intl.NumberFormat().format(totalHarga);
      });
    });
  });



    function openDropdown() {
        const dropdownTrigger = document.getElementById('dropdownTrigger');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownIcon = document.getElementById('dropdownIcon');

        if (dropdownMenu.style.display === "none") {
            dropdownMenu.style.display = "block"
            dropdownIcon.style.transform = "rotate(50deg)"
            dropdownMenu.classList.add('animate-showDropdownMenu');
        } else {
            dropdownMenu.style.display = "none";
        }
    }



</script>
<script src="script.js/script.js"></script>
<script src="https://kit.fontawesome.com/c0dc21dad4.js" crossorigin="anonymous"></script>
@livewireScripts
@endsection

@push('style')
   <link rel="stylesheet" href="Keranjang/css/style.css">
@endpush
