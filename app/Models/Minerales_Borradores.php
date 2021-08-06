<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minerales_Borradores extends Model
{
    use HasFactory;
    protected $table = 'minerales_borradores';

    protected $fillable = [
        'id_formulario',
        'id_mineral',
        'lugar_donde_se_encuentra',
        'variedad',
        'segunda_cat_mineral_explotado',
        'mostrar_lugar_segunda_cat',
        'mostrar_otro_mineral_segunda_cat',
        'otro_mineral_segunda_cat',
        'observacion',
        'clase_text_area_presentacion',
        'clase_text_evaluacion_de_text_area_presentacion',
        'texto_validacion_text_area_presentacion',
        'presentacion_valida',
        'evaluacion_correcto',
        'observacion_autoridad',
        'clase_text_area',
        'clase_text_evaluacion_de_text_area',
        'texto_validacion_text_area',
        'obs_valida',
        'lista_de_minerales_array',
        'thumb',
        'created_by',
        'estado',
        'updated_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
