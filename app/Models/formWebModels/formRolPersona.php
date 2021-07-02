<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolPersona extends Model
{
    //use HasFactory;
    protected $table = 'RolPersona';
    protected $fillable = [
        'id',
        'tiporol_id'        
    ];

    // Relacion de muchos a muchos Solicitud
    public function solicitud()
    {
        return $this->belongsToMany('App\Models\formWebModels\formSolicitud');
    }

     //Relacion de uno a muchos TipoRol
     public function tiporol()
     {
         return $this->hasMany('App\Models\formWebModels\formTipoRol');
     }
}

