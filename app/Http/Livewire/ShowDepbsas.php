<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remito;

class ShowDepbsas extends Component
{
    public $search, $suma=0, $elementos=[], $remitos, $color="green";
    public $sort= 'id';
    public $direccion='asc';

    protected $listener=['render'];


    public function mount()
    {
        $this->calculateSuma();
    }

    public function render()
    {
        
        //$this->suma=0;
        //$remitos=Remito::all();
        $this->remitos=Remito::select('remitos.nro as nro','guia_remitos.id as id', 'guia_remitos.m_cubicos as m_cubicos','guia_remitos.*','origen_e.razon_social as origen','destino_e.razon_social as destino')
                ->join('guia_remitos', 'guia_remitos.remito_id', 'remitos.id')
                ->join('guias', 'guias.id', 'guia_remitos.guia_id')
                ->join('origen_dests','origen_dests.tabla_id','guias.id') 
                ->join('emp_locs as emp_origen','emp_origen.id','origen_dests.emp_loco_id')
                ->join('emp_locs as emp_destino','emp_destino.id','origen_dests.emp_locd_id')
                ->join('empresas as origen_e','origen_e.id','emp_origen.empresa_id')
                ->join('empresas as destino_e','destino_e.id','emp_destino.empresa_id')
                ->orderByRaw('remitos.created_at DESC')
                ->get();

        return view('livewire.show-depbsas');
    }

    public function updatedElementos()
    {
        $this->calculateSuma();
      
    }

    public function calculateSuma()
    {
        $this->suma=0;
        foreach($this->elementos as $id=>$valor){
            if (isset($id)){
                $this->suma += $valor;
            }      
        } 
        if($this->suma > 3000) $this->color="red"; 
        else  $this->color="green";
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
