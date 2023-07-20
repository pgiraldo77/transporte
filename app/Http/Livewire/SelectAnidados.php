<?php

namespace App\Http\Livewire;

use App\Models\Provincia;
use App\Models\Localidad;
use Livewire\Component;

class SelectAnidados extends Component
{
    public $provincias;
    public $localidades;

      
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
  
}
