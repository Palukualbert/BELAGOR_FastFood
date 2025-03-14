<header class="bg-nav">
    <div class="flex justify-between">
        <div class="p-1 mx-3 inline-flex items-center">
            <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
            <a href="" class="navbar-brand p-0">
                <img class="rounded-circle" src="../img/LOGO_belegor.png" alt="Logo" width="7%">
            </a>
        </div>
        <div class="p-1 flex flex-row items-center">
            <a href="{{ route('signin') }}" class="btn btn-danger w-100">Se déconnecter</a>
        </div>
    </div>
</header>
