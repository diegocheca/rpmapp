<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formEstadoTerreno extends Model
{
    use HasFactory;
    public function terreno()
    {
        return $this->belongsToMany('App\Models\formWebModels\formTerreno');
    }
}
