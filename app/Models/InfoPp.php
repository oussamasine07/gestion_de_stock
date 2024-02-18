<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InfoPp extends Model
{
    use HasFactory;

    protected $fillable = [
        "client_id",
        "cni",
        "identifiant_fiscal"
    ];

    public function client ()
    {
        return $this->belongsTo(Client::class);
    }
}
