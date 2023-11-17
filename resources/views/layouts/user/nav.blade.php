
  <div class="container-fluid d-flex">
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="navbar-brand ml-5">
            <h3 class="navbars">Welcome To Kantin Sekolah</h3>
        </div>
        <div class="navbar-content justift-content-end">
            <ul class="navbar-nav text-uppercase">
                <div class="nav-content">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    @auth
                        @if (auth()->user()->role == 'admin')
                            <li class="nav-item"><a class="nav-link" href="/admin/dashboard">Dashboard</a></li>
                        @endif
                    @endauth
                    <li class="nav-item"><a class="nav-link" href="/menu">Kantin</a></li>
                    <div class="keranjangs">
                        <li class="nav-item"><a class="nav-link" href="/carts"><i class="bi bi-cart"></i>Keranjang</a>
                        </li>
                        <div class="ntif">
                            <p>{{ $angka }}</p>
                        </div>
                    </div>
                </div>
                <div class="dropdown">
                    <div class="button-sidebar">
                        @guest
                        <button class="button-dropdown" onclick="openDropdown()" id="dropdownTrigger">User
                            <i class="bi bi-caret-down-fill"></i>
                         </button>
                        @else
                        <button class="button-dropdown" onclick="openDropdown()" id="dropdownTrigger">{{$userNav->nama}}
                            <i class="bi bi-caret-down-fill"></i>
                         </button>
                        @endguest

                    </div>
                    <div class="dropdown-sidebar" id="dropdownMenu">
                        <div class="dropdown-content">
                            @guest
                            <li class="content-dropdown"><a class="nav-dropdown" style="padding-top: 20px"
                                href="/login"><i class="bi bi-box-arrow-in-right"></i>login</a></li>
                            @else
                            <li class="content-dropdown"><a class="nav-dropdown" href="">Akun</li>
                            <li class="content-dropdown"><a class="nav-dropdown histori" href="/invoice">Histori Pesanan</li>
                            <li class="content-dropdown"><a class="nav-dropdown" style="padding-top: 20px"
                            href="/login"><i class="bi bi-box-arrow-in-right"></i>logout</a></li>
                            @endguest
                        </div>
                    </div>
                </div>
            </ul>

        </div>
    </div>

<script>
    function openDropdown() {
        const dropdownTrigger = document.getElementById('dropdownTrigger');
        const dropdownMenu = document.getElementById('dropdownMenu');
        const dropdownIcon = document.getElementById('dropdownIcon');

        if (dropdownMenu.style.display === "none") {
            dropdownMenu.style.display = "block"
            dropdownIcon.style.transform = "rotate(90deg)"
        } else {
            dropdownMenu.style.display = "none";
            dropdownIcon.style.transform = "rotate(180deg)"
        }
    }

    const menuToggle = document.querySelector('.menu-toggle input');
    const nav = document.querySelector('nav ul');

    menuToggle.addEventListener('click', function() {
        nav.classList.toggle('slide');
    });

    document.addEventListener("DOMContentLoaded", function () {
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        var navbar = document.getElementById("mainNav");

        if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
            navbar.style.backgroundColor = "#000000";
            navbar.style.padding = "20px";
            navbar.h3.style.color = "#898989"
        } else {
            navbar.style.backgroundColor = "transparent";
            navbar.h3.style.color = "#898989";
        }
    }
});
</script>
