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

    <style>
        .footer {
            text-align: center;
        }
        .footer .row {
            justify-content: center;
        }
        .footer .btn-link {
            display: inline-block;
        }
        .footer .copyright {
            margin-top: 20px;
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
<div class="container-xxl bg-white p-0">
    <!-- Navbar & Hero -->
    <div class="container-xxl position-relative p-0">
        @include('components.header')
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container text-center my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">Menu</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center text-uppercase">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('about') }}">A propos</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('service') }}">Service</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Menu</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Belagor Menu</h5>
                <h1 class="mb-5">Découvrez nos repas</h1>
            </div>

            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                <div class="d-flex justify-content-center">
                    <ul class="nav nav-pills">
                        @foreach (['Basic', 'Simple', 'Supérieur'] as $categorie)
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 pb-3 {{ $loop->first ? 'active' : '' }}"
                                   data-bs-toggle="pill" href="#tab-{{ Str::slug($categorie) }}">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <h6 class="mt-n1 mb-0">{{ $categorie }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <br>
                <div class="tab-content">
                    @foreach (['Basic', 'Simple', 'Supérieur'] as $categorie)
                        <div id="tab-{{ Str::slug($categorie) }}" class="tab-pane fade {{ $loop->first ? 'show active' : '' }}">
                            <div class="row g-4">
                                @php
                                    $repasFiltres = $repas->where('categorie', $categorie);
                                @endphp

                                @forelse ($repasFiltres as $meal)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center p-3 border rounded">
                                            <img class="flex-shrink-0 img-fluid rounded"
                                                 src="{{ asset($meal->image) }}"
                                                 alt="{{ $meal->nom }}"
                                                 style="width: 80px; height: 80px; cursor: pointer;"
                                                 data-bs-toggle="modal" data-bs-target="#orderModal{{ $meal->id }}">

                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2 align-items-center">
                                                    <span>{{ $meal->nom }}</span>
                                                    <span class="text-primary d-flex align-items-center">
                                                    {{ $meal->prix }}$
                                                    <button class="btn btn-sm btn-outline-primary ms-2 d-block d-sm-inline"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#orderModal{{ $meal->id }}">
                                                        <i class="fas fa-shopping-cart"></i> <span class="d-none d-md-inline">Commander</span>
                                                    </button>
                                                </span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="orderModal{{ $meal->id }}" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="orderModalLabel">Nom du Repas : {{ $meal->nom }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="" method="POST">
                                                        @csrf
                                                        <input type="hidden" name="meal_id" value="{{ $meal->id }}">

                                                        <!-- Quantité -->
                                                        <div class="mb-3">
                                                            <label for="quantity-{{ $meal->id }}" class="form-label">Quantité</label>
                                                            <input type="number" class="form-control" id="quantity-{{ $meal->id }}" name="quantity" placeholder="Entrez la quantité" min="1" required>
                                                        </div>

                                                        <!-- Adresse -->
                                                        <div class="mb-3">
                                                            <label for="address-{{ $meal->id }}" class="form-label">Adresse de livraison</label>
                                                            <input type="text" class="form-control" id="address-{{ $meal->id }}" name="address" placeholder="Entrez votre adresse complète" required>
                                                        </div>

                                                        <!-- Bouton Commander -->
                                                        <button type="submit" class="btn btn-warning w-100">Confirmer la commande</button>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center text-muted">Aucun repas disponible pour la catégorie "{{ $categorie }}".</p>
                                @endforelse
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn text-center" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-primary fw-normal mb-4">Pages</h4>
                    <a class="btn btn-link" href="/about">A propos</a>
                    <a class="btn btn-link" href="/contact">Contact</a>
                    <a class="btn btn-link" href="/menu">Menu</a>
                    <a class="btn btn-link" href="/service">Service</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-primary fw-normal mb-4">Contact</h4>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>AV Lumumba, Lubumbashi, RDC</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+243 97 75 25 346</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>belagor@gmail.com</p>
                    <div class="d-flex justify-content-center pt-2">
                        <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://wa.me/1234567890" target="_blank">
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="section-title ff-secondary text-primary fw-normal mb-4">Ouvert</h4>
                    <h5 class="text-light fw-normal">Lundi - Samedi</h5>
                    <p>08h - 18h30</p>
                    <h5 class="text-light fw-normal">Dimanche</h5>
                    <p>10h - 15h</p>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright text-center">
                &copy; <a class="border-bottom" href="#">Belagor 2025</a>, Tous droits réservés.
            </div>
        </div>
    </div>
    <!-- Footer End -->
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/counterup/counterup.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>

</body>
</html>
