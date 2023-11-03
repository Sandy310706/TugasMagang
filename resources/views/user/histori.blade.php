<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Gabarito:wght@400;500&family=Merriweather:wght@300&family=Oswald:wght@200&family=Outfit&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>

<body>
    <nav class=" navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <h3 class="navbar-brand">SMKN7Pontianak</h3>
            <div class="justift-content-end">
                <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link" href="#portfolio">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Menu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact"><i class="bi bi-box-arrow-in-right"></i>
                            Log Out</a></li>
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

    <h1 class="text-center Histori">Histori Pemesanan</h1>
    <div class=" container container-histori">
        <div class="card">
            <div class="content">
                <p>No Pesanan</p>
                <div class="Detail">
                    <button class="btn" id="openModal" onclick="modalteguh" ()>Buka Modal</button>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="hero-container">
                <h1 class="text-detail">Detail Pesanan</h1>
                <div class="content-item">
                    <div class="content-hero">
                        <div class="kode hero-item">
                            <p>A13242</p>
                        </div>
                        <div class="name hero-item">
                            <p>papua</p>
                        </div>
                        <div class="tanggal hero-item">
                            <p>10/10/32</p>
                        </div>
                    </div>
                </div>
                <div class="content-child">
                    <div class="child-content">
                        <div class="food hero-child">
                            <p>Nasi kuning</p>
                        </div>
                        <div class="stok hero-child">
                            <p>2</p>
                        </div>
                        <div class="total hero-child">
                            <p>Rp.18.000</p>
                        </div>
                        <div class="subtotal hero-child">
                            <p>Rp.18.000</p>
                        </div>
                    </div>
                </div>
                <div class="content-child">
                    <div class="child-content">
                        <div class="food hero-child">
                            <p>Nasi kuning</p>
                        </div>
                        <div class="stok hero-child">
                            <p>2</p>
                        </div>
                        <div class="total hero-child">
                            <p>Rp.18.000</p>
                        </div>
                        <div class="subtotal hero-child">
                            <p>Rp.18.000</p>
                        </div>
                    </div>
                </div>
                <div class="content-child">
                    <div class="child-content">
                        <div class="food hero-child">
                            <p>Nasi kuning</p>
                        </div>
                        <div class="stok hero-child">
                            <p>2</p>
                        </div>
                        <div class="total hero-child">
                            <p>Rp.18.000</p>
                        </div>
                        <div class="subtotal hero-child">
                            <p>Rp.18.000</p>
                        </div>
                    </div>
                </div>
                <div class="content-total">
                    <div class="child-total">
                        <div class="total hero-total">
                            <p>Total :  Rp.100.000</p>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>


    <script>
        // Ambil elemen modal dan tombol yang akan membukanya
        var modal = document.getElementById("myModal");
        var openModalButton = document.getElementById("openModal");
        var closeButton = document.querySelector(".close");

        // Tampilkan modal saat tombol dibuka
        openModalButton.addEventListener("click", function () {
            modal.style.display = "block";
        });

        // Sembunyikan modal saat tombol close diklik atau latar belakang modal diklik
        closeButton.addEventListener("click", function () {
            modal.style.display = "none";
        });

        // Sembunyikan modal saat latar belakang modal diklik
        window.addEventListener("click", function (event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>
    <script src="script.js/script.js"></script>
    <script src="script.js/modal.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>