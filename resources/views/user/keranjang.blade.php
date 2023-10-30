<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="Keranjang/css/style.css">
	<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Keranjang</title>
    @livewireStyles
</head>
<body>
	</div>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container-fluid d-flex">
			<div class="menu-toggle">
				<input type="checkbox">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<h3 class="navbar-brand welcome">SMKN7Pontianak</h3>
			<div class="justift-content-end">
				<ul class="navbar-nav text-uppercase">
					<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
					@if (auth())
					<li class="nav-item"><a class="nav-link" href="/logout"><i class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
				    @else
					<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
			        @endif
				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid Keranjang-page ">
		<h1 class="text-center">Keranjang</h1>
		<div class="content-nav">
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
                    <div class="content-table foto">
                        <img src="{{ asset('storage/fileMenu/' . $keranjang->menu->foto) }}" style="margin-right: 10px" alt="Menupage">
                        <p>{{$keranjang->menu->nama}}</p>
                    </div>
                    <div id="harga" class="content-table harga">
                        <p>Rp. {{$keranjang->menu->harga}}</p>
                    </div>
                    <div class="content-table btns">
                        <div id="keranjang-{{ $keranjang->id }}" style="display: inline">
                            <button class="kurang" data-keranjang-id="{{ $keranjang->id }}" data-menu-id="{{ $keranjang->menu_id }}"><i class="fa-solid fa-minus"></i></button>
                        </div>
                        <span class="jumlah-item" class="count" style="padding: 10px;" >{{ $keranjang->jumlah }}</span>
                        <div id="keranjang-{{ $keranjang->id }}" style="display: inline;">
                            <button class="tambah" data-keranjang-id="{{ $keranjang->id }}" data-menu-id="{{ $keranjang->menu_id }}"><i class="fa-solid fa-plus"></i></button>
                        </div>
                    </div>
                    <div class="content-table total">
                        <span id="total">Rp. {{ $keranjang->total_harga }}</span>
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
	</div>
	<div class="container totals mt-3">
		<div class="checkout">
			<div class="subtotal">
				<p>SubTotal:</p>
				<p id="total" class="ml-2">{{$arraySum}}</p>
			</div>
		</div>
	</div>
    <div class="container checkouts">
        <div class="cekout">
            <div class="btnns">
                <button type="sumbit" class="buttons" data-id="{{$keranjangs->first()->id}}" onclick="kirimData(this)">checkout</button>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".tambah").click(function() {
                var keranjangId = $(this).data("keranjang-id");
                var menuId = $(this).data("menu-id");

                $.ajax({
                    type: "GET",
                    url: "/cartst/" + keranjangId + "/" + menuId,
                    success: function(data) {
                        location.reload();
                        $(".jumlah-item").text(data.jumlah);
                        $("#total").text("Rp. " + data.total_harga);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
            $(".kurang").click(function() {
                var keranjangId = $(this).data("keranjang-id");
                var menuId = $(this).data("menu-id");
                $.ajax({
                    type: "GET",
                    url: "/cartsk/" + keranjangId + "/" + menuId,
                    success: function(data) {
                        location.reload();
                        $(".jumlah-item").text(data.jumlah);
                        $("#total").text("Rp. " + data.total_harga);
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });



        function kirimData(bi){
        const id = bi.getAttribute('data-id')
            $.ajax({
            url: `/invoice/${id}`,
            dataType: "json",
            type: "POST",
            data:{
                "_token": "{{ csrf_token() }}",
            },
            success: function(response){
                // location.reload()
                console.log (response);
                console.log(response.status);
                if(response.status == 1) {
                    console.log('Sudah dibayar');
                }else{
                    console.log('Belum di bayar');
                }
            },
            error: function(error){
                console.log ("gagal");
                console.log(error);
            }
            });
        };
   </script>

	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap/js/script.js"></script>
	<script src="assets/bootstrap/js/scripts.js"></script>
  <script src="script.js/script.js"></script>
  <script src="script.js/scripts.js"></script>
  <script src="https://kit.fontawesome.com/c0dc21dad4.js" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  @livewireScripts
</body>
</html>

