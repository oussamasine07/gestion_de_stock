<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProduitsCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        "commande_id",
        "produit_id",
        "prix_unitaire",
        "quantite",
        "montant_total",
        "pourcentage_tva",
        "montant_tva",
        "montant_ttc"
    ];

    public function commande ()
    {
        return $this->belongsTo(Commande::class);
    }

    public function produit () 
    {
        return $this->belongsTo(Produit::class);
    }
}
