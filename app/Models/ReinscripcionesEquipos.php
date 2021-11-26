<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReinscripcionesEquipos extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reinscripcionesEquipos';

    protected $date = ['created_at', 'deleted_at', 'updated_at', 'fecha_vto' ];
    protected $fillable = [
        'id_reinscripcion',
        'marca',
        'cantidad',
        'observaciones',
        'nombre',
        'evaluacion',
        'comentario',
        'created_by'
    ];

    // public function productos()
    // {
    //     return $this->hasMany(Productos::class, 'id_reinscripcion');
    // }

}
