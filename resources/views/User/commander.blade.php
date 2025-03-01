<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>Menu</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Bootstrap & Custom CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-xxl bg-white p-0">
    @include('components.header')
    <div class="container-xxl py-5 bg-dark hero-header mb-5">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3">Votre Panier</h1>
        </div>
    </div>

    <form action="{{ route('commande.valider') }}" method="POST">
        @csrf
        <input type="hidden" id="repas" name="repas">
        <input type="hidden" id="latitude" name="latitude">
        <input type="hidden" id="longitude" name="longitude">

        <div class="container py-5">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($repasPanier as $repas)
                        <tr id="row-{{ $repas->id }}">
                            <td><img src="{{ asset($repas->image) }}" alt="{{ $repas->nom }}" style="width: 60px;"></td>
                            <td>{{ $repas->nom }}</td>
                            <td>{{ $repas->prix }} $</td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary" onclick="modifierQuantite({{ $repas->id }}, -1)">-</button>
                                <input type="number" name="quantites[{{ $repas->id }}]" id="quantite-{{ $repas->id }}" value="{{ $repas->pivot->quantite }}" class="form-control d-inline text-center" style="width: 50px;" readonly>
                                <button type="button" class="btn btn-sm btn-primary" onclick="modifierQuantite({{ $repas->id }}, 1)">+</button>
                            </td>
                            <td id="total-{{ $repas->id }}" data-prix="{{ $repas->prix }}">
                                {{ $repas->pivot->quantite * $repas->prix }} $
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" onclick="supprimerItem({{ $repas->id }})">Retirer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- Ajout des champs téléphone et adresse -->
            <div class="mb-3">
                <label for="phone" class="form-label">Numéro de téléphone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse de livraison</label>
                <input type="text" class="form-control" id="adresse" name="adresse" required>
            </div>
            <div class="text-end">
                <h4>Total Général: <span id="total-general"></span></h4>
                <button type="submit" class="btn btn-primary py-3" onclick="preparerCommande()">Valider la Commande</button>
            </div>
        </div>
    </form>


</div>

<script>
    function modifierQuantite(id, change) {
        let quantiteElement = document.getElementById(`quantite-${id}`);
        let totalElement = document.getElementById(`total-${id}`);

        let quantite = parseInt(quantiteElement.value) + change;
        if (isNaN(quantite) || quantite < 1) quantite = 1;

        let prix = parseFloat(totalElement.getAttribute("data-prix"));
        if (isNaN(prix)) prix = 0;

        quantiteElement.value = quantite;
        let totalItem = (prix * quantite).toFixed(2);
        totalElement.innerText = totalItem + " $";

        mettreAJourTotalGeneral();
    }

    function mettreAJourTotalGeneral() {
        let totalGeneralElement = document.getElementById("total-general");
        let totalGeneral = 0;

        document.querySelectorAll("td[id^='total-']").forEach(el => {
            let montant = parseFloat(el.innerText.replace("$", "").trim());
            if (!isNaN(montant)) {
                totalGeneral += montant;
            }
        });

        totalGeneralElement.innerText = totalGeneral.toFixed(2) + " $";
    }

    function supprimerItem(id) {
        let row = document.getElementById(`row-${id}`);
        if (row) {
            row.remove();
            mettreAJourTotalGeneral();
        }
    }

    function preparerCommande() {
        let repas = [];
        document.querySelectorAll("tr[id^='row-']").forEach(row => {
            let id = row.id.replace("row-", "");
            let quantite = document.getElementById(`quantite-${id}`).value;
            let prix = document.getElementById(`total-${id}`).getAttribute("data-prix");

            repas.push({ id, quantite, prix });
        });

        document.getElementById("repas").value = JSON.stringify(repas);

        // Ajout des valeurs phone et adresse
        let phone = document.getElementById("phone").value;
        let adresse = document.getElementById("adresse").value;

        if (!phone || !adresse) {
            alert("Veuillez remplir tous les champs.");
            return false; // Bloque la soumission du formulaire si vide
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                document.getElementById("latitude").value = position.coords.latitude;
                document.getElementById("longitude").value = position.coords.longitude;
            });
        }
    }

    window.onload = mettreAJourTotalGeneral;
</script>


</body>
</html>
