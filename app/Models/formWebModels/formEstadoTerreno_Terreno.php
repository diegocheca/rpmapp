<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formEstadoTerreno_Terreno extends Model
{
    use HasFactory;
    protected $table = 'formEstadoTerreno_Terreno';
    protected $fillable = [
        'id_terreno', // terreno
        'id_estadoTerreno' // estado
    ];
}
