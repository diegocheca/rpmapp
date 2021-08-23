<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formEstadoTerreno extends Model
{
    use HasFactory;
    protected $table = 'formEstadoTerreno';
    protected $fillable = [
        'id',
        'nombre_estado'        
    ];
    //Relacion de mucho a muchos con Terreno
    public function terreno()
    {
        return $this->belongsToMany('App\Models\formWebModels\formTerreno');
    }
    
    //relacion de muchos a muchos con Estado Terreno
    public function minatemporal()
    {
        return $this->belongsToMany('App\Models\formWebModels\formMinaTemporal');
    }
}
