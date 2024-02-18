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
                        <li class="breadcrumb-item" aria-current="page">Mettre a Jour </li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Mettre a Joure Le Produit N° {{ $produit->id }}</h2>
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
                    <form action="/produits/update/{{ $produit->id }}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Categorie</label>
                                    <select name="categorie_id" class="form-select">
                                        <option> Selectioner Une Categorie </option>
                                        @foreach ($categories as $categorie)
                                            <option value="{{ $categorie->id }}"> {{ $categorie->nom_categorie }} </option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Nom De Produit</label>
                                    <input type="text" class="form-control" placeholder="Entrer La Date Facture"
                                        name="nom_produit" value="{{ $produit->nom_produit }}">
                                    @error('nom_produit')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea 
                                        class="form-control" 
                                        id="exampleFormControlTextarea1" 
                                        rows="3"
                                        name="description"

                                    >
                                        {{ $produit->description }}
                                    </textarea>
                                    
                                    @error('description')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                {{-- create the upload image here --}}

                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Mettre a Jour </button>
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