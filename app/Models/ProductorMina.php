<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Carbon\Carbon;

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

	public static function crear_mina_productor($id_formulario, $id_mina, $id_productor, $id_dia)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				//dd($id_formulario,$id_mina, $id_productor, $id_dia);
				//creo la relacion mina productor
				$nuevo_mina_prod = new ProductorMina;
				$nuevo_mina_prod->id_mina = $id_mina;
				$nuevo_mina_prod->id_productor = $id_productor;
				$nuevo_mina_prod->id_formulario = $id_formulario;
				$nuevo_mina_prod->id_dia = $id_dia;
				$nuevo_mina_prod->id_personal = null;
				$nuevo_mina_prod->num_expediente_SIGETRAMI = 0;
				$nuevo_mina_prod->constancia_otros = null;
				$nuevo_mina_prod->resol_concecion_minera = null;
				$nuevo_mina_prod->fecha_preinscripcion = Carbon::now()->subDays(120);
				$nuevo_mina_prod->fecha_renovacion = Carbon::now()->addMonth(6);
				$nuevo_mina_prod->primera_inscripcion = null;
				$nuevo_mina_prod->caracter = null;
				$nuevo_mina_prod->constancia_posecion = null;
				$nuevo_mina_prod->save();
				return $nuevo_mina_prod->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
}
