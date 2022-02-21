<?php

namespace App\Models\formWebModels;
use App\Models\Minerales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formTerreno extends Model
{
    use HasFactory;
    protected $table = 'formTerreno';
    protected $fillable = [
        'id',        
        'superficie',
        'provincia',
        'departamento',
        'localidad',
        'solicitud_id',        
        'paraje'
    ];

    //Relacion de Muchos a Muchos con Estado Terreno 
    public function estado_terreno()
    {
        return $this->belongsToMany(formEstadoTerreno::class);
    }

    //Relaicion de 1 a 1 con Matricula Catastral
    public function matricula()
    {
        return $this->hasOne(formMatriculaCatastral::class);
        
    }

    //Relaicion de 1 a 1 con Matricula Catastral Provisoria
    public function mcprovisoria()
    {
        return $this->hasOne(formMCProvisoria::class);
        
    }
    
    //Relacion de Muchos a Muchos con Mineral 
    public function mineral()
    {
        return $this->belongsToMany(Minerales::class);
        
    }

    //Relaicion de 1 a 1 con Cordenadass Poligonales
    public function coordenadas()
    {
        return $this->hasOne(formCoordenadasPoligonal::class);
    }
    //Relacion Inversa de 1 a 1 con Solicitud
    public function solicitud()
    {
        return $this->belongsTo(formSolicitud::class);

    }
}
