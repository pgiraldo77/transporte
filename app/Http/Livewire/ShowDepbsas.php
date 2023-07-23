<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remito;

class ShowDepbsas extends Component
{
    public $search;
    public $sort= 'id';
    public $direccion='asc';

    public function render()
    {
        $remitos=Remito::all();
        return view('livewire.show-depbsas',compact('remitos'));
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
