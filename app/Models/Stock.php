<?php

namespace App\Models;

use App\Models\Produit;
use App\Models\EtatQuantiteStock;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        "societe_id",
        "nom",
        "address",
        "ville"
    ];

    public function societe ()
    {
        return $this->belongsTo();
    }

    public function produits ()
    {
        return $this->hasMany(Produit::class);
    }

    public function etatQuantiteStock ()
    {
        return $this->hasMany(EtatQuantiteStock::class);
    }
}
