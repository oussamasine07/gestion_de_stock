

<tr>
    <td >{{ $article->nom_article }}</td>
    <td >{{ $article->prix_unitaire }}</td>
    <td>{{ $article->quantite }}</td>
    <td>{{ $article->montant_total }}</td>
    <td>{{ $article->montant_tva }}</td>
    <td>{{ $article->montant_ttc }}</td>

    {{-- @if (session()->get("facture_details")) --}}
        <td class="text-center">
            <ul class="list-inline me-auto mb-0">
                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                    title="Edit">
                    <a href="/achats/edit_article/{{ $article->id }}"
                        class="avtar avtar-xs btn-link-success btn-pc-default">
                        <i class="ti ti-edit-circle f-18"></i>
                    </a>
                </li>
                <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                    title="Delete">
                    <form action="/achats/delete_article/{{ $article->id }}" method="POST"
                        class="avtar avtar-xs btn-link-danger btn-pc-default">
                        @method('DELETE')
                        @csrf
                        <button type="submit">
                            <i class="ti ti-trash f-18"></i>
                        </button>
                    </form>
                </li>
            </ul>
        </td>
    {{-- @endif --}}
    
</tr>