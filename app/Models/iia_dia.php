<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class iia_dia extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'iia_dia';

    protected $date = ['fecha_notificacion_dia','fecha_vencimiento','created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'actividades',
        'acciones_a_desarrollar',
        'archivo_dia',
        'constancia_inscripcion_ia',
        'created_by',
        'estado'
    ];
}
