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
    <div class="svg">
        <svg xmlns="http://www.w3.org/2000/svg" width="377" height="512" viewBox="0 0 377 512" fill="none">
            <path d="M373.798 278.738C379.288 419.012 171.474 568.38 -42.1802 489.823C-183.791 448.915 20.8707 189.011 -204.571 99.6273C-323.148 22.7111 -292.244 -79.6737 -187.268 -132.795C-98.0457 -199.876 415.609 20.4405 373.798 278.738Z" fill="#D2DE32"/>
        </svg>
    </div>
    <div class="kantin">
        <h1 class="text-center">kantin</h1>
    </div>
    <div class="hero-click">
        <div class="button-click">
            <button class="arrow left"><svg xmlns="http://www.w3.org/2000/svg" width="67" height="67"
                    viewBox="0 0 67 67" fill="none">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M46.85 59.3102C46.658 59.5019 46.43 59.6538 46.1792 59.7573C45.9284 59.8607 45.6597 59.9136 45.3884 59.9131C45.1171 59.9125 44.8486 59.8584 44.5983 59.7539C44.3479 59.6494 44.1206 59.4965 43.9295 59.304L19.2325 34.5011C19.0408 34.3091 18.8889 34.0812 18.7855 33.8304C18.682 33.5796 18.6291 33.3108 18.6297 33.0395C18.6302 32.7683 18.6843 32.4997 18.7889 32.2494C18.8934 31.999 19.0462 31.7718 19.2387 31.5806L44.0416 6.88362C44.4297 6.49716 44.9555 6.28072 45.5032 6.28189C46.0509 6.28306 46.5757 6.50176 46.9621 6.88987C47.3486 7.27798 47.565 7.80371 47.5639 8.35141C47.5627 8.89911 47.344 9.42391 46.9559 9.81036L23.6122 33.0502L46.8562 56.3898C47.0479 56.5818 47.1998 56.8097 47.3032 57.0605C47.4066 57.3113 47.4596 57.58 47.459 57.8513C47.4584 58.1226 47.4043 58.3911 47.2998 58.6414C47.1953 58.8918 47.0424 59.1191 46.85 59.3102Z"
                        fill="white" />
                </svg></button>
        </div>
        <div class="cards-container">
            <div class="content">
                <div class="swiper-wrapper">
                    <div class="card-content swiper-slide">
                        <div class="card-hero">
                            <div class="image-kantin">
                                <img src="img/geprek.jpeg" alt="">
                            </div>
                            <div class="kontents-kantin">
                                <div class="kontent-kantin">
                                    <a href="">Kantin 1</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="card-content swiper-slide">
                        <div class="card-hero">
                            <div class="image-kantin">
                                <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                            </div>
                            <div class="kontents-kantin">
                                <div class="kontent-kantin">
                                    <a href="">Kantin 1</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="card-content swiper-slide">
                        <div class="card-hero">
                            <div class="image-kantin">
                                <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                            </div>
                            <div class="kontents-kantin">
                                <div class="kontent-kantin">
                                    <a href="">Kantin 1</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="card-content swiper-slide">
                        <div class="card-hero">
                            <div class="image-kantin">
                                <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                            </div>
                            <div class="kontents-kantin">
                                <div class="kontent-kantin">
                                    <a href="">Kantin 1</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="card-content swiper-slide">
                        <div class="card-hero">
                            <div class="image-kantin">
                                <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                            </div>
                            <div class="kontents-kantin">
                                <div class="kontent-kantin">
                                    <a href="">Kantin 1</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="card-content swiper-slide">
                        <div class="card-hero">
                            <div class="image-kantin">
                                <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                            </div>
                            <div class="kontents-kantin">
                                <div class="kontent-kantin">
                                    <a href="">Kantin 1</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-wrapper">
                    <div class="card-content swiper-slide">
                        <div class="card-hero">
                            <div class="image-kantin">
                                <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                            </div>
                            <div class="kontents-kantin">
                                <div class="kontent-kantin">
                                    <a href="">Kantin 1</a>
                                </div>
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
                                        <p>stok : 0</p>
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
