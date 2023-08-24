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
    <title>Kantin Sekolah</title>
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
</head>
<!-- body -->
<body class="main-layout Recipes_page">
    <!-- loader  -->
        <div class="loader_bg">
            <div class="loader"><img src="{{asset("template/menuPage/images/loading.gif")}}" alt="" /></div>
        </div>
        <div class="wrapper">
    <!-- end loader -->
            <div id="content">
    <!-- header -->
                <nav class="navbar navbar-expand-lg bg-dark p4">
                    <div class="container-fluid">
                      <span class="navbar-brand" style="color: white;" href="#">Kantin Si Imut :)</span>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <div class="right_header_info">
                            <li class="button_user d-flex justify-content-end"><a class="button active" href="{{ url('/login') }}">Login</a><a class="button" href="{{ url('/registrasi') }}">Register</a></li>
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
                                        <div class="product_blog_img">
                                            <img src="{{asset("template/menuPage/images/rs1.png")}}" alt="#" />
                                        </div>
                                        <div class="product_blog_cont">
                                            <h3>Ikan semur </h3>
                                            <h4><span class="theme_color">Rp.  </span>30.000,00</h4>
                                        </div>
                                    </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/rs2.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Spageti</h3>
                                        <h4><span class="theme_color">Rp. </span>60.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/rs3.png")}}" alt="#" />
                                    </div>
                                <div class="product_blog_cont">
                                    <h3>Telur Mata Sapi</h3>
                                    <h4><span class="theme_color">Rp. </span>50.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img">
                                    <img src="{{asset("template/menuPage/images/rs4.png")}}" alt="#" />
                                </div>
                                <div class="product_blog_cont">
                                    <h3>Kare</h3>
                                    <h4><span class="theme_color">Rp. </span>40.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img">
                                    <img src="{{asset("template/menuPage/images/rs5.png")}}" alt="#" />
                                </div>
                                <div class="product_blog_cont">
                                    <h3>Roti Canai</h3>
                                    <h4><span class="theme_color">Rp. </span>40.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img">
                                    <img src="{{asset("template/menuPage/images/rs1.png")}}" alt="#" />
                                </div>
                                <div class="product_blog_cont">
                                    <h3>Ikan Semur</h3>
                                    <h4><span class="theme_color">Rp. </span>30.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img">
                                    <img src="{{asset("template/menuPage/images/rs2.png")}}" alt="#" />
                                </div>
                                <div class="product_blog_cont">
                                    <h3>Spageti</h3>
                                    <h4><span class="theme_color">Rp. </span>70.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img">
                                    <img src="{{asset("template/menuPage/images/rs3.png")}}" alt="#" />
                                </div>
                                <div class="product_blog_cont">
                                    <h3>Telur Mata Sapi</h3>
                                    <h4><span class="theme_color">Rp. </span>20.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img">
                                    <img src="{{asset("template/menuPage/images/rs4.png")}}" alt="#" />
                                </div>
                                <div class="product_blog_cont">
                                    <h3>Kare</h3>
                                    <h4><span class="theme_color">Rp. </span>60.000,00</h4>
                                </div>
                            </div>
                            <div class="item">
                                <div class="product_blog_img">
                                    <img src="{{asset("template/menuPage/images/rs5.png")}}" alt="#" />
                                </div>
                                <div class="product_blog_cont">
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
                                        <div class="product_blog_img">
                                            <img src="{{asset("template/menuPage/images/smoothie-1.png")}}" alt="#" />
                                        </div>
                                    <div class="product_blog_cont">
                                        <h3>Homemade</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/smoothie-2.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Noodles</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/smoothie-3.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Egg</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/smoothie-4.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Sushi Dizzy</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/hot-americano.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>The Coffee Break</h3>
                                        <h4><span class="theme_color">Rp. </span>12.500,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/hot-cappuccino.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Homemade</h3>
                                        <h4><span class="theme_color">Rp. </span>10.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/hot-espresso.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Noodles</h3>
                                        <h4><span class="theme_color">Rp. </span>15.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/hot-latte.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Egg</h3>
                                        <h4><span class="theme_color">Rp. </span>12.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/iced-americano.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
                                        <h3>Sushi Dizzy</h3>
                                        <h4><span class="theme_color">Rp. </span>20.000,00</h4>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="product_blog_img">
                                        <img src="{{asset("template/menuPage/images/iced-cappuccino.png")}}" alt="#" />
                                    </div>
                                    <div class="product_blog_cont">
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
