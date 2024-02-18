<?php

namespace App\Models;

use App\Models\Achat;
use App\Models\Societe;
use App\Models\ProduitsLivre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraison extends Model
{
    use HasFactory;

    protected $fillable = [
        "achat_id",
        "societe_id",
        "numero_bl",
        "date_arrive_bl"
    ];

    public function societe ()
    {
        return $this->belongsTo(Societe::class);
    }

    public function achat () 
    {
        return $this->belongsTo(Achat::class);
    }

    public function produitsLivres () 
    {
        return $this->hasMany(ProduitsLivre::class);
    }
}
