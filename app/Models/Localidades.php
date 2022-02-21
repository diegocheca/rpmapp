<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    use HasFactory;
    protected $table = 'Localidad';

    protected $fillable = [
        'categoria',
        'centroide_lat',
        'centroide_lon',
        'departamento_nombre',
        'fuente',
        'id',
        'localidad_censal_id',
        'localidad_censal_nombre',
        'municipio_id',
        'municipio_nombre',
        'nombre',
        'provincia_id',
        'provincia_nombre',
        'departamento_id'
    ];

}
