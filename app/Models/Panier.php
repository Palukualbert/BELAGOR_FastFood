<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'statut'];

    public function repas()
    {
        return $this->belongsToMany(Repas::class, 'panier_repas')
                    ->withPivot('quantite', 'prix_unitaire')
                    ->withTimestamps();
    }

    
}
