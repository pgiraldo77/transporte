<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remito;
use App\Models\Emp_loc;

class CreateRemitos extends Component
{
    public $open=false;
    public $nro, $fecha, $fecha_sello,$observacion;

   // protected $listeners = ['asignar_localidad_id'];

    protected $rules=[
         'nro' => 'required|max:10',
         'fecha' => 'required|max:10',
         'fecha_sello' => 'required|max:10',
         'observacion' => 'max:150'
    ];

    /*public function asignar_localidad_id($value){
        $this->localidad_id = $value;
    }*/

    public function render()
    {
        return view('livewire.create-remitos');
    }

    public function save(){
        
        $this->validate();

        Remito::create([
            'nro' => $this->nro,
            'fecha' => $this->fecha,
            'fecha_sello' => $this->fecha_sello,
            'observacion'=> $this->observacion
        ]);

        Emp_loc::create([
            'nro' => $this->nro,
            'fecha' => $this->fecha,
            'fecha_sello' => $this->fecha_sello,
            'observacion'=> $this->observacion
        ]);

        $this->reset(['nro','fecha','fecha_sello','observacion']);

        //$this->emit('render'); //Emisor de Render a la Clase ShowEmpresa
        //$this->emit('alert', 'El Coche se creó satisfactoriamente');
    }
    
}