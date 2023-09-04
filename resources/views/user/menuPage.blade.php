<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="template/menuPage/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="main-layout">

        <div id="content">
            <div class="bg segitiga1">
                <svg class="segitiga1" xmlns="http://www.w3.org/2000/svg" width="485" height="643" viewBox="0 0 485 643" fill="none">
                    <path d="M-3.39903 -10.3134L484.12 -7.80797L-6.75414 642.664L-3.39903 -10.3134Z" fill="#016A70"/>
                </svg>
                        <div class="navbar mx-4 p-2 bg-transparant">
                            <span class="kantin d-flex justify-content-start" href="#">SMKN 7 Pontianak</span>
                            <ul class="nav p-2 mx-4 justify-content-end">
                                <li class="nav-item ">
                                    <a class="btn" href="#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn" href="#">Menu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn" href="#">Keranjang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link">Login</a>
                                </li>
                                <svg class="segitiga3" xmlns="http://www.w3.org/2000/svg" width="201" height="204" viewBox="0 0 201 204" fill="none">
                                    <path d="M200.797 -1.19117L200.797 203.5L0.998473 -1.19123L200.797 -1.19117Z" fill="#D2DE32"/>
                                </svg>
                            </ul>
                        </div>

        <div class="bg">
            <h1>Makanan</h1>
                <div class="container mb-5">
                    <div class="owl-carousel owl-theme">
                        <div class="row">
                            <div class="col-sm-3 mb-5">
                                <div class="card text-center">
                                    <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4>Teh Es</h4>
                                    <h2 class="harga">Rp. 15.000,00</h2>
                                    <button type="button" href="#" class="pesan btn1 btn-primary ">Pesan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-5">
                                <div class="card text-center">
                                    <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                    <div class="card-body">
                                    <h4>Teh Es</h4>
                                    <h2 class="harga">Rp. 15.000,00</h2>
                                    <button type="button" href="#" class="pesan btn1 btn-primary ">Pesan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-5">
                                <div class="card text-center">
                                    <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4>Teh Es</h4>
                                    <h2 class="harga">Rp. 15.000,00</h2>
                                    <button type="button" href="#" class="pesan btn1 btn-primary">Pesan</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 mb-5">
                                <div class="card text-center">
                                    <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                    <div class="card-body">
                                        <h4>Teh Es</h4>
                                    <h2 class="harga">Rp. 15.000,00</h2>
                                    <button type="button" href="#" class="pesan btn1 btn-primary">Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="space">
                <div class="bg2">
                    <h3>Minuman </h3>
                    <svg class="segitiga2" xmlns="http://www.w3.org/2000/svg" width="486" height="649" viewBox="0 0 486 649" fill="none">
                        <path d="M487.523 653.202L-0.000226755 654.612L485.634 0.218854L487.523 653.202Z" fill="#016A70"/>
                    </svg>

                    <div class="container mb-5">
                        <div class="owl-carousel owl-theme">
                            <div class="row">
                                <div class="col-sm-3 mb-5">
                                    <div class="card text-center">
                                        <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                        <div class="card-body">
                                            <h4>Teh Es</h4>
                                        <h2 class="harga">Rp. 15.000,00</h5>
                                        <button type="button" href="#" class="pesan btn1 btn-primary ">Pesan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <div class="card text-center">
                                        <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                        <div class="card-body">
                                            <h4>Teh Es</h4>
                                        <h2 class="harga">Rp. 15.000,00</h5>
                                        <button type="button" href="#" class="pesan btn1 btn-primary ">Pesan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <div class="card text-center">
                                        <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                        <div class="card-body">
                                            <h4>Teh Es</h4>
                                        <h2 class="harga">Rp. 15.000,00</h5>
                                        <button type="button" href="#" class="pesan btn1 btn-primary">Pesan</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3 mb-5">
                                    <div class="card text-center">
                                        <img src="{{asset("template/menuPage/images/Foto Menu.png")}}" class="image card-img-top" alt="...">
                                        <div class="card-body">
                                            <h4>Teh Es</h4>
                                        <h2 class="harga">Rp. 15.000,00</h5>
                                        <button type="button" href="#" class="pesan btn1 btn-primary">Pesan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <footer>
                <div class="footer">
                    <div class="copyright">
                        <div class="row d-flex justify-content-center">
                            <div class="col-3 p-4" >
                                <svg class="segitiga4" xmlns="http://www.w3.org/2000/svg" width="199" height="200" viewBox="0 0 199 200" fill="none">
                                    <path d="M-0.873278 204.687L0.466947 1.76706e-05L198.921 205.995L-0.873278 204.687Z" fill="#D2DE32"/>
                                </svg>
                                <span class="dinone" style="color: black">KantinSekolah@gmail.com</span>
                                <span class="dinone" style="color: black">089493453413</span>
                                <span class="dinone" style="color: black">KantinSekolah</span>
                            </div>
                            <div class="col-9 d-flex justify-content-center pt-5">
                                <p style="color: black">© 2023 All Rights Reserved. Design by Si Imut</a>   <i class="bi bi-emoji-smile-fill" style="color: black;"></i>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            </div>
        </div>
        <script>
         $(document).ready(function() {
           var owl = $('.owl-carousel');
           owl.owlCarousel({
             margin: 10,
             nav: true,
             loop: true,
             responsive: {
               0: {
                 items: 1
               },
               600: {
                 items: 2
               },
               1000: {
                 items: 5
               }
             }
           })
         })

        //     const scrollingCardsContainer = document.querySelector('.scrolling-cards-container');
        //     const scrollingCards = document.querySelector('.scrolling-cards');

        //     scrollingCardsContainer.addEventListener('wheel', (e) => {
        //         const scrollAmount = e.deltaY;
        //         scrollingCards.scrollLeft += scrollAmount;
        //         e.preventDefault();
        //    });


            // document.addEventListener("DOMContentLoaded", () => {
            // const menuLinks = document.querySelectorAll("nav ul li a");

            // menuLinks.forEach((link) => {
            //     link.addEventListener("click", (e) => {
            //     e.preventDefault();
            //     const targetId = link.getAttribute("href");
            //     const targetElement = document.querySelector(targetId);

            //     if (targetElement) {
            //         window.scrollTo({
            //         top: targetElement.offsetTop,
            //         behavior: "smooth",
            //         });
            //     }
            //     });
            // });
            // });

      </script>

</body>
</html>

