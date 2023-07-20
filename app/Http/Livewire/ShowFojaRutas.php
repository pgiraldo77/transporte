<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Foja_ruta;

class ShowFojaRutas extends Component
{

    public $search;
    public $sort= 'id';
    public $direccion='asc';
    
    public function render()
    {
        $fojas=Foja_ruta::all();
        return view('livewire.show-foja-rutas', compact('fojas'));
    }
}
