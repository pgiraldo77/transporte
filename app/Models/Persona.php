<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $fillable=['apellido', 'nombre', 'cuil', 'domicilio','telefono','estado_id'];

    //Relación Muchos a Muchos
    public function emp_pers(){
        return $this->belongsToMany(Empper::class,'emp_pers');
    }
}
