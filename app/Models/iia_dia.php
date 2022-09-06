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

    protected $date = ['fecha_alta_dia','fecha_vencimiento','created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'actividades',
        'acciones_a_desarrollar',
        'dia',
        'iia',
        'created_by',
        'estado',
        'id_formulario',
    ];

    public static function crear_registro_dia_iia($id_formulario)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				$nuevo_dia = new iia_dia;
				$nuevo_dia->actividades =  $formulario_provisorio->actividad;
				$nuevo_dia->acciones_a_desarrollar = $formulario_provisorio->acciones_a_desarrollar;
				$nuevo_dia->dia = $formulario_provisorio->dia;
				$nuevo_dia->iia = $formulario_provisorio->iia;
				$nuevo_dia->fecha_alta_dia = $formulario_provisorio->fecha_alta_dia;
				$nuevo_dia->fecha_vencimiento = $formulario_provisorio->fecha_vencimiento_dia;
				$nuevo_dia->created_by = $formulario_provisorio->created_by;
				$nuevo_dia->estado = "aprobado";
				$nuevo_dia->id_formulario = $id_formulario;
				$nuevo_dia->save();
				return $nuevo_dia->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
}
