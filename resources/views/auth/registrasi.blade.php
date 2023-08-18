<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.all.min.js"></script>
    <style>
        body{
            background-color: gray !important;
        }
        .alert-container{
            width: 40%;
            margin: auto;
        }
        .main-container{
            width: 40%;
            margin:  30px auto;
            background-color: white;
            padding: 15px;
            border-radius: 4px;
            -webkit-box-shadow: 2px 5px 25px 0px rgba(0,0,0,0.84);
            box-shadow: 2px 5px 25px 0px rgba(0,0,0,0.84);
        }
    </style>
    <title>Halaman Registrasi</title>
</head>
<body>
    <div class="main-container">
        <h1 style="text-align: center;">Registrasi</h1>
        <div class="form-container">
            <form action="{{ route('registrasi') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="Nama" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama" id="Nama" value="{{ old('nama') }}">
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Alamat Email</label>
                    <input type="text" class="form-control" name="email" id="Email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <div class="row">
                        <div class="col">
                            <label for="NoTelpn" class="form-label">No Telpon</label>
                            <input type="text" class="form-control" name="notelpn" id="NoTelpn"  value="{{ old('notelpn') }}">
                        </div>
                        <div class="col">
                            <label for="Kelamin" for="form-label" style="margin-bottom: 8px;">Jenis Kelamin</label>
                            <select class="form-select" name="kelamin" id="Kelamin">
                                <option selected value="{{ old('kelamin') }}">Pilih Salah satu</option>
                                @foreach ( $genderOption as $kelamin => $value )
                                    <option value="{{ $kelamin }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="Password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100" onclick="showSuccessAlert()">Submit</button>
                </div>
                    <p style="text-align:center;">Sudah Punya Akun? <a href="#">Login</a></p>
            </form>
        </div>
    </div>
</body>
</html>
<script>
    function showSuccessAlert() {
        Swal.fire({
            icon: 'success',
            title: 'Pesan berhasil disimpan',
            showConfirmButton: false,
            timer: 1500
        });
    }
</script>




