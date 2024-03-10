@extends('../layout/admin_layout')
@section('admin_section')
    <!-- [ breadcrumb ] start -->
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../navigation/index.html">Acceil</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Ventes</a></li>
                        <li class="breadcrumb-item" aria-current="page">List des Ventes</li>
                        <li class="breadcrumb-item"><a href="javascript: void(0)">Facture Vente </a></li>
                    </ul>
                </div>
                <div class="col-md-12 py-2">
                    <div class="page-header-title">
                        <h2 class="mb-0">
                            Facture Vente N° 
                            <span class="uppercase"> 
                                {{ $vente->numero_facture }} 
                            </span>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ breadcrumb ] end -->
    
    <div class="page_container">
        <div class="page">
            <div class="logo-wrapper">
                <div class="logo">
                    <h1>LOGO</h1>
                </div>
            </div>

            <div class="client-wrapper left mb-4">
                <div class="client-details">
                    <div class="client-row">
                        <div class="column-side">Client</div>
                        <span class="colune-sm">:</span>
                        <div class="column-main uppercase">
                            {{ $client->nom_ou_raison_social }}
                        </div>
                    </div>
                    <div class="client-row">
                        <div class="column-side">Address</div>
                        <span class="colune-sm">:</span>
                        <div class="column-main">
                            {{ $client->address }}
                        </div>
                    </div>
                    <div class="client-row">
                        <div class="column-side">Ville</div>
                        <span class="colune-sm">:</span>
                        <div class="column-main">
                            {{ $client->ville }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="client-wrapper mb-2">
                <div class="client-details">
                    <div class="client-row">
                        <div class="column-side">Facture</div>
                        <span class="colune-sm">:</span>
                        <div class="column-main uppercase">
                            {{ $vente->numero_facture }}
                        </div>
                    </div>
                    <div class="client-row">
                        <div class="column-side">Date</div>
                        <span class="colune-sm">:</span>
                        <div class="column-main ">
                            {{ $vente->date_facture }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="invoice-table-wrapper mb-2">
                <table class="invoice-table">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="table-col-main">Libelle</th>
                            <th class="text-center">Prix</th>
                            <th class="text-center table-col-sm">Qté</th>
                            <th class="text-center table-col-sm">Total HT</th>
                            <th class="text-center">TVA</th>
                            <th class="text-center">TTC</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                            <tr>
                                <td class="center">{{ $article->id }}</td>
                                <td class="table-col-main">{{ $article->nom_article }}</td>
                                <td class="right">{{ $article->prix_unitaire }}</td>
                                <td class="text-center table-col-sm">{{ $article->quantite }}</td>
                                <td class="right table-col-sm">{{ $article->montant_total }}</td>
                                <td class="right">{{ $article->montant_tva }}</td>
                                <td class="right">{{ $article->montant_ttc }}</td>
                            </tr>
                        @endforeach
                        {{-- we need at least 10 lines --}}
                    </tbody>
                </table>
            </div>

            <div class="invoice-totals">
                <div class="payment-details">
                    Arrête la présente facture à la somme de:
                    <br>
                    <span>
                        neuf mille trois cent onze dh.
                    </span>
                    <br>
                    Mode de paiement: <span class="uppercase">cheque N° 5600001</span>
                </div>
                <div class="totals">
                    <table>
                        <thead>
                            <tr>
                                <th>Total H.T</th>
                                <th>Taux</th>
                                <th>TVA</th>
                                <th>TTC</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sums as $sum)
                                <tr>
                                    <td>{{ $sum->ht }}</td>
                                    <td>{{ $sum->pourcentage_tva * 100 }}%</td>
                                    <td>{{ $sum->tva }}</td>
                                    <td>{{ $sum->ttc }}</td>
                                </tr>
                            @endforeach
                            <tr class="total-row">
                                <td colspan="3">Total TTC</td>
                                <td>{{ $total }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="invoice-footer">
                <div class="line"></div>
                <p>
                    210, BD Abdelmouman, Residence les jardins Abdelmoumen Group 12, Bureau 14 casablanca
                    <br>Tel/Fax: 06.28.03.90.19 | sineoussama@gmail.com
                    <br>ICE: 001240002658932. | IF: 458796. | TP: 456321. | CNSS: 45879456. | RC: 4568.
                </p>
            </div>
        </div>
    </div>
    
@endsection
