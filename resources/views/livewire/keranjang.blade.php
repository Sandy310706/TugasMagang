<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="Keranjang/css/style.css">
	<link rel="stylesheet" href="assets/fontawesome/css/all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Rock+Salt&family=Satisfy&display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&display=swap"
		rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&display=swap"
		rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link
		href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap"
		rel="stylesheet">
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
			<h3 class="navbar-brand">SMKN7Pontianak</h3>
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
					<img src="{{ asset('storage/fileMenu/' . $keranjang->menu->foto) }}" alt="Menupage">
					<p>{{$keranjang->menu->nama}}</p>
				</div>
				<div id="harga" class="content-table harga">
					<p>{{$keranjang->menu->harga}}</p>
				</div>
				<div class="content-table btns">
					<button class="decrement"><i class="bi bi-dash"></i></button>
                    @php
                        $total_harga = $keranjang->jumlah * $keranjang->menu->harga;
                    @endphp
					<span id="total_harga" onclick="multiplyBy()" Value="multiply" class="count">1</span>
					<button class="increment"><i class="bi bi-plus-lg"></i></button>
				</div>
				<div class="content-table total">
					<p>{{$total_harga}}</p>
				</div>
				<div class="content-table remove">
					<a href="{{url('carts'.$keranjang->id)}}"><i class="bi bi-trash3-fill"></i></a>
				</div>

			</div>
		</div>
        @endforeach


	</div>

	<div class="container mt-3">
		<div class="checkout">
			<div class="subtotal">
				<p>SubTotal:</p>
				<p id="total" class="ml-2">Rp.100.000</p>
			</div>
			<div class="tombol-checkout mt-2">
				<button class="buttons">Checkout</button>
			</div>
		</div>
	</div>

    <script>
          function multiplyBy()
        {
          num1 = document.getElementById(
            "harga").value;
          num2 = document.getElementById(
            "total_harga").value;
          document.getElementById(
            "total").innerHTML = num1 * num2;
        }
    </script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
		crossorigin="anonymous"></script>
	<script src="assets/js/jquery-3.3.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/bootstrap/js/script.js"></script>
	<script src="assets/bootstrap/js/scripts.js"></script>
    <script src="script.js/script.js"></script>
    <script src="script.js/scripts.js"></script>
    @livewireScripts
</body>

</html>

