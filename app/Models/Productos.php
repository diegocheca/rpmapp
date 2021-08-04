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

    protected $date = ['created_at', 'deleted_at', 'updated_at' ];
    protected $fillable = [
        'id_reinscripcion',
        'nombre_mineral',
        'variedad',
        'produccion',
        'unidades',
        'otra_unidad',
        'precio_venta',
        'created_by',
        'estado',
    ];

}
