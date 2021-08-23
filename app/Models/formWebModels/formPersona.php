<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formPersona extends Model
{
    use HasFactory;
    protected $table = 'formPersona';
    protected $fillable = [
        'id',
        'nombre',
        'razon_social',
        'dni',
        'sexo',          
        'apellido',
        'fecha_nacimiento',
        'nacionalidad',
        'profefsion',
        'estado_civil',
        

        'domicilioLegal',
        'provinciaLegal',
        'departamentoLegal',
        'localidadLegal',

        'domicilio',
        'provincia',
        'departamento',
        'localidad',

        'tipodocumento_id',

    ];
    //Relacion de uno a muchos Tipo docuemnto
    public function tipodocumento()
    {
        return $this->hasMany('App\Models\formWebModels\formTipoDocumento');
    }
    
     public function solicitud()
     {
         return $this->belongsToMany(formSolicitud::class);
     }  

   
}
