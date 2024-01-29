<?php

namespace App\Models;


use App\Models\Societe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Utilisateur extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        "societe_id",
        "nom",
        "statu",
        "nom_utilisateur",
        "mote_de_pass"
    ];
    
    public function societe () {
        return $this->belongsTo(Societe::class);
    }
}
