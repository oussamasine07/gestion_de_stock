
  <tr>
    <td class="text-end">{{ $produit->id }}</td>
    <td>
      <div class="row">
        <div class="col-auto pe-0">
          <img src="{{ asset('images/application/img-prod-1.jpg') }}" alt="user-image"
            class="wid-40 rounded">
        </div>
        
        <a href="/produits/show/{{ $produit->id }}" class="col">
          <h6 class="mb-1">{{ $produit->nom_produit }}</h6>
          <p class="text-muted f-12 mb-0">modify the discription it should be trimed</p>
        </a>
      </div>
    </td>
    <td> {{ $produit->categorie->nom_categorie }} </td>
    <td class="text-center">{{ $produit->quantite->quantite }}</td>
    <td class="text-center"> 
        @if ($produit->quantite->quantite > 0)
            <span class="badge bg-light-success  f-12">In Stock</span>
        @else
            <span class="badge bg-light-danger  f-12">Out of Stock</span> 
        @endif 
    </td>
    <td class="text-center">
      <ul class="list-inline me-auto mb-0">
        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="View">
          <a href="/produits/show/{{ $produit->id }}" class="avtar avtar-xs btn-link-secondary btn-pc-default" >
            <i class="ti ti-eye f-18"></i>
          </a>
        </li>
        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Edit">
          <a href="/produits/edit/{{ $produit->id }}" class="avtar avtar-xs btn-link-success btn-pc-default">
            <i class="ti ti-edit-circle f-18"></i>
          </a>
        </li>
        <li class="list-inline-item align-bottom" data-bs-toggle="tooltip" title="Delete">
          <form action="/produits/delete/" method="POST" class="avtar avtar-xs btn-link-danger btn-pc-default">
            @method("DELETE")
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">
                <i class="ti ti-trash f-18"></i>
            </button>
          </form>
        </li>
      </ul>
    </td>
  </tr>


  {{--  --}}