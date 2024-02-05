<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitsLivre extends Model
{
    use HasFactory;
    
    protected $fillable = [];

    public function livrasion ()
    {
        return $this->belongsTo(Livrasion::class);
    }
}
