<?php

namespace App\Http\Controllers;
use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\Localidades;
use App\Models\FormAltaProductor;

use Illuminate\Http\Request;

class CountriesController extends Controller
{
    // public function getProvinces(){
	// 	$lista_de_provincias = Provincias::select('id', 'nombre')->get();
	// 	return response()->json($lista_de_provincias);
	// }
	// public function traer_departamentos_json(Request $request){
	// 	//dd($request->id_prov);
	// 	$departamentos = Departamentos::select('id', 'nombre')->where('provincia_id','=', $request->id_prov)->get();
	// 	return response()->json($departamentos);

	// }
	// public function traer_localidades_json(Request $request){
	// 	//dd($request->id_prov);
	// 	$departamentos = Localidades::select('id', 'nombre')->where('provincia_id','=', $request->id_prov)->get();
	// 	return response()->json($departamentos);

	// }

    public static function getProvinces(){
		$lista_de_provincias = Provincias::select('id as value', 'nombre as label')
        ->orderBy('label')
        ->get();
		// return response()->json($lista_de_provincias);
        return $lista_de_provincias;
	}
	public static function getDepartment($id){
		//dd($request->id_prov);
		$departamentos = Departamentos::select('id as value', 'nombre as label')->where('provincia_id','=', $id)
        ->orderBy('label')
        ->get();
		return response()->json($departamentos);

	}
	public static function datosDepartamentos($id){
		$departamentos = Departamentos::select('id', 'fuente as value', 'nombre as label')->where('provincia_id','=', $id)
        ->orderBy('label')
        ->get();
		//var_dump($departamentos);die();
		$index = 0;
		$aux =  [];
		$array = [];
		foreach($departamentos as $depto){
			$querytmp = FormAltaProductor::select('id')
			->where('leal_departamento', '=', $depto->id)
			->where('estado', '!=', 'reprobado')
			->get();
			if( $querytmp != null && $querytmp->count() > 0){
				$aux["label"] = $depto->label;
				$aux["value"] = $querytmp->count();
				array_push($array, $aux);
			}
			// else {
			// 	$aux["label"] = $depto->label;
			// 	$aux["value"] = $querytmp->count();
			// 	array_push($array, $aux);
			// }
		}
		//depues del foreach, busco los q no tienen dpto declarado
		$querytmp = FormAltaProductor::select('id')
			->where('leal_departamento', '=', null)
			->where('leal_provincia', '=', $id)
			->where('estado', '!=', 'reprobado')
			->get();
		if( $querytmp != null && $querytmp->count() > 0){
			$aux["label"] = "Sin Depto";
			$aux["value"] = $querytmp->count();
			array_push($array, $aux);
		}
		//dd($array);
		return $array;

	}
	public function getLocation($id, Request $request){
		//dd($request->id_prov);
		$localidades = Localidades::select('id as value', 'nombre as label')->where('departamento_id','=', $id)
        ->orderBy('label')
        ->get();
		return response()->json($localidades);

	}

    public static function getDepartmentArray($id){
		//dd($request->id_prov);
		return Departamentos::select('id as value', 'nombre as label')->where('provincia_id','=', $id)
        ->orderBy('label')
        ->get();
	}

    public static function getProvince($id){
		return Provincias::select('id as value', 'nombre as label')
        ->where('id','=', $id)
        ->first();
	}

}
