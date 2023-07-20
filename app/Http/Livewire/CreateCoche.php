<?php

namespace App\Http\Livewire;
use App\Models\Coche;
use Livewire\WithFileUploads;


use Livewire\Component;

class CreateCoche extends Component
{
    use WithFileUploads;

    public $open = false;
    public $cap_carga, $detalle, $modelo, $image, $identificador;

    public function mount(){
        $this->identificador=rand();
    }

    protected $rules=[
        'detalle' => 'required|max:100',
         'cap_carga' => 'required|min:4|max:5',
         'modelo' => 'required|max:4',
         'image' => 'required|image|max:2048'
    ];

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.create-coche');
    }

    public function save(){
        
        $this->validate();

        $image=$this->image->store('coches');

        Coche::create([
            'detalle' => $this->detalle,
            'cap_carga' => $this->cap_carga,
            'modelo' => $this->modelo,
            'image' => $image
        ]);

        $this->reset(['open','detalle','cap_carga','modelo','image']);

        $this->identificador =rand();

        $this->emit('render');
        $this->emit('alert', 'El Coche se creó satisfactoriamente');
    }
}
