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
        'dni',
        'sexo',
        'apellido',        
        'fecha_nacimiento',
        'nacionalidad',
        'profefsion',
        'estado_civil',
        'domi_legal',
        'prov_domi_legal',
        'dpto_domi_legal',
        'domi_real',
        'prov_domi_real',
        'dpto_domi_real',
        'tipodocumento_id',

    ];
    //Relacion de uno a muchos Tipo docuemnto
    public function tipodocumento()
    {
        return $this->hasMany('App\Models\formWebModels\formTipoDocumento');
    }
}
