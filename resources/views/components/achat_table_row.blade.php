
<tr>
    <td class="text-center"> {{ $achat->id }} </td>
    <td >{{ $achat->numero_facture }}</td>
    <td >{{ $achat->libelle }}</td>
    <td>{{ $achat->date_facture }}</td>
    <td>{{ $achat->total_facture }}</td>
    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Show">
                <a href="/achats/show/{{ $achat->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-eye f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Edit">
                <a href="/achats/edit/{{ $achat->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Delete">
                <form action="/achats/delete/{{ $achat->id }}" method="POST"
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
</tr>