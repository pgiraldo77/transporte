<?php

namespace App\Http\Livewire;

use App\Models\Foja_ruta;
use Livewire\Component;


class ListarFojas extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='desc';
    public $fojas;


    public function verFoja($id){
        // Redirecciona a la página de detalle de la foja
        return redirect()->route('fojas.detalle', $id);
    }

    public function render()
    {
        $this->fojas=Foja_ruta::all();
        return view('livewire.listar-fojas');
    }
}
