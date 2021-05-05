<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class EmpresaDestino extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'empresa_destino';

    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
    'nombre_empresa',
	'dom_empresa_pais',
	'dom_empresa_provincia',
	'dom_empresa_departamento',
	'dom_empresa_cp',
	'actividad_empresa',
	'created_by',
	'estado'
    ];
}
