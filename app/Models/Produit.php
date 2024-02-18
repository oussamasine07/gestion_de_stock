<?php

namespace App\Models;

use App\Models\Societe;
use App\Models\PrixProduit;
use App\Models\EtatQuantite;
use App\Models\EtatQuantiteStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "societe_id",
        "categorie_id",
        "nom_produit",
        "description",
        "images"
    ];

    public function categorie ()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }

    public function quantite() 
    {
        return $this->hasOne(EtatQuantite::class);
    }

    public function quantiteStock()
    {
        return $this->hasMany(EtatQuantiteStock::class);
    }

    public function prixes ()
    {
        return $this->hasMany(PrixProduit::class);
    }
}
