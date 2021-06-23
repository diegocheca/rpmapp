<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    use HasFactory;
    protected $table = 'Provincia';

    protected $fillable = [
        'categoria',
        'centroide_lat',
        'centroide_lon',
        'fuente',
        'id',
        'iso_id',
        'iso_nombre',
        'nombre',
        'nombre_completo'
    ];
}