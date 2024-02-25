<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Societe;
use App\Models\ProduitsCommande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        "societe_id",
        "client_id",
        "code_commande",
        "date_commande",
        "montant_total_ttc"
    ];

    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }

    public function client () 
    {
        return $this->belongsTo(Client::class);
    }

    public function produitsCommandes () 
    {
        return $this->hasMany(ProduitsCommande::class);
    }
}
