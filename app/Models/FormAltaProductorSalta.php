<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormAltaProductorSalta extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'form_alta_productoresSalta';
    protected $date = ['created_by','created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
    'id_formulario_alta',
    'tipo',
    'representante_legal_nombre',
    'representante_legal_apellido',
    'representante_legal_dni',
    'representante_legal_email',
    'representante_legal_cargo',
    'representante_legal_domicilio',
    'nacionalidad',
    'telefono',
    'superficie_mina',
    'volumenes_de_extraccion_periodo_anterior',
    'n_resolucion_iia',
    'etapa_de_exploracion',
    'n_resolucion_aprobacion_informe',
    'etapa_de_exploracion_avanzada',
    'volumenes_anuales_de_materias_primas',
    'material_obtenido',
    'autorizacion_extractivas_exploratorias',
    'responsable_nombre',
    'responsable_apellido',
    'responsable_dni',
    'responsable_titulo',
    'responsable_matricula',
    'ley_24196_numero',
    'ley_24196_inscripcion_renar',
    'ley_24196_explosivos',
    'ley_24196_propiedad',
    'estado_contable',
    'listado_de_maquinaria',
    'regalias',
    'listado_de_maquinaria',
    'personas_afectadas',
    'multas',
    'created_by',
    'updated_by'
    ];
    

}
