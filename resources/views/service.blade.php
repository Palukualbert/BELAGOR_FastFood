<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Service</title>
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
        .footer {
            text-align: center; /* Centre le texte dans tout le footer */
        }

        .footer .row {
            justify-content: center; /* Centre les colonnes horizontalement */
        }

        .footer .btn-link {
            display: inline-block; /* Assure que les liens se comportent bien lors du centrage */
        }

        .footer .copyright {
            margin-top: 20px;
            font-size: 0.9rem; /* Ajuste la taille du texte si besoin */
        }
        .service-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .service-item {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .service-item .row {
            justify-content: center;
        }
        .service-item .p-4 {
            text-align: center;
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
                <div class="container text-center my-5 pt-5 pb-4">
                    <h1 class="display-3 text-white mb-3 animated slideInDown">Service</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center text-uppercase">
                            <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                            <li class="breadcrumb-item"><a href="about.html">A propos</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Service</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <div class="row">
            <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <img src="img/6fast_food.jpg" class="img-fluid rounded mb-3 large-img" alt="Fast Food Image 1">
                        </div>
                        <div class="col-md-6">
                            <img src="img/service.jpg" class="img-fluid rounded mb-3 large-img" alt="Fast Food Image 2">
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <i class="fa fa-3x fa-hamburger text-primary mb-4"></i>
                        <h5>Service Fast Food</h5>
                        <p>Découvrez nos menus rapides, délicieux et préparés avec des ingrédients frais ! Passez commande en ligne ou rendez-vous dans notre restaurant.</p>
                        <a href="menu.html" class="btn btn-primary mt-3">Voir le menu</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="service-item rounded pt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <img src="img/6fast_food.jpg" class="img-fluid rounded mb-3 large-img" alt="Fast Food Image 1">
                        </div>
                        <div class="col-md-6">
                            <img src="img/service.jpg" class="img-fluid rounded mb-3 large-img" alt="Fast Food Image 2">
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <i class="fa fa-3x fa-hamburger text-primary mb-4"></i>
                        <h5>Service Fast Food</h5>
                        <p>Découvrez nos menus rapides, délicieux et préparés avec des ingrédients frais ! Passez commande en ligne ou rendez-vous dans notre restaurant.</p>
                        <a href="menu.html" class="btn btn-primary mt-3">Voir le menu</a>
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
                        <a class="btn btn-link" href="about.html">A propos</a>
                        <a class="btn btn-link" href="contact.html">Contact</a>
                        <a class="btn btn-link" href="menu.html">Menu</a>
                        <a class="btn btn-link" href="service.html">Service</a>
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
                    &copy; <a class="border-bottom" href="#">Belagor</a>, Tous droits réservés.
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
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
