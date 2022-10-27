<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\FormAltaProductor; 
use Faker\Factory as Faker;


class Productores extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'productores';
    protected $guarded = [];
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
        'updated_at',
        'id_formulario'
    ];

    public static function crear_nuevo_productor($id_formulario){
        $faker = Faker::create();
		if ($id_formulario > 1) {
			//busco formulario provisorio
			$formulario_provisorio = FormAltaProductor::find($id_formulario);
			if ($formulario_provisorio != null) {
				$productor = new Productores();
				$productor->cuit = $formulario_provisorio->cuit;
				$productor->razonsocial = $formulario_provisorio->razonsocial;
				$productor->numeroproductor = $formulario_provisorio->numeroproductor;
				$productor->email = $formulario_provisorio->email;
				$productor->domicilio_prod = "Sin Domicilio";
				$productor->tiposociedad = $formulario_provisorio->tiposociedad;
				$productor->inscripciondgr = $formulario_provisorio->inscripciondgr;
				$productor->constaciasociedad = $formulario_provisorio->constaciasociedad;
				$productor->leal_calle = $formulario_provisorio->leal_calle;
				$productor->leal_numero = $formulario_provisorio->leal_numero;
				$productor->leal_telefono = $formulario_provisorio->leal_telefono;
				$productor->leal_pais = "Argentina";
				$productor->leal_provincia = $formulario_provisorio->leal_provincia;
				$productor->leal_departamento = $formulario_provisorio->leal_departamento;
				$productor->leal_localidad = $formulario_provisorio->leal_localidad;
				$productor->leal_cp = $formulario_provisorio->leal_cp;
				$productor->leal_otro = $formulario_provisorio->leal_otro;
				$productor->administracion_calle = $formulario_provisorio->administracion_calle;
				$productor->administracion_numero = $formulario_provisorio->administracion_numero;
				$productor->administracion_telefono = $formulario_provisorio->administracion_telefono;
				$productor->administracion_pais = $formulario_provisorio->administracion_pais;
				$productor->administracion_provincia = $formulario_provisorio->administracion_provincia;
				$productor->administracion_departamento = $formulario_provisorio->administracion_departamento;
				$productor->administracion_localidad = $formulario_provisorio->administracion_localidad;
				$productor->administracion_cp = $formulario_provisorio->administracion_cp;
				$productor->administracion_otro = $formulario_provisorio->administracion_otro;
				$productor->numero_expdiente = $faker->numberBetween(150,45999999);
				$productor->created_by = $formulario_provisorio->created_by;
				$productor->estado = "aprobado";
				$productor->id_formulario = $formulario_provisorio->id;
				$productor->save();
				return $productor->id;
			} else {
				return "el formulario no existe";
			}
		} else return "id menor a 1";
	}
}
