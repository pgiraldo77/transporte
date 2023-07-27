<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provincia;
use App\Models\Empresa;
use App\Models\Localidad;


class SelectEmpresas extends Component
{
    public $provincias;
    public $origen=1,$identificador;
    public $empresas;
    public $localidad_id, $provincia_id;
 

    public function mount($valor)
    {
        if($valor==0){ 
             $this->origen=1;                // Con 1 define el id_provincia Bs.As.
             $this->identificador='origen';  //Identifica el nombre del Select si es origen o destino

        }else{ 
              $this->origen=14;   //Con 14 define el id_provincia Mendoza
              $this->identificador='destino';
               }
        $this->provincias = Provincia::all();

        $this->listarEmpresas($this->origen);
    }


    public function render()
    {
        return view('livewire.select-empresas');
    }

    public function listarEmpresas($mivalue)
    {
        $this->empresas=Localidad::select('emp_locs.id as emp_loc_id','empresas.razon_social as razon_social')
                          ->where('id_provincia','=', $mivalue)
                          ->join('emp_locs', 'localidades.id', '=', 'emp_locs.localidad_id')
                          ->join('empresas', 'emp_locs.empresa_id', '=', 'empresas.id')
                          ->get(); 
       
        $this->provincia_id=$mivalue;
    }
  
    public function selectEmpresaid($value){
        $this->listarEmpresas($this->provincia_id);
        $this->emit('asignar_empresa_id', $value, $this->identificador);
        //$this->emit('identificador', $this->identificador);
    }
}
