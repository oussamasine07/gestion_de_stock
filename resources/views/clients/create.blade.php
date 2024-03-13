@extends('../layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Clients</a></li>
                        <li class="breadcrumb-item" aria-current="page">Nouvean Client</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Nouvean Client</h2>
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
                    <form action="{{ route("clients.store") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nom ou Raison Social Du Client</label>
                                    <input 
                                        type="text" 
                                        name="nom_ou_raison_social" 
                                        value="{{ old('nom_ou_raison_social') }}" 
                                        class="form-control" 
                                        placeholder="Enter Le Nom ou Raison Social Du Client"
                                    >
                                    @error('nom_ou_raison_social')
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
                                        placeholder="Entrer la Ville de Client"
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
                                    <label class="form-label">Code Postal</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        placeholder="Entrer la code Postal de Client"
                                        name="code_postal"
                                        value="{{ old('code_postal') }}"
                                    >
                                    @error('code_postal')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Statu Social</label>
                                    <select name="statu_social" class="form-select">
                                        <option value="ste"> Societe </option>
                                        <option value="pp"> Personne Physique </option>  
                                    </select>
                                    @error('statu_social')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Ajouter le Client</button>
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
