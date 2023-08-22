<?php

namespace App\Http\Livewire;

use App\Models\Foja_ruta;
use Livewire\Component;
//use Illuminate\Support\Facades\Config;


class ListarFojas extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='desc';
    public $fojas, $completo, $posi_precio,$posicion;


    public function verFoja($id){
        // Redirecciona a la página de detalle de la foja
        return redirect()->route('fojas.detalle', $id);
    }

    public function valor_foja(){
        $this->posi_precio=config("constantes.posi_precio_ve");
        $this->posicion=config("constantes.posi_val");
    }

    public function render()
    {
        $this->valor_foja();
        $this->fojas=Foja_ruta::orderBy('created_at', $this->direccion)->get();
        return view('livewire.listar-fojas');
    }
}
