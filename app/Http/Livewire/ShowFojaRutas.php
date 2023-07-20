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
        //$fojas=Foja_ruta::all();

        $fojas=Foja_ruta::where('observacion','like', '%'. $this->search . '%')
                        ->orwhere('m_cub_tot','like', '%'. $this->search . '%')
                        ->orderBy($this->sort,$this->direccion)
                        ->get();

        return view('livewire.show-foja-rutas', compact('fojas'));
    }
}
