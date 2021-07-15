<?php

namespace App\Http\Controllers;
use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\Localidades;

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
	public function getLocation($id, Request $request){
		//dd($request->id_prov);
		$localidades = Localidades::select('id as value', 'nombre as label')->where('departamento_id','=', $id)
        ->orderBy('label')
        ->get();
	
		return response()->json($localidades);

	}

}
