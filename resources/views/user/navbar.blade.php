<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container-fluid d-flex">
        <div class="menu-toggle">
            <input type="checkbox">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <h3 class="navbar-brand ml-5">SMKN7Pontianak</h3>
        <div class="justift-content-end">
            <ul class="navbar-nav text-uppercase">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>

                <li class="nav-item"><a class="nav-link" href="#feedback">Feedback</a></li>
                <li class="nav-item"><a class="nav-link" href="/menu">Menu</a></li>
                @if (!auth())
                    <li class="nav-item"><a class="nav-link" href="/logout">Log Out</a></li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
