<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productores extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'productores';

    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'cuit',
        'razonsocial',
        'numeroproductor',
        'email',
        'domicilio_prod',
        'tiposociedad',
        'inscripciondgr',
        'constaciasociedad',
        'leal_calle',
        'leal_numero',
        'leal_telefono',
        'leal_pais',
        'leal_provincia',
        'leal_departamento',
        'leal_localidad',
        'leal_cp',
        'leal_otro',
        'administracion_calle',
        'administracion_numero',
        'administracion_telefono',
        'administracion_pais',
        'administracion_provincia',
        'administracion_departamento',
        'administracion_localidad',
        'administracion_cp',
        'administracion_otro',
        'numero_expdiente',
        'created_by',
        'estado',
        'created_at',
        'deleted_at',
        'updated_at' ,
    ];
}
