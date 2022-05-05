<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use App\Models\Provincias;
use App\Models\Permission;

class AltaFormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $permisos = Permission::select('*')->where('id_provincia', '=', Auth::user()->id_provincia)->get();
        $collection = collect(json_decode($permisos, true));
        var_dump($collection->where('id', 51860));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  Inertia::render('Admin/Formularios/AltaProductor/create');
    }

    public function traducir_perfil($perfil){
        if($perfil == 'Productor')
            return 4;
        elseif($perfil == 'Administrador')
            return 1;
        elseif($perfil == 'User')
            return 2;
        elseif($perfil == 'Autoridad')
            return 3;
        else return false;
    }

    public function traducir_accion($accion){
        if($accion == 'alta')
            return  1;
        elseif($accion == 'edicion')
            return 2;
        elseif($accion == 'ver')
            return 3;
        else return false;
    }
    public function traducir_estado($estado){
        //sin terminar
        if($estado == 'Productor')
            return 4;
        elseif($estado == 'Borrador')
            return 1;
        elseif($estado == 'En revision')
            return 2;
        elseif($estado == 'Autoridad')
            return 3;
        else return false;
    }
    

    public function completar_arra_input($input){
        if($input == null){
            //no tiene nada. todo null
            $input  = [];
        }
        if (!array_key_exists("disabled",$input)){
            $input["disabled"] = false;
        }
        if (!array_key_exists("mostrar",$input)){
            $input["mostrar"] = false;
        }
        if (!array_key_exists("required",$input)){
            $input["required"] = false;
        }
        return $input;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        dd("fsadasd");
        $perfil = $request->values["rol"]["label"];
        $accion = $request->values["action"];
        $inputs = $request->values["inputs"][$accion][strtolower($perfil)];
        $estado = $request->values["estadoSeleccionado"]["value"];
        
        if( $perfil == 0 || $perfil == null
            || 
            $accion == 0 || $accion == null
            || $inputs == 0 || $inputs == null
            || $estado == 0 || $estado == null
            ){
            $inputs_temporal = [];
            foreach ($inputs as $pagina => $pagina_value) {
                //paginas: pagina1,  pagina2,  pagina3, etc 
                //completar array con los null to false
                $pagina_temporal = [];
                foreach ($pagina_value as $input => $value) {
                    //por cada input 
                    if(count($value) != 3){
                        $pagina_temporal[$input] = $this->completar_arra_input($value);
                    }
                    else {
                        $pagina_temporal[$input] = $value;
                    }
                }
                $inputs_temporal[$pagina] = $pagina_temporal;
            }
            $inputs = $inputs_temporal;
            $inputs = (object) $inputs;
            $superObjeto = [];
            $index = 0;
            foreach($inputs as $pagina){
                $pagina_obj = (object) $pagina;
                //dd($pagina_obj);
                $subindex = 0;
                foreach($pagina_obj as $input_de_pagina => $value){
                    //var_dump($input_de_pagina ,$value);
                    $new_pagina_a_escribir_db = [
                        "name" => '',
                        "label" => '',
                        "image" => "/storage/algo.jpg",
                        "validations" => [
                            [
                                "name"=>"inputs.alta.productor.pagina1.".$input_de_pagina.".disabled",
                                "label"=> "Desabilitado",
                                "value"=> false
                            ],
                            [
                                "name"=>"inputs.alta.productor.pagina1.".$input_de_pagina.".mostrar",
                                "label"=> "Mostrar",
                                "value"=> false
                            ],
                            [
                                "name"=>"inputs.alta.productor.pagina1.".$input_de_pagina.".required",
                                "label"=> "Requerido",
                                "value"=> false
                            ]
                        ]
                    ];

                    $new_pagina_a_escribir_db["name"] = $input_de_pagina;
                    $new_pagina_a_escribir_db["label"] = $input_de_pagina;

                    if(isset($value["disabled"]) && $value["disabled"]){
                        $new_pagina_a_escribir_db["validations"][0]["value"] = true;
                    }
                    if(isset($value["mostrar"]) && $value["mostrar"]){
                        $new_pagina_a_escribir_db["validations"][1]["value"] = true;
                    }
                    if(isset($value["required"]) && $value["required"]){
                        $new_pagina_a_escribir_db["validations"][2]["value"] = true;
                    }
                    $superObjeto[$index][$subindex] = $new_pagina_a_escribir_db;
                    $subindex++;
                }
                $index++;
            }
            // por provincia .... por rol .... por formulario ... por accion ... por estado ... por pagina ... datos
            $perfil = $this->traducir_perfil($perfil);
            $accion = $this->traducir_accion($accion);
            
            $success_flag = true;
            for ($i=0; $i < 9 ; $i++) { 
                $resultado = Permission::guardar_paso(Auth::user()->id_provincia ,$perfil, 1, $accion , $estado, $i , $superObjeto[$i] ); 
                if($resultado && $success_flag) {
                    $success_flag = true;
                }
                else {
                    $success_flag = false;
                }
            }
        }
        else return "Error";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $currentRole = Auth::user()->getRoleNames()[0];
        $allRoles = Role::all();
        // dd($allRoles);
        return  Inertia::render('Admin/Formularios/AltaProductor/edit', [ 'currentRole' => $currentRole, 'allRoles' => $allRoles ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get_permisos_form(Request $request)
    {
        //
        //dd($request->estado);
        $perfil = $request->id_rol;
        $accion = $this->traducir_accion($request->accion);
        //$estado = $this->traducir_estado($request->estado);
        $estado = $request->estado;
        $resultado = Permission::query_permissions_all_page(Auth::user()->id_provincia ,$perfil, 1, $accion , $estado  ); 
        if(!empty($resultado )) {
            return response()->json([
                'status' => 'success',
                'msg' => 'Permisos encontrados.',
                'permisos' => \json_encode($resultado)
            ], 201);
        }
        else {
            return response()->json([
                'status' => 'error',
                'msg' => 'Permisos no encontrados.',
                'permisos' => false
            ], 201);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
