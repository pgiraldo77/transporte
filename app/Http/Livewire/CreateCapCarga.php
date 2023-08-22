<?php

namespace App\Http\Livewire;

use App\Models\CapCarga;
use Livewire\Component;

class CreateCapCarga extends Component
{
    public $open = false, $nombre, $m_cubicos;

    protected $rules=[
        'nombre' => 'required',
        'm_cubicos' => 'required'
   ];

    public function render()
    {
        return view('livewire.create-cap-carga');
    }

    public function save(){
        
        $this->validate();

        CapCarga::create([
            'nombre' => $this->nombre,
            'm_cubicos' => $this->m_cubicos
        ]);

        $this->reset(['open','nombre','m_cubicos']);

        $this->emit('render');
        $this->emit('alert', 'Creada satisfactoriamente');
    }
}
