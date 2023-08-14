<?php

namespace App\Http\Livewire;

use App\Models\Foja_ruta;
use App\Models\Guia_remito;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Foja_guia;
use App\Models\Guia;

class CreateFojaRutas extends Component
{

    public $sort = 'id';
    public $direccion = 'asc';
    public $variable, $bultos, $completo=true, $inputValue, $inputbultos=[], $inputvalordec=[];
    public $nro_foja, $id_foja, $suma_tot=0, $observacion, $foja_act;

    public $elementos, $guias, $color,$mensaje;
    public $remitos = [], $dataLoaded=false;

    protected $rules=[
        'bultos' => 'required',
        'valor_dec' => 'required'
    ];

    public function valorchecks($elementos){
        $this->elementos=$elementos;
    }

    public function mount()
    {   
        //Se utiliza para cargar los datos que vienen en la variable sólo una vez
        if (Session::has('misElementos') && !$this->dataLoaded) {
            $this->elementos=session('misElementos');
            $this->dataLoaded = true; 
        }
        
        $this->cargar_guias();
        $this->cargar_remitos();
        $this->calcula_m_cub();

    }

    public function cargar_remitos(){
        
        $i=0;
        $miarre=array();
        
        foreach($this->elementos as $id=>$valor){
                $arre=explode("-",$valor);
                $miarre[$i]=$arre[0];
                $i++;
        
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
    }

    public function cargar_guias(){
        $foja=Foja_ruta::latest('created_at')->first(); //último registro de la tabla
        if($foja->estado_id==0){
                     $this->nro_foja=$foja->nro;
                     $this->foja_act=$foja;
                            } 

            $this->guias=Foja_ruta::select('remitos.nro as nro','remitos.fecha_sello as fecha_sello','guia_remitos.*','foja_rutas.observacion as observacion','origen_e.razon_social as origen','destino_e.razon_social as destino')
                ->where('foja_rutas.estado_id','=', 0)
                ->join('foja_guias', 'foja_rutas.id','foja_guias.foja_id')
                ->join('guia_remitos', 'guia_remitos.guia_id', 'foja_guias.guia_id')
                ->join('remitos', 'remitos.id', 'guia_remitos.remito_id')
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
        $this->cargar_guias();
        return view('livewire.create-foja-rutas');
    }

    public function showAlert(){
        $this->emit('showAlert');
    }

    public function finaliza_foja(){
        //Foja_ruta::where('id', $this->foja_act->id)->update(['estado_id' => 1]);
    }

    public function calcula_m_cub(){
        
        $this->suma_tot=Foja_ruta::where('foja_rutas.estado_id', 0)
                                    ->join('foja_guias', 'foja_guias.foja_id', 'foja_rutas.id')
                                    ->join('guia_remitos', 'foja_guias.guia_id', 'guia_remitos.guia_id')
                                    ->sum('guia_remitos.m_cubicos');
        
        
        if($this->suma_tot >= 4000) $this->color="red"; 
        elseif($this->suma_tot > 3000 && $this->suma_tot < 4000)  $this->color="orange";
        else $this->color="green";         
        
        if($this->suma_tot>0){
        $foja_actual=Foja_ruta::where('foja_rutas.estado_id', 0)->first();
        $this->observacion=$foja_actual->observacion;                    
        }
    }

    public function consul_foja_activa(){
        $foja=Foja_ruta::latest('created_at')->first(); //último registro de la tabla
        return $foja;
    }

    public function save(){
        
       // $this->validate();


       if($this->completo) $valor=0;
       else $valor=1;
       
       
       $foja=$this->consul_foja_activa();
       //Crea la Nueva Foja de Ruta
       if($foja->estado_id==1){         //Verifica que no exista una Foja pendiente de Carga 
        $foja_actual=Foja_ruta::create([   
                'nro' => $foja->nro+1,
                'fecha_sal' => date('Y-m-d'),
                'm_cub_tot' => 0,
                'completo' => $valor,
                'observacion'=> $this->observacion,
                'estado_id' => 0
            ]);     
        $foja=$foja_actual;    
        }else{
            Foja_ruta::where('id', $foja->id)->update(['observacion' => $this->observacion, 'completo' => $valor]); 
        }    
        
        $this->nro_foja=$foja->nro;
        
        $this->cargar_remitos();

        //Asigna Todas las Guias a la Nueva Foja
        foreach ($this->remitos as $index => $remito){
               $fg=Foja_guia::create([
                    'guia_id' => $remito->guia_id,
                    'foja_id' => $foja->id
                ]);
            array_splice($this->elementos, 0);    //borra los elementos del array
            array_splice($this->remitos, 0);    //borra los elementos del array
            Guia::where('id', $remito->guia_id)->update(['estado_id' => 1]); //Modifica el estado de la Guía con 1 indicando que está en viaje
        } //endforeach

        $this->calcula_m_cub(); //Recalcula los Metros Cúbicos Totales
        $this->cargar_remitos();
        $this->cargar_guias();
    }

    public function removeItem($index){
        unset($this->elementos[$index]);
        $this->elementos = array_values($this->elementos); // Reindexar el arreglo
        $this->cargar_remitos();
        $this->cargar_guias();
    }

    public function quitardeFoja($id){
        Guia::where('id', $id)->update(['estado_id' => 0]); //Modifica el estado de la Guía con 1 indicando que está en viaje
        DB::table('foja_guias')->where('guia_id', $id)->delete(); //Elimina la Guía de la Foja de Ruta
        $this->mensaje="Entró a quitar";
        $this->calcula_m_cub(); //Recalcula los Metros Cúbicos Totales
    }
}
