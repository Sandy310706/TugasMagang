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
    <div class="pembungkus-alert">
        <div class="custom-alert" id="alerts" style="display: none; font-sans" > pesan sudah ditambahkan </div>
    </div>
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
                            <p>{{ $jumlah }}</p>
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
        <div class="button-click">
            <button class="arrow right"><svg xmlns="http://www.w3.org/2000/svg" width="66" height="66"
                    viewBox="0 0 66 66" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M19.1645 6.78978C19.3561 6.5977 19.5837 6.44531 19.8343 6.34134C20.0849 6.23736 20.3535 6.18384 20.6248 6.18384C20.8961 6.18384 21.1647 6.23736 21.4153 6.34134C21.6658 6.44531 21.8934 6.5977 22.085 6.78978L46.835 31.5398C47.0271 31.7314 47.1795 31.959 47.2835 32.2095C47.3874 32.4601 47.441 32.7287 47.441 33C47.441 33.2713 47.3874 33.5399 47.2835 33.7905C47.1795 34.0411 47.0271 34.2687 46.835 34.4603L22.085 59.2103C21.6977 59.5976 21.1725 59.8151 20.6248 59.8151C20.0771 59.8151 19.5518 59.5976 19.1645 59.2103C18.7772 58.823 18.5597 58.2977 18.5597 57.75C18.5597 57.2023 18.7772 56.6771 19.1645 56.2898L42.4584 33L19.1645 9.71028C18.9725 9.51869 18.8201 9.29109 18.7161 9.04051C18.6121 8.78994 18.5586 8.52132 18.5586 8.25003C18.5586 7.97873 18.6121 7.71011 18.7161 7.45954C18.8201 7.20896 18.9725 6.98136 19.1645 6.78978Z"
                        fill="white" />
                </svg></button>
        </div>
    </div>

    <div class="card-container">
        <h1 class="makanan text-center">Menu</h1>
        <div class="alert" id="alerts" style="display: none">Pesanan sudah masuk keranjang</div>
        <div class="card-menu">
            {{-- @foreach ($data as $menu)
                <div style="display: inline" id="menu-card">
                    <div class="card-menu">
                        <div class="card">
                            <div class="cards">
                                <div class="image">
                                    <img src="{{ asset('storage/fileMenu/' . $menu->foto) }}" alt="">
                                </div>
                                <div class="kontents">
                                    <div class="kontent">
                                        <h3>{{ $menu->nama }}</h3>
                                        <p>Rp.{{ $menu->harga }}</p>
                                        <p>stok : {{$menu->stok}}</p>
                                    </div>
                                </div>
                                <div class="clicks">
                                    <button type="submit" onclick="inputData(this)" class="btn btn-submit"
                                        data-id="{{ $menu->id }}">Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}
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
        $(document).ready(function(){
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
            });

            function inputData(bi) {
                const id = bi.getAttribute('data-id')
                $.ajax({
                    url: '/carts/'+ id,
                    dataType: "json",
                    type: "POST",
                    data: {},
                    success: function(response) {
                        location.reload();
                        console.log("berhasil");
                        setTimeout(() => {
                            document.getElementById('alerts').ustyle.display = 'none';
                        }, 10000);
                        document.getElementById('alerts').style.display = 'block';
                    },
                    error: function(error) {
                        console.log('gagal');
                        console.log(error)
                    }
                });
            }

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="script.js/script.js"></script>
    <script src="script.js/scripts.js"></script>
</body>

</html>

