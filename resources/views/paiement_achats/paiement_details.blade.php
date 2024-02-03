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
                        <li class="breadcrumb-item" aria-current="page">Détails De Reglement</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Détails De Reglement: Facture N° {{ $achat->numero_facture }} </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- DOM/Jquery table start -->
        @if (count($paiements) == 0)
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive dt-responsive">
                            <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row dt-row">
                                    <div class="col-sm-12">
                                        <div>
                                            <p>vous n'avez pas encore payé cette facture, cliquez sur le bouton pour en faire une</p>
                                            <a class="btn btn-block btn-primary mb-5" href="/paiement_achats/create/{{ $achat->id }}">
                                                Effectuer Un Reglement
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive dt-responsive">
                            <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                                <div class="row dt-row">
                                    <div class="col-sm-12">
                                        <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable" aria-describedby="dom-jqry_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Date De Reglement</th>

                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Montant Regle</th>

                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Mode De Regelement</th>

                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Libelle De Reglement</th>
                                                    
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Observation</th>
                                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                
                                                @foreach ($paiements as $paiement)
                                                    <x-paiement_details_table_row :paiement=$paiement />
                                                @endforeach
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Date De Reglement</th>
                                                    <th rowspan="1" colspan="1">Montant Regle</th>
                                                    <th rowspan="1" colspan="1">Mode De Regelement</th>
                                                    <th rowspan="1" colspan="1">Libelle De Reglement</th>
                                                    <th rowspan="1" colspan="1">Observation</th>
                                                </tr>
                                            </tfoot>
                                        </table> 
                                    </div>
                                </div>
                                <div class="row mb-4 mt-4 text-center">
                                    <div class="col-sm-12 col-md-12">
                                        @if ($etatRegement->rest_regle > 0)
                                            <p>vous avez encore des dettes sur cette facture, effectuez un paiement</p>
                                            <a href="/paiement_achats/create/{{ $achat->id }}" class="btn btn-block btn-primary">Effectuer Un Regelement</a>
                                        @else
                                            <p>cette facture est totalement payée</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
