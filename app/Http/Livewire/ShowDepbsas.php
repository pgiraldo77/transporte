<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remito;

class ShowDepbsas extends Component
{

    
    public function render()
    {
        $remitos=Remito::all();
        return view('livewire.show-depbsas',compact($remitos));
    }
}
