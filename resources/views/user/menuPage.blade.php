<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Rock+Salt&family=Satisfy&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Rock+Salt&family=Satisfy&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="template/menuPage/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Halaman Menu</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container-fluid d-flex">
            <div class="menu-toggle">
                <input type="checkbox">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <h3 class="navbar-brand">SMKN7 Pontianak</h3>
            <div class="justift-content-end">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <div class="keranjangs">
                        <li class="nav-item"><a class="nav-link" href="/carts"><i class="bi bi-cart"></i>Keranjang</a>
                        </li>
                        <div class="ntif">
                            <p>{{ $data }}</p>
                        </div>
                    </div>
                    @if (auth())
                        <li class="nav-item"><a class="nav-link" href="/logout"><i
                                    class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="swiper-container">
        <h1 class="text-center kantin">kantin</h1>
        <div class="content">
            <div class="swiper-wrapper">
                <div class="card-content swiper-slide">
                    <div class="card-hero">
                        <div class="image-kantin">
                            <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                        </div>
                        <div class="kontents-kantin">
                            <div class="kontent-kantin">
                                <a href="">Frederick Gay>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content swiper-slide">
                    <div class="card-hero">
                        <div class="image-kantin">
                            <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                        </div>
                        <div class="kontents-kantin">
                            <div class="kontent-kantin">
                                <a href="">kantin 2</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content swiper-slide">
                    <div class="card-hero">
                        <div class="image-kantin">
                            <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                        </div>
                        <div class="kontents-kantin">
                            <div class="kontent-kantin">
                                <a href="">toko pak mael</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content swiper-slide">
                    <div class="card-hero">
                        <div class="image-kantin">
                            <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                        </div>
                        <div class="kontents-kantin">
                            <div class="kontent-kantin">
                                <a href="">menengah ke atas</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-content swiper-slide">
                    <div class="card-hero">
                        <div class="image-kantin">
                            <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                        </div>
                        <div class="kontents-kantin">
                            <div class="kontent-kantin">
                                <a href="">Menengah ke atas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card-container">
        <h1 class="makanan text-center">Menu</h1>
        <div class="alert" id="alerts" style="display: none">Pesanan sudah masuk keranjang</div>
        <div class="card-menu">
            @foreach ($makanan as $makanans)
                <div style="display: inline" id="menu-card">
                    <div class="card-menu">
                        <div class="card">
                            <div class="cards">
                                <div class="image">
                                    <img src="{{ asset('storage/fileMenu/' . $makanans->foto) }}" alt="">
                                </div>
                                <div class="kontents">
                                    <div class="kontent">
                                        <h3>{{ $makanans->nama }}</h3>
                                        <p>Rp.{{ $makanans->harga }}</p>
                                    </div>
                                </div>
                                <div class="clicks">
                                    <button type="submit" onclick="inputData(this)" class="btn btn-submit"
                                        data-id="{{ $makanans->id }}">Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <div class="footer-containers">
        <footer class="footer">
            <div class="container footer-container">
                <div class="sosmed">
                    <ul>
                        <li class="my-2"><a href=""><i class="bi bi-envelope-fill"></i> SMKN7@gmail.com</a>
                        </li>
                        <li class="my-2"><a href=""><i class="bi bi-telephone-fill"></i> 1244234</a></li>
                        <li class="my-2"><a href=""><i class="bi bi-instagram"></i> SMKN7Pontianak</a></li>
                    </ul>
                </div>
                <div class="copyright">
                    <p>Copyright&copy; by Babang Frederick</p>
                </div>
            </div>
        </footer>
    </div>
    <script>
        $(document).ready(function() {
            $("#alert").hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                            });
        });

        function inputData(bi) {
            const id = bi.getAttribute('data-id')
            $.ajax({
                url: `/carts/${id}`,
                dataType: "json",
                type: "POST",
                data: {},
                success: function(response) {
                    location.reload();
                    console.log("berhasil");
                    setTimeout(() => {
                        document.getElementById('alerts').style.display = 'none';
                    }, 7000);
                    document.getElementById('alerts').style.display = 'block';
                },
                error: function(error) {
                    console.log('gagal');
                    console.log(error)
                }
            });
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="script.js/script.js"></script>
</body>

</html>
