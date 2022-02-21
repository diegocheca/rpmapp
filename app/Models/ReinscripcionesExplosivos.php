<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReinscripcionesExplosivos extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reinscripcionesExplosivos';

    protected $date = ['created_at', 'deleted_at', 'updated_at', 'fecha_vto' ];
    protected $fillable = [
        'id_reinscripcion',
        'nombre_explosivo',
        'tipo_explosivo',
        'cantidad_explosivo',
        'observaciones_explosivo',
        'almacenamiento_explosivo',
        'evaluacion',
        'comentario',
        'created_by'
    ];

    // public function productos()
    // {
    //     return $this->hasMany(Productos::class, 'id_reinscripcion');
    // }

}
