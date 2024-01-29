@extends('layout/home_layout')
@section('home_section')

  <div class="auth-main">
    <div class="auth-wrapper v1">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <h4 class="text-center f-w-500 mb-3"> Accéder au tableau de bord </h4>
            
            <form action="/users/authenticate" method="POST">
              @csrf
              <div class="form-group mb-3">
                <input 
                  type="text" 
                  class="form-control" 
                  name="nom_utilisateur" 
                  placeholder="Nom D'utilisateur"
                  value="{{ old('nom_utilisateur') }}"
                >
                @error('nom_utilisateur')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              <div class="form-group mb-3">
                <input 
                  type="password" 
                  class="form-control" 
                  name="mote_de_pass" 
                  placeholder="Mote de Pass"
                >
                @error('mote_de_pass')
                  <div class="error-message" id="bouncer-error_ date">
                    {{ $message }}
                  </div>
                @enderror
              </div>
              
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Accéder</button>
              </div>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection