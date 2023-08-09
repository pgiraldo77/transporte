<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foja_guia extends Model
{
    use HasFactory;
    protected $fillable=['guia_id','foja_id'];
}
