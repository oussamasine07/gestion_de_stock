
<tr>
    <td class="text-end"> {{ $fournisseur->id }} </td>
    <td class="text-start">
        <div class="row">
            <div class="col-auto pe-0">
                <img src="{{ asset('images/application/img-prod-1.jpg') }}" alt="user-image"
                    class="wid-40 rounded">
            </div>
            <div class="col">
                <h6 class="mb-1">{{ $fournisseur->raison_social }}</h6>
            </div>
        </div>
    </td>
    <td class="text-end">{{ $fournisseur->telephone }}</td>
    <td class="text-end">{{ $fournisseur->email }}</td>
    <td>{{ $fournisseur->address }}</td>
    <td>{{ $fournisseur->ice }}</td>
    <td>{{ $fournisseur->identifiant_fiscal }}</td>
    <td>{{ $fournisseur->taxe_professionnelle }}</td>
    <td>{{ $fournisseur->cnss }}</td>
    <td>{{ $fournisseur->registre_commerce }}</td>
    <td class="text-center">
        <ul class="list-inline me-auto mb-0">
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Mettre a joure">
                {{-- <a href="/fournisseurs/edit/{{ $fournisseur->id }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a> --}}
                <a href="{{ route("fournisseurs.edit", $fournisseur->id) }}"
                    class="avtar avtar-xs btn-link-success btn-pc-default">
                    <i class="ti ti-edit-circle f-18"></i>
                </a>
            </li>
            <li class="list-inline-item align-bottom" data-bs-toggle="tooltip"
                title="Suprimer">
                <form action="{{ route("fournisseurs.destroy", $fournisseur->id) }}" method="POST"
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