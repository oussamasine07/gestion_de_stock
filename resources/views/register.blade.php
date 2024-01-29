@extends('layout/home_layout')
@section('home_section')

  <div class="auth-main">
    <div class="auth-wrapper v1">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <h4 class="text-center f-w-500 mb-3">Etes-vous une nouvelle entreprise, créez votre compte</h4>

            <form action="/company" method="POST">
              @csrf
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="raison_social" 
                  placeholder="Nom ou Raison Social"
                  value="{{ old('raison_social') }}"  
                >
                @error('raison_social')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="logo" 
                  placeholder="logo"
                  value="{{ old('logo') }}"  
                >
                @error('logo')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group mb-3">
                    <input 
                      type="email" 
                      class="form-control" 
                      name="email" 
                      placeholder="Email"
                      value="{{ old('email') }}"
                    >
                    @error('email')
                      <div class="error-message" id="bouncer-error_ date">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group mb-3">
                    <input 
                      type="text" 
                      class="form-control" 
                      name="telephone" 
                      placeholder="Telephone"
                      value="{{ old('telephone') }}"
                    >
                    @error('telephone')
                      <div class="error-message" id="bouncer-error_ date">
                        {{ $message }}
                      </div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="address" 
                  placeholder="Address"
                  value="{{ old('address') }}"  
                >
                @error('address')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="ice" 
                  placeholder="ICE"
                  value="{{ old('ice') }}"  
                >
                @error('ice')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="identifiant_fiscal" 
                  placeholder="Identifiant Fiscal"
                  value="{{ old('identifiant_fiscal') }}"  
                >
                @error('identifiant_fiscal')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="taxe_professionnelle" 
                  placeholder="Taxe Professionnelle"
                  value="{{ old('taxe_professionnelle') }}"  
                >
                @error('taxe_professionnelle')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="registre_commerce" 
                  placeholder="Registre De Commerce"
                  value="{{ old('registre_commerce') }}"  
                >
                @error('registre_commerce')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="cnss" 
                  placeholder="CNSS"
                  value="{{ old('cnss') }}"  
                >
                @error('cnss')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="gerant" 
                  placeholder="Nom et Prenom du Gérant"
                  value="{{ old('gerant') }}"  
                >
                @error('gerant')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Créez</button>
              </div>
            </form>

            <div class="d-flex justify-content-between align-items-end mt-4">
              <h6 class="f-w-500 mb-0">Avez vous déjà un compte</h6>
              <a href="/users/login" class="link-primary">Connectez-vous ici</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection