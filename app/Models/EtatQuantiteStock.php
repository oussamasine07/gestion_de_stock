<?php

namespace App\Models;

use App\Models\Produit;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EtatQuantiteStock extends Model
{
    use HasFactory;

    protected $fillable = [
        "stock_id",
        "produit_id",
        "quantite"
    ];

    public $primaryKey = "stock_id";

    public function produitStock()
    {
        return $this->belongsTo(Produit::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    
}
