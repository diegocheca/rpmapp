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
        'tipo_solicitud', 
        'plazo_solicitado',
        'programa_trabajo',
        'periodo_trabajo', 
        'nro_expediente',
       
    ];

    public function tipo_solicitud()
    {
        return $this->belongsTo(formTipoSolicitud::class, 'tiposolicitud_id');
    }
    
    public function persona()
    {
        return $this->belongsToMany(formPersona::class);
    }

    public function razonsocial()
    {
        return $this->belongsToMany(formRazonsocial::class);
    }
    
    public function terreno()
    {
        return $this->hasOne(formTerreno::class);
    }

    // public function mina()
    // {
    //     return $this->hasOne(formMina::class, 'mina_id');
    // }

    

}
