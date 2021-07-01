<?php

namespace App\Models\formWebModels;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formSolicitud extends Model
{
    //use HasFactory;
    protected $table = 'formSolicitud';
    protected $fillable = [
        'id',
        'id_terreno', // terreno_id
        'plazo_solicitado',
        'programa_trabajo',
        'periodo_trabajo',
        'tiposolicitud_id',
        'cant_UM_otorgada',
        'id_mina'
    ];
    public function tipo_solicitud()
    {
        return $this->belongsTo(formTipoSolicitud::class, 'tiposolicitud_id');
    }

    //Relacion de muchos a muchos con RolPersona
    public function materias()
    {
        return $this->belongsToMany('App\Models\formWebModels\formRolPersona');
    }

}
