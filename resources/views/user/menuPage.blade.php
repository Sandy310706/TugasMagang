@extends('layouts.user.app')
@section('title', 'Halaman Menu')
@section('menupage')

    <div class="pembungkus-alert">
        <div class="custom-alert" id="alerts" style="display: none; font-sans"> pesan sudah ditambahkan </div>
    </div>
    <div class="svg">
        <svg class="svg-hijau" xmlns="http://www.w3.org/2000/svg" width="377" height="512" viewBox="0 0 377 512" fill="none">
            <path d="M373.798 278.738C379.288 419.012 171.474 568.38 -42.1802 489.823C-183.791 448.915 20.8707 189.011 -204.571 99.6273C-323.148 22.7111 -292.244 -79.6737 -187.268 -132.795C-98.0457 -199.876 415.609 20.4405 373.798 278.738Z" fill="#D2DE32"/>
        </svg>

    </div>
    {{-- <div class="hero-click">
        <div class="content-container">
            <div class="button-click">
                <button class="arrow left"><svg xmlns="http://www.w3.org/2000/svg" width="67" height="67"
                        viewBox="0 0 67 67" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M46.85 59.3102C46.658 59.5019 46.43 59.6538 46.1792 59.7573C45.9284 59.8607 45.6597 59.9136 45.3884 59.9131C45.1171 59.9125 44.8486 59.8584 44.5983 59.7539C44.3479 59.6494 44.1206 59.4965 43.9295 59.304L19.2325 34.5011C19.0408 34.3091 18.8889 34.0812 18.7855 33.8304C18.682 33.5796 18.6291 33.3108 18.6297 33.0395C18.6302 32.7683 18.6843 32.4997 18.7889 32.2494C18.8934 31.999 19.0462 31.7718 19.2387 31.5806L44.0416 6.88362C44.4297 6.49716 44.9555 6.28072 45.5032 6.28189C46.0509 6.28306 46.5757 6.50176 46.9621 6.88987C47.3486 7.27798 47.565 7.80371 47.5639 8.35141C47.5627 8.89911 47.344 9.42391 46.9559 9.81036L23.6122 33.0502L46.8562 56.3898C47.0479 56.5818 47.1998 56.8097 47.3032 57.0605C47.4066 57.3113 47.4596 57.58 47.459 57.8513C47.4584 58.1226 47.4043 58.3911 47.2998 58.6414C47.1953 58.8918 47.0424 59.1191 46.85 59.3102Z"
                            fill="white" />
                    </svg></button>
            </div>
            <div class="cards-container">
                <div class="content">
                    @foreach ($kantin as $data)
                        <div class="card-content swiper-slide">
                            <div class="card-hero">
                                <div class="image-kantin">
                                    <img src="template/landingPage/assets/img/kantin 1.png" alt="">
                                </div>
                                <div class="kontents-kantin">
                                    <div class="kontent-kantin">
                                        <a href="kantin/{{ $data->namaKantin }}">{{ $data->namaKantin }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="button-click">
                <button class="arrow right"><svg xmlns="http://www.w3.org/2000/svg" width="66" height="66"
                        viewBox="0 0 66 66" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M19.1645 6.78978C19.3561 6.5977 19.5837 6.44531 19.8343 6.34134C20.0849 6.23736 20.3535 6.18384 20.6248 6.18384C20.8961 6.18384 21.1647 6.23736 21.4153 6.34134C21.6658 6.44531 21.8934 6.5977 22.085 6.78978L46.835 31.5398C47.0271 31.7314 47.1795 31.959 47.2835 32.2095C47.3874 32.4601 47.441 32.7287 47.441 33C47.441 33.2713 47.3874 33.5399 47.2835 33.7905C47.1795 34.0411 47.0271 34.2687 46.835 34.4603L22.085 59.2103C21.6977 59.5976 21.1725 59.8151 20.6248 59.8151C20.0771 59.8151 19.5518 59.5976 19.1645 59.2103C18.7772 58.823 18.5597 58.2977 18.5597 57.75C18.5597 57.2023 18.7772 56.6771 19.1645 56.2898L42.4584 33L19.1645 9.71028C18.9725 9.51869 18.8201 9.29109 18.7161 9.04051C18.6121 8.78994 18.5586 8.52132 18.5586 8.25003C18.5586 7.97873 18.6121 7.71011 18.7161 7.45954C18.8201 7.20896 18.9725 6.98136 19.1645 6.78978Z"
                            fill="white" />
                    </svg></button>
            </div>
        </div>
    </div> --}}
    <h1 class="text-center kantin">kantin</h1>
    <div class="hero-click">
        <div class="content-container">
            <div class="button-click">
                <button class="arrow left"><svg xmlns="http://www.w3.org/2000/svg" width="41" height="41"
                        viewBox="0 0 41 41" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M28.3796 35.8919C28.2638 36.0075 28.1264 36.0991 27.9752 36.1614C27.8239 36.2238 27.6619 36.2557 27.4983 36.2554C27.3348 36.255 27.1729 36.2224 27.0219 36.1594C26.871 36.0964 26.7339 36.0042 26.6187 35.8882L11.7275 20.9332C11.612 20.8174 11.5204 20.68 11.458 20.5288C11.3957 20.3775 11.3637 20.2155 11.3641 20.0519C11.3644 19.8884 11.397 19.7265 11.4601 19.5755C11.5231 19.4246 11.6153 19.2875 11.7313 19.1723L26.6863 4.28115C26.9203 4.04814 27.2373 3.91763 27.5675 3.91834C27.8978 3.91904 28.2142 4.05091 28.4472 4.28492C28.6802 4.51893 28.8107 4.83592 28.81 5.16616C28.8093 5.49639 28.6775 5.81283 28.4434 6.04584L14.3683 20.0584L28.3833 34.131C28.4989 34.2468 28.5905 34.3842 28.6529 34.5354C28.7152 34.6866 28.7472 34.8487 28.7468 35.0122C28.7465 35.1758 28.7138 35.3377 28.6508 35.4887C28.5878 35.6396 28.4956 35.7767 28.3796 35.8919Z"
                            fill="black" />
                    </svg></button>
            </div>
            <div class="cards-container">
                <div class="content">
                    @foreach ($kantin as $data)
                        <div class="swiper-wrapper">
                            <div class="card-content swiper-slide">
                                <div class="card-hero">
                                    <div class="image-kantin">
                                        <img src="template/landingPage/assets/img/geprek.jpeg" alt="">
                                    </div>
                                    <div class="kontents-kantin">
                                        <div class="kontent-kantin">

                                            <a href="kantin/{{ $data->namaKantin }}" button="button">{{ $data->namaKantin }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="button-click">
                <button class="arrow right "><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        viewBox="0 0 40 40" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.5538 4.09333C11.6693 3.97754 11.8065 3.88566 11.9576 3.82298C12.1086 3.76029 12.2706 3.72803 12.4341 3.72803C12.5977 3.72803 12.7596 3.76029 12.9107 3.82298C13.0618 3.88566 13.199 3.97754 13.3145 4.09333L28.2357 19.0146C28.3515 19.1301 28.4434 19.2673 28.5061 19.4184C28.5688 19.5694 28.601 19.7314 28.601 19.8949C28.601 20.0585 28.5688 20.2204 28.5061 20.3715C28.4434 20.5226 28.3515 20.6598 28.2357 20.7753L13.3145 35.6965C13.081 35.93 12.7643 36.0612 12.4341 36.0612C12.1039 36.0612 11.7873 35.93 11.5538 35.6965C11.3203 35.4631 11.1891 35.1464 11.1891 34.8162C11.1891 34.486 11.3203 34.1693 11.5538 33.9358L25.5972 19.8949L11.5538 5.85404C11.438 5.73854 11.3461 5.60132 11.2834 5.45026C11.2207 5.29919 11.1885 5.13724 11.1885 4.97369C11.1885 4.81013 11.2207 4.64818 11.2834 4.49712C11.3461 4.34605 11.438 4.20884 11.5538 4.09333Z"
                        fill="black" /></svg>
                </button>
            </div>
        </div>
    </div>
    <div class="content-null">
        <div class="hero-null">
            <div class="image-null">
                <img src="{{ asset('img/kantin-menu.png') }}" alt="">
            </div>
        </div>
    </div>
    <h1 class="makanan">Menu Rekomendasi</h1>
    <div class="card-container">
        <div class="card-menu">
            <div class="cards-menu">
                <div class="content-menu">
                    <div class="image-menu">
                        <img src="template/landingPage/assets/img/bipang.jpg" alt="">
                    </div>
                    <div class="text-content">
                        <p>Ayam Geprek</p>
                        <p>Rp.10.000</p>
                    </div>
                    <div class="clicks">
                        <button class="btn-submit">Pesan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-null">
        <div class="hero-null">
            <div class="image-null">
                <img src="{{ asset('img/menu-kantin.png') }}" alt="">
            </div>
        </div>
    </div>
    {{-- <div class="svg">
        <svg  class="svg-green" xmlns="http://www.w3.org/2000/svg" width="443" height="500" viewBox="0 0 443 500" fill="none">
            <path d="M12.2903 467.534C-55.2906 344.49 185.726 26.9603 411.968 1.78809C556.937 -24.8803 489.952 299.079 731.577 278.327C872.026 294.164 768.291 490.624 698.107 585.048C648.254 684.923 90.282 717.3 12.2903 467.534Z" fill="#96C291"/>
        </svg>
    </div> --}}
    <footer class="footer">
        <div class="footer-container">
            <div class="copyright">
                <p>Copy right by Babang Frederick</p>
            </div>
            <div class="sosmed">
                <ul>
                    <a href=""><i class="bi bi-envelope-fill"> SMKN7Pontianak@gmail.com</i></a>
                    <a href=""><i class="bi bi-telephone-fill"></i> 1244234</a>
                    <a href=""><i class="bi bi-instagram"></i> SMKN7Pontianak</a>
                </ul>
            </div>
        </div>
    </footer>
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
        };

        function openDropdown() {
            const dropdownTrigger = document.getElementById('dropdownTrigger');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const dropdownIcon = document.getElementById('dropdownIcon');

            if (dropdownMenu.style.display === "none") {
                dropdownMenu.style.display = "block"
                dropdownIcon.style.transform = "rotate(50deg)"
                dropdownMenu.classList.add('animate-showDropdownMenu');
            } else {
                dropdownMenu.style.display = "none";
            },
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script src="script.js/scripts.js"></script>
@endsection

@push('style')
    <link rel="stylesheet" href="template/menuPage/css/style.css">
@endpush
