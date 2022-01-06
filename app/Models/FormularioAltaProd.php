<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormularioAltaProd extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'formulario_alta_prods';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'tipoProductor',
        'cargoEmpresa',
        'presentadorNomApellido',
        'presentador_dni',
        'provincia_id',
        'observacion',
        'estado',
    ];
}
