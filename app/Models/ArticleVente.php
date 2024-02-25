<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleVente extends Model
{
    use HasFactory;
    protected $fillable = [
        "vente_id",	
        "nom_article",	
        "prix_unitaire",	
        "quantite",	
        "montant_total",	
        "pourcentage_tva",	
        "montant_tva",	
        "montant_ttc"
    ];

    public function vente ()
    {
        return $this->belongsTo(Vente::class);
    }
}
