<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ProductorMina extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'productor_mina';
	protected $guarded = [];
	protected $date = ['created_at', 'deleted_at', 'updated_at','fecha_preinscripcion','fecha_renovacion'];
    protected $fillable = [
    'id_mina',
	'id_productor',
	'id_formulario',
	'id_dia',
	'id_personal',
	'num_expediente_SIGETRAMI',
	'constancia_otros',
	'resol_concecion_minera',
	'fecha_preinscripcion',
	'fecha_renovacion',
	'primera_inscripcion',
	'caracter',
	'constancia_posecion',
	'periodo'
    ];
}
