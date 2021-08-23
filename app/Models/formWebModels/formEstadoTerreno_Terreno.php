<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formEstadoTerreno_Terreno extends Model
{
    use HasFactory;
    protected $table = 'formEstadoTerreno_Terreno';
    protected $fillable = [
        'terreno_id', // terreno
        'estadoTerreno_id' // estado
    ];
}
