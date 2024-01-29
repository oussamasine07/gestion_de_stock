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
                        <li class="breadcrumb-item" aria-current="page">List des Achats</li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Facture Achat </a></li>
                    </ul>
                </div>
                <div class="col-md-12 py-2">
                    <div class="page-header-title">
                        @if (session()->exists("facture_details"))
                            <h2 class="mb-0">Mettre a Joure Les Articles de Fac N° {{ $achat->numero_facture }} </h2>
                        @else
                            <h2 class="mb-0">Facture Achat N° {{ $achat->numero_facture }} </h2>
                        @endif
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
                        <a href="/achats/create" class="btn btn-primary">
                            <i class="ti ti-plus f-18"></i> Ajouter Une Facture
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th>Article</th>
                                    <th>Prix Unitaire</th>
                                    <th>Quantité</th>
                                    <th>Montant total</th>
                                    <th class="text-center">Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <x-article_table_row :article=$article />
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
    
@endsection
