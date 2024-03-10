<?php

namespace App\Models;

use App\Models\Societe;
use App\Models\Paiement;
use App\Models\Livraison;
use App\Models\ArticleAchat;
use App\Models\EtatPaiement;
use App\Models\EtatLivraison;
use App\Models\ProduitsLivre;
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

    public function paiements () 
    {
        return $this->hasMany(Paiement::class);
    }

    public function etatPaiment () 
    {
        // return $this->hasOne(EtatPaiement::class);
        return $this->morphOne(EtatPaiement::class, "payable");
    }

    public function livraison () 
    {
        return $this->morphMany(Livraison::class, "liverable");
    }

    public function etatLivraison () 
    {
        return $this->morphOne(EtatLivraison::class, "etat_liverable");
    }

    
    public function produitsLivres () 
    {
        return $this->morphMany(ProduitsLivre::class, "produitLiverable");
    }

    public function payments ()
    {
        return $this->morphMany(Paiement::class, "payable");
    }
}
