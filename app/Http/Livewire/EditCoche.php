<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Coche;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditCoche extends Component
{
    use WithFileUploads;

    public $open = false;
    public $coche, $image, $identificador;


    protected $rules = [
        'coche.detalle' => 'required|max:100',
        'coche.cap_carga' => 'required|min:4|max:5',
        'coche.modelo' => 'required|max:4',
    ];


    public function mount(Coche $coche)
    {
        $this->coche = $coche;
        
        $this->identificador = rand();
    }

    public function save()
    {
        $this->validate();

        $this->coche->save();

        $this->reset(['open']);
        $this->emitTo('show-coches', 'render');
        $this->emit('alert', 'El Coche se actualizó correctamente');
    }

    public function render()
    {
        return view('livewire.edit-coche');
    }
}
