@extends('layout/home_layout')
@section('home_section')
    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <h4 class="text-center f-w-500 mb-3">Créez votre compte utilisateur</h4>

                        <form action="/users/new_manager" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="nom" placeholder="Nom du Gérant"
                                            value="{{ $company["nom"] }}">
                                        @error('nom')
                                            <div class="error-message" id="bouncer-error_ date">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group mb-3">
                                        <input type="text" class="form-control" name="statu" placeholder="Statu"
                                            value="{{ $company["statu"] }}">
                                        @error('statu')
                                            <div class="error-message" id="bouncer-error_ date">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="nom_utilisateur" placeholder="Nom D'utilisateur"
                                    value="{{ old('nom_utilisateur') }}">
                                @error('nom_utilisateur')
                                    <div class="error-message" id="bouncer-error_ date">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="mote_de_pass" placeholder="Mote de Pass"
                                    value="{{ old('mote_de_pass') }}">
                                @error('mote_de_pass')
                                    <div class="error-message" id="bouncer-error_ date">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" class="form-control" name="mote_de_pass_confirmation" placeholder="Confirmer Le Mote de Pass"
                                    value="{{ old('mote_de_pass') }}">
                                @error('mote_de_pass')
                                    <div class="error-message" id="bouncer-error_ date">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">Créez</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
