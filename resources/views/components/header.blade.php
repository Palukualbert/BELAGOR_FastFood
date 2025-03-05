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

            <a href="{{route("contact")}}" class="nav-item nav-link">Contact</a>
            @guest()
                <a href="{{route('signin')}}" class="nav-item nav-link {{ Route::currentRouteName() === 'connexion' ? 'active' : '' }}">Connexion</a>
            @endguest

            @auth()
            <div class="nav-item dropdown">
                <a href="" class="dropdown-toggle nav-link ">Mon compte</a>
                <div class="dropdown-menu m-0">
                        <a href="{{route('logout')}}" class="dropdown-item">Deconnexion</a>
                    </div>
            </div>
            @endauth
            </div>
    </div>
</nav>
