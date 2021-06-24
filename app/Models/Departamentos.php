<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamentos extends Model
{
    use HasFactory;
    protected $table = 'Departamento';

    protected $fillable = [
        'categoria',
        'centroide_lat',
        'centroide_lon',
        'fuente',
        'id',
        'nombre',
        'nombre_completo',
        'provincia_id',
        'provincia_interseccion',
        'provincia_nombre',

    ];

}