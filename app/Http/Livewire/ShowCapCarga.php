<?php

namespace App\Http\Livewire;

use App\Models\CapCarga;
use Livewire\Component;

class ShowCapCarga extends Component{

    public $search;
    public $sort= 'id';
    public $direccion='asc';
    
    protected $listeners = ['render'];
    public $capacidad;

    public function render()
    {
        $this->capacidad = CapCarga::where('nombre','like', '%'. $this->search . '%')
                                    ->orwhere('m_cubicos','like', '%'. $this->search . '%')
                                    ->orderBy($this->sort,$this->direccion)
                                    ->get();
                                    
        return view('livewire.show-cap-carga');
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
