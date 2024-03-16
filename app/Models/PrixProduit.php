<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\EtatQuantiteStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrixProduit extends Model
{
    use HasFactory;

    protected $fillable = [
        "produit_id",
        "date_livraison",
        "prix_achat",
        "marge_benificiaire",
        "prix_de_vente"
    ];

    public function produit ()
    {
        return $this->belongsTo(Produit::class);
    }

}
