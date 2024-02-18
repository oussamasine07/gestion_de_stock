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
                        <li class="breadcrumb-item" aria-current="page">List des Produits</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">List des Produits</h2>
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
            <a href="/produits/create" class="btn btn-primary">
              <i class="ti ti-plus f-18"></i> Ajoute Un Produit
            </a>
          </div>
          <div class="table-responsive">
            <table class="table table-hover" id="pc-dt-simple">
              <thead>
                <tr>
                  <th class="text-center">#</th>
                  <th>Produit</th>
                  <th>Categorie</th>
                  <th class="text-center">Quantité</th>
                  <th class="text-center">Status</th>
                  <th class="text-center">Details</th>
                </tr>
              </thead>
              <tbody>
                
                @foreach ($produits as $produit)
                  <x-produit_table_row :produit=$produit />
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