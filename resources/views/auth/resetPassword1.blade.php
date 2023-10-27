<!DOCTYPE html>
<html lang="cipay">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Amaranth&family=Bebas+Neue&family=Gabarito&family=Merriweather:wght@300&family=Oswald:wght@200&family=Righteous&family=Roboto+Slab:wght@500&family=Rock+Salt&family=Satisfy&family=Ubuntu:ital@1&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="auth/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="container content-container">
        <div class="judul">
            <h1>Ubah password</h1>
        </div>
        <div class="content">
            <div class="hero-content">
                <div class="nama-akun">
                    <div class="image"><img src="img/download.jpeg" alt=""></div>
                </div>
                <div class="content-akun">
                    <p>Ubah akun</p>
                </div>
            </div>
        </div>
    </div>
    <div class="contener">
        <div class="form-container">
            <form class="reset-password">
                <label for="email" class="password-content">Masukan Password Lamak </label>
                <input type="email" name="email" id="name" placeholder="Masukan password" required
                    class="masukan-password">
                <div class="menu-toggle">
                    <input type="checkbox" id="checkbox" class="checkbox">
                    <label for="checkbox" class="child-password">Liat Password</label>
                </div>
                <label for="password" class="password-content">Masukan Password Baru </label>
                <input type="Password" name="password" id="Password" placeholder="Masukan Password Baru" required
                    class="masukan-password">
                <div class="checkbox-container">
                    <div class="menu-toggle">
                        <input type="checkbox" id="checkbox" class="checkbox">
                        <label for="checkbox" class="child-password">Liat Password</label>
                    </div>
                </div>
                <label for="password" class="password-content">Konfirmasi Password Baru </label>
                <input type="Password" name="password" id="Password" placeholder="Konfirmasi Password Baru" required
                    class="masukan-password">
                <div class="checkbox-container">
                    <div class="menu-toggle">
                        <input type="checkbox" id="checkbox" class="checkbox">
                        <label for="checkbox" class="child-password">Liat Password</label>
                    </div>
                </div>
                <div class="buttons">
                    <button>next</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>