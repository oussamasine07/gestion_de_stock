<?php

namespace App\Models;

use App\Models\Societe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    protected $fillable = [
        "societe_id",
        "raison_social",
        "telephone",
        "email",
        "address",
        "ville",
        "ice",
        "identifiant_fiscal",
        "taxe_professionnelle",
        "registre_commerce",
        "cnss"
    ];

    public function societe () {
        return $this->belongsTo(Societe::class);
    }

    use HasFactory;
}
