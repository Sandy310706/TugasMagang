<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Rock+Salt&family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="template/menuPage/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <title>Halaman Menu</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <h3 class="navbar-brand ml-5">SMKN7 Pontianak</h3>
            <div class="justift-content-end">
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#feedback">Feedback</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logout"><i class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
                </ul>
            </div>
        </div>
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
    <div class="card-container">
        <h1 class="makanan text-center">Makanan</h1>
        <div class="card-menu">
            @foreach ($makanan as $makanans)
            <div class="card-menu">
                <div class="card">
                    <img src="{{ asset('storage/fileMenu/' . $makanans->foto) }}" alt="">
                    <div class="kontent">
                        <h3>{{$makanans->nama}}</h3>
                        <p>{{$makanans->harga}}</p>
                        <button class="btn">Pesan</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <h1 class="makanan text-center">Minuman</h1>
        <div class="card-menu">
            @foreach ($minuman as $minum)
            <div class="card-menu">
                <div class="card">
                    <img src="{{ asset('storage/fileMenu/' . $minum->foto) }}" alt="">
                    <div class="kontent">
                        <h3>{{$minum->nama}}</h3>
                        <p>{{$minum->harga}}</p>
                        <button class="btn">Pesan</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="template/menupage/js/script.js"></script>
</body>
</html>
