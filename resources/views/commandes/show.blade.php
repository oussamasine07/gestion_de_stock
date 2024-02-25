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
                        <li class="breadcrumb-item" aria-current="page">List des Commandes</li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)"> Commande N° <span class="uppercase">{{ $commande->code_commande }}</span> </a></li>
                    </ul>
                </div>
                <div class="col-md-12 py-2">
                    <div class="page-header-title">
                        <h2 class="mb-0"> Commande N° <span class="uppercase">{{ $commande->code_commande }}</span></h2>
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
            <div class="card table-card">
                <div class="card-body">
                    <div class="text-end p-4 pb-0">
                        <a href="/commandes" class="btn btn-primary">
                            <i class="ti ti-plus f-18"></i> Back
                        </a>
                        <a href="/commandes/create_commande_produit/{{ $commande->id }}" class="btn btn-success">
                            <i class="ti ti-plus f-18"></i> Ajouter Une Article
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th class="text-center">Prix Unitaire</th>
                                    <th class="text-center">Quantité</th>
                                    <th class="text-center">Montant total</th>
                                    <th class="text-center">Montant TVA</th>
                                    <th class="text-center">Montant TTC</th>
                                    <th class="text-center">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <x-produits_commande_table_row :article=$article />
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->


    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <form action="/ventes" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="commande_id" value="{{ $commande->id }}"
                                        class="form-control" placeholder="Enter le Code De Commande" hidden>
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Numero de Facture</label>
                                    <input type="text" name="numero_facture" value="{{ old('numero_facture') }}"
                                        class="form-control" placeholder="Enter le Code De Commande">
                                    @error('numero_facture')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">Date de Facture</label>
                                    <input type="text" name="date_facture" value="{{ old('date_facture') }}"
                                        class="form-control" placeholder="Enter le Code De Commande">
                                    @error('date_facture')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-warning">créer une facture pour cette commande</button>
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
