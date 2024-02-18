<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfoSte extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "identifiant_fiscal",
        "tax_professionnelle",
        "ice",
        "registre_commerce",
        "cnss"
    ];

    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
}
