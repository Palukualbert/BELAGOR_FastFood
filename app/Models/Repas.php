<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Repas extends Model
{
    protected $fillable = [
        'nom', 'description', 'prix','image','categorie'
    ];
    public function commandes(){
        return $this->belongsToMany(Commande::class);
    }
}
