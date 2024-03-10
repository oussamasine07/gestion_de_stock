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
                        <li class="breadcrumb-item" aria-current="page">Cree Une Nouvelle Livraison</li>
                        <li class="breadcrumb-item" aria-current="page">Ajoute Une Article</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Ajoute une Article au BL N° {{ $livraison->numero_bl }} </h2>
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
                    <form action="/livraisons/store_delivery_article/{{ $livraison->liverable_id }}?etat_livraison={{ $livraison->etat_livraison }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom D'article</label>
                                    <select name="nom_article" class="form-select">
                                        @foreach ($articles as $article)
                                            <option value="{{ $article->nom_article }}">{{ $article->nom_article }}</option>
                                        @endforeach
                                    </select>
                                    @error('nom_article')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- <div class="form-group">
                                    <label class="form-label">Prix Unitaire</label>
                                    <input type="text" class="form-control" placeholder="Enter Prix Unitaire"
                                        name="prix_unitaire" value="{{ old('prix_unitaire') }}">
                                    @error('prix_unitaire')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}

                                <div class="form-group">
                                    <label class="form-label">Quantité</label>
                                    <input type="text" class="form-control" placeholder="Enter La Quantité"
                                        name="quantite" value="{{ old('quantite') }}">
                                    @error('quantite')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Ajoute L'Article</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="/livraisons/end_articale" method="POST">
                        @csrf
                        <div class="row">
                            <div class="text-end btn-page mb-0 mt-4 col-md-6">
                                <button type="submit" class="btn btn-block btn-success">Finnire La Livraison</button>
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
