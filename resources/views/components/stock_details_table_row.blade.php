
@php
    print_r($stock->produitStock);
@endphp
<tr>
    <td class="text-center"> {{ $stock->produit_id }} </td>
    <td >{{ $stock->produit->nom_produit }}</td>
    <td class="text-center">{{ $stock->quantite }}</td>
    <td> {{ $stock->produit->prixes->prix_achat }} </td>
    <td > {{ $stock->produit->prixes->prix_de_vente }} </td>
    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Show">
                <a href="{{ route("produits.show", $stock->produit->id) }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-eye f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Edit">
                <a href="{{ route("produits.edit", $stock->produit->id) }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Delete">
                <form action="{{ route("produits.destroy", $stock->produit->id) }}" method="POST"
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