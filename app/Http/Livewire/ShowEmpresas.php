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
       /* $empresas=Empresa::where('razon_social','like', '%'. $this->search . '%')
                        ->orwhere('cuit','like', '%'. $this->search . '%')
                        ->orderBy($this->sort,$this->direccion)
                        ->get();*/
        $empresas=Empresa::all();                

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
