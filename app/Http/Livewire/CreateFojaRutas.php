<?php

namespace App\Http\Livewire;
use App\Models\Foja_ruta;
use App\Models\Remito;
use App\Models\Guia_remito;
use Livewire\Component;
use Illuminate\Support\Facades\Session;

class CreateFojaRutas extends Component
{

    public $open = false;
    public $sort= 'id';
    public $direccion='asc';
    public $nro, $m_cubicos_tot,$fecha_sal,$completo, $remitos=[], $elementos, $observacion;

    protected $listeners = ['valorchecks'];

    protected $rules=[
         'm_cub_tot' => 'required|max:5',
         'fecha_sal' => 'required',
         'completo' => 'required',
         'observacion' => 'max:100'
    ];

    public function valorchecks($elementos){
        $this->elementos=$elementos;
    }

    
    public function render()
    {
        $this->elementos=session('misElementos');
        $i=0;
       
        foreach($this->elementos as $id=>$valor){
                $arre=explode("-",$valor);
                $miarre[$i]=$arre[0];
                $i++;
            } 
          //  var_dump($miarre);

            //$remitos=Guia_Remito::all();
            for($i=0;$i<count($miarre);$i++){
            $this->remitos[$i]=Guia_Remito::select('remitos.nro as nro','remitos.fecha_sello as fecha_sello','guia_remitos.*','origen_e.razon_social as origen','destino_e.razon_social as destino')
                ->where('guia_remitos.id','=', $miarre[$i])
                ->join('remitos', 'remitos.id', 'guia_remitos.remito_id')
                ->join('guias', 'guias.id', 'guia_remitos.guia_id')
                ->join('origen_dests','origen_dests.tabla_id','guias.id') 
                ->join('emp_locs as emp_origen','emp_origen.id','origen_dests.emp_loco_id')
                ->join('emp_locs as emp_destino','emp_destino.id','origen_dests.emp_locd_id')
                ->join('empresas as origen_e','origen_e.id','emp_origen.empresa_id')
                ->join('empresas as destino_e','destino_e.id','emp_destino.empresa_id')
                ->orderBy($this->sort,$this->direccion)
                ->first();
            } 

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
