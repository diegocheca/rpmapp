<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formMinaTemporal extends Model
{
    //use HasFactory;
    protected $table = 'formMinaTemporal';
    protected $fillable = [
        'id',
        'nombre_mina',
        'descubrimient_directo',
        'muestra',
        'provincia_mina',
        'departamento_mina'        
    ];
    
    //Relacion de Muchos a Muchos con minerales
    public function minerales()
    {
        return $this->belongsToMany('App\Models\formWebModels\formMineral');
    }
    //relacion de muchos a muchos con Estado Terreno
    public function estadoterreno()
    {
        return $this->belongsToMany('App\Models\formWebModels\formEstadoTerreno');
    }
}
