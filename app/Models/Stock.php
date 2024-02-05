<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        "societe_id",
        "nom",
        "address",
        "ville"
    ];

    public function societe ()
    {
        return $this->belongsTo();
    }
}
