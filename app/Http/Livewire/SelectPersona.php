<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Persona;
use App\Models\Empresa;

class SelectPersona extends Component
{
    public $personas,$empresa_id=28, $persona_id;
    public $identificador, $empresas,$funcion;

    public function mount($funcion){
        $this->funcion=$funcion;
        $this->empresas=Empresa::all();
        $this->listarPersonas($this->empresa_id);
    }
    
    public function render()
    {
        return view('livewire.select-persona');
    }

    public function listarPersonas($mivalue)
    {
        $this->personas=Persona::select('personas.*')
                        ->join('emp_pers', 'emp_pers.persona_id', 'personas.id')
                        ->where('emp_pers.empresa_id', '=', $mivalue)
                        ->where('emp_pers.funcion_id', '=', $this->funcion)
                        ->get(); 
       
        $this->empresa_id=$mivalue;
    }
    public function selectPersonaid($value){
        $this->listarPersonas($this->empresa_id);
        $this->emit('asigna_persona_id', $value);
        $this->persona_id=$value;
        //$this->emit('identificador', $this->identificador);
    }
}
