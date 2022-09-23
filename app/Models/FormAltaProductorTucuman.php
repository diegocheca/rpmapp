<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormAltaProductorTucuman extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'formulario_tucuman';
    protected $date = ['created_by', 'updated_by', 'created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'id_formulario_alta',
        'tipo',
        'dni_frente_persona',
        'dni_reverso_persona',
        'dni_frente_gerente',
        'dni_reverso_gerente',
        'dni_frente_representante_legal',
        'dni_reverso_representante_legal',
        'representante_apellido',
        'representante_nombre',
        'representante_dni',
        'persona_autorizada_nombre',
        'persona_autorizada_apellido',
        'persona_autorizada_dni',
        'persona_autorizada_telefono',
        'persona_autorizada_email',
        'persona_autorizada_domicilio',
        'personaria_de_la_socidedad',
        'personeria_del_representante_legal',
        'decreto_de_nombramiento',

        'paso_tuc_progreso',
        'paso_tuc_aprobado',
        'paso_tuc_reprobado',
        'created_by',
        'updated_by',
    ];
}
