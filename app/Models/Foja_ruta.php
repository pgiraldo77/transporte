<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foja_ruta extends Model
{
    use HasFactory;

    protected $fillable=['nro', 'm_cub_tot', 'fecha_sal', 'completo','observacion','estado_id'];
}
