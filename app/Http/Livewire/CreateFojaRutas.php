<?php

namespace App\Http\Livewire;
use App\Models\Foja_ruta;

use Livewire\Component;

class CreateFojaRutas extends Component
{

    public $open = false;
    public $nro, $m_cubicos_tot,$fecha_sal,$completo, $observacion;

    protected $rules=[
         'm_cub_tot' => 'required|max:5',
         'fecha_sal' => 'required',
         'completo' => 'required',
         'observacion' => 'max:100'
    ];

    
    public function render()
    {
        return view('livewire.create-foja-rutas');
    }

    public function save(){
        
        $this->validate();

        Foja_ruta::create([
            'm_cub_tot' => $this->m_cub_tot,
            'fecha_sal' => $this->fecha_sal,
            'completo' => $this->completo,
            'observacion' => $this->observacion
        ]);

        $this->reset(['open','m_cub_tot','fecha_sal','completo','observacion']);

       // $this->emit('render');
       // $this->emit('alert', 'El Coche se creó satisfactoriamente');
    }
   
}
