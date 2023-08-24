<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empper extends Model
{
    use HasFactory;
    protected $table='emp_pers';
    protected $fillable=['empresa_id', 'funcion_id', 'persona_id', 'estado_id'];
}
