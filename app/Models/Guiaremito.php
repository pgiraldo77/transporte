<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guiaremito extends Model
{
    use HasFactory;
    protected $fillable=['guia_id','remito_id','bultos', 'valor_dec', 'posicion', 'm_cubicos', 'kgr'];
}
