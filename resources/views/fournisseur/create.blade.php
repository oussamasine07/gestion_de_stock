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
                        <li class="breadcrumb-item" aria-current="page">Nouveau Fournisseur</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Nouveau Fournisseur</h2>
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
                    <form action="{{ route("fournisseurs.store") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom ou Raison Social</label>
                                    <input 
                                        type="text" 
                                        name="raison_social" 
                                        value="{{ old('raison_social') }}" 
                                        class="form-control" 
                                        placeholder="Enter Product Name"
                                    >
                                    @error('raison_social')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Telephone</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Enter Product telephone"
                                        name="telephone"
                                        value="{{ old('telephone') }}"
                                    >
                                    @error('telephone')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input 
                                        type="email" 
                                        class="form-control" 
                                        placeholder="Entrer l'Email de fournisseur"
                                        name="email"
                                        value="{{ old('email') }}"
                                    >
                                    @error('email')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label" for="exampleFormControlTextarea1">Address</label>
                                    <textarea 
                                        class="form-control" 
                                        id="exampleFormControlTextarea1" 
                                        rows="3"
                                        name="address"

                                    >
                                    {{ old('address') }}
                                    </textarea>
                                    @error('address')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Ville</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Entrer la Ville de fournisseur"
                                        name="ville"
                                        value="{{ old('ville') }}"
                                    >
                                    @error('ville')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <p><span class="text-danger">*</span> Recommended resolution is 640*640 with file size</p>
                                    <label class="btn btn-outline-secondary" for="flupld"><i class="ti ti-upload me-2"></i>telechager Logo de fournisseur</label>
                                    <input 
                                        type="file" 
                                        id="flupld" 
                                        class="d-none"
                                        name="logo"
                                    >
                                </div>
    
                            </div>
    
                            <div class="col-md-6">
                                
                                <div class="form-group">
                                    <label class="form-label">ICE</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Entrer l'ICE de fournisseur"
                                        name="ice"
                                        value="{{ old('ice') }}"
                                    >
                                    @error('ice')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Identifian Fiscal</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Entrer Identifian Fiscal de fournisseur"
                                        name="identifiant_fiscal"
                                        value="{{ old('identifiant_fiscal') }}"
                                    >
                                    @error('identifiant_fiscal')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Taxe Professionnelle</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Entrer Taxe Professionnelle de fournisseur"
                                        name="taxe_professionnelle"
                                        value="{{ old('taxe_professionnelle') }}"
                                    >
                                    @error('taxe_professionnelle')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Registre de Commerce</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Entrer Registre de Commerce de fournisseur"
                                        name="registre_commerce"
                                        value="{{ old('registre_commerce') }}"
                                    >
                                    @error('registre_commerce')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label class="form-label">CNSS</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Entrer la CNSS de fournisseur"
                                        name="cnss"
                                        value="{{ old('cnss') }}"
                                    >
                                    @error('cnss')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                
                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Ajouter le Fournisseur</button>
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