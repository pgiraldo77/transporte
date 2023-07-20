<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coche;

class ShowCoches extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='asc';

    protected $listeners = ['render'=>'render'];
    

    public function render()
    {
        $coches=Coche::where('detalle','like', '%'. $this->search . '%')
                        ->orwhere('cap_carga','like', '%'. $this->search . '%')
                        ->orderBy($this->sort,$this->direccion)
                        ->get();

        return view('livewire.show-coches', compact('coches'));
    }

    public function order($valor){
        if ( $this->sort == $valor) {
           if($this->direccion == 'desc'){
                $this->direccion = 'asc';
            }else {
                $this->direccion = 'desc';
            }
        
        }else {
            $this->sort = $valor;
            $this->direccion = 'asc';
        }   
   
    }
}
