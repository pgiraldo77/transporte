<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\CocheCapcargas;

class AsocCapCarga extends Component
{
public $open=false, $coches, $capacidad;
public $coche_id,$cap_carga;

    public function render()
    {
        $this->coches=DB::table('coches')->orderBy('detalle')->get();                        
        $this->capacidad=DB::table('capcargas')->orderBy('nombre')->get(); 
        return view('livewire.asoc-cap-carga');
    }

    public function selec_coche($value){
        $this->coche_id=$value;
    }
    public function selec_cap($value){
        $this->cap_carga=$value;
    }

    public function save(){
        
        $cocap=CocheCapcargas::create([
            'coche_id' => $this->coche_id,
            'cap_carga_id' => $this->cap_carga
        ]);

        $this->emit('render');
    }
}
