<?php

namespace App\Http\Livewire;

use App\Models\Foja_ruta;
use App\Models\Guia_remito;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Foja_guia;
use App\Models\Guia;

class CreateFojaRutas extends Component
{

    public $sort = 'id';
    public $direccion = 'asc';
    public $variable, $bultos, $completo=false, $inputValue, $inputbultos=[], $inputvalordec=[], $nro_foja, $observacion;

    public $elementos;
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
       $this->cargar_remitos();
    }

    public function cargar_remitos(){
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
    }

  
    
    public function render()
    {

        return view('livewire.create-foja-rutas');
    }

    public function save(){
        
       // $this->validate();


       if($this->completo) $valor=0;
       else $valor=1;
       //Crea la Nueva Foja de Ruta
        $foja_ant=Foja_ruta::latest('created_at')->first(); //último registro de la tabla
        $foja=Foja_ruta::create([
            'nro' => $foja_ant->nro+1,
            'fecha_sal' => date('Y-m-d'),
            'm_cub_tot' => 0,
            'completo' => $valor,
            'observacion'=> $this->observacion
        ]);

        
        $this->nro_foja=$foja->nro;
        $this->cargar_remitos();
        //Asigna Todas las Guias a la Nueva Foja
        foreach ($this->remitos as $index => $remito){
                Foja_guia::create([
                    'guia_id' => $remito->guia_id,
                    'foja_id' => $foja->id
                ]);
            Guia::where('id', $remito->guia_id)->update(['estado_id' => 1]); //Modifica el estado de la Guía a  1 indicando que está en viaje
        } //endforeach



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
