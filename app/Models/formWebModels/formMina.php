<?php

namespace App\Models\formWebModels;
use App\Models\Minerales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formMina extends Model
{
    //use HasFactory;
    protected $table = 'formMina';
    protected $fillable = [
        'id',
        'nombre_mina',
        'terreno_id',              
    ];
    
    //Relacion de Muchos a Muchos con minerales
    public function minerales()
    {
        return $this->belongsToMany(Minerales::class);
    }
    //relacion de muchos a muchos con Estado Terreno
    public function estadoterreno()
    {
        return $this->belongsToMany('App\Models\formWebModels\formEstadoTerreno');
    }
    //relacion de muchos a muchos con Mina Colindante 
    public function colindante()
     {
         return $this->belongsToMany(formMinaColindante::class);
     }

}
