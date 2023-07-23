<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;


class ShowEmpresas extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='asc';

    protected $listeners = ['render'=>'render'];

    public function render()
    {
                                
        $empresas=Empresa::select('empresas.*','emp_locs.*','provincias.nombre as prov','localidades.nombre as loc')
                          ->where('razon_social','like', '%'. $this->search . '%')
                          ->orwhere('cuit','like', '%'. $this->search . '%')
                          ->join('emp_locs', 'empresas.id', '=', 'emp_locs.empresa_id')
                          ->join('localidades', 'localidades.id', '=', 'emp_locs.localidad_id')
                          ->join('provincias', 'localidades.id_provincia', '=', 'provincias.id')
                          ->get();                 

        return view('livewire.show-empresas', compact('empresas'));                
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
