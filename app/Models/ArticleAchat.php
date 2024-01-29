<?php

namespace App\Models;

use App\Models\Achat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArticleAchat extends Model
{
    use HasFactory;

    protected $fillable = [
        "achat_id",
        "nom_article",
        "prix_unitaire",
        "quantite",
        "montant_total",
        "pourcentage_tva",
        "montant_tva",
        "montant_ttc"
    ];

    public function achat ()
    {
        return $this->belongsTo(Achat::class);
    }
}
