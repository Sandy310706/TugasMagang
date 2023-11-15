<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid d-flex">
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="navbar-brand ml-5">
            <h3 class="navbars">Welcome To Kantin</h3>
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
                    <li class="nav-item"><a class="nav-link" href="#feedback">Feedback</a></li>
                    <li class="nav-item"><a class="nav-link" href="/menu">Kantin</a></li>
                    <div class="keranjangs">
                        <li class="nav-item"><a class="nav-link" href="/carts"><i class="bi bi-cart"></i>Keranjang</a>
                        </li>
                        <div class="ntif">
                            <p></p>
                        </div>
                    </div>
                </div>

                <div class="dropdown">
                    <div class="button-sidebar">
                        <button class="button-dropdown" onclick="openDropdown()" id="dropdownTrigger">Frederick
                            <i class="bi bi-caret-right-fill" id="dropdownIcon"></i> </button>
                    </div>
                    <div class="dropdown-sidebar" id="dropdownMenu">
                        <div class="dropdown-content">
                            <li class="content-dropdown"><a class="nav-dropdown" href="">Akun</li>
                            <li class="content-dropdown"><a class="nav-dropdown histori" href="/invoice">Histori
                                    Pesanan</li>
                            @if (auth())
                                <li class="content-dropdown"><a class="nav-dropdown" style="padding-top: 20px"
                                        href="/logout"><i class="bi bi-box-arrow-in-right"></i>Log Out</a></li>
                            @else
                                <li class="content-dropdown"><a class="nav-dropdown" href="/login">Login</a></li>
                            @endif
                        </div>
                    </div>
                </div>
            </ul>

        </div>
    </div>
</nav>

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