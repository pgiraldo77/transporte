<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    protected $fillable=['nro', 'tipo_coche_id'];

   // protected $guarded=['status'];
}
