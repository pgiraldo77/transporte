<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Emp_loc extends Model
{
    use HasFactory;

    protected $fillable=['empresa_id', 'localidad_id', 'direccion','telefono'];
}
