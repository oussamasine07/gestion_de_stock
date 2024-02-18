
<tr>
    <td class="text-center"> {{ $client->id }} </td>
    <td class="text-center">{{ $client->nom_ou_raison_social }}</td>
    <td class="text-center">{{ $client->email }}</td>
    <td class="text-center">{{ $client->telephone }}</td>
    <td class="text-center">{{ $client->address }}</td>
    <td class="text-center">{{ $client->ville }}</td>
    <td class="text-center">{{ $client->code_postal }}</td>
    <td class="text-center uppercase">{{ $client->statu_social }}</td>
    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Edit">
                <a href="/clients/edit/{{ $client->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Delete">
                <form action="/clients/delete/{{ $client->id }}" method="POST"
                    class="avtar avtar-xs btn-link-danger btn-pc-default ">
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