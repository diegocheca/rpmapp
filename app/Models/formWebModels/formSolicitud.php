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
        'nroexpediente',
        'id_terreno', // terreno
        'plazo_solicitado',
        'programa_trabajo',
        'periodo_trabajo',
        'tiposolicitud_id', // tipo de solicitud
        'cant_UM_otorgada',
        //'tipo_persona_razon',//
        //'id_persona_razonsocial',//
        'id_mina' //mina
    ];
    public function tipo_solicitud()
    {
        return $this->belongsTo(formTipoSolicitud::class, 'tiposolicitud_id');
    }

    //Relacion de muchos a muchos con RolPersona
    public function RolPersona()
    {
        return $this->belongsToMany('App\Models\formWebModels\formRolPersona');
    }

    public function terreno()
    {
        return $this->hasOne(formTerreno::class, 'terreno_id');
    }
    public function mina()
    {
        return $this->hasOne(formMina::class, 'mina_id');
    }

    public function razonsocial()
    {
        return $this->hasOne(formRazonsocial::class, 'razonsocial_id');
    }

}
