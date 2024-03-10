
<tr class="odd">
    @if ($etatpaiement == "achats")
        <td class="sorting_1">
            <a href="/paiements?entres={{ $entres }}&filtrer={{ $filtrer }}&etat_paiement={{ $etatpaiement }}&fournisseur={{ $etatPaiement->raison_social }}">
                {{ $etatPaiement->raison_social }}
            </a>
        </td>         
    @else
        <td class="sorting_1">
            <a href="/paiements?entres={{ $entres }}&filtrer={{ $filtrer }}&etat_paiement={{ $etatpaiement }}&client={{ $etatPaiement->nom_ou_raison_social }}">
                {{ $etatPaiement->nom_ou_raison_social }}
            </a>
        </td> 
    @endif
    
    <td class="sorting_1">
        <a href="/paiements/detail_de_paiement/{{ $etatPaiement->id }}?etat_paiment={{ $etatpaiement }}">
            {{ $etatPaiement->numero_facture }}
        </a>
    </td>
    <td>{{ $etatPaiement->date_facture }}</td>
    <td>{{ $etatPaiement->total_facture }}</td>
    <td>{{ $etatPaiement->montant_regle }}</td>
    <td>{{ $etatPaiement->rest_regle }}</td>
    <td>{{ $etatPaiement->etat_reglement }}</td>

    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Voire le details">
                <a href="/paiements/detail_de_paiement/{{ $etatPaiement->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-eye f-18"></i>
                </a>
            </li>
            @if ($etatPaiement->rest_regle > 0)
                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Régler Cette Facture">
                    <a href="/paiements/create/{{ $etatPaiement->id }}" class="btn btn-primary btn-sm">
                        Regler
                    </a>
                </li>
            @endif
        </ul>
    </td>
</tr>