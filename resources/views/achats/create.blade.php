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
                        <li class="breadcrumb-item" aria-current="page">Cree Une Nouvelle Facture</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Cree Une Nouvelle Facture</h2>
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
                    
                    @if (count($fournisseurs) <= 0)
                        <div class="row">
                            <div class="col-md-6">
                                <p>vous n'avez pas encore de fournisseurs, veuillez en créer un nouveau ici</p>
                                <div>
                                    <a href="/fournisseurs/create?action=achat" class="btn btn-primary">Creer Un Nouveau Fournisseur</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <form action="{{ route("achats.store") }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Fournisseur</label>
                                        <select name="fournisseur_id" class="form-select">
                                            <option> Selectioner Un Fournisseur </option>
                                            @foreach ($fournisseurs as $fournisseur)
                                                <option value="{{ $fournisseur->id }}"> {{ $fournisseur->raison_social }} </option>
                                                <div>
                                                    <a href="/fournisseurs/create?action=achat" class="btn btn-primary">Creer Un Nouveau Fournisseur</a>
                                                </div> 
                                            @endforeach
                                        </select>
                                        @error('fournisseur_id')
                                            <div class="error-message" id="bouncer-error_ date">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Numero de Facture</label>
                                        <input type="text" name="numero_facture" value="{{ old('numero_facture') }}"
                                            class="form-control" placeholder="Enter Product Name">
                                        @error('numero_facture')
                                            <div class="error-message" id="bouncer-error_ date">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Libellé</label>
                                        <input type="text" class="form-control" placeholder="Enter Le Libellé de Facture"
                                            name="libelle" value="{{ old('libelle') }}">
                                        @error('libelle')
                                            <div class="error-message" id="bouncer-error_ date">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Date De Facture</label>
                                        <input type="text" class="form-control" placeholder="Entrer La Date Facture"
                                            name="date_facture" value="{{ old('date_facture') }}">
                                        @error('date_facture')
                                            <div class="error-message" id="bouncer-error_ date">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="text-end btn-page mb-0 mt-4">
                                        <button type="submit" class="btn btn-primary">Creer la Facture</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
@endsection
