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
                        <li class="breadcrumb-item" aria-current="page">Cree Une Nouvelle Commade</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Cree Une Nouvelle Commade</h2>
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
                    @if (count($clients) <= 0)
                        <div class="row">
                            <div class="col-md-6">
                                <p>vous n'avez pas encore de clients, veuillez en créer un nouveau ici</p>
                                <div>
                                    <a href="/clients/create?action=commande" class="btn btn-primary">Creer Un Nouveau Client</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <form action="/commandes" method="POST">
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
                                        <input type="text" name="code_commande" value="{{ old('code_commande') }}"
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
                                            name="date_commande" value="{{ old('date_commande') }}">
                                        @error('date_commande')
                                            <div class="error-message" id="bouncer-error_ date">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="text-end btn-page mb-0 mt-4">
                                        <button type="submit" class="btn btn-primary">Creer la Commande</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
@endsection
