<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coche;

class ShowCoches extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='asc';
    public $nro, $tipo_coche_id;

    protected $listeners = ['render'];
    
    public function render()
    {
        $coches=Coche::where('coches.nro','like', '%'. $this->search . '%')
                        ->select('coches.*','tipo_coches.tipo as tipo')
                        ->join('tipo_coches', 'coches.tipo_coche_id', 'tipo_coches.id')
                        ->orwhere('tipo_coches.tipo','like', '%'. $this->search . '%')
                        ->orderBy($this->sort,$this->direccion)
                        ->get();
        //$coches=Coche::all();                

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
