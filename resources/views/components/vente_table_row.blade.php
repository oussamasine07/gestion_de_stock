
<tr>

    <td class="text-center"> {{ $article->id }} </td>
    <td >{{ $article->numero_facture }}</td>
    <td class="text-center">{{ $article->client->nom_ou_raison_social }}</td>
    <td class="text-center">{{ $article->date_facture }}</td>
    <td class="text-center">{{ $article->montant_ttc }}</td>
    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Consulter La Facture">
                <a href="{{ route("ventes.show", $article->id) }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-eye f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Edit">
                <a href="{{ route("ventes.edit", $article->id) }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Delete">
                <form action="{{ route("ventes.destroy", $article->id) }}" method="POST"
                    class="avtar avtar-xs btn-link-danger btn-pc-default">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="ti ti-trash f-18"></i>
                    </button>
                </form>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="livrer cette facture">
                <a class="btn btn-primary btn-sm" href="/livraisons/create/{{ $article->id }}?etat_livraison=vente">
                    livrer
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="cree un reglement pour cette facture">
                <a class="btn btn-success btn-sm" href="/paiements/create/{{ $article->id }}?etat_paiement=vente">
                    Encaisser
                </a>
            </li>
        </ul>
    </td>
</tr>