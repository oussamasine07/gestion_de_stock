
<tr>
    <td class="text-center"> {{ $commande->id }} </td>
    <td class="text-center">{{ $commande->client->nom_ou_raison_social }}</td>
    <td class="text-center">{{ $commande->code_commande }}</td>
    <td class="text-center">{{ $commande->date_commande }}</td>
    <td class="text-center">{{ $commande->montant_total_ttc }}</td>
    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Show">
                <a href="/commandes/show/{{ $commande->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-eye f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Edit">
                <a href="/commandes/edit/{{ $commande->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Delete">
                <form action="/commandes/delete/{{ $commande->id }}" method="POST"
                    class="avtar avtar-xs btn-link-danger btn-pc-default">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="ti ti-trash f-18"></i>
                    </button>
                </form>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="cree un livraison pour cette facture">
                <a class="btn btn-primary btn-sm" href="/livraisons/create/{{ $commande->id }}">
                    cree un facture
                </a>
            </li>
        </ul>
    </td>
</tr>