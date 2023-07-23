<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remito;
//use App\Models\Emp_loc;

class CreateRemitos extends Component
{
    public $open=false;
    public $nro, $fecha, $fecha_sello,$observacion,$emp_loc_id;
    public $bultos, $valor_dec, $posicion, $m_cubicos, $kgr;

    protected $listeners = ['asignar_empresa_id'];

    protected $rules=[
         'nro' => 'required|max:10',
         'fecha' => 'required|max:10',
         'fecha_sello' => 'required|max:10',
         'emp_loc_id' => 'required',
         'observacion' => 'max:150',
         'bultos' => 'required',
         'valor_dec' => 'required',
         'm_cubicos' => 'min:1',
         'kgr' => 'min:1'
    ];

    public function asignar_empresa_id($value){
        $this->emp_loc_id = $value;
    }

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
            'emp_loc_id' => $this->emp_loc_id,
            'observacion'=> $this->observacion
        ]);

        $this->reset(['nro','fecha','fecha_sello','observacion']);

        //$this->emit('render'); //Emisor de Render a la Clase ShowEmpresa
        //$this->emit('alert', 'El Coche se creó satisfactoriamente');
    }
    


}