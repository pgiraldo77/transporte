<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remito;
use Illuminate\Support\Facades\Session;

class ShowDepbsas extends Component
{
    public $search, $suma=0, $elementos=[], $checktodos="", $remitos, $color="green";
    public $sort= 'id';
    public $direccion='asc';

    protected $listeners = ['render'];


    public function mount()
    {
        $this->calculateSuma();
    }

    public function render()
    {
        
        $this->remitos=Remito::select('remitos.nro as nro','remitos.fecha_sello as fecha_sello','guia_remitos.*','origen_e.razon_social as origen','destino_e.razon_social as destino')
                ->join('guia_remitos', 'guia_remitos.remito_id', 'remitos.id')
                ->join('guias', 'guias.id', 'guia_remitos.guia_id')
                ->where('guias.estado_id',0)
                ->join('origen_dests','origen_dests.tabla_id','guias.id') 
                ->join('emp_locs as emp_origen','emp_origen.id','origen_dests.emp_loco_id')
                ->join('emp_locs as emp_destino','emp_destino.id','origen_dests.emp_locd_id')
                ->join('empresas as origen_e','origen_e.id','emp_origen.empresa_id')
                ->join('empresas as destino_e','destino_e.id','emp_destino.empresa_id')
                ->orderBy($this->sort,$this->direccion)
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
                $arre=explode("-",$valor);
                $this->suma += $arre[1];
            }      
        } 
        if($this->suma >= 4000) $this->color="red"; 
        elseif($this->suma > 3000 && $this->suma < 4000)  $this->color="orange";
        else $this->color="green";   
        
        

        // Asegurarse de que $this->elementos sea un arreglo antes de almacenarlo en la sesión
        $valoresSeleccionados = is_array($this->elementos) ? $this->elementos : [];

        // Guardar los valores seleccionados en la sesión
        Session::put('misElementos', $valoresSeleccionados);
        //session(['misElementos' => $this->elementos]);
      
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
