<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;
use App\Models\Emp_loc;

class CreateEmpresa extends Component
{
    public $open=false;
    public $razon_social, $cuit, $direccion,$localidad_id,$telefono;

    protected $listeners = ['asignar_localidad_id'];

    protected $rules=[
         'razon_social' => 'required|max:100',
         'cuit' => 'required|min:10',
         //'direccion' => '',
    ];

    public function asignar_localidad_id($value){
        $this->localidad_id = $value;
    }

    public function render()
    {
        return view('livewire.create-empresa');
    }

    public function save(){
        
        $this->validate();

        $empresa=Empresa::create([
            'razon_social' => $this->razon_social,
            'cuit' => $this->cuit
        ]);

        Emp_loc::create([
            'empresa_id' => $empresa->id,
            'localidad_id' => $this->localidad_id,
            'direccion' => $this->direccion,
            'telefono'=> $this->telefono
        ]);

        $this->reset(['razon_social','cuit']);

        $this->emit('render'); //Emisor de Render a la Clase ShowEmpresa
        //$this->emit('alert', 'El Coche se creó satisfactoriamente');
    }
    
}
