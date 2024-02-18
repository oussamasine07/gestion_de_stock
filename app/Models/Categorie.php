<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\Societe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "societe_id",
        "nom_categorie",
        "icon"
    ];

    public function produits ()
    {
        return $this->hasMany(Produit::class);
    }

    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }
}
