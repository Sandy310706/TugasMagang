@extends('layouts.user.app')
@section('title','Kantin')
@section('kantin')
    <div class="pembungkus-alert">
        <div class="custom-alert" id="alerts" style="display: none; font-sans"> pesan sudah ditambahkan </div>
    </div>

    <div class="card-container">
        <h1 class="makanan text-center">Menu</h1>
        <div class="alert" id="alerts" style="display: none">Pesanan sudah masuk keranjang</div>
        <div class="card-menu">
            @foreach ($menu as $data)
                <div style="display: inline" id="menu-card">
                    <div class="card-menu">
                        <div class="card">
                            <div class="cards">
                                <div class="image">
                                    <img src="{{ asset('storage/fileMenu/' . $data->foto) }}" alt="">
                                </div>
                                <div class="kontents">
                                    <div class="kontent">
                                        <h3>{{ $data->nama }}</h3>
                                        <p>Rp.{{ $data->harga }}</p>
                                        <p>stok : {{ $data->stok }}</p>
                                    </div>
                                </div>
                                <div class="clicks">
                                    <button type="submit" onclick="inputData(this)" class="btn btn-submit"
                                        data-id="{{ $data->id }}">Pesan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="contact page-section">
        <div class="container contact-form">
            <div class="text-center mt-5">
                <h2 class="feedback section-heading text-capatalize mb-5">Feedback</h2>
            </div>
            <form method="POST" action="{{ route('Feedback') }}" data-sb-form-api-token="API_TOKEN"
                style="position: relative; z-index: 9999;">
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
                <div class="text-end"><button class="button btn btn-info" id="submitButton" type="submit">Kirim
                        Feedback</button></div>
            </form>
        </div>
    </div>
    <div class="footer-containers">
        <footer class="footer">
            <div class="container footer-container">
                <div class="sosmed">
                    <ul>
                        <li class="my-2"><a href=""><i class="bi bi-envelope-fill"></i> SMKN7@gmail.com</a>
                        </li>
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
        
        $(document).ready(function() {
            $("#alert").hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function inputData(bi) {
            const id = bi.getAttribute('data-id')
            $.ajax({
                url: '/carts/' + id,
                dataType: "json",
                type: "POST",
                data: {},
                success: function(response) {
                    location.reload();
                    console.log("berhasil");
                    setTimeout(() => {
                        document.getElementById('alerts').ustyle.display = 'none';
                    }, 10000);
                    document.getElementById('alerts').style.display = 'block';
                },
                error: function(error) {
                    console.log('gagal');
                    console.log(error)
                }
            });
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="script.js/script.js"></script>
    <script src="script.js/scripts.js"></script>
@endsection

@push('style')
    <link rel="stylesheet" href="{{ asset('css/kantin.css') }}">
@endpush
