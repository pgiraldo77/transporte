<?php

namespace App\Http\Livewire;

use App\Models\Foja_ruta;
use App\Models\Guia_remito;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Foja_guia;
use App\Models\Guia;

class CreateFojaRutas extends Component
{

    public $sort = 'id';
    public $direccion = 'asc';
    public $variable, $bultos, $completo=false, $inputValue, $inputbultos=[], $inputvalordec=[];
    public $nro_foja, $id_foja, $suma_tot, $observacion;

    public $elementos, $guias, $color;
    public $remitos = [];

    protected $rules=[
        'bultos' => 'required',
        'valor_dec' => 'required'
    ];

    public function valorchecks($elementos){
        $this->elementos=$elementos;
    }

    public function mount()
    {   
        $this->cargar_guias();
        $this->cargar_remitos();
        $this->calcula_m_cub();

    }

    public function cargar_remitos(){
        $this->elementos=session('misElementos');
        $i=0;
        $miarre=array();
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
    }

    public function cargar_guias(){
        $foja=Foja_ruta::latest('created_at')->first(); //último registro de la tabla
        $this->nro_foja=$foja->nro;

            $this->guias=Foja_ruta::select('remitos.nro as nro','remitos.fecha_sello as fecha_sello','guia_remitos.*','origen_e.razon_social as origen','destino_e.razon_social as destino')
                ->where('foja_rutas.estado_id','=', 0)
                ->join('foja_guias', 'foja_guias.foja_id', 'foja_rutas.id')
                ->join('guia_remitos', 'foja_guias.guia_id', 'guia_remitos.guia_id')
                ->join('remitos', 'remitos.id', 'guia_remitos.guia_id')
                ->join('guias', 'guias.id', 'guia_remitos.guia_id')
                ->join('origen_dests','origen_dests.tabla_id','guias.id') 
                ->join('emp_locs as emp_origen','emp_origen.id','origen_dests.emp_loco_id')
                ->join('emp_locs as emp_destino','emp_destino.id','origen_dests.emp_locd_id')
                ->join('empresas as origen_e','origen_e.id','emp_origen.empresa_id')
                ->join('empresas as destino_e','destino_e.id','emp_destino.empresa_id')
                ->orderBy($this->sort,$this->direccion)
                ->get();
             
    }
    
    public function render()
    {

        return view('livewire.create-foja-rutas');
    }

    public function calcula_m_cub(){
        
        $this->suma_tot=Foja_ruta::where('foja_rutas.estado_id', 0)
                                    ->join('foja_guia', 'foja_guias.foja_id', 'foja_rutas.id')
                                    ->join('guia_remitos', 'foja_guias.guia_id', 'guia_remitos.guia_id')
                                    ->get()->sum('guia_remitos.m_cubicos');
        
        if($this->suma_tot >= 4000) $this->color="red"; 
        elseif($this->suma_tot > 3000 && $this->suma < 4000)  $this->color="orange";
        else $this->color="green";                             
    }

    public function save(){
        
       // $this->validate();


       if($this->completo) $valor=0;
       else $valor=1;
       
       $foja_ant=Foja_ruta::latest('created_at')->first(); //último registro de la tabla
       //Crea la Nueva Foja de Ruta
       if($foja_ant->estado_id==1){         //Verifica que no exista una Foja pendiente de Carga 
            $foja=Foja_ruta::create([   
                'nro' => $foja_ant->nro+1,
                'fecha_sal' => date('Y-m-d'),
                'm_cub_tot' => 0,
                'completo' => $valor,
                'observacion'=> $this->observacion,
                'estado_id' => 0
            ]);
            $this->nro_foja=$foja->nro;   
        }else{
            $this->nro_foja=$foja_ant->nro;
        }    

        

        $this->cargar_remitos();

        //Asigna Todas las Guias a la Nueva Foja
        foreach ($this->remitos as $index => $remito){
                Foja_guia::create([
                    'guia_id' => $remito->guia_id,
                    'foja_id' => $foja->id
                ]);
            Guia::where('id', $remito->guia_id)->update(['estado_id' => 1]); //Modifica el estado de la Guía a  1 indicando que está en viaje
        } //endforeach

        //Almaceno el ID Foja hasta crear una nueva
       

        //$this->reset(['open','m_cub_tot','fecha_sal','completo','observacion']);

       // $this->emit('render');
       // $this->emit('alert', 'El Coche se creó satisfactoriamente');
    }

    /*public function modvaldec(){
        $this->cargar_remitos();
        
       /* $inputName = 'inputbultos';
        foreach ($this->remitos as $index => $remito){
            $inputName = 'inputbultos'.$remito->id;
            $this->inputValue= request()->input($inputName);
        }      
    }*/ 
}
