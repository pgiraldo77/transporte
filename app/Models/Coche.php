<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Capcarga;

class Coche extends Model
{
    use HasFactory;

    protected $fillable=['nro', 'tipo_coche_id'];

    //Relación Muchos a Muchos
    public function capcargas(){
        return $this->belongsToMany(Capcarga::class,'coche_capcargas');
    }
}
