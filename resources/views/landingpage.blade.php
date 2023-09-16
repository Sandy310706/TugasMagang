
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="template/landingPage/css/styles.css">


        <title>Landing Page</title>


        <script>
        $(document).ready(function(){
            $("#btn1").click(function(){
                alert("Terimakasih sudah memesan");
            });
            $("#btn2").click(function(){
                alert("Terimakasih sudah memesan");
            });
            $("#btn3").click(function(){
                alert("Terimakasih sudah memesan");
            });
            $("#btn4").click(function(){
                alert("Terimakasih sudah memesan");
            });
            $("#btn5").click(function(){
                alert("Terimakasih sudah memesan");
            });
            $("#btn6").click(function(){
                alert("Terimakasih sudah memesan");
            });
        });
    </script>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <p class="navbar-brand"><i class="bi bi-person-circle"></i>
                    @if(Route::has('login'))
                        @auth
                            {{ Auth::user()->nama }}
                        @endauth
                    @endif
                </p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list width:10px"></i>

                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="menu nav-link" href="menu">Menu</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Produk</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">contact</a></li>
                        @if(Route::has('login'))
                            @auth
                                <li class="nav-item"><a class="nav-link" href="{{ url('logout') }}"><i class="bi bi-door-open"></i>LOGOUT</a></li>
                            @else
                                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                            @endauth
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading text-center text-light">Welcome To Kantin SMKN 7 PTK</div>
                <div class="masthead-subheading"></div>
                <div class="masthead-heading text-uppercase"></div>
            </div>
        </header>

        <!-- Services-->
        {{-- <section class="page-section" id="services">

        </section> --}}
        <!-- Portfolio Grid-->
        <section class="content page-section bg-blue" id="portfolio">
            <div class="content">
                <div class="text-center">
                    <h2 class="produk section-heading text-uppercase">Produk Bestseller</h2>
                    <h3 class="prdk section-subheading text-muted">Makanan Yang sering Dipesan</h3>
                </div>
                <div class="col">
                    <div class="makanan">
                        <div class="nasi z-1 position-absolute" id="nasgor"><img src="template/landingPage/assets/img/nasi goreng hd.png" style="height: 500px;"  alt=""></div>
                        <div class="kuning z-2 position-absolute" id="naskun"><img src="template/landingPage/assets/img/nasi kuning hd.png" style="height: 500px;" alt=""></div>
                        <div class="geprek z-3 position-absolute" id="geprek"><img src="template/landingPage/assets/img/geprek-removebg-preview.png" style="height: 500px;" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="menu page-section" id="portfolio">
        <div class="container">
            <div class="text-center">
                <h2 class=" Menu section-heading text-capatalize mb-5">menu rekomendasi</h2>
            </div>
            <div class="makanan">
                <div class="row">
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">nasi goreng campur ****</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class=" btn btn-danger" >Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Nasgor campur</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class="btn btn-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">nasi campur kecap</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class="btn btn-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">nasi campur kecap</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class="btn btn-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="minumann text-center">
                        <h2 class="minum section-heading text-uppercase">Produk Bestseller</h2>
                        <h3 class="minuman section-subheading text-muted"> Minuman Yang sering Dipesan</h3>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Boba</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class="btn btn-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">Minuman Hangat</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class="btn btn-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">vodka Rusia</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class="btn btn-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 mb-4">
                        <div class="card" style="width: 18rem;">
                            <img src="img/teh es.jpeg" class="card-img-top" alt="...">
                            <div class="card-body">
                            <h5 class="card-title">vodka Rusia</h5>
                            <p class="card-text">RP.1000.000.000</p>
                            <a href="#" class="btn btn-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="text-center mt-5">
        <h2 class="tentang section-heading text-capatalize mb-5">Tentang Kami</h2>
    </div>
    <svg class="about-biru position-absolute" xmlns="http://www.w3.org/2000/svg" width="446" height="548" viewBox="0 0 446 548" fill="none">
        <path d="M421.605 420.051C354.627 549.81 167.928 586.657 4.60249 502.352C-158.723 418.047 -228.704 248.708 -161.725 118.949C-94.747 -10.8097 138.286 -23.7404 247.153 32.454C410.479 116.759 488.584 290.292 421.605 420.051Z" fill="#016A70"/>
    </svg>
    <section class="about page-section" id="about">
        <div class="About container">
            <div class="teks1">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="template/landingPage/assets/img/frederick.02.jpg" alt="..." />
                            <h4 class="drick" id="drick">Frederick A</h4>
                            <p class="text-light">Mael CS SMKN 7 Pontianak</p>
                            <a class="btn btn-dark btn-social mx-2" href="http://instagram.com/rickk__76" aria-label="Parveen Anand Twitter Profile"><i class="bi bi-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="gambar1 col-5">
                        <img src="img/kantin 1.png" class="img-1" alt="">
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="template/landingPage/assets/img/sandy.jpeg" alt="..." />
                            <h4>Sandy</h4>
                            <p class="text-light">Orang Baik</p>
                            <a class="btn btn-dark btn-social mx-2" href="" aria-label="Larry Parker Twitter Profile"><i class="bi bi-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>

                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="template/landingPage/assets/img/jonathan.jpeg" alt="..." />
                            <h4>Kura Kura</h4>
                            <p class="text-light">Optional tergantung Mood</p>
                            <a class="btn btn-dark btn-social mx-2" href="http://instagram.com/jonathan.birila" aria-label="Larry Parker Twitter Profile"><i class="bi bi-instagram"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" contact page-section" id="contact">
        <svg xmlns="http://www.w3.org/2000/svg" width="353" height="483" viewBox="0 0 353 483" fill="none" class="contact-ijau position-absolute">
            <path d="M-95.03 245.61C-106.006 115.736 -363.615 25.7327 -116.363 4.83633C130.89 -16.0601 309.185 29.1495 351.202 202.156C362.178 332.029 262.251 458.38 14.9986 479.276C-232.254 500.173 -36.4232 423.189 -95.03 245.61Z" fill="#A3A847"/>
        </svg>
        <div class="container contact-form">
            <div class="text-center">
                <h2 class="section-heading text-uppercase mb-5">Contact Us</h2>
            </div>
            <!-- * * * * * * * * * * * * * * *-->
            <!-- * * SB Forms Contact Form * *-->
            <!-- * * * * * * * * * * * * * * *-->
            <!-- This form is pre-integrated with SB Forms.-->
            <!-- To make this form functional, sign up at-->
            <!-- https://startbootstrap.com/solution/contact-forms-->
            <!-- to get an API token!-->
            <form id="contactForm" data-sb-form-api-token="API_TOKEN" style="position: relative; z-index: 9999;">
                <div class="row align-items-stretch mb-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <!-- Name input-->
                            <input class="form-control" id="name" type="text" placeholder="Your Name *" data-sb-validations="required" />
                            <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                            </div>
                            <div class="form-group">
                                <!-- Email address input-->
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" data-sb-validations="required,email" />
                                <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                            </div>
                            <div class="form-group mb-md-0">
                                <!-- Phone number input-->
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" data-sb-validations="required" />
                                <div class="invalid-feedback" data-sb-feedback="phone:required">A phone number is required.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <!-- Message input-->
                                <textarea class="form-control" id="message" placeholder="Your Message *" data-sb-validations="required"></textarea>
                                <div class="invalid-feedback" data-sb-feedback="message:required">A message is required.</div>
                            </div>
                        </div>
                    </div>
                    <!-- Submit success message-->
                    <!---->
                    <!-- This is what your users will see when the form-->
                    <!-- has successfully submitted-->
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center text-white mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            To activate this form, sign up at
                            <br />
                            <a href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                    <!-- Submit Button-->
                    <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Send Message</button></div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4 bg-black">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 text-lg-start text-light">Copy right by:Frederick</div>
                    <div class="col-lg-2 text-lg-start"></div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="http://instagram.com/smkn7ptkofficial" aria-label="Instagram"><i class="bi bi-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="LinkedIn"><i class="bi bi-youtube"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-end">
                        <a class="link-dark text-decoration-none me-3" href="#!"></a>
                        <a class="link-dark text-decoration-none" href="#!"></a>
                    </div>
                </div>
                <div class="copy col-lg-6 my-4 my-lg-0 text-lg-start">Copyright &copy; Frederick 2023</div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>

