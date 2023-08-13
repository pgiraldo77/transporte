<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Foja_ruta;

class DetalleFoja extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='asc';
    public $remitos, $nro_foja, $suma_tot, $color,$observacion ;


    public function mount($id)
    {
        $foja=Foja_ruta::where('id',$id)->first();
        $this->nro_foja=$foja->nro;
        $this->suma_tot=$foja->m_cub_tot;
        $this->observacion=$foja->observacion; 
        $this->cargar_remitos($foja->id);
    }   


    public function cargar_remitos($id){
       
            $this->remitos=Foja_ruta::select('remitos.nro as nro','remitos.fecha_sello as fecha_sello','guia_remitos.*','foja_rutas.observacion as observacion','origen_e.razon_social as origen','destino_e.razon_social as destino')
                ->where('foja_rutas.id','=', $id)
                ->join('foja_guias', 'foja_rutas.id','foja_guias.foja_id')
                ->join('guia_remitos', 'guia_remitos.guia_id', 'foja_guias.guia_id')
                ->join('remitos', 'remitos.id', 'guia_remitos.remito_id')
                ->join('guias', 'guias.id', 'guia_remitos.guia_id')
                ->join('origen_dests','origen_dests.tabla_id','guias.id') 
                ->join('emp_locs as emp_origen','emp_origen.id','origen_dests.emp_loco_id')
                ->join('emp_locs as emp_destino','emp_destino.id','origen_dests.emp_locd_id')
                ->join('empresas as origen_e','origen_e.id','emp_origen.empresa_id')
                ->join('empresas as destino_e','destino_e.id','emp_destino.empresa_id')
                ->orderBy($this->sort,$this->direccion)
                ->get(); 
             
    }

    public function render()
    {
        return view('livewire.detalle-foja');
    }
}
