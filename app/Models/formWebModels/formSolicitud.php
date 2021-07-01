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
        'id_mina' //mina
    ];
    public function tipo_solicitud()
    {
        return $this->belongsTo(formTipoSolicitud::class, 'tiposolicitud_id');
    }
    public function terreno()
    {
        return $this->hasOne(formTerreno::class, 'id_terreno');
    }
    public function mina()
    {
        return $this->hasOne(formMina::class, 'id_mina');
    }
}
