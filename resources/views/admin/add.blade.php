@extends('admin.baseadmin')

@section('links')
    <link rel="stylesheet" href="{{ asset('admin/dist/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/dist/all.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400;400i,600,600i,700,700i" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        .form-control {
            padding: 8px 12px; /* Ajuste l'espacement interne */
            font-size: 14px; /* Ajuste la taille du texte */
            height: 40px; /* Ajuste la hauteur des champs */
        }
        .btn-primary {
            padding: 10px 16px; /* Ajuste le bouton */
            font-size: 14px;
        }
        .invalid-feedback {
            display: block;
            color: #dc3545; /* Couleur rouge pour les erreurs */
        }
        .is-invalid {
            border-color: #dc3545; /* Ajoute une bordure rouge pour les erreurs */
        }
    </style>
@endsection

@section('title')
    Ajouter un Repas
@endsection

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Gestion des repas</h5>
                <h1 class="mb-5">Ajouter un nouveau repas</h1>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <!-- Nom du repas -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" placeholder="Nom du repas" value="{{ old('nom') }}" required>
                                        <label for="nom">Nom du repas</label>
                                        @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Description" style="height: 100px">{{ old('description') }}</textarea>
                                        <label for="description">Description</label>
                                        @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Prix -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="number" step="0.01" class="form-control @error('prix') is-invalid @enderror" id="prix" name="prix" placeholder="Prix" value="{{ old('prix') }}" required>
                                        <label for="prix">Prix ($)</label>
                                        @error('prix')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Catégorie -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <select class="form-control @error('categorie') is-invalid @enderror" id="categorie" name="categorie" required>
                                            <option value="">Sélectionnez une catégorie</option>
                                            <option value="Basic" {{ old('categorie') == 'Basic' ? 'selected' : '' }}>Basic</option>
                                            <option value="Simple" {{ old('categorie') == 'Simple' ? 'selected' : '' }}>Simple</option>
                                            <option value="Supérieur" {{ old('categorie') == 'Supérieur' ? 'selected' : '' }}>Supérieur</option>
                                        </select>
                                        <label for="categorie">Catégorie</label>
                                        @error('categorie')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Image -->
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                                        <label for="image">Image du repas</label>
                                        @error('image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Bouton Ajouter -->
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Ajouter le repas</button>
                                </div>
                            </div>
                        </form>
                        <div class="col-12 text-center mt-3">
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Retour au tableau de bord</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('admin/main.js') }}"></script>
@endsection
