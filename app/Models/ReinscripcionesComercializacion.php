<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReinscripcionesComercializacion extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reinscripcionesComercializacion';

    protected $date = ['created_at', 'deleted_at', 'updated_at', 'fecha_vto' ];
    protected $fillable = [
        'id_productos',
        'cantidad',
        'firma',
        'destino',

        'variedad_calidad',
        'granul',
        'ley_tipo',
        'ley_valor',
        'precio_venta',
        'no_vendido',

        'evaluacion',
        'comentario',
        'created_by'
    ];

    // public function productos()
    // {
    //     return $this->hasMany(Productos::class, 'id_reinscripcion');
    // }

}
