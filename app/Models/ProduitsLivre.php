<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitsLivre extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "achat_id",
        "livraison_id",
        "nom_article",
        "quantite",
        "prix_unitaire",
        "pourcentage_tva"
    ];

    public function livrasion ()
    {
        return $this->belongsTo(Livrasion::class);
    }
}
