<?php

namespace App\Models;

use App\Models\Achat;
use App\Models\Client;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\Livraison;
use App\Models\Fournisseur;
use App\Models\Utilisateur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Societe extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "raison_social",
        "email",
        "telephone",
        "address",
        "ice",
        "identifiant_fiscal",
        "taxe_professionnelle",
        "registre_commerce",
        "cnss",
        "gerant"
    ];

    public function utilisateurs () 
    {
        return $this->hasMany(Utilisateur::class);
    } 

    public function fournisseurs () 
    {
        return $this->hasMany(Fournisseur::class);
    } 

    public function achats () 
    {
        return $this->hasMany(Achat::class);
    }

    public function categories () 
    {
        return $this->hasMany(Categorie::class);
    }

    public function produits ()
    {
        return $this->hasMany(Produit::class);
    }

    public function livraisons ()
    {
        return $this->hasMany(Livraison::class);
    }

    public function stocks ()
    {
        return $this->hasMany(Stock::class);
    }

    public function clients ()
    {
        return $this->hasMany(Client::class);
    }
}
