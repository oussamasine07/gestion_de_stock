
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
                <a href="{{ route("commandes.show", $commande->id) }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-eye f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Edit">
                <a href="{{ route("commandes.edit", $commande->id) }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Delete">
                <form action="{{ route("commandes.destroy", $commande->id) }}" method="POST"
                    class="avtar avtar-xs btn-link-danger btn-pc-default">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="ti ti-trash f-18"></i>
                    </button>
                </form>
            </li>
        </ul>
    </td>
</tr>