<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formMineral extends Model
{
    use HasFactory;
    //Relacion de Muchos a Muchos con Mina Temporal
    public function minatemporal()
    {
        return $this->belongsToMany('App\Models\formWebModels\formMinaTemporal');
    }
}
