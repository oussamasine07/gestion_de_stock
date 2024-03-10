<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EtatPaiement extends Model
{
    use HasFactory;

    protected $fillable = [
        "achat_id",
        "total_facture",
        "montant_regle",
        "rest_regle",
        "etat_reglement"
    ];

    public function achat ()
    {
        return $this->belongsTo(Achat::class);
    }

    public function payable()
    {
        return $this->morphTo();
    }
}
