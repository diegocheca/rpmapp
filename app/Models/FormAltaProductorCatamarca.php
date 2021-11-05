<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAltaProductorCatamarca extends Model
{
    use HasFactory;

    protected $table = 'form_alta_productoresCatamarca';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'gestor_nombre_apellido',
        'gestor_dni',
        'gestor_profesion',
        'gestor_telefono',
        'gestor_notificacion',
        'gestor_email',
        'primer_hoja_dni',
        'segunda_hoja_dni',
        'foto_4x4',
        'constancia_afip',
        'gestor_nombre_apellido_correcto',
        'obs_gestor_nombre_apellido',
        'gestor_dni_correcto',
        'obs_gestor_dni',
        'gestor_profesion_correcto',
        'obs_gestor_profesion',
        'gestor_telefono_correcto',
        'obs_gestor_telefono',
        'gestor_notificacion_correcto',
        'obs_gestor_notificacion',
        'gestor_email_correcto',
        'obs_gestor_email',
        'hoja_dni_correcto',
        'obs_hoja_dni',
        'foto_4x4_correcto',
        'obs_foto_4x4',
        'constancia_afip_correcto',
        'obs_constancia_afip',
        'paso_aprobado',
        'paso_reprobado',
        'paso_progreso',
        'created_by',
        'updated_by',
        'id_formulario_alta',
        'created_at',
        'updated_at',
        'deleted_at',
        'autorizacion_gestor',
        'autorizacion_gestor_correcto',
        'obs_autorizacion_gestor',
    ];
}
