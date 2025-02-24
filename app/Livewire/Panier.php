<?php

namespace App\Livewire;

use App\Models\Repas;
use Livewire\Component;

class Panier extends Component
{
    public $panier = [];
    
    public function mount(){
        
    }

    public function render()
    {
        $repas = Repas::all();
        return view('livewire.panier', compact('repas'));
    }
}
