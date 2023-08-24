<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\CocheCapcargas;
use App\Models\Coche;

class AsocCapCarga extends Component
{
public $open=false, $coches,$coche='', $capacidad;
public $coche_id,$cap_carga,$search;

    public function render()
    {
        $this->coches=Coche::where('coches.nro','like', '%'. $this->coche . '%')
                            ->orwhere('coches.detalle','like', '%'. $this->coche . '%')
                            ->get();                        
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

    public function updatedcoche()
    {
        
    }
}
