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
        'des_directo',
        'muestra', 
        'sub_estado',
        'estado',
        'fecha_estado',
        'user_id',
        'user_name',      
    ];

        
    public function persona()
    {
        return $this->belongsToMany(formPersona::class);
    }
    
    
    public function terreno()
    {
        return $this->hasOne(formTerreno::class);
    }

    //Relacion de mucho a muchos con estado solicitud
    // public function estados()
    // {
    //     return $this->belongsToMany(formEstadoSolicitud::class); 
    // }
     

}
