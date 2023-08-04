<?php

namespace App\Http\Livewire;
use App\Models\Coche;
use App\Models\TipoCoche;
//use Livewire\WithFileUploads;


use Livewire\Component;

class CreateCoche extends Component
{
    //use WithFileUploads;

    public $open = false;
    public $nro, $tipo_coche_id, $identificador;

    /*public function mount(){
        $this->identificador=rand();
    }*/

    protected $rules=[
         'nro' => 'required|max:10',
         //'tipo' => 'required|min:4|max:5',
         //'' => 'required|max:4',
         //'image' => 'required|image|max:2048'
    ];

   /* public function updated($propertyName){
        $this->validateOnly($propertyName);
    }*/

    public function render()
    {
        $tipoco = TipoCoche::all();
        return view('livewire.create-coche', compact('tipoco'));
    }

    public function asigna_tipo_coche($value){
        $this->tipo_coche_id=$value;
    }
    
    
    public function save(){
        
        $this->validate();

        Coche::create([
            'nro' => $this->nro,
            'tipo_coche_id' => $this->tipo_coche_id
        ]);

        $this->reset(['open','nro','tipo_coche_id']);

        $this->emit('render');
        $this->emit('alert', 'El Coche se creó satisfactoriamente');
    }
}
