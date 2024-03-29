<?php

namespace App\Models;

use App\Models\Vente;
use App\Models\InfoPp;
use App\Models\InfoSte;
use App\Models\Societe;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        "societe_id",
        "nom_ou_raison_social",
        "email",
        "telephone",
        "address",
        "ville",
        "code_postal",
        "statu_social"
    ];

    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }

    public function infoSte ()
    {
        return $this->hasOne(InfoSte::class);
    }

    public function intoPp () 
    {
        return $this->hasOne(InfoPp::class);
    }

    public function commandes ()
    {
        return $this->hasMany(Commande::class);
    }

    public function ventes ()
    {
        return $this->hasMany(Vente::class);
    }
}
