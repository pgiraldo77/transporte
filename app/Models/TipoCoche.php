<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCoche extends Model
{
    use HasFactory;

    protected $table='tipo_coches';
    protected $fillable=['tipo'];
}
