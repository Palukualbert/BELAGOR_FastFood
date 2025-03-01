
@extends('admin.baseadmin')
@section('links')
    <link rel="stylesheet" href="{{asset('admin/dist/styles.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/all.css')}} ">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
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
                        <a href="" class="navbar-brand p-0">
                            <img class="rounded-circle" src="../img/LOGO_belegor.png" alt="Logo" width="10%">
                        </a>
                    </div>
                    <div class="p-1 flex flex-row items-center">
                        <a href="{{ route('signin') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-3">
                            <i class="fas fa-sign-out-alt"></i> Se déconnecter
                        </a>                    </div>
                </div>
            </header>
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                <aside id="sidebar" class="bg-side-nav w-1/2 md:w-1/6 lg:w-1/6 border-r border-side-nav hidden md:block lg:block">

                    <ul class="list-reset flex flex-col">
                        <li class=" w-full h-full py-3 px-2 border-b border-light-border bg-white">
                            <a href=""
                               class="font-sans font-hairline hover:font-normal text-sm text-nav-item no-underline">
                                <i class="fas fa-tachometer-alt float-left mx-2"></i>
                                Dashboard
                                <span><i class="fas fa-angle-right float-right"></i></span>
                            </a>
                        <li class="py-3 px-4 border-b hover:bg-gray-200">
                            <a href="/admin/commandes" class="flex items-center text-gray-700">
                                <i class="fas fa-table mr-3"></i> Commandes
                            </a>
                        </li>
                        </li>
                </aside>                <!--/Sidebar-->
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

                                        <!-- Image Responsive -->
                                        <td class="py-3 px-6 text-left">
                                            @if ($meal->image)
                                                <img src="{{ asset($meal->image) }}" alt="{{ $meal->nom }}" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                            @endif
                                        </td>

                                        <td class="py-3 px-6 text-left">{{ $meal->categorie }}</td>

                                        <!-- Actions Responsive -->
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex flex-wrap justify-center gap-2">
                                                <!-- Bouton Modifier -->
                                                <a href="{{ route('admin.edit', $meal->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded flex items-center">
                                                    <i class="fas fa-edit"></i>
                                                    <span class="ml-1">Modifier</span>
                                                </a>

                                                <!-- Formulaire de suppression -->
                                                <form action="{{ route('admin.destroy', $meal->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded flex items-center">
                                                        <i class="fas fa-trash"></i>
                                                        <span class="ml-1">Supprimer</span>
                                                    </button>
                                                </form>
                                            </div>
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
                <div class="flex flex-1 mx-auto">&copy; Belagor 2025 - Tous droits réservés.</div>
            </footer>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{asset('admin/main.js')}}"></script>
@endsection


