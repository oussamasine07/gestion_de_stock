<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Societe;
use App\Models\Paiement;
use App\Models\Livraison;
use App\Models\EtatPaiement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        "societe_id",	
        "commande_id",	
        "client_id",	
        "numero_facture",	
        "date_facture",	
        "montant_ttc"
    ];
    
    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }

    public function articlesVentes () 
    {
        return $this->hasMany(ArticleVente::class);
    }

    public function client ()
    {
        return $this->belongsTo(Client::class);
    }

    public function produitsLivres ()
    {
        return $this->morphMany(Livraison::class, "produitLiverable");
    }

    public function livraison ()
    {
        return $this->morphMany(Livraison::class, "liverable");
    }

    public function etatPaiment () 
    {
        // return $this->hasOne(EtatPaiement::class);
        return $this->morphOne(EtatPaiement::class, "payable");
    }

    public function payments ()
    {
        return $this->morphMany(Paiement::class, "payable");
    }
}
