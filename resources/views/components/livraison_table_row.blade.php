
<tr>
    <td class="text-center"> {{ $livraison->id }} </td>
    <td >{{ $livraison->numero_bl }}</td>
    {{-- <td >{{ $livraison->libelle }}</td> --}}
    <td>{{ $livraison->date_arrive_bl }}</td>
    <td>{{ $livraison->total_bl }}</td>
    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Show">
                <a href="/livraisons/show/{{ $livraison->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-eye f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Mettre a jour">
                <a href="/livraisons/edit/{{ $livraison->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Delete">
                <form action="/livraisons/delete/{{ $livraison->id }}" method="POST"
                    class="avtar avtar-xs btn-link-danger btn-pc-default">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="ti ti-trash f-18"></i>
                    </button>
                </form>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="ajoute">
                <a href="/livraisons/create_article?achat_id={{ $livraison->achat_id }}&livraison={{ $livraison->id }}" class="btn btn-primary btn-sm">
                    ajoute article
                </a>
            </li>
            {{-- <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="ajoute au stock">
                <a href="/livraisons/create_article?achat_id={{ $livraison->achat_id }}&livraison={{ $livraison->id }}" class="btn btn-success btn-sm">
                    ajoute au stock
                </a>
            </li> --}}
        </ul>
    </td>
</tr>