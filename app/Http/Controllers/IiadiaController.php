<?php

namespace App\Http\Controllers;

use App\Models\iia_dia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Auth;
use Illuminate\Support\Facades\Storage;


class IiadiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $iia_dias = iia_dia::all();
        //var_dump($iia_dias);die();
        return Inertia::render('IiaDia/List', ['data' => $iia_dias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('IiaDia/Form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       /* $request->validate(
            [
                'cuit',
                'razonsocial' => 'required',
                'numeroproductor' => 'required',
                'email'=> 'required',
                'domicilio_prod'=> 'required',
                'tiposociedad'=> 'required',
                'inscripciondgr'=> 'required',
                'constaciasociedad'=> 'required',
                'leal_calle'=> 'required',
                'leal_numero'=> 'required',
                'leal_telefono'=> 'required'
                /*'leal_pais',
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
                'categoria',
                'nombre_mina',
                'descripcion_mina',
                'distrito_minero',
                'mina_cantera',
                'plano_inmueble',
                'minerales_variedad',
                'owner',
                'arrendatario',
                'concesionario',
                'otros',
                'titulo_contrato_posecion',
                'resolucion_concesion_minera',
                'constancia_pago_canon',
                'iia',
                'dia',
                'acciones_a_desarrollar',
                'actividad',
                'fecha_alta_dia',
                'fecha_vencimiento_dia',
                'localidad_mina_pais',
                'localidad_mina_provincia',
                'localidad_mina_departamento',
                'localidad_mina_localidad',
                'tipo_sistema',
                'longitud',
                'latitud',
                'created_by',
                'estado'*
                    ]
        );*/
        // var_dump($request->all());
        
        // die();

        // iia_dia::create($request->all());

        $dia_nuevo  = new iia_dia();
        $dia_nuevo->fecha_notificacion_dia = date('Y-m-d', strtotime($request->fecha_notificacion_dia));
        $dia_nuevo->fecha_vencimiento = date('Y-m-d', strtotime($request->fecha_vencimiento)) ;
        $dia_nuevo->actividades = $request->actividades;
        $dia_nuevo->acciones_a_desarrollar = $request->acciones_a_desarrollar;
        $dia_nuevo->archivo_dia = $request->archivo_dia;
        $dia_nuevo->constancia_inscripcion_ia = $request->constancia_inscripcion_ia;
        $dia_nuevo->created_by =  Auth::user()->id;
        $dia_nuevo->estado = 'en proceso';
        $resultado = $dia_nuevo->save();

        return Redirect::route('iiadias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\iia_dia  $iia_dia
     * @return \Illuminate\Http\Response
     */
    public function show(iia_dia $iia_dia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\iia_dia  $iia_dia
     * @return \Illuminate\Http\Response
     */
    public function edit($id_a_buscar)
    {
        //
        $iia_dia = iia_dia::find($id_a_buscar);
        return Inertia::render('IiaDia/EditForm', ['iia_dia' => $iia_dia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\iia_dia  $iia_dia
     * @return \Illuminate\Http\Response
     */
    
	public function recibo(Request $request)
    {
        //busco si el email tiene cargado un registro
        $dia_a_modficiar = iia_dia::find($request->id);
        if($dia_a_modficiar != null)
        {
        	//significa que tengo un registro ya guardado en el bd
        	//guardo el archivo en el storage
        	$contents = file_get_contents($request->archivo->path());
        	$resultado = Storage::put('public/archivos_dia'.'/'.$request->id, $request->archivo);
        	if($request->nombre_archivo == 'archivo_DIA')
        	{
        		// guardo el nombre del archivo en el registro provisorio
        		$dia_a_modficiar->archivo_dia = 'http://localhost:8000/storage'. $resultado;
        		$dia_a_modficiar->save();
        	}
        	elseif ($request->nombre_archivo == 'archivo_iia') {
        		// guardo el nombre del archivo en el registro provisorio
        		$dia_a_modficiar->constancia_inscripcion_ia = 'http://localhost:8000/storage'. str_replace('public', '',  $resultado);
				
        		$dia_a_modficiar->save();
        	}
        	
        	
        	// elseif ($request->nombre_archivo == 'dia') {
        	// 	// guardo el nombre del archivo en el registro provisorio
        	// 	$formulario_provisorio->dia	 = $resultado;
				
        	// 	$formulario_provisorio->save();
        	// }
        	
        	$resultado =  str_replace("public","storage",$resultado);
        	return response()->json($resultado);

        }
        else 
        	return response()->json("sin id");
    }
    public function update(Request $request, iia_dia $iia_dia)
    {
        //
        /*$iia_dia->update($request->all());

        if (isset($input['photo'])) {
            $photo->storePublicly();
         }*/


        var_dump($request->archivo_dia , $iia_dia->archivo_dia);die();


         $request->validate([
            'archivo_dia' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);
 
         $fileUpload = new FileUpload;
 
         if($request->file()) {
             $file_name = time().'_'.$request->file->getClientOriginalName();
             $file_path = $request->file('file')->storeAs('uploads', $file_name, 'public');
 
             $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
             $fileUpload->path = '/storage/' . $file_path;
             $fileUpload->save();
 
             return response()->json(['success'=>'File uploaded successfully.']);
         }

        return Redirect::route('iiadias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\iia_dia  $iia_dia
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_a_buscar)
    {
        //
        if ( ($id_a_buscar != null) && (is_numeric($id_a_buscar)))
        {
            iia_dia::find($id_a_buscar)->delete();
            return Redirect::route('iiadias.index');
        }
        return false;
        
    }
}
