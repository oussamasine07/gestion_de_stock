@extends('../layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Achats</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Modifier La Facture</a></li>
                        <li class="breadcrumb-item" aria-current="page">Modifier l'Article</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Modifier l'Article | Facture N°: {{ $numero_facture }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="/achats/edit_article/{{  }}" method="POST">
                        @csrf
                        @method("PUT")
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom Article</label>
                                    <input type="text" name="nom_article" value="{{ old('nom_article') }}"
                                        class="form-control" placeholder="Enter Nom Article">
                                    @error('nom_article')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Prix Unitaire</label>
                                    <input type="number" class="form-control" placeholder="Enter Le Prix Unitaire"
                                        name="prix_unitaire" value="{{ old('prix_unitaire') }}">
                                    @error('prix_unitaire')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Quantité</label>
                                    <input type="number" class="form-control" placeholder="Entrer La Quantité D'Article"
                                        name="quantite" value="{{ old('quantite') }}">
                                    @error('quantite')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Pourcentage de TVA</label>
                                    <select name="pourcentage_tva" class="form-select">
                                        <option value="0.20"> 20% </option>
                                        <option value="0.14"> 14% </option>
                                        <option value="0.10"> 10% </option>
                                        <option value="0.07"> 7% </option>
                                    </select>
                                    @error('pourcentage_tva')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-end btn-page mb-0 mt-4 col-md-6">
                                    <button type="submit" class="btn btn-primary">Ajouter l'Article</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="/achats/end_articale" method="POST">
                        @csrf
                        <div class="row">
                            <div class="text-end btn-page mb-0 mt-4 col-md-6">
                                <button type="submit" class="btn btn-block btn-success">Finnire La Facture</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    
@endsection
