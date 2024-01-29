@extends('../layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Fournisseur</a></li>
                        <li class="breadcrumb-item" aria-current="page">List des Fournisseur</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">List des Fournisseur</h2>
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
                        <a href="/fournisseurs/create" class="btn btn-primary">
                            <i class="ti ti-plus f-18"></i> Ajouter un Fournisseur
                        </a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="pc-dt-simple">
                            <thead>
                                <tr>
                                    <th class="text-end">#</th>
                                    <th>Fournisseur</th>
                                    <th class="text-end">Telephone</th>
                                    <th class="text-end">Email</th>
                                    <th>Address</th>
                                    <th class="text-center">ICE</th>
                                    <th class="text-center">I.F</th>
                                    <th class="text-center">T.P</th>
                                    <th class="text-center">CNSS</th>
                                    <th class="text-center">RC</th>
                                    <th class="text-center">Modifier</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($fournisseurs as $fournisseur)
                                    <x-fournisseur_table_row :fournisseur=$fournisseur />
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
