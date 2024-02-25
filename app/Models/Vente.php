<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Societe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vente extends Model
{
    use HasFactory;

    protected $fillable = [
        "societe_id",	
        "commande_id",	
        "client_id",	
        "numero_facture",	
        "date_facture",	
        "montant_ttc"
    ];
    
    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }

    public function articles () 
    {
        return $this->hasMany(ArticleVente::class);
    }

    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
}
