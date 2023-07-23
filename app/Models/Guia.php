<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guia extends Model
{
    use HasFactory;
    protected $fillable=['nro', 'm_cub_tot', 'fecha_sal', 'completo','observacion','estado_id'];

    public function existe($emp_loco_id,$emp_locd_id,$fecha){
            $cons=Guia::where('fecha_sal', $fecha)
                  ->join('origen_dests', 'tabla', '=', 'guia') 
                  ->and('origen_dests.emp_loco_id',$emp_loco_id) 
                  ->and('origen_dests.emp_locd_id', $emp_locd_id)    
                  ->get();
            return $cons;
    }
}
