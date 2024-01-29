<?php

namespace App\Models;

use App\Models\Societe;
use App\Models\ArticleAchat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = [
        "societe_id",
        "fournisseur_id",
        "numero_facture",
        "libelle",
        "date_facture",
        "total_facture"
    ];

    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }

    public function articaleAchats () 
    {
        return $this->hasMany(ArticleAchat::class);
    }
}
