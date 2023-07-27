<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Remito;
use App\Models\Guia;
use App\Models\Emp_loc;
use App\Models\Guia_remito;
use App\Models\Origen_dest;

class CreateRemitos extends Component
{
    public $open=false;
    public $nro, $fecha, $fecha_sello,$observacion,$emp_loco_id,$emp_locd_id,$empresa;
    public $bultos, $valor_dec, $posicion, $m_cubicos, $kgr;

    protected $listeners = ['asignar_empresa_id'];

    protected $rules=[
         'nro' => 'required|max:10',
         'fecha' => 'required|max:10',
         'fecha_sello' => 'required|max:10',
         //'emp_loco_id' => 'required',
         'observacion' => 'max:150',
         'bultos' => 'required',
         'valor_dec' => 'required',
         'm_cubicos' => 'min:1',
         'kgr' => 'min:1'
    ];

    public function asignar_empresa_id($value,$identific){
        if($identific=='origen'){
         $this->emp_loco_id = $value;
         $empresa=Emp_loc::where('emp_locs.id','=', $value)
                                ->join('empresas', 'emp_locs.empresa_id', '=', 'empresas.id')
                                ->first();
        $this->empresa=$empresa->razon_social;                    
        }else{
             $this->emp_locd_id = $value;
        }
    }

    public function render()
    {
        return view('livewire.create-remitos');
    }

    public function save(){
        
        $this->validate();

        $remito=Remito::create([
            'nro' => $this->nro,
            'fecha' => $this->fecha,
            'fecha_sello' => $this->fecha_sello,
            'emp_loc_id' => $this->emp_loco_id,
            'observacion'=> $this->observacion
        ]);

        //$g=new guia();
        //if($this->existe($this->emp_loco_id,$this->emp_locd_id,$this->fecha_sello,'guias')){
            $guia_ant=Guia::latest('created_at')->first(); //último registro de la tabla
            $guia=Guia::create([
                'nro' => $guia_ant->nro+1,
                'm_cub_tot' =>$this->m_cubicos,
                'fecha_sal' =>$this->fecha_sello,
                'observacion' =>'',
                'completo'=>0,
                'estado_id'=>0
            ]);  

            Guia_remito::create([
                'guia_id' => $guia->id,
                'remito_id' => $remito->id,
                'bultos' => $this->bultos, 
                'valor_dec' => $this->valor_dec,
                'posicion' => $this->posicion,
                'm_cubicos' =>$this->m_cubicos,
                'kgr' => $this->kgr
            ]);

            Origen_dest::create([
                'tabla' =>'guias',
                'tabla_id' => $guia->id,
                'subid' => 0, 
                'emp_loco_id' => $this->emp_loco_id, 
                'emp_locd_id'=> $this->emp_locd_id
            ]);
        //}

        $this->reset(['nro','fecha','fecha_sello','observacion','valor_dec','m_cubicos','kgr']);

        $this->emit('render'); //Emisor de Render a la Clase ShowEmpresa
        //$this->emit('alert', 'El Coche se creó satisfactoriamente');
    }
    
    public function existe($emp_loco_id,$emp_locd_id,$fecha,$tbl){
        $cons=Guia::where('guias.fecha_sal', $fecha)
              ->join('origen_dests', 'origen_dests.tabla', $tbl)
              ->where('origen_dests.emp_locd_id', $emp_locd_id)
              ->where('origen_dests.emp_loco_id',$emp_loco_id)    
              ->exists();
        return $cons;
}

}