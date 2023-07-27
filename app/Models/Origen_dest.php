<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Origen_dest extends Model
{
    use HasFactory;
    protected $fillable=['tabla','tabla_id','subid', 'emp_loco_id', 'emp_locd_id'];
}
