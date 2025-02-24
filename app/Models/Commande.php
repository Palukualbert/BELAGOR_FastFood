<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = [
        'user_id',
        'status',
        'montant_total',
        'repas',
        'latitude',
        'longitude',
    ];

    protected $casts = [
        'repas' => 'array', // Permet de récupérer automatiquement les repas sous forme de tableau
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
