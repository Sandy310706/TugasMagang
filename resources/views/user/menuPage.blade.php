<!DOCTYPE html>
<html lang="en">
<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title id="judul">Kantin Sekolah</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="{{asset("template/menuPage/css/bootstrap.min.css")}}">
    <!-- owl css -->
    <link rel="stylesheet" href="{{asset("template/menuPage/css/owl.carousel.min.css")}}">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset("template/menuPage/css/style.css")}}">
    <!-- responsive-->
    <link rel="stylesheet" href="{{asset("template/menuPage/css/responsive.css")}}">
    <!-- awesome fontfamily -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- icon bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- link dan cdn bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</head>
<!-- body -->
<body class="main-layout Recipes_page">
    <!-- loader  -->
        {{-- <div class="loader_bg">
            <div class="loader"><img src="{{asset("template/menuPage/images/loading.gif")}}" alt="" /></div>
        </div>
        <div class="wrapper"> --}}
    <!-- end loader -->
            <div id="content">
    <!-- header -->
                <nav class="navbar navbar-expand-lg bg-dark p4">
                    <div class="container-fluid">
                      <span class="navbar-brand kantin" href="#" >Kantin Si Imut :)</span>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="right_header_info">
                            <li class="button_user d-flex justify-content-end">
                                <a class="button mr-4" href="/">back</a>
                                <a class="button active mr-2" href="{{ url('/login') }}">Login</a>
                                <a class="button" href="{{ url('/registrasi') }}">Register</a>
                            </li>

                        </div>
                      </div>
                    </div>
                  </nav>
    <!-- end header -->
                <div class="yellow_bg">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h2>Makanan Kami</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
    <!-- section makanan -->
                <section class="resip_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="product_blog_img foto">
                                            <img src="{{asset("template/menuPage/images/rs1.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                        </div>
                                        <div class="product_blog_cont foto">
                                            <h3>Ikan semur </h3>
                                            <h4><span class="theme_color">Rp.  </span>30.000,00</h4>
                                        </div>
                                    </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/rs2.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Spageti</h3>
                                        <h4><span class="theme_color">Rp. </span>60.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/rs3.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                <div class="product_blog_cont foto">
                                    <h3>Telur Mata Sapi</h3>
                                    <h4><span class="theme_color">Rp. </span>50.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img foto">
                                    <img src="{{asset("template/menuPage/images/rs4.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                </div>
                                <div class="product_blog_cont foto">
                                    <h3>Kare</h3>
                                    <h4><span class="theme_color">Rp. </span>40.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img foto">
                                    <img src="{{asset("template/menuPage/images/rs5.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                </div>
                                <div class="product_blog_cont foto">
                                    <h3>Roti Canai</h3>
                                    <h4><span class="theme_color">Rp. </span>40.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img foto">
                                    <img src="{{asset("template/menuPage/images/rs1.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                </div>
                                <div class="product_blog_cont foto">
                                    <h3>Ikan Semur</h3>
                                    <h4><span class="theme_color">Rp. </span>30.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img foto">
                                    <img src="{{asset("template/menuPage/images/rs2.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                </div>
                                <div class="product_blog_cont foto">
                                    <h3>Spageti</h3>
                                    <h4><span class="theme_color">Rp. </span>70.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img foto">
                                    <img src="{{asset("template/menuPage/images/rs3.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                </div>
                                <div class="product_blog_cont foto">
                                    <h3>Telur Mata Sapi</h3>
                                    <h4><span class="theme_color">Rp. </span>20.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img foto">
                                    <img src="{{asset("template/menuPage/images/rs4.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                </div>
                                <div class="product_blog_cont foto">
                                    <h3>Kare</h3>
                                    <h4><span class="theme_color">Rp. </span>60.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img foto">
                                    <img src="{{asset("template/menuPage/images/rs5.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                </div>
                                <div class="product_blog_cont foto">
                                    <h3>Roti Canai</h3>
                                    <h4><span class="theme_color">Rp. </span>40.000,00</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    </div>
                </section>
    {{-- end section makanan --}}
                <div class="yellow_bg">
                    <div class="container">
                        <div class="row">
                        <div class="col-md-12">
                            <div class="title">
                                <h2>Minuman Kami</h2>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
        <!-- section Minuman -->
                <section class="resip_section">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="owl-carousel owl-theme">
                                    <div class="item">
                                        <div class="product_blog_img foto">
                                            <img src="{{asset("template/menuPage/images/smoothie-1.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                        </div>
                                    <div class="product_blog_cont foto foto ">
                                        <h3>Homemade</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/smoothie-2.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Noodles</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/smoothie-3.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Egg</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/smoothie-4.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Sushi Dizzy</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/hot-americano.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>The Coffee Break</h3>
                                        <h4><span class="theme_color">Rp. </span>12.500,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/hot-cappuccino.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Homemade</h3>
                                        <h4><span class="theme_color">Rp. </span>10.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/hot-espresso.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Noodles</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/hot-latte.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Egg</h3>
                                        <h4><span class="theme_color">Rp. </span>12.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/iced-americano.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>Sushi Dizzy</h3>
                                        <h4><span class="theme_color">Rp. </span>20.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img foto">
                                        <img src="{{asset("template/menuPage/images/iced-cappuccino.png")}}" data-bs-toggle="modal" data-bs-target="#staticBackdrop" alt="#" />
                                    </div>
                                    <div class="product_blog_cont foto">
                                        <h3>The Coffee Break</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <footer>
                    <div class="footer">
                        <div class="copyright bg-secondary">
                            <div class="container">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-3 p-4" >
                                        <span class="dinone" style="color: white">Kontak Kami :</span>
                                        <li class="dinone" style="color: white;"><i class="bi bi-telephone-fill"></i>   <a href="#">    089796756453</a></li>
                                        <li class="dinone" style="color: white;"><i class="bi bi-envelope-fill"></i>    <a href="#">    KantinSekolah@gmail.com</a></li>
                                        <li class="dinone" style="color: white;"><i class="bi bi-house-door-fill"></i>  <a href="#">    Jl. Tanjung Raya 2 , Pontianak</a></li>
                                    </div>
                                    <div class="col-9 d-flex justify-content-center pt-5">
                                        <p style="color: white">© 2023 All Rights Reserved. Design by Si Imut</a>   <i class="bi bi-emoji-smile-fill" style="color: black;"></i>.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

            <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>

    <div class="overlay"></div>
    <!-- Javascript files-->
    <script src="{{asset("template/menuPage/js/jquery.min.js")}}"></script>
    <script src="{{asset("template/menuPage/js/popper.min.js")}}"></script>
    <script src="{{asset("template/menuPage/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("template/menuPage/js/owl.carousel.min.js")}}"></script>
    <script src="{{asset("template/menuPage/js/custom.js")}}"></script>
    <script src="{{asset("template/menuPage/js/jquery.mCustomScrollbar.concat.min.js")}}"></script>
    <script src="{{asset("template/menuPage/js/jquery-3.0.0.min.js")}}"></script>
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
      </script>
</body>
</html>
