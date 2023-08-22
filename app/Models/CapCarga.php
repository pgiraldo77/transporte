<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coche;

class CapCarga extends Model
{
    use HasFactory;
    protected $table = 'capcargas';
    protected $fillable=['nombre', 'm_cubicos'];

    //Relación Muchos a Muchos
    public function coches(){
        return $this->belongsToMany(coche::class,'coche_capcargas');
    }
}
