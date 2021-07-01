<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MinaTemporal_Mineral extends Model
{
    //use HasFactory;
    protected $table = 'MinaTemporal_Mineral';
    protected $fillable = [
        'id',
        'estado_mineral', 
        'minatemporal_id',
        'mineral_id'        
    ];
}
