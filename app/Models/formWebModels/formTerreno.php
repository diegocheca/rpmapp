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
        'solicitud_id'
    ];
    public function estado_terreno()
    {
        return $this->belongsToMany(formEstadoTerreno::class);
    }

    public function matricula()
    {
        return $this->hasOne(formMatriculaCatastral::class);
        
    }

    public function mineral()
    {
        return $this->belongsToMany(Minerales::class);
        
    }
    public function coordenadas()
    {
        return $this->hasOne(formCoordenadasPoligonal::class);
    }

    public function solicitud()
    {
        return $this->belongsTo(formSolicitud::class);

    }
}
