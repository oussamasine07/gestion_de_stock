<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatLivraison extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "etat_liverable_id",
        "etat_liverable_type",
        "total_facture",
        "montant_livre",
        "rest_non_livre"
    ];

    public function etat_liverable ()
    {
        return $this->morphTo();
    }
}
