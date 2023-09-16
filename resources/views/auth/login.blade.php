<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Halaman Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <style>
            body {
                font-family: "Itim", cursive;
                background-color: #252B48;
                color: black;
                display: flex;
                align-items: center;
                justify-content: center;
                flex-direction: column;
                height: 90vh;
            }
            .form-container {
                background-color: rgba(255, 255, 255, 0.268);
                backdrop-filter: blur(2.5px);
                padding: 50px;
                border-radius: 5px;
            }
            h1{
                color: white;
            }
            span {
                font-size: smaller;
            }
            input{
                font-size: smaller;
            }
            .form-control:focus{
                box-shadow: none;
                border-color: white;
            }
            svg{
                position: absolute;
                z-index: -1;
            }
            svg.kiri-atas{
                left: 26%;
                top: 25px;
            }
            svg.kanan-atas{
                right: 28%;
                top: 12%;
            }
            svg.kiri-bawah{
                left: 27%;
                bottom: 30px;
            }
        </style>
    </head>
    <body>
        <svg xmlns="http://www.w3.org/2000/svg" width="245" height="247" viewBox="0 0 245 247" fill="none" class="kiri-atas">
            <path d="M245 123.5C245 191.707 190.155 247 122.5 247C54.8451 247 0 191.707 0 123.5C0 55.2928 54.8451 0 122.5 0C190.155 0 245 55.2928 245 123.5Z" fill="#1F6E8C"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="185" height="187" viewBox="0 0 185 187" fill="none" class="kanan-atas">
            <path d="M185 93.5C185 145.139 143.586 187 92.5 187C41.4137 187 0 145.139 0 93.5C0 41.8614 41.4137 0 92.5 0C143.586 0 185 41.8614 185 93.5Z" fill="#1F6E8C"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="185" height="187" viewBox="0 0 185 187" fill="none" class="kiri-bawah">
            <path d="M185 93.5C185 145.139 143.586 187 92.5 187C41.4137 187 0 145.139 0 93.5C0 41.8614 41.4137 0 92.5 0C143.586 0 185 41.8614 185 93.5Z" fill="#1F6E8C"/>
        </svg>
        <h1>L o g i n </h1>
            <div class="form-container d-flex justify-content-center align-content-center flex-column">
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="email" class="form-label mb-0">Email</label>
                        <input type="email" class="form-control" name="email" id="email" />
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label mb-0">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" aria-describedby="cekPassword" />
                            <span class="input-group-text" id="cekPassword" onclick="change()"><i class="bi bi-eye-fill"></i></span>
                        </div>
                        <span>Lupa password? <a href="#">Reset</a></span>
                    </div>
                    <button type="submit" class="btn btn-info w-100">Login</button>
                    <span>Belum punya akun? <a href="{{ route('registrasi') }}">Registrasi</a></span>
                </form>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script>
         function change()
        {
            var x = document.getElementById('password').type;
            if ( x == 'password'){
                document.getElementById('password').type = 'text';
                document.getElementById('cekPassword').innerHTML = '<i class="bi bi-eye-slash-fill"></i>';
            }else{
                document.getElementById('password').type = 'password';
                document.getElementById('cekPassword').innerHTML = '<i class="bi bi-eye-fill"></i>';
            }
        }
    </script>
        </script>
    </body>
</html>
