@extends('../layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Commandes</a></li>
                        <li class="breadcrumb-item" aria-current="page">Mettre a Joure Une Commade</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Mettre a Joure La Commande N° : {{ $commande->code_commande }}</h2>
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
                    <form action="/commandes/update/{{ $commande->id }}" method="POST">
                        @method("PUT")
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Client</label>
                                    <select name="client_id" class="form-select">
                                        <option> Selectioner Un Client </option>
                                        @foreach ($clients as $client)
                                            <option value="{{ $client->id }}"> {{ $client->nom_ou_raison_social }} </option>
                                            <div>
                                                <a href="/clients/create?action=achat" class="btn btn-primary">Creer Un Nouveau client</a>
                                            </div> 
                                        @endforeach
                                    </select>
                                    @error('client_id')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Numero de commande</label>
                                    <input type="text" name="code_commande" value="{{ $commande->code_commande }}"
                                        class="form-control" placeholder="Enter le Code De Commande">
                                    @error('code_commande')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Date De Commande</label>
                                    <input type="text" class="form-control" placeholder="Enter La Date De Commande"
                                        name="date_commande" value="{{ $commande->date_commande }}">
                                    @error('date_commande')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Mettre a Jour la Commande</button>
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
