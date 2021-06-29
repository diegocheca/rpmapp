<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formTerreno extends Model
{
    use HasFactory;
    public function estado_terreno()
    {
        return $this->belongsToMany('App\Models\formWebModels\formEstadoTerreno');
    }
}
