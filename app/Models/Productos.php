<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Faker\Factory as Faker;

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

        // San Luis
        'ley',
        'calidad',
        'observaciones',

    ];

    public function comercializacion()
    {
        return $this->hasMany(ReinscripcionesComercializacion::class, 'id_productos');
    }

    public function produccion()
    {
        return $this->hasMany(ReinscripcionesProduccion::class, 'id_productos');
    }

    public function producto_faker($id_reinscripcion,$user_id){
        $faker = Faker::create();

        $this->id_reinscripcion = $id_reinscripcion;
        $this->id_mina = null;
        $this->nombre_mineral = null;
        $this->variedad = "natural";
        $this->produccion = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 999999);
        $this->unidades = "ton";
        $this->otra_unidad = null;
        $this->precio_venta = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 999999);
        $this->created_by = $user_id;
        $this->estado = "aprobado";
        $this->ley =null;
        $this->calidad = null;
        $this->volumen_comercializado = null;
        $this->volumen_acopiado = null;
        $this->volumen_descarte = null;
        $this->capacidad = null;
        $this->explotacion = null;
        $this->nombre_mineral_evaluacion = null;
        $this->id_mina_evaluacion = null;
        $this->variedad_evaluacion = null;
        $this->produccion_evaluacion = null;
        $this->unidades_evaluacion = null;
        $this->precio_venta_evaluacion = null;
        $this->ley_evaluacion = null;
        $this->calidad_evaluacion = null;
        $this->volumen_comercializado_evaluacion = null;
        $this->volumen_acopiado_evaluacion = null;
        $this->volumen_descarte_evaluacion = null;
        $this->capacidad_evaluacion = null;
        $this->explotacion_evaluacion = null;
        $this->nombre_mineral_comentario = null;
        $this->id_mina_evaluacion = null;
        $this->variedad_comentario = null;
        $this->produccion_comentario = null;
        $this->unidades_comentario = null;
        $this->precio_venta_comentario = null;
        $this->ley_comentario = null;
        $this->calidad_comentario = null;
        $this->volumen_comercializado_comentario = null;
        $this->volumen_acopiado_comentario = null;
        $this->volumen_descarte_comentario = null;
        $this->capacidad_comentario = null;
        $this->explotacion_comentario = null;

        $this->save();

        // San Luis
        /*'ley',
        'calidad',
        'observaciones',*/
    }
}
