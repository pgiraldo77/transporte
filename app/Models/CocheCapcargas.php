<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Coche;
use App\Models\CapCarga;


class CocheCapcargas extends Model
{
    use HasFactory;
    protected $table = 'coche_capcargas';
    protected $fillable = ['coche_id', 'cap_carga_id'];


  /*  public function coches(){
        return $this->belongsToMany(Coche::class, 'coche_capcargas')->withPivot('id');
    }

    public function capcargas(){
        return $this->belongsToMany(CapCarga::class, 'coche_capcargas')->withPivot('id');
    }*/
}
