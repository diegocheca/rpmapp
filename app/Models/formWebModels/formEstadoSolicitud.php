<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formEstadoSolicitud extends Model
{
    use HasFactory;
    protected $table = 'formEstadoSolicitud';
    protected $fillable = [
        'id',
        'nom_estado_solicitud',
        'solicitud_id',
    ];

    //Relacion de mucho a muchos con solicitud
     public function solicitudes()
     {
         return $this->belongsToMany(formSolicitud::class); 
     }
}
