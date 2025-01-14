<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <img class="rounded-circle" src="img/LOGO_belegor.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0 pe-4">
            <a href="{{route("index")}}" class="nav-item nav-link {{ Route::currentRouteName() === 'index' ? 'active' : '' }}">Accueil</a>
            <a href="{{route("about")}}" class="nav-item nav-link {{ Route::currentRouteName() === 'about' ? 'active' : ''}} ">A propos</a>
            <a href="{{route("service")}}" class="nav-item nav-link {{ Route::currentRouteName() === 'service' ? 'active' : '' }}">Service</a>
            <a href="{{route("menu")}}" class="nav-item nav-link {{ Route::currentRouteName() === 'menu' ? 'active' : '' }}">Menu</a>
            <!--
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                <div class="dropdown-menu m-0">
                    <a href="booking.html" class="dropdown-item">Booking</a>
                    <a href="team.html" class="dropdown-item">Our Team</a>
                    <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                </div>
            </div>-->
            <a href="{{route("contact")}}" class="nav-item nav-link">Contact</a>
        </div>
    </div>
</nav>
