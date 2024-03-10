<?php

namespace App\Models;

use App\Models\Achat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paiement extends Model
{
    use HasFactory;

    protected $fillable = [
        "achat_id",
        "date_reglement",
        "montant_regle",
        "mode_regelement",
        "libelle_reglement",
        "observation"
    ];

    public function achat () 
    {
        return $this->belongsTo(Achat::class);
    }

    public function payable ()
    {
        return $this->morphTo();
    }
}
