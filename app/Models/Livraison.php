<?php

namespace App\Models;

use App\Models\Achat;
use App\Models\ProduitsLivre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Livraison extends Model
{
    use HasFactory;

    public function achat () 
    {
        return $this->belongsTo(Achat::class);
    }

    public function produitsLivres () 
    {
        return $this->hasMany(ProduitsLivre::class);
    }
}
