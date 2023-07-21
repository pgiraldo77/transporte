<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remito extends Model
{
    use HasFactory;

    protected $fillable=['nro', 'fecha', 'fecha_sello', 'factura_id','emp_loc_id','observacion'];
   
}
