<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MinaCantera extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mina_cantera';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'tipo',
        'localidad_mina_pais',
        'localidad_mina_provincia',
        'localidad_mina_departamento',
        'localidad_mina_localidad',
        'nombre',
        'descripcion',
        'categoria',
        'distrito_minero',
        'tipo_sistema',
        'longitud',
        'latitud',
        'labores',
        'id_producido',
        'plano_inmueble',
        'created_by',
        'estado',
        'titulo_contrato_posecion',
		'resolucion_concesion_minera',
        'owner',
        'arrendatario',
        'concesionario',
        'otros',
        'acciones_a_desarrollar',
        'actividad',
        'sustancias_de_aprovechamiento_comun',
        'otro_caracter_acalaracion',
        'sustancias_de_aprovechamiento_comun_aclaracion',
        'id_formulario'

    ];
}
