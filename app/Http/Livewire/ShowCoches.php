<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coche;
use App\Models\CocheCapcargas;

class ShowCoches extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='asc';
    public $nro, $tipo_coche_id;
    public $cap_carga;

    protected $listeners = ['render'];
    
    public function render()
    {
        $coches=Coche::where('coches.nro','like', '%'. $this->search . '%')
                        ->orwhere('coches.detalle','like', '%'. $this->search . '%')
                        ->select('coches.*','tipo_coches.tipo as tipo')
                        ->join('tipo_coches', 'coches.tipo_coche_id', 'tipo_coches.id')
                        ->orwhere('tipo_coches.tipo','like', '%'. $this->search . '%')
                        ->orderBy($this->sort,$this->direccion)
                        ->get();           

        return view('livewire.show-coches', compact('coches'));
    }

    public function removeCap($cap_carga_id,$coche_id){
        $this->cap_carga=$cap_carga_id.'-'.$coche_id;
        CocheCapcargas::where('coche_id',$coche_id)->where('cap_carga_id',$cap_carga_id)->delete();
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
