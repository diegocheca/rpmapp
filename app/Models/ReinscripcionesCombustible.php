<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReinscripcionesCombustible extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reinscripcionesCombustible';

    protected $date = ['created_at', 'deleted_at', 'updated_at', 'fecha_vto' ];
    protected $fillable = [
        'id_reinscripcion',
        'nombre',
        'tipo',
        'cantidad',
        'observaciones',
        'evaluacion',
        'comentario',
        'created_by'
    ];

    // public function productos()
    // {
    //     return $this->hasMany(Productos::class, 'id_reinscripcion');
    // }

}
