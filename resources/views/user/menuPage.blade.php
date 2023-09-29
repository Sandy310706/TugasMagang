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
    @if(session('tambah'))
    <div class="alert alert-success">
        <h1>{{session('tambah')}}</h1>
    @endif
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
                    <li class="nav-item"><a class="nav-link" href="#feedback">Feedback</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/logout"><i class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="card-container">
        <form action="{{route('Keranjang.store')}}" method="post">
            @csrf
            <h1 class="makanan text-center">Makanan</h1>
            <div class="card-menu">
                @foreach ($makanan as $makanans)
                <div class="card-menu">
                    <div class="card">
                        <img src="{{ asset('storage/fileMenu/' . $makanans->foto) }}" alt="">
                        <div class="kontent">
                            <h3>{{$makanans->nama}}</h3>
                            <p>{{$makanans->harga}}</p>
                            <div class="text-end"><button class="button btn btn-info" id="submitButton" type="submit">Pesan</button></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </form>
        <form action="{{route('Keranjang.store')}}" method="POST">
            @csrf
            <h1 class="makanan text-center">Minuman</h1>
            <div class="card-menu">
                @foreach ($minuman as $minum)
                <div class="card-menu">
                    <div class="card">
                        <img src="{{ asset('storage/fileMenu/' . $minum->foto) }}" alt="">
                        <div class="kontent">
                            <h3>{{$minum->nama}}</h3>
                            <p>{{$minum->harga}}</p>
                            <div class="text-end"><button class="button btn btn-info" id="submitButton1" type="submit">Pesan</button></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </form>
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
    <script src="script.js/script.js"></script>
</body>
</html>
