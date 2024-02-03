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
                        {{-- <li class="breadcrumb-item" aria-current="page">Etat de Paiement Achats</li> --}}
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Etat de Paiement Achats</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->

    <!-- [ Main Content ] start -->
    <div class="row">
        <!-- DOM/Jquery table start -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive dt-responsive">
                        <div id="dom-jqry_wrapper" class="dataTables_wrapper dt-bootstrap5">
                            <div class="row">
                                <div class="col-sm-12 col-md-4">
                                    <div class="dataTables_length" id="dom-jqry_length">
                                        <label>
                                            Show entries
                                            <select name="dom-jqry_length" aria-controls="dom-jqry" class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div class="dataTables_length" id="dom-jqry_length">
                                        <label>
                                            filters :
                                            <select name="dom-jqry_length" aria-controls="dom-jqry" class="form-select form-select-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select> 
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4">
                                    <div id="dom-jqry_filter" class="dataTables_filter">
                                        <label>
                                            Search: <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dom-jqry">
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row dt-row">
                                <div class="col-sm-12">
                                    <table id="dom-jqry" class="table table-striped table-bordered nowrap dataTable"
                                        aria-describedby="dom-jqry_info">
                                        <thead>
                                            <tr>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Numero de Facture</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Date de Facture</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Total Facture</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Montant Regle</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Rest A Regle</th>
                                                <th class="sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Etat de Reglement</th>
                                                <th class="text-center sorting sorting_asc" tabindex="0" aria-controls="dom-jqry" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 196.219px;">Details</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            @foreach ($etatPaiements as $etatPaiement)
                                                <x-etat_paiement_table_row :etatPaiement=$etatPaiement />
                                            @endforeach
                                            
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th rowspan="1" colspan="1">Numero de Facture</th>
                                                <th rowspan="1" colspan="1">date de facture</th>
                                                <th rowspan="1" colspan="1">Total Facture</th>
                                                <th rowspan="1" colspan="1">Montant Regle</th>
                                                <th rowspan="1" colspan="1">Rest A Regle</th>
                                                <th rowspan="1" colspan="1">Etat de Reglement</th>
                                                <th rowspan="1" colspan="1" class="text-center">Details</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="dom-jqry_info" role="status" aria-live="polite">
                                        Showing 1 to 10 of 20 entries</div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="dom-jqry_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled"
                                                id="dom-jqry_previous"><a href="#" aria-controls="dom-jqry"
                                                    data-dt-idx="previous" tabindex="0" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active"><a href="#"
                                                    aria-controls="dom-jqry" data-dt-idx="0" tabindex="0"
                                                    class="page-link">1</a></li>
                                            <li class="paginate_button page-item "><a href="#"
                                                    aria-controls="dom-jqry" data-dt-idx="1" tabindex="0"
                                                    class="page-link">2</a></li>
                                            <li class="paginate_button page-item next" id="dom-jqry_next"><a
                                                    href="#" aria-controls="dom-jqry" data-dt-idx="next"
                                                    tabindex="0" class="page-link">Next</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
