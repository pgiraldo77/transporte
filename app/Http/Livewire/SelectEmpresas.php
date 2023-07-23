<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Provincia;
use App\Models\Empresa;
use App\Models\Localidad;


class SelectEmpresas extends Component
{
    public $provincias;
    public $empresas;
    public $localidad_id;

      
    public function mount()
    {
        $this->provincias = Provincia::all();
        $this->empresas = Empresa::all();
    }


    public function render()
    {
        return view('livewire.select-empresas');
    }

    public function listarEmpresas($value)
    {
        // Actualiza las Empresas cuando se selecciona una provincia
       //$this->empresas = Empresa::all();
        $this->empresas=Localidad::select('emp_locs.id as emp_loc_id','empresas.razon_social as razon_social')
                          ->where('id_provincia','=', $value)
                          ->join('emp_locs', 'localidades.id', '=', 'emp_locs.localidad_id')
                          ->join('empresas', 'emp_locs.empresa_id', '=', 'empresas.id')
                          ->get(); 

    }
  
    /*public function selectEmpresa($value){
        $this->emit('asignar_empresa_id', $value);
    }*/
}
