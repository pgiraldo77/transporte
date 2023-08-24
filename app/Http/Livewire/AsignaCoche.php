<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coche;

class AsignaCoche extends Component
{
    public $coches,$coche='',$open=false, $coche_id;

    public function render()
    {
        $this->coches=Coche::where('coches.nro','like', '%'. $this->coche . '%')
                            ->orwhere('coches.detalle','like', '%'. $this->coche . '%')
                            ->get();

        return view('livewire.asigna-coche');
    }
    
    public function selec_coche($value){
        $this->coche_id=$value;
    }
}
