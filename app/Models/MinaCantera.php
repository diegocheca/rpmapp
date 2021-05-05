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

    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'localidad_mina_pais',
        'localidad_mina_provincia',
        'localidad_mina_departamento',
        'localidad_mina_localidad',
        'nombre',
        'distrito_minero',
        'tipo_sistema',
        'longitud',
        'latitud',
        'labores',
        'id_producido',
        'plano_inmueble',
        'created_by',
        'estado'
    ];
}
