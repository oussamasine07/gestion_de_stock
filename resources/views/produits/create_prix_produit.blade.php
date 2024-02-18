@extends('../layout/admin_layout')
@section('admin_section')

    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Produits</a></li>
                        <li class="breadcrumb-item" aria-current="page">Créer Le Prix De Produit</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Créer Le Prix De Produit</h2>
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
                    <form action="/produits/prix" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                {{-- 			marge_benificiaire	prix_de_vente	 --}}
                                <div class="form-group">
                                    <label class="form-label">Date de Livraison</label>
                                    <input type="text" class="form-control" placeholder="Entrer La Date Livraison"
                                        name="date_livraison" value="{{ old('date_livraison') }}">
                                    @error('date_livraison')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Prix d'achat</label>
                                    <input type="text" class="form-control" placeholder="Entrer Le Prix D'achat"
                                        name="prix_achat" value="{{ old('prix_achat') }}">
                                    @error('prix_achat')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">La Marge Benificiaire</label>
                                    <input type="text" class="form-control" placeholder="Entrer La Marge Benificiaire"
                                        name="marge_benificiaire" value="{{ old('marge_benificiaire') }}">
                                    @error('marge_benificiaire')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Cree le Prix et pass au Quantiteé</button>
                                </div>
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