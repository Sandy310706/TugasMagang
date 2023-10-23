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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Halaman Menu</title>
</head>
<body>
        <div class="pembungkus-alert">
            <div class="custom-alert" id="alerts" style="display: none; font-sans"user></div>
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
                        <li class="nav-item"><a class="nav-link" href="/carts"><i class="bi bi-cart"></i>Keranjang</a></li>
                        <div class="ntif">
                            <p>{{ $data }}</p>
                        </div>
                    </div>
                       @if (auth())
                         <li class="nav-item"><a class="nav-link" href="/logout"><i class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
                       @else
                         <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="card-container">
            <h1 class="makanan text-center">Makanan</h1>
        <div class="card-menu">
            @foreach ($makanan as $makanans)
                <form action="{{url('carts/'.$makanans->id)}}" method="POST" style="display: inline" id="menu-card">
                     @csrf
                    <div class="card-menu">
                        <div class="card">
                            <img src="{{ asset('storage/fileMenu/' . $makanans->foto) }}" alt="">
                            <div class="kontent">
                                <h3>{{$makanans->nama}}</h3>
                                <p>Rp.{{$makanans->harga}}</p>
                                <form action="{{ route('Keranjang.store', $makanans->id) }}" method="POST" class="inline"  >
                                    @csrf
                                    <button type="submit" class="btn" onclick="showAutoCloseAlert()">Pesan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <div class="card-container">
            <h1 class="makanan text-center">Minuman</h1>
        <div class="card-menu">
            @foreach ($minuman as $minum)
                <form action="{{url('carts/'.$minum->id)}}" method="POST" style="display:inline;">
                    @csrf
                    <div class="card-menu">
                        <div class="card">
                            <img src="{{ asset('storage/fileMenu/' . $minum->foto) }}" alt="">
                            <div class="kontent">
                                <h3>{{$minum->nama}}</h3>
                                <p>{{$minum->harga}}</p>
                                <form action="{{ route('Keranjang.store', $minum->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    <div class="kontent">
                                       <button type="submit" class="btn" id="showAutoCloseAlert">Pesan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    </div>

    <div class="footer-containers">
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
</div>

    <script>
        $(document).ready(function(){
            $('#alerts').hide();
        });
        //     var inputData = $("#menu-card").val();
        //     $.ajax({
        //     url: "carts",
        //     type: "POST",
        //     data: { data: inputData },
        //     success: function(response) {

        // // Data berhasil dikirim, tampilkan pesan alert
        //     showAlert("#alerts");
        //     }

        //     })
        //     function showAlert(message) {
        //     // Membuat dan menampilkan pesan alert
        //     $("<div>")
        //         .text(message)
        //         .addClass("#alerts")
        //         .appendTo("body")
        //         .fadeIn();

        //     // Sembunyikan alert setelah 3 detik (3000 ms)
        //     setTimeout(function() {
        //     $("#alerts").fadeOut(500, function() {
        //         $(this).remove();
        //     });
        //     }, 3000);
        // });
    </script>

      {{-- / /     setTimeout(function() {
    //         //     notifs.style.display = "block";
    //         //         setTimeout(function() {
    //         //         notifs.style.display = "none";
    //         //         },1000); 
    //         //       }, 1000)
            //    }) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="script.js/script.js"></script>
  
</body>
</html>
