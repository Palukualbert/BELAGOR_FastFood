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

@section('title', 'Gestion des commandes')

@section('content')
    <div class="min-h-screen flex flex-col">
        @include('admin.components.header')

        <div class="flex flex-1">
            <!-- Sidebar affiché par défaut -->
            @include('admin.components.aside')

            <div class="flex flex-col flex-1">
                <!-- Contenu principal -->
                <main class="flex-1 p-6">
                    <h2 class="text-2xl font-bold mb-4 text-center">Gestion des Commandes</h2>

                    @if(session('success'))
                        <div class="bg-green-500 text-white p-2 mt-4 text-center">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="flex flex-wrap gap-4 mb-4">
                        <input type="text" id="searchInput" placeholder="Rechercher par client, adresse, statut..."
                               class="border border-gray-300 rounded px-3 py-2 flex-grow min-w-[200px]">

                        <input type="date" id="searchDate" class="border border-gray-300 rounded px-3 py-2 flex-grow min-w-[200px]">

                        <button id="searchButton" class="bg-blue-500 text-white px-4 py-2 rounded">
                            <i class="fas fa-search"></i> Rechercher
                        </button>
                    </div>



                    <div class="overflow-x-auto mt-4">
                        <table class="table-auto w-full bg-white shadow-md rounded-lg">
                            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-3 px-6 text-center">N°</th>
                                <th class="py-3 px-6 text-left">Client</th>
                                <th class="py-3 px-6 text-left">Téléphone</th>
                                <th class="py-3 px-6 text-center">Adresse</th>
                                <th class="py-3 px-6 text-left">Repas</th>
                                <th class="py-3 px-6 text-center">Montant Total</th>
                                <th class="py-3 px-6 text-center">Statut</th>
                                <th class="py-3 px-6 text-center">Date</th>
                                <th class="py-3 px-6 text-center">Localisation</th>

                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($commandes as $index => $commande)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-center">{{ $index + 1 }}</td>
                                    <td class="py-3 px-6">{{ $commande->user->name }}</td>
                                    <td class="py-3 px-6">{{ $commande->phone }}</td>
                                    <td class="py-3 px-6 text-center">{{ $commande->adresse }}</td>
                                    <td class="py-3 px-6">
                                        <ul>
                                            @foreach (json_decode($commande->repas, true) as $repas)
                                                <li>
                                                    <span class="bg-yellow-300 text-black px-2 py-1 rounded">{{ $repas['quantite'] }}</span>
                                                    {{ $repas['nom'] }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="py-3 px-6 text-center">{{ $commande->montant_total }}$</td>
                                    <td class="py-3 px-6 text-center">
                                        <select class="form-select update-status border-gray-300 rounded" data-id="{{ $commande->id }}">
                                            <option value="en_attente" {{ $commande->status == 'en_attente' ? 'selected' : '' }}> En attente</option>
                                            <option value="en_cours" {{ $commande->status == 'en_cours' ? 'selected' : '' }}> En cours</option>
                                            <option value="livre" {{ $commande->status == 'livre' ? 'selected' : '' }}>✅ Livré</option>
                                            <option value="annule" {{ $commande->status == 'annule' ? 'selected' : '' }}>❌ Annulé</option>
                                        </select>
                                    </td>
                                    <td class="py-3 px-6 text-center text-blue-600 font-semibold bg-gray-100 rounded-lg">
                                        {{ $commande->created_at->format('d/m/Y H\hi') }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        @if($commande->latitude && $commande->longitude)
                                            <a href="https://www.google.com/maps?q={{ $commande->latitude }},{{ $commande->longitude }}" target="_blank" class="text-blue-600 underline">
                                                📍 Voir sur la carte
                                            </a>
                                        @else
                                            <span class="text-gray-500">Non disponible</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#toggleSidebar').click(function () {
                $('#sidebar').toggleClass('hidden'); // Cache ou affiche le sidebar
            });

            $('.update-status').change(function () {
                var commandeId = $(this).data('id');
                var newStatus = $(this).val();
                var url = "{{ url('admin/commandes') }}/" + commandeId + "/update-status";

                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        status: newStatus
                    },
                    success: function () {
                        alert('✅ Statut mis à jour avec succès !');
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                        alert('❌ Erreur : ' + xhr.responseText);
                    }
                });
            });

            function filterTable() {
                var searchValue = $("#searchInput").val().toLowerCase();
                var selectedDate = $("#searchDate").val(); // Format YYYY-MM-DD

                $("tbody tr").each(function () {
                    var row = $(this);
                    var repasMatch = false;
                    var dateMatch = false;
                    var textMatch = false;

                    // Vérification des repas (5ème colonne)
                    row.find("td:nth-child(5) li").each(function () {
                        if ($(this).text().toLowerCase().includes(searchValue)) {
                            repasMatch = true;
                        }
                    });

                    // Vérification du texte dans Client, Téléphone, Adresse, Statut
                    if (
                        row.find("td:nth-child(2)").text().toLowerCase().includes(searchValue) || // Client
                        row.find("td:nth-child(3)").text().toLowerCase().includes(searchValue) || // Téléphone
                        row.find("td:nth-child(4)").text().toLowerCase().includes(searchValue) || // Adresse
                        repasMatch || // Repas
                        row.find("td:nth-child(7) select").val().toLowerCase().includes(searchValue) // Statut
                    ) {
                        textMatch = true;
                    }

                    // Vérification de la date (8ème colonne)
                    var rowDate = row.find("td:nth-child(8)").text().trim().split(" ")[0]; // Format d/m/Y
                    var dateParts = rowDate.split("/");
                    var formattedRowDate = dateParts[2] + "-" + dateParts[1] + "-" + dateParts[0]; // Converti en YYYY-MM-DD

                    if (!selectedDate || selectedDate === formattedRowDate) {
                        dateMatch = true;
                    }

                    // Affichage si un des critères correspond
                    row.toggle(textMatch && dateMatch);
                });
            }

            // Appliquer la recherche quand le bouton est cliqué
            $("#searchButton").on("click", filterTable);
        });

    </script>


@endsection
