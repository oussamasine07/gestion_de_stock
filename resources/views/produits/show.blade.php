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
                        <li class="breadcrumb-item" aria-current="page">Produit N°: </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Produit N°: </h2>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="sticky-md-top product-sticky">
                                <div id="carouselExampleCaptions" class="carousel slide ecomm-prod-slider"
                                    data-bs-ride="carousel">
                                    <div class="carousel-inner bg-light rounded position-relative">
                                        <div class="card-body position-absolute end-0 top-0">
                                            <div class="form-check prod-likes">
                                                <input type="checkbox" class="form-check-input" />
                                                <i data-feather="heart" class="prod-likes-icon"></i>
                                            </div>
                                        </div>
                                        <div class="card-body position-absolute bottom-0 end-0">
                                            <ul class="list-inline ms-auto mb-0 prod-likes">
                                                <li class="list-inline-item m-0">
                                                    <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                                        <i class="ti ti-zoom-in f-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item m-0">
                                                    <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                                        <i class="ti ti-zoom-out f-18"></i>
                                                    </a>
                                                </li>
                                                <li class="list-inline-item m-0">
                                                    <a href="#" class="avtar avtar-xs text-white text-hover-primary">
                                                        <i class="ti ti-rotate-clockwise f-18"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="carousel-item active">
                                            <img src="{{ asset('images/application/img-prod-1.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/application/img-prod-2.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/application/img-prod-3.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/application/img-prod-4.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/application/img-prod-5.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/application/img-prod-6.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/application/img-prod-7.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                        <div class="carousel-item">
                                            <img src="{{ asset('images/application/img-prod-8.jpg') }}"
                                                class="d-block w-100" alt="Product images" />
                                        </div>
                                    </div>
                                    <ol
                                        class="carousel-indicators position-relative product-carousel-indicators my-sm-3 mx-0">
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                                            class="w-25 h-auto active">
                                            <img src="{{ asset('images/application/img-prod-1.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                                            class="w-25 h-auto">
                                            <img src="{{ asset('images/application/img-prod-2.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                                            class="w-25 h-auto">
                                            <img src="{{ asset('images/application/img-prod-3.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                                            class="w-25 h-auto">
                                            <img src="{{ asset('images/application/img-prod-4.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4"
                                            class="w-25 h-auto">
                                            <img src="{{ asset('images/application/img-prod-5.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="5"
                                            class="w-25 h-auto">
                                            <img src="{{ asset('images/application/img-prod-6.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="6"
                                            class="w-25 h-auto">
                                            <img src="{{ asset('images/application/img-prod-7.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                        <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="7"
                                            class="w-25 h-auto">
                                            <img src="{{ asset('images/application/img-prod-8.jpg') }}"
                                                class="d-block wid-50 rounded" alt="Product images" />
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="badge bg-success f-14">In stock</span>
                            <h5 class="my-3 capitalize">{{ $produit->nom_produit }}</h5>
                            
                            <h5 class="my-3 capitalize">Categorie: {{ $produit->categorie->nom_categorie }}</h5>

                            <h5 class="mt-4 mb-3 f-w-500">à propos de ce produit</h5>
                            <div> {{ $produit->description }} </div>
                            <h5 class="mt-4 mb-3 f-w-500">Quantité totale dans tous les stocks: 25</h5>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header pb-0">
                    <ul class="nav nav-tabs profile-tabs mb-0" id="myTab" role="tablist">
                        <li class="nav-item active">
                            <a class="nav-link capitalize" id="ecomtab-tab-2" data-bs-toggle="tab" href="#ecomtab-2"
                                role="tab" aria-controls="ecomtab-2" aria-selected="true">plus de détails
                            </a>
                        </li>
                    </ul>
                </div>
                
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="ecomtab-2" role="tabpanel" aria-labelledby="ecomtab-tab-2">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h5>Etat Des Stocks</h5>
                                        </div>
                                        <div class="col-md-6">
                                            <form action="{{ route("produits.addStockQuantite", $produit->id) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-primary btn-sm">ajoute un stock</button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <hr class="my-3" />
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td class="text-muted py-1">Stock</td>
                                                    <td class="py-1 text-center">Quantité</td>
                                                    <td class="py-1 text-center">Details</td>
                                                </tr>
                                            </thead>

                                            <tbody>

                                                @foreach ($stocks as $item)
                                                    <tr>
                                                        <td class="text-muted py-1">{{ $item->stock->nom }} :</td>
                                                        <td class="py-1 text-center">{{ $item->quantite }}</td>
                                                        <td class="text-center">
                                                            <ul class="list-inline me-auto mb-0">
                                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                                    title="Edit">
                                                                    <a href="{{ route("produits.editQuantite", $item->stock_id) }}"
                                                                        class="avtar avtar-xs btn-link-success btn-pc-default">
                                                                        <i class="ti ti-edit-circle f-18"></i>
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                                    title="Delete">
                                                                    <form action="{{ route("produits.destroyQnantite", $item->stock_id) }}" method="POST"
                                                                        class="avtar avtar-xs btn-link-danger btn-pc-default">
                                                                        @method('DELETE')
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                                            <i class="ti ti-trash f-18"></i>
                                                                        </button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr> 
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <h5>Etat Des Prix</h5>
                                    <hr class="my-3" />
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <td class="text-muted py-1">#</td>
                                                    <td class="py-1">Date Livraison</td>
                                                    <td class="py-1 text-center">Prix D'achat</td>
                                                    <td class="py-1 text-center">La Marge Benificiaire</td>
                                                    <td class="py-1 text-center">Prix De Vente</td>
                                                    <td class="py-1 text-center">Details</td>
                                                </tr> 
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-muted py-1">{{ $prix->id }}</td>
                                                    <td class="py-1">{{ $prix->date_livraison }}</td>
                                                    <td class="py-1 text-center">{{ $prix->prix_achat }}</td>
                                                    <td class="py-1 text-center">{{ $prix->marge_benificiaire * 100 }}%</td>
                                                    <td class="py-1 text-center">{{ $prix->prix_de_vente }}</td>
                                                    <td class="text-center">
                                                        <ul class="list-inline me-auto mb-0">
                                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                                title="Edit">
                                                                <a href="{{ route("produits.editPrix", $prix->id) }}"
                                                                    class="avtar avtar-xs btn-link-success btn-pc-default">
                                                                    <i class="ti ti-edit-circle f-18"></i>
                                                                </a>
                                                            </li>
                                                            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                                                                title="Delete">
                                                                <form action="/produits/prix/delete/{{ $prix->id }}" method="POST"
                                                                    class="avtar avtar-xs btn-link-danger btn-pc-default">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                                        <i class="ti ti-trash f-18"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                </div>
            </div>

            
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
@endsection
