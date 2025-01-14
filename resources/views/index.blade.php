<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        html, body {
            height: 100%;
            margin: 0;
            overflow-y: hidden; /* Par défaut, désactive la barre de défilement */
        }

        @media (max-width: 992px) { /* Tablettes */
            html, body {
                overflow-y: auto; /* Active la barre de défilement verticale */
            }
        }

        @media (max-width: 576px) { /* Téléphones */
            html, body {
                overflow-y: auto; /* Active la barre de défilement verticale */
            }
        }

        .rounded-plateau {
            width: 45%; /* Augmenter la taille relative des plateaux */
            max-width: 300px; /* Taille maximale pour les écrans larges */
            aspect-ratio: 1; /* Maintient une forme parfaitement ronde */
            border-radius: 50%; /* Forme ronde */
            border: 5px solid #FEA116; /* Bordure pour simuler un contour de plateau */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); /* Ombre pour simuler un plateau */
            object-fit: cover; /* Gère le contenu de l'image sans déformation */
            margin-bottom: 20px; /* Espacement entre les deux plateaux */
        }

        @media (max-width: 992px) { /* Tablettes */
            .rounded-plateau {
                width: 60%; /* Augmente légèrement la taille pour les tablettes */
                max-width: 250px;
            }
        }

        @media (max-width: 576px) { /* Téléphones */
            .rounded-plateau {
                width: 70%; /* Agrandit davantage les plateaux sur petits écrans */
                max-width: 200px;
            }
        }

        .hero-header .col-lg-6.text-center.text-lg-end {
            display: flex;
            flex-direction: column;
            align-items: center; /* Centre les plateaux horizontalement */
            justify-content: center; /* Centre les plateaux verticalement */
        }
    </style>
</head>

<body>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Hero Start -->
    <div class="container-xxl position-relative p-0">
        @include('components.header')
        <div class="container-xxl py-5 bg-dark hero-header mb-5">
            <div class="container my-5 py-5">
                <div class="row align-items-center g-5">
                    <!-- Section texte -->
                    <div class="col-lg-6 text-center text-lg-start">
                        <h1 class="display-3 text-white animated slideInLeft">Le Goût<br> qui Vient à Vous !</h1>
                        <p class="text-white animated slideInLeft mb-4 pb-2"> Savourez des plats délicieux où que vous soyez ! Burgers gourmands, frites dorées et bien plus, préparés avec des ingrédients frais. Sur place, à emporter ou en livraison rapide, profitez d’un moment gourmand en toute simplicité.</p>
                        <a href="menu.html" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Consulter Menu</a>
                    </div>
                    <!-- Section plateaux -->
                    <div class="col-lg-6 text-center text-lg-end overflow-hidden d-flex flex-column align-items-center">
                        <img class="img-fluid rounded-plateau mb-4" src="img/2.jpg" alt="Plateau de nourriture">
                        <img class="img-fluid rounded-plateau" src="img/3.jpg" alt="Plateau de nourriture">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
