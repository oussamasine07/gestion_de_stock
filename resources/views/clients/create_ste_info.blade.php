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
                        <li class="breadcrumb-item" aria-current="page">Nouveau Client</li>
                        <li class="breadcrumb-item" aria-current="page">Info Client</li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <div class="page-header-title">
                        <h2 class="mb-0">Info Client: <span class="uppercase"> {{ $nom }} </span></h2>
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
                    <form action="{{ route("clients.storeSteInfo") }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Identifient Fiscal</label>
                                    <input type="text" name="identifiant_fiscal"
                                        value="{{ old('identifiant_fiscal') }}" class="form-control"
                                        placeholder="Enter Le Identifient Fiscal">
                                    @error('identifiant_fiscal')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Taxe Professionnelle</label>
                                    <input type="text" class="form-control" placeholder="Enter Taxe Professionnelle"
                                        name="tax_professionnelle" value="{{ old('tax_professionnelle') }}">
                                    @error('tax_professionnelle')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">ICE</label>
                                    <input type="text" class="form-control" placeholder="Entrer l'ICE de Client"
                                        name="ice" value="{{ old('ice') }}">
                                    @error('ice')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Registre de Commerce</label>
                                    <input type="text" class="form-control" placeholder="Entrer la Registre de Commerce de Client"
                                        name="registre_commerce" value="{{ old('registre_commerce') }}">
                                    @error('registre_commerce')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label class="form-label">CNSS</label>
                                    <input type="text" class="form-control" placeholder="Entrer la CNSS de Client"
                                        name="cnss" value="{{ old('cnss') }}">
                                    @error('cnss')
                                        <div class="error-message" id="bouncer-error_ date">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="text-end btn-page mb-0 mt-4">
                                    <button type="submit" class="btn btn-primary">Eregistrer Les Informations</button>
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
