<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contact</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .form-control {
            padding: 8px 12px; /* Réduit l'espacement interne */
            font-size: 14px; /* Réduit la taille du texte */
            height: 40px; /* Réduit la hauteur des champs */
        }

        .btn-primary {
            padding: 10px 16px; /* Ajuste le bouton */
            font-size: 14px;
        }
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
        .invalid-feedback {
            display: block;
            color: #dc3545; /* Rouge pour l'erreur */
        }

        .is-invalid {
            border-color: #dc3545; /* Ajoute une bordure rouge au champ */
        }

    </style>
</head>
<body>
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h5 class="section-title ff-secondary text-center text-primary fw-normal">Connexion</h5>
            <h1 class="mb-5">Connectez-vous à votre compte</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <form action="" method="POST">
                        @csrf
                        <div class="row g-3">
                            <div class="col-12">
                                @error('notfound')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                <div class="form-floating">

                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Votre numero" value="{{old('phone')}}" required>
                                    <label for="phone">Numéro de téléphone</label>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" required>
                                    <label for="password">Mot de passe</label>
                                </div>

                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary w-100 py-3" type="submit">Se connecter</button>
                            </div>
                        </div>
                    </form>
                    <div class="col-12 text-center">
                        <p>Vous n'avez pas de compte ? <a href="{{route('signup')}}">Créez-en un ici</a></p>
                    </div>
                    <div class="col-12">
                        <a class="btn w-100 py-3 d-flex align-items-center justify-content-center border"  href="{{route('auth.google')}}" type="button">
                            <img src="{{asset('img/google.png')}}" alt="Google" class="mr-2" style="width: 20px; height: 20px; margin-right: 5px">
                            Se connecter avec Google
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
