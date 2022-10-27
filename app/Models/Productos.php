<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'productos';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at' ];
    protected $fillable = [
        'id_reinscripcion',
        'id_mina',
        'nombre_mineral',
        'variedad',
        'produccion',
        'unidades',
        'otra_unidad',
        'precio_venta',
        'created_by',
        'estado',
        'ley',
        'calidad',
        'volumen_comercializado',
        'volumen_acopiado',
        'volumen_descarte',
        'capacidad',
        'explotacion',

        'nombre_mineral_evaluacion',
        'id_mina_evaluacion',
        'variedad_evaluacion',
        'produccion_evaluacion',
        'unidades_evaluacion',
        'precio_venta_evaluacion',
        'ley_evaluacion',
        'calidad_evaluacion',
        'volumen_comercializado_evaluacion',
        'volumen_acopiado_evaluacion',
        'volumen_descarte_evaluacion',
        'capacidad_evaluacion',
        'explotacion_evaluacion',
        'expediente_evaluacion',
        'nombre_mineral_evaluacion',
        'derecho_evaluacion',
        'sustancia_evaluacion',
        'ubicacion_evaluacion',
        'superficie_evaluacion',
        'etapa_evaluacion',
        'resolucion_evaluacion',

        'nombre_mineral_comentario',
        'id_mina_evaluacion',
        'variedad_comentario',
        'produccion_comentario',
        'unidades_comentario',
        'precio_venta_comentario',
        'ley_comentario',
        'calidad_comentario',
        'volumen_comercializado_comentario',
        'volumen_acopiado_comentario',
        'volumen_descarte_comentario',
        'capacidad_comentario',
        'explotacion_comentario',
        'expediente_comentario',
        'nombre_mineral_comentario',
        'derecho_comentario',
        'sustancia_comentario',
        'ubicacion_comentario',
        'superficie_comentario',
        'etapa_comentario',
        'resolucion_comentario',

        // San Luis
        'ley',
        'calidad',
        'observaciones',

        //Salta
        'expediente',
        'nombre_mineral',
        'derecho',
        'sustancia',
        'ubicacion',
        'superficie',
        'etapa',
        'resolucion',
    ];

    public function comercializacion()
    {
        return $this->hasMany(ReinscripcionesComercializacion::class, 'id_productos');
    }

    public function produccionMes()
    {
        return $this->hasMany(ReinscripcionesProduccion::class, 'id_productos');
    }
}
