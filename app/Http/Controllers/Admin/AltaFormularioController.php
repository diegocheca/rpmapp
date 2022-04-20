<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Spatie\Permission\Models\Role;
use App\Models\Provincias;

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
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return  Inertia::render('Admin/Formularios/AltaProductor/create');
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
        //
        
        $perfil = $request->values["rol"]["label"];
        $accion = $request->values["action"];
        $inputs = $request->values["inputs"][$accion][strtolower($perfil)];
        //dd( $inputs);
        if($perfil =="Productor"){
            $inputs_temporal = [];
            foreach ($inputs as $pagina => $pagina_value) {
                //paginas: pagina1,  pagina2,  pagina3, etc 
                //completar array con los null to false
                $pagina_temporal = [];
               //dd($pagina_value);
                foreach ($pagina_value as $input => $value) {
                    //por cada input 
                    if(count($value) != 3){
                        $pagina_temporal[$input] = $this->completar_arra_input($value);
                    }
                    else {
                        $pagina_temporal[$input] = $value;
                    }
                   // dd( $pagina_temporal[$input]);
                }
                $inputs_temporal[$pagina] = $pagina_temporal;
                //dd( $inputs_temporal);
            }
            $inputs = $inputs_temporal;
            //buscar todo el string
            $mis_permisos  = Provincias::select('permisos')->where('id', '=', Auth::user()->id_provincia)->first();
            $mis_permisos = $mis_permisos->toJson();
            $mis_permisos = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $mis_permisos), true );
            $mis_permisos = $mis_permisos["permisos"];

            try {
                $array = json_decode($mis_permisos, true, 1024, JSON_THROW_ON_ERROR);
                printf('Valid JSON output: %s', print_r($array, true));
            } catch (\JsonException $exception) {
                printf('Invalid JSON input: %s', print_r($exception, true));
            }
            die();

            //$mis_permisos = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $mis_permisos), true );
            var_dump($data);die();
            //$mis_permisos = json_encode($mis_permisos, true);
           //$collection = collect(json_decode($mis_permisos, true));
           //$collection = collect(json_decode($collection ["permisos"], true));

           $collection =json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $collection ["permisos"]), true );

            var_dump($collection);die();
            $mis_permisos_dos =  json_decode($mis_permisos["permisos"]);
            $mis_permisos = json_encode($mis_permisos->permisos, true);
            //$collection = collect(json_decode($mis_permisos, true));
            $mis_permisos = json_decode($mis_permisos);
            
            $mis_permisos = json_decode($mis_permisos->permisos);
            $mis_permisos = json_decode($mis_permisos->permisos);
            var_dump($mis_permisos);
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
