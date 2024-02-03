@extends('../layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Paiement Achats</a></li>
                        <li class="breadcrumb-item" aria-current="page">Effectuer Un Reglement</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Effectuer Un Reglement: Facture N° {{ $achat->numero_facture }} </h2>
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
                    
                    <form action="/paiement_achats/pay/{{ $achat->id }}" method="POST">
                        @csrf 
                        <div class="row">
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label class="form-label">Date De Regelement</label>
                                    <input type="text" class="form-control" placeholder="Entrer La Date Regelement"
                                        name="date_reglement" value="{{ old('date_reglement') }}">
                                    @error('date_reglement')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Montant Regle</label>
                                    <input type="text" class="form-control" placeholder="Entrer Le Montant Que Vous Souhaitez Payer"
                                        name="montant_regle" value="{{ old('montant_regle') }}">
                                    @error('montant_regle')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Mode De Regelement</label>
                                    <select name="mode_regelement" class="form-select">
                                        <option> Entrer Le Mode De Regelement</option>
                                        <option value="caisse"> Caisse </option>
                                        <option value="banque: virement"> Banque: Virement </option>
                                        <option value="banque: cheque"> Banque: Cheque </option>
                                        <option value="banque: lcn"> Banque: LCN </option>
                                    </select
                                    
                                    @error('mode_regelement')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Libelle De Reglement</label>
                                    <input type="text" class="form-control" placeholder="Entrer Libelle De Reglement"
                                        name="libelle_reglement" value="{{ old('libelle_reglement') }}">
                                    @error('libelle_reglement')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Observation</label>
                                    <input type="text" class="form-control" placeholder="Entrer Observation"
                                        name="observation" value="{{ old('observation') }}">

                                    @error('observation')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Regler</button>
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
