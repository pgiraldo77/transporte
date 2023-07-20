<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coche extends Model
{
    use HasFactory;

    protected $fillable=['detalle', 'cap_carga', 'modelo', 'image'];

   // protected $guarded=['status'];
}
