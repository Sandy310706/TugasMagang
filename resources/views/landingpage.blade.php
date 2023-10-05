<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="template/landingPage/css/styles.css">
    <title>Home</title>
</head>
<body>
    @if (session('login'))
    <div class="alert alert-success">
        <h1>{{session('login')}}</h1>
    @endif
    <div class="svg-container">
        <svg class="biru position-absolute" xmlns="http://www.w3.org/2000/svg" width="517" height="646" viewBox="0 0 517 646" fill="none">
            <path d="M361.465 304.235C294.256 497.317 290.508 699.921 95.0345 631.879C-100.439 563.838 -141.498 282.874 -131.689 91.7876C-134.046 -86.9524 238.703 -22.4574 433.5 -45.4999C628.974 22.5419 428.674 111.154 361.465 304.235Z" fill="#016A70" />
        </svg>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
		<div class="container-fluid d-flex">
			<div class="menu-toggle">
				<input type="checkbox">
				<span></span>
				<span></span>
				<span></span>
			</div>
			<h3 class="navbar-brand ml-5">SMKN7Pontianak</h3>
			<div class="justift-content-end">
				<ul class="navbar-nav text-uppercase">
					<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
					<li class="nav-item"><a class="nav-link" href="#feedback">Feedback</a></li>
					<li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="/carts"><i class="bi bi-cart"></i>Keranjang</a></li>
                    @auth
                        <li class="nav-item"><a class="nav-link" href="/logout">Log Out</a></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="masthead">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3 class="welcome">Welcome to Kantin SMKN 7 Pontianak</h3>
                </div>
                <div class="col">
                    <div class="makanan">
                        <div class="images"><img src="template/landingPage/assets/img/nasikuning.png" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="menu page-section" id="portfolio">
        <h1 class="makanan mt-5">Makanan</h1>
        <div class="container Menu-Page mb-5">
            <div class="box">
                <div class="image">
                    <img src="template/landingPage/assets/img/rs3.png" alt="">
                </div>
                <h1>nasi</h1>
                <p>1.000.000</p>
                <button class="btn btn-primary">Pesan</button>
            </div>
            <div class="box">
                <div class="image">
                    <img src="template/landingPage/assets/img/rs3.png" alt="">
                </div>
                <h1>nasi</h1>
                <p>1.000.000</p>
                <button class="btn btn-primary">Pesan</button>
            </div>
            <div class="box">
                <div class="image">
                    <img src="template/landingPage/assets/img/rs3.png" alt="">
                </div>
                <h1>nasi</h1>
                <p>1.000.000</p>
                <button class="btn btn-primary">Pesan</button>
            </div>
            <div class="box">
                <div class="image">
                    <img src="template/landingPage/assets/img/rs3.png" alt="">
                </div>
                <h1>nasi</h1>
                <p>1.000.000</p>
                <button class="btn btn-primary">Pesan</button>
            </div>
        </div>
    </section>
    <div class="svg-container">
        <svg class="about-biru position-absolute" xmlns="http://www.w3.org/2000/svg" width="446" height="548" viewBox="0 0 446 548" fill="none">
            <path d="M421.605 420.051C354.627 549.81 167.928 586.657 4.60249 502.352C-158.723 418.047 -228.704 248.708 -161.725 118.949C-94.747 -10.8097 138.286 -23.7404 247.153 32.454C410.479 116.759 488.584 290.292 421.605 420.051Z" fill="#016A70" />
        </svg>
        <svg class="contact-hijau position-absolute" xmlns="http://www.w3.org/2000/svg" width="353" height="483" viewBox="0 0 353 483" fill="none" class="contact-ijau position-absolute">
            <path d="M-95.03 245.61C-106.006 115.736 -363.615 25.7327 -116.363 4.83633C130.89 -16.0601 309.185 29.1495 351.202 202.156C362.178 332.029 262.251 458.38 14.9986 479.276C-232.254 500.173 -36.4232 423.189 -95.03 245.61Z" fill="#A3A847" />
        </svg>
    </div>
    <section class="about" id="about">
        <div class="text-center mt-5">
            <h2 class="tentang section-heading text-capatalize mb-5">Tentang Kami</h2>
        </div>
        <div class="About container">
            <div class="about-1">
                <div class="kantin-content">
                    <h2>Sejarah Kantin</h2>
                    <p>
                        Selamat datang di dunia kreativitas dan inovasi kami! Kami adalah kelompok individu yang penuh
                        semangat dan dedikasi untuk menciptakan pengalaman luar biasa. Dengan visi yang kuat dan
                        komitmen yang tak tergoyahkan, kami menjelajahi perjalanan.
                    </p>
                </div>
                <div class="img-1 mt-5">
                    <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                </div>
            </div>
            <div class="about-2">
                <div class="img-2">
                    <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                </div>
                <div class="kantin-content">
                    <h2>Sejarah Kantin</h2>
                    <p>
                        Selamat datang di dunia kreativitas dan inovasi kami! Kami adalah kelompok individu yang penuh
                        semangat dan dedikasi untuk menciptakan pengalaman luar biasa. Dengan visi yang kuat dan
                        komitmen yang tak tergoyahkan, kami menjelajahi perjalanan.
                    </p>
                </div>
            </div>
        </div>
        <div class="contact page-section">
            <div class="container contact-form">
                <div class="text-center mt-5">
                    <h2 class="tentang section-heading text-capatalize mb-5">Feedback</h2>
                </div>
                <form method="POST" action="{{route('Feedback')}}" data-sb-form-api-token="API_TOKEN" style="position: relative; z-index: 9999;">
                    @csrf
                    <div class="row align-items-stretch mb-5">
                        <div class="col">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" rows="6" id="feedback" name="feedback" placeholder="Feedback*"
                                    data-sb-validations="required"></textarea>
                                <div class="invalid-feedback">A Feedback is required.</div>
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
                            <a
                                href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <!-- Submit error message-->
                    <!---->
                    <!-- This is what your users will see when there is-->
                    <!-- an error submitting the form-->
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <div class="text-end"><button class="button btn btn-info" id="submitButton" type="submit">Kirim Feedback</button></div>
                </form>
            </div>
        </div>
    </section>
    <footer class="footer">
        <div class="container footer-container">
            <div class="sosmed">
                <ul>
                    <li class="my-2"><a href=""><i class="bi bi-envelope-fill"></i> SMKN7@gmail.com</a></li>
                    <li class="my-2"><a href=""><i class="bi bi-telephone-fill"></i> 1244234</a></li>
                    <li class="my-2"><a href=""><i class="bi bi-instagram"></i> SMKN7Pontianak</a></li>
                </ul>
            </div>
            <div class="copyright">
                <p>Copyright&copy; by Babang Frederick</p>
            </div>
        </div>
    </footer>
    <script src="script.js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
