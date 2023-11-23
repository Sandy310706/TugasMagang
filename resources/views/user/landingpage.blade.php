@extends('layouts.user.app')
@section('title', 'Home')
@section('landingpage')

    @if (session('login'))
        <div class="alert alert-success">
            <h1>{{ session('login') }}</h1>
        </div>
    @endif

    <div class="svg-container">
        <svg class="left-hijau" width="217" height="210" viewBox="0 0 217 210" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="77.5" cy="70.5" r="139.5" fill="#96C291"/>
        </svg>
        <svg class="right-kuning animate__animated animate__rotateInDownRight" xmlns="http://www.w3.org/2000/svg" width="435" height="556" viewBox="0 0 435 556" fill="none">
            <path d="M654.798 322.738C660.288 463.012 452.474 612.38 238.82 533.823C97.2086 492.915 301.871 233.011 76.4293 143.627C-42.1483 66.7111 -11.2438 -35.6737 93.7324 -88.7948C182.954 -155.876 696.609 64.4405 654.798 322.738Z" fill="#D2DE32"/>
        </svg>
    </div>

    <div class="masthead">
        <div class="container">
            <div class="row">
                <div class="col kantin-sekolah">
                    <h3 class="welcome">Welcome To Kantin SMKN7 Pontianak</h3>
                </div>
                <div class="col">
                    <div class="makanan">
                        <div class="images"><img src="template/landingPage/assets/img/nasikuning.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="menu page-section" id="portfolio">
        <div class="menu-rekomendasi">
            <h1 class="makanan mt-5 text-center">Menu rekomendasi</h1>
        </div>
        <div class="container-card">
            <div class="content-hero">
                <div class="menu-content">
                    <div class="makanan-content">
                        <h2>Makanan</h2>
                    </div>
                    <div class="hero-content">
                        <div class="menu-page">
                            @foreach ($makanan as $item)
                                <div class="card-container">
                                    <div class="card-image">
                                        <img src="{{ asset('storage/fileMenu/' . $item->foto) }}" alt="">
                                    </div>
                                    <div class="card-content">
                                        <p>{{$item->nama}}</p>
                                        <p>{{$item->harga}}</p>
                                    </div>
                                    <div class="card-click">
                                        <a href="/menu"button class="btn btn-primary">Pesan</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>


        </div>

        <div class="container-card">
            <div class="content-hero">
                <div class="menu-content">
                    <div class="makanan-content">
                        <h2>Minuman</h2>
                    </div>
                    <div class="hero-content">
                        @foreach ($minuman as $item)
                            <div class="menu-page">
                                <div class="card-container">
                                    <div class="card-image">
                                        <img src="{{ asset('storage/fileMenu/' . $item->foto) }}" alt="">
                                    </div>
                                    <div class="card-content">
                                        <p>{{$item->nama}}</p>
                                        <p>{{$item->harga}}</p>
                                    </div>
                                    <div class="card-click">
                                        <a href="/menu">Pesan</a>
                                    </div>
                                </div>
                            </div>  
                        @endforeach
                    </div>

                </div>
            </div>
        </div>

        {{-- <div class="container Menu-Page mb-5">
            @foreach ($minuman as $item)
            <div class="box">
                <div class="image">
                    <img src="{{ asset('storage/fileMenu/' . $item->foto) }}" alt="">
                </div>
                <h1>{{$item->nama}}</h1>
                <p>{{$item->harga}}</p>
                <a href="/menu"button class="btn btn-primary">Pesan</a>
            </div>
            @endforeach
            </div>
        </div> --}}
    </section>

    <section class="about" id="about">
        <div class="svg-container">
            <svg class="about-biru position-absolute" xmlns="http://www.w3.org/2000/svg" width="446" height="548"
                viewBox="0 0 446 548" fill="none">
                <path
                    d="M421.605 420.051C354.627 549.81 167.928 586.657 4.60249 502.352C-158.723 418.047 -228.704 248.708 -161.725 118.949C-94.747 -10.8097 138.286 -23.7404 247.153 32.454C410.479 116.759 488.584 290.292 421.605 420.051Z"
                    fill="#016A70" />
            </svg>
        </div>
        <div class="text-center">
            <h2 class="tentang section-heading text-capatalize ">Tentang Kami</h2>
        </div>
        <div class="About container">
            <div class="about-1">
                <div class="kantin-content">
                    <h2 class="animate__animated animate__fadeInLeft animate__delay-1s">Sejarah Kantin</h2>
                    <p class="animate__animated animate__fadeInLeft animate__delay-1s ">
                        Selamat datang di dunia kreativitas dan inovasi kami! Kami adalah kelompok individu yang penuh
                        semangat dan dedikasi untuk menciptakan pengalaman luar biasa. Dengan visi yang kuat dan
                        komitmen yang tak tergoyahkan, kami menjelajahi perjalanan.
                    </p>
                </div>
                <div class="img-1 mt-5">
                    <img src="template/landingPage/assets/img/kantin 1.png" class="animate__animated animate__fadeIn" alt="">
                </div>
            </div>
            <div class="about-2">
                <div class="img-2">
                    <img src="template/landingPage/assets/img/kantin 1.png" class="animate__animated animate__fadeIn" alt="">
                </div>
                <div class="kantin-content">
                    <h2 class="animate__animated animate__fadeInRight animate__delay-1s">Sejarah Kantin</h2>
                    <p class="animate__animated animate__fadeInRight animate__delay-1s">
                        Selamat datang di dunia kreativitas dan inovasi kami! Kami adalah kelompok individu yang penuh
                        semangat dan dedikasi untuk menciptakan pengalaman luar biasa. Dengan visi yang kuat dan
                        komitmen yang tak tergoyahkan, kami menjelajahi perjalanan.
                    </p>
                </div>
            </div>
        </div>
        <div class="svg-container">
            <svg class="about-hijau" xmlns="http://www.w3.org/2000/svg" width="438" height="635" viewBox="0 0 438 635" fill="none">
                <path d="M654.798 423.738C660.288 564.012 452.474 713.38 238.82 634.823C97.2086 593.915 301.871 334.011 76.4293 244.627C-42.1483 167.711 -11.2438 65.3263 93.7324 12.2052C182.954 -54.8757 696.609 165.441 654.798 423.738Z" fill="#D2DE32"/>
            </svg>
        </div>
    </section>

    <footer class="footer">
        <div class=" footer-container">
            <div class="copyright">
                <p>Copyright&copy; by Babang Frederick</p>
            </div>
            <div class="sosmed">
                <ul>
                    <a href=""><i class="bi bi-envelope-fill"></i> SMKN7@gmail.com</a>
                    <a href=""><i class="bi bi-telephone-fill"></i> 1244234</a>
                    <a href=""><i class="bi bi-instagram"></i> SMKN7Pontianak</a>
                </ul>
            </div>
        </div>
    </footer>
    <script src="script.js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
@endsection

@push('style')
    <link rel="stylesheet" href="template/landingPage/css/styles.css">
@endpush
