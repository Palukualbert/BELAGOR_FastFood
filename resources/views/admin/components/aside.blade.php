<aside id="sidebar" class="bg-side-nav w-3/4 md:w-1/4 lg:w-1/6 border-r bg-dark border-side-nav hidden md:block lg:block">
    <ul class="list-none flex flex-col p-0">
        <li class="w-full h-full py-3 px-2 border-b border-light-border">
            <a href="{{route('admin.dashboard')}}" class="nav-item nav-link flex text-white items-center uppercase ">
                <i class="fas fa-tachometer-alt mr-2"></i>
                Dashboard
            </a>
        </li>
        <li class="py-3 px-2 border-b border-light-border">
            <a href="{{route('admin.commandes')}}" class="nav-link flex items-center text-white uppercase hover:text-primary">
                <i class="fas fa-table mr-2"></i>
                Commandes
            </a>
        </li>
    </ul>
</aside>
