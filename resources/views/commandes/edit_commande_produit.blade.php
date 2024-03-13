@extends('../layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Commandes</a></li>
                        <li class="breadcrumb-item" aria-current="page">Ajoute des Produits</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Commade {{ $article->commande->code_commande }} : Produits ID {{ $article->id }} </h2>
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
                    <form action="{{ route("commandes.searchProduit", $article->commande->id) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Produits</label>
                                    <select name="produit" class="form-select">
                                        <option> Selectioner Un Produit </option>
                                        @foreach ($produits as $produit)
                                            <option value="{{ $produit->id }}"> {{ $produit->nom_produit }} </option>
                                        @endforeach
                                    </select>
                                    @error('produit')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">trouver ce produit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form action="{{ route("commandes.updateCommandeProduit", $article->id) }}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom Article</label>
                                    <input 
                                        type="text" 
                                        name="produit_id"
                                        @if ($produit_article)
                                            value="{{ $produit_article->id }}" 
                                        @else
                                            value=""
                                        @endif 
                                        hidden
                                    >
                                    <input 
                                        type="text" 
                                        @if ($produit_article)
                                            value="{{ $produit_article->nom_produit }}" 
                                        @else
                                            value=""
                                        @endif 
                                        class="form-control" 
                                        placeholder="Enter Nom Article"
                                    >
                                    @error('produit_id')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Prix Unitaire</label>
                                    <select name="prix_unitaire" class="form-select">
                                        <option> Selectioner Un Prix </option>
                                        @if ($prixes)
                                            @foreach ($prixes as $prix)
                                                <option value="{{ $prix->prix_de_vente }}"> {{ $prix->prix_de_vente }} </option>
                                            @endforeach 
                                        @endif
                                    </select>
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
                                    <button type="submit" class="btn btn-primary">mettre a jour l'Article</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action=" {{ route("commandes.endArticle") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="text-end btn-page mb-0 mt-4 col-md-6">
                                <button type="submit" class="btn btn-block btn-success">Finnire La Commande</button>
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
