<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Pagocanonmina extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pagocanonmina';

    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'id',
        'pagado',
        'fecha_pago',
        'monto',
        'fecha_desde',
        'fecha_hasta',
        'created_by',
        'estado',
    ];
    public static function crear_registro_pago_canon($id_formulario)
	{
		if ($id_formulario > 1) {
			//busco formulario provisorio
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				//creo el pago de canon
				$nuevo_pago = new Pagocanonmina;
				//$nuevo_pago->pagado = $formulario_provisorio->pagado;
				$nuevo_pago->pagado = true;
				//$nuevo_pago->fecha_pago = $formulario_provisorio->fecha_pago;
				$nuevo_pago->fecha_pago = null;// Carbon::now()->subDays(7);
				//$nuevo_pago->monto = $formulario_provisorio->monto;
				$nuevo_pago->monto = 0.00;
				//$nuevo_pago->fecha_desde = $formulario_provisorio->fecha_desde;
				$nuevo_pago->fecha_desde = null;// Carbon::now();
				//$nuevo_pago->fecha_hasta = $formulario_provisorio->fecha_hasta;
				$nuevo_pago->fecha_hasta = null;// Carbon::now()->addMonth(6);
				$nuevo_pago->created_by = $formulario_provisorio->created_by;
				$nuevo_pago->estado = "aprobado";
				$nuevo_pago->id_formulario = $id_formulario;
				$nuevo_pago->save();
				return $nuevo_pago->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
}
