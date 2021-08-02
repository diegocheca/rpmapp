<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HistorialReinscripciones extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'historial_reinscripciones';

    protected $date = ['created_at', 'deleted_at', 'updated_at' ];
    protected $casts = [
        'productos' => 'array',
    ];
    protected $fillable = [
        "id_reinscripcion",
        "nombre_evaluacion",
        "nombre_comentario",
        "dni_evaluacion",
        "dni_comentario",
        "cargo_evaluacion",
        "cargo_comentario",
        "porcentaje_venta_provincia_evaluacion",
        "porcentaje_venta_provincia_comentario",
        "porcentaje_venta_otras_provincias_evaluacion",
        "porcentaje_venta_otras_provincias_comentario",
        "porcentaje_exportado_evaluacion",
        "porcentaje_exportado_comentario",
        "prospeccion_evaluacion",
        "prospeccion_comentario",
        "explotacion_evaluacion",
        "explotacion_comentario",
        "desarrollo_evaluacion",
        "desarrollo_comentario",
        "exploracion_evaluacion",
        "exploracion_comentario",
        "personal_perm_profesional_evaluacion",
        "personal_perm_profesional_comentario",
        "personal_perm_operarios_evaluacion",
        "personal_perm_operarios_comentario",
        "personal_perm_administrativos_evaluacion",
        "personal_perm_administrativos_comentario",
        "personal_perm_otros_evaluacion",
        "personal_perm_otros_comentario",
        "personal_trans_profesional_evaluacion",
        "personal_trans_profesional_comentario",
        "personal_trans_operarios_evaluacion",
        "personal_trans_operarios_comentario",
        "personal_trans_administrativos_evaluacion",
        "personal_trans_administrativos_comentario",
        "personal_trans_otros_evaluacion",
        "personal_trans_otros_comentario",
        "productos"
    ];

}
