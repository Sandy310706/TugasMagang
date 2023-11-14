@extends('layouts.user.app')
@section('title','Keranjang')
@section('keranjang')

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
    @foreach ($keranjangs as $keranjang)
        <div class="card-pembungkus">
            <div class="content">
                <div class="content-checkbox">
                    <input type="checkbox" class="checkbox">
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
                    <span data-id="{{ $keranjang->id }}" class="total">Rp. {{ $keranjang->total_harga }}</span>
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
        <input type="checkbox" class="checkbox-all">
        <p>Pilih Semua</p>
    </div>
</div>
<div class="container totals mt-3">
    <div class="checkout">
        <div class="subtotal">
            <p>SubTotal:</p>
            <p id="total" class="ml-2">{{ $arraySum }}</p>
        </div>
        <div class="cekout">
            <div class="btnns">

   {{-- <a href="/invoice" type="sumbit" class="buttons" data-id="{{$keranjang->id}}" onclick="kirimData(this)">checkout</a> --}}

            </div>
        </div>
    </div>
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