
@extends('admin.baseadmin')
@section('links')
    <link rel="stylesheet" href="{{asset('admin/dist/styles.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/all.css')}} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('title')
@endsection
@section('content')
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            <header class="bg-nav">
                <div class="flex justify-between">
                    <div class="p-1 mx-3 inline-flex items-center">
                        <i class="fas fa-bars pr-2 text-white" onclick="sidebarToggle()"></i>
                        <h1 class="text-white p-2">Logo</h1>
                    </div>
                    <div class="p-1 flex flex-row items-center">
                        <a href="https://github.com/tailwindadmin/admin" class="text-white p-2 mr-2 no-underline hidden md:block lg:block">Github</a>


                        <img onclick="profileToggle()" class="inline-block h-8 w-8 rounded-full" src="https://avatars0.githubusercontent.com/u/4323180?s=460&v=4" alt="">
                        <a href="#" onclick="profileToggle()" class="text-white p-2 no-underline hidden md:block lg:block">Adam Wathan</a>
                        <div id="ProfileDropDown" class="rounded hidden shadow-md bg-white absolute pin-t mt-12 mr-1 pin-r">
                            <ul class="list-reset">
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">My account</a></li>
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Notifications</a></li>
                                <li><hr class="border-t mx-2 border-grey-ligght"></li>
                                <li><a href="#" class="no-underline px-4 py-2 block text-black hover:bg-grey-light">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                    <ul class="list-reset flex flex-col">
                        <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href="index.html"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                                Dashboard
                                <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="forms.html"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fab fa-wpforms float-left mx-2"></i>
                                Forms
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="buttons.html"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-grip-horizontal float-left mx-2"></i>
                                Buttons
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="tables.html"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-table float-left mx-2"></i>
                                Tables
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-light-border">
                            <a href="ui.html"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fab fa-uikit float-left mx-2"></i>
                                Ui components
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2 border-b border-300-border">
                            <a href="modals.html" class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-square-full float-left mx-2"></i>
                                Modals
                                <span><i class="fa fa-angle-right float-right"></i></span>
                            </a>
                        </li>
                        <li class="w-full h-full py-3 px-2">
                            <a href="#"
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="far fa-file float-left mx-2"></i>
                                Pages
                                <span><i class="fa fa-angle-down float-right"></i></span>
                            </a>
                            <ul class="list-reset -mx-2 bg-white-medium-dark">
                                <li class="border-t mt-2 border-light-border w-full h-full px-2 py-3">
                                    <a href="login.html"
                                       class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Login Page
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                                <li class="border-t border-light-border w-full h-full px-2 py-3">
                                    <a href="register.html"
                                       class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        Register Page
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                                <li class="border-t border-light-border w-full h-full px-2 py-3">
                                    <a href="404.html"
                                       class="mx-4 font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                        404 Page
                                        <span><i class="fa fa-angle-right float-right"></i></span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>

                </aside>
                <!--/Sidebar-->
                <!--Main-->
                <!-- Main Content -->
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                    <div class="container mx-auto">
                        <h2 class="text-2xl font-bold mb-4 text-center">Gestion des repas</h2>

                        <a href="{{ route('admin.add') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-3">
                            <i class="fas fa-plus"></i> Ajouter un repas
                        </a>

                        @if(session('success'))
                            <div class="bg-green-500 text-white p-2 mt-4 text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="overflow-x-auto mt-4">
                            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <tr>
                                    <th class="py-3 px-6 text-left">Nom</th>
                                    <th class="py-3 px-6 text-left">Prix</th>
                                    <th class="py-3 px-6 text-left">Image</th>
                                    <th class="py-3 px-6 text-left">Catégorie</th>
                                    <th class="py-3 px-6 text-center">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="text-gray-600 text-sm font-light">
                                @foreach ($repas as $meal)
                                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                                        <td class="py-3 px-6 text-left">{{ $meal->nom }}</td>
                                        <td class="py-3 px-6 text-left">{{ $meal->prix }}$</td>
                                        <td class="py-3 px-6 text-left">
                                            @if ($meal->image)
                                                <img src="{{ asset($meal->image) }}" alt="{{ $meal->nom }}" class="img-fluid rounded" style="width: 80px; height: 80px;">
                                            @endif
                                        </td>
                                        <td class="py-3 px-6 text-left">{{ $meal->categorie }}</td>
                                        <td class="py-3 px-6 text-center">
                                            <!-- Bouton Modifier -->
                                            <a href="{{ route('admin.edit', $meal->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded inline-flex items-center">
                                                <i class="fas fa-edit fa-2x"></i> Modifier
                                            </a>

                                            <!-- Formulaire de suppression -->
                                            <form action="{{ route('admin.destroy', $meal->id) }}" method="POST" class="inline ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded inline-flex items-center">
                                                    <i class="fas fa-trash fa-2x"></i> Supprimer
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </main>
            </div>

            <!-- Footer -->
            <footer class="bg-grey-darkest text-white p-2">
                <div class="flex flex-1 mx-auto">&copy; Belagor - Tous droits réservés.</div>
            </footer>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('admin/main.js')}}"></script>
@endsection


