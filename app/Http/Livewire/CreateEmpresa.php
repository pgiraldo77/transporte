<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Empresa;

class CreateEmpresa extends Component
{
    public $open=true;
    public $razon_social, $cuit, $direccion;

    protected $rules=[
         'razon_social' => 'required|max:100',
         'cuit' => 'required|unique|min:10'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-empresa');
    }

    public function save(){
        
        $this->validate();

        Empresa::create([
            'razon_social' => $this->razon_social,
            'cuit' => $this->cuit,
        ]);

        $this->reset(['razon_social','cuit']);

      /*  $this->emit('render');
        $this->emit('alert', 'El Coche se creó satisfactoriamente');*/
    }
    
}
