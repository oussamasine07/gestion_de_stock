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
                    <form action="{{ route("produits.storeQuantite") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label class="form-label">Stock</label>
                                    <select name="stock_id" class="form-select">
                                        <option> Selectioner Un Stock </option>
                                        @foreach ($stocks as $stock)
                                            <option value="{{ $stock->id }}"> {{ $stock->nom }} </option>
                                        @endforeach
                                    </select>
                                    @error('stock_id')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Quantité</label>
                                    <input type="text" class="form-control" placeholder="Entrer La Marge Benificiaire"
                                        name="quantite" value="{{ old('quantite') }}">
                                    @error('quantite')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Ajoute La Quantite De Produit</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <form action="/produits/end" method="POST">
                        @csrf
                        <div class="row">
                            <div class="text-end btn-page mb-0 mt-4 col-md-6">
                                <button type="submit" class="btn btn-block btn-success">Fin d'ajoute</button>
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