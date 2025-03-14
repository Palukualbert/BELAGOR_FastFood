
@extends('admin.baseadmin')
@section('links')
    <link rel="stylesheet" href="{{asset('admin/dist/styles.css')}}">
    <link rel="stylesheet" href="{{asset('admin/dist/all.css')}} ">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i,600,600i,700,700i" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

@endsection
@section('title')
@endsection
@section('content')
    <div class="mx-auto bg-grey-400">
        <!--Screen-->
        <div class="min-h-screen flex flex-col">
            <!--Header Section Starts Here-->
            @include('admin.components.header')
            <!--/Header-->

            <div class="flex flex-1">
                <!--Sidebar-->
                @include('admin.components.aside')


                <!--/Sidebar-->
                <!--Main-->
                <!-- Main Content -->
                <main class="bg-white-300 flex-1 p-3 overflow-hidden">
                    <div class="container mx-auto">
                        <h2 class="text-2xl font-bold mb-5 text-center">Gestion des repas</h2>
                        <!--
                        <div class="flex justify-between items-center bg-white p-4 rounded-lg shadow-md mb-6">
                            <!-- Sélecteur de Date
                            <div class="flex items-center space-x-3">
                                <label for="dateCommandes" class="block text-lg font-semibold text-gray-700 mb-2">Choisir une date :</label>
                                <input type="date" id="dateCommandes" class="border border-gray-300 px-3 py-1 rounded">
                            </div>
                        </div>
                        -->

                        <!-- Statistiques -->
                        <div class="row g-4 mb-6">
                            <!-- Commandes Aujourd'hui -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="bg-blue-500 text-white flex flex-col items-center p-4 rounded-lg">
                                    <h3 class="text-xl font-bold text-center text-white">Commandes(date)</h3>
                                    <div class="flex items-center justify-center space-x-3">
                                        <p class="text-3xl font-bold" id="commandesAujourdhui">{{ $commandesAujourdhui }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Total des Commandes -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="bg-green-500 text-white flex flex-col items-center p-4 rounded-lg">
                                    <h3 class="text-xl font-bold text-center text-white">Total Commandes</h3>
                                    <div class="flex items-center justify-center space-x-3">
                                        <p class="text-3xl font-bold">{{ $totalCommandes }}</p>
                                    </div>
                                </div>
                            </div>


                            <!-- Total des Repas -->

                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="bg-yellow-500 text-white flex flex-col items-center p-4 rounded-lg">
                                    <h3 class="text-xl font-bold text-center text-white">Total Repas</h3>
                                    <div class="flex items-center justify-center space-x-3">
                                        <p class="text-3xl font-bold">{{ $totalRepas }}</p>
                                    </div>
                                </div>
                            </div>


                            <!-- Total des Clients -->
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="bg-red-500 text-white flex flex-col items-center p-4 rounded-lg">
                                    <h3 class="text-xl font-bold text-center text-white">Total Clients</h3>
                                    <div class="flex items-center justify-center space-x-3">
                                        <p class="text-3xl font-bold">{{ $totalClients }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>





                        @if(session('success'))
                            <div class="bg-green-500 text-white p-2 mt-4 text-center">
                                {{ session('success') }}
                            </div>
                        @endif


                        <div class="flex justify-between">
                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <a href="{{ route('admin.add') }}" class="bg-primary flex justify-center align-items-center pl-3 pr-3 rounded-lg text-white ">
                                    <i class="fas fa-plus pr-2"></i> <span>Ajouter un repas</span>
                                </a>
                            </div>


                            <div class="flex flex-col md:flex-row gap-4 mb-4">
                                <input type="text" id="searchInput" placeholder="Rechercher un repas..."
                                       class="border border-gray-300 rounded px-3 py-2 flex-grow min-w-[200px]">
                            </div>
                        </div>


                        <div class="overflow-x-auto mt-4">
                            <table class="table-auto w-full bg-white shadow-md rounded-lg">
                                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <tr>
                                    <th class="py-3 px-6 text-left">Nom plat</th>
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
                                                <a href="{{ asset($meal->image) }}" target="_blank">
                                                    <img src="{{ asset($meal->image) }}" alt="{{ $meal->nom }}" class="img-fluid rounded cursor-pointer hover:scale-150 transition-transform duration-300" style="width: 50px; height: 50px; object-fit: cover;">
                                                </a>
                                            @endif
                                        </td>


                                        <td class="py-3 px-6 text-left">{{ $meal->categorie }}</td>

                                        <!-- Actions Responsive -->
                                        <td class="py-3 px-6 text-center">
                                            <div class="flex flex-wrap justify-center gap-2">
                                                <!-- Bouton Modifier -->
                                                <a href="{{ route('admin.edit', $meal->id) }}" class="bg-primary text-white px-2 py-1 rounded flex items-center">
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
    <script>
        document.getElementById('dateCommandes').addEventListener('change', function () {
            let date = this.value;
            fetch("{{ route('commandes.par.date') }}?date=" + date) // Utilise la route nommée
                .then(response => response.json())
                .then(data => {
                    document.getElementById('commandesAujourdhui').textContent = data.commandes;
                })
                .catch(error => console.error('Erreur lors de la récupération des commandes:', error));
        });
    </script>
    <script>
        document.getElementById('searchInput').addEventListener('keyup', function () {
            var searchValue = this.value.toLowerCase();
            var rows = document.querySelectorAll('tbody tr');

            rows.forEach(row => {
                var name = row.cells[0].textContent.toLowerCase(); // Nom du repas
                var price = row.cells[1].textContent.toLowerCase(); // Prix
                var category = row.cells[3].textContent.toLowerCase(); // Catégorie

                if (name.includes(searchValue) || price.includes(searchValue) || category.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    </script>
    <script src="{{asset('admin/main.js')}}"></script>
@endsection


