<?php

namespace App\Livewire;

use Livewire\Component;

class Repas extends Component
{
    
    public function render()
    {
        $repas = \App\Models\Repas::all();
        return view('livewire.repas',compact('repas'));
    }
}
