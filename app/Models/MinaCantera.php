<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class MinaCantera extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mina_cantera';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'tipo',
        'localidad_mina_pais',
        'localidad_mina_provincia',
        'localidad_mina_departamento',
        'localidad_mina_localidad',
        'nombre',
        'descripcion',
        'categoria',
        'distrito_minero',
        'tipo_sistema',
        'longitud',
        'latitud',
        'labores',
        'id_producido',
        'plano_inmueble',
        'created_by',
        'estado',
        'titulo_contrato_posecion',
		'resolucion_concesion_minera',
        'owner',
        'arrendatario',
        'concesionario',
        'otros',
        'acciones_a_desarrollar',
        'actividad',
        'sustancias_de_aprovechamiento_comun',
        'otro_caracter_acalaracion',
        'sustancias_de_aprovechamiento_comun_aclaracion',
        'id_formulario'

    ];

    public static function crear_registro_mina_cantera($id_formulario)
	{
		if ($id_formulario > 1) {
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				$mina_cantera = new MinaCantera();
				$mina_cantera->numero_expediente = $formulario_provisorio->numero_expediente;
				$mina_cantera->distrito_minero = $formulario_provisorio->distrito_minero;
				$mina_cantera->categoria = $formulario_provisorio->categoria;
				$mina_cantera->nombre = $formulario_provisorio->nombre_mina;
				$mina_cantera->descripcion = $formulario_provisorio->descripcion_mina;
				if ($formulario_provisorio->categoria === 'tercera')
					$mina_cantera->tipo = "cantera";
				else 	$mina_cantera->tipo = "mina";
				$mina_cantera->plano_inmueble = $formulario_provisorio->plano_inmueble;
				$mina_cantera->titulo_contrato_posecion = $formulario_provisorio->titulo_contrato_posecion;
				$mina_cantera->resolucion_concesion_minera = $formulario_provisorio->resolucion_concesion_minera;
				//minerales
				//pagina mina segunda
				$mina_cantera->owner = $formulario_provisorio->owner;
				$mina_cantera->arrendatario = $formulario_provisorio->arrendatario;
				$mina_cantera->concesionario = $formulario_provisorio->concesionario;
				$mina_cantera->otros = $formulario_provisorio->otros;
				$mina_cantera->acciones_a_desarrollar = $formulario_provisorio->acciones_a_desarrollar;
				$mina_cantera->actividad = $formulario_provisorio->actividad;
				$mina_cantera->sustancias_de_aprovechamiento_comun = $formulario_provisorio->sustancias_de_aprovechamiento_comun;
				$mina_cantera->otro_caracter_acalaracion = $formulario_provisorio->otro_caracter_acalaracion;
				$mina_cantera->sustancias_de_aprovechamiento_comun_aclaracion = $formulario_provisorio->sustancias_de_aprovechamiento_comun_aclaracion;
				//ubicacion de la mina
				$mina_cantera->localidad_mina_pais = "Argentina";
				$mina_cantera->localidad_mina_provincia = $formulario_provisorio->localidad_mina_provincia;
				$mina_cantera->localidad_mina_departamento = $formulario_provisorio->localidad_mina_departamento;
				$mina_cantera->localidad_mina_localidad = $formulario_provisorio->localidad_mina_localidad;
				$mina_cantera->tipo_sistema = $formulario_provisorio->tipo_sistema;
				$mina_cantera->longitud = $formulario_provisorio->longitud;
				$mina_cantera->latitud = $formulario_provisorio->latitud;
				$mina_cantera->labores = null;
				$mina_cantera->id_producido = null;
				$mina_cantera->created_by = $formulario_provisorio->created_by;
				$mina_cantera->estado = "aprobado";
				$mina_cantera->id_formulario = $id_formulario;
				$mina_cantera->save();
				return $mina_cantera->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
}
