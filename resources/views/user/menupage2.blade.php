<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Rock+Salt&family=Satisfy&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="template/menuPage/css/style.css">
    <title>Landing Page</title>
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
            <h3 class="navbar-brand ml-5">SMKN7Pontianak</h3>
            <div class="justift-content-end">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <div class="keranjangs">
                        <li class="nav-item"><a class="nav-link" href="/carts"><i class="bi bi-cart"></i>Keranjang</a>
                        </li>
                        <div class="ntif">
                            <p></p>
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
  <div class="container">
    <div class="hero-content">
        <div class="kontent">
            <div class="cards">
                <div class="card-content"></div>
            </div>
        </div>
    </div>
  </div>

    <footer class="footer">
        <div class="container footer-container">
            <div class="sosmed">
                <ul>
                    <li><a href=""><i class="bi bi-envelope-fill"> SMKN7Pontianak@gmail.com</i></a></li>
                    <li><a href=""><i class="bi bi-telephone-fill"></i> 1244234</a></li>
                    <li><a href=""><i class="bi bi-instagram"></i> SMKN7Pontianak</a></li>
                </ul>
            </div>
            <div class="copyright">
                <p>Copy right by Babang Frederick</p>
            </div>
        </div>
    </footer>
    <script src="template/landingPage/js/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>