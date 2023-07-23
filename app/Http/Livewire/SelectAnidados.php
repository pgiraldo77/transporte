<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provincia;
use App\Models\Localidad;

class SelectAnidados extends Component
{
    public $provincias;
    public $localidades;
    public $localidad_id;

      
    public function mount()
    {
        $this->provincias = Provincia::all();
        $this->localidades = Localidad::where('id_provincia', 14)->get();
    }


    public function render()
    {
        return view('livewire.select-anidados');
    }

    public function listarLocalidades($value)
    {
        // Actualiza las localidades cuando se selecciona una provincia
        $this->localidades = Localidad::where('id_provincia', $value)->get();
    }
  
    public function selectLocalidad($value){
        $this->emit('asignar_localidad_id', $value);
    }
}
