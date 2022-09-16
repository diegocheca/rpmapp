<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormAltaProductorFakerRequest;
use App\Http\Requests\UpdateFormAltaProductorFakerRequest;
use App\Models\FormAltaProductorFaker;
use Inertia\Inertia;
use App\Models\Provincias;


use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\FormAltaProdPaso1;
use App\Models\FormularioAltaProd;
use App\Models\FormAltaProductor; //el q tiene mil columnas

use Carbon\Carbon;
use App\Models\Departamentos;
use App\Models\User;
use App\Models\Minerales;
use App\Models\Constants;
use stdClass;
use App\Models\FormAltaProductorCatamarca;
use Illuminate\Http\Request;

use App\Models\FormAltaProductorMendoza;
use App\Models\FormAltaProductorSalta;

use App\Models\Reinscripciones;

use App\Models\Productores;
use App\Models\Productos;
use Exception;

class FormAltaProductorFakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $provincias = Provincias::select('id','nombre')->get();
        return Inertia::render('Fakers/FormularioALtaProductor/index', [
            'provincias' => $provincias,
        ]);
    }

    public function create_formularios_alta_productores(Request $request){
        //comprobar cuantos quiero crear y si el request llega bien
        try{
            $faker = Faker::create();
            $provincias = Provincias::select("id", "nombre")->get()->toArray();
            $array_to_return = array();
            for($i = 0;$i< $request->cantidad; $i++)
            {
                //INICIO DE VARIABLES
                $razon_social = $faker->name();
                $email = str_replace(" ","",$razon_social)."@gmail.com";
                if($request->provincia== -1){
                    $num_aleatorio_provincia = $faker->numberBetween(0,count($provincias)-1);
                    $id_provincia = $provincias[$num_aleatorio_provincia]["id"];
                    $nombre_provincia = $provincias[$num_aleatorio_provincia]["nombre"];
                    $departamento = Departamentos::select("id", "nombre")->where("provincia_id", "=", $num_aleatorio_provincia)->first();
                } else { //provincia seleccionada en el front
                    $provincia = Provincias::select("id", "nombre")->where("id","=",$request->provincia)->first()->toArray();
                    $id_provincia = $provincia["id"];
                    $nombre_provincia = $provincia["nombre"];
                    $departamentos = Departamentos::select("id", "nombre")->where("provincia_id", "=", $request->provincia)->get()->toArray();
                    $departamento = $departamentos[$faker->numberBetween(0,count(Constants::$departamentos)-1)];
                    
                }
                if($departamento == null ){
                    $departamento = new stdClass();
                    $departamento["id"] = 9999;
                    $departamento["nombre"] ="departamento";
                }
                $sociedad = Constants::$sociedades[$faker->numberBetween(0,count(Constants::$sociedades)-1)];
                $id_user = 0;
                //crear el usuario
                $resultado = User::create([
                    'name' => $razon_social,
                    'email' => $email,
                    'password' => bcrypt('password'),
                    'current_team_id' => 10, // team_catamarca
                    'profile_photo_path' => "profile-photos/catamarca.png",
                    'first_name' => $razon_social,
                    'last_name' =>  "nada",
                    'provincia' => $nombre_provincia,
                    'id_provincia' => $id_provincia,
                ])->assignRole('Productor');
                $id_user = $resultado->id;
                //Termino de crear usuario

                /*Crear formulario*/
                //$estado = Constants::$estados[$faker->numberBetween(0,count(Constants::$estados)-1)]; 
                $nuevo_formulario = new FormAltaProductor();

                $formulario_nuevo  = new FormAltaProductor();
                //$formulario_nuevo->inicializar_faker(null,$id_user,$id_provincia);
                $formulario_nuevo->completar_paso1_faker(null,null,$razon_social,$email,$sociedad,null,null,null,$id_user,$id_provincia);
                $formulario_nuevo->aprobar_paso_uno($id_user);
                
                $formulario_nuevo->completar_paso2_faker(null,null,null,$id_provincia,null,null,null,null,$id_user);
                $formulario_nuevo->aprobar_paso_dos($id_user);

                $formulario_nuevo->completar_paso3_faker(null,null,null,$id_provincia,null,null,null,null,$id_user);
                $formulario_nuevo->aprobar_paso_tres($id_user);

                $formulario_nuevo->completar_paso4_faker(null,null,null,null,null,null,null,$id_user);
                $formulario_nuevo->aprobar_paso_cuatro($id_user);
                $formulario_nuevo->completar_paso5_faker(null, null, null, null, null,$id_user);
                $formulario_nuevo->aprobar_paso_cinco($id_user);
                
                $formulario_nuevo->completar_paso6_faker($id_provincia,$departamento["id"],$id_user);
                $formulario_nuevo->aprobar_paso_seis($id_user);
                
                
                if($request->provincia== 10){//si es catamarca
                    $formulario_catamarca = new FormAltaProductorCatamarca();
                    $formulario_catamarca->completar_paso_catamarca_faker(null, null,null,null, null, null, null, null, null, null, null,$formulario_nuevo->id,$id_user);
                    $formulario_catamarca->aprobar_paso_catamarca($id_user);
                }
                if($request->provincia== 50){//mendoza poner el correcto de mendoza
                    $formulario_mendoza = new FormAltaProductorMendoza();
                    $formulario_mendoza->completar_y_guardar_formu_fake($formulario_nuevo->id,$id_user);
                    $formulario_catamarca->aprobar_paso_mendoza($id_user);
                }
                if($request->provincia== 66){//mendoza poner el correcto de salta
                    $formulario_mendoza = new FormAltaProductorSalta();
                    $formulario_mendoza->crear_formulario_fake_salta($formulario_nuevo->id,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null, $id_user);
                }
                $formulario_nuevo->completar_paso7_faker(null,null,null,null,$id_user);
                
                $formulario_nuevo->completar_paso8_faker($id_user);

                
                $array_to_return[$i] = [
                    "id_fomulario" => $formulario_nuevo->id,
                    "id_usario" => $id_user,
                    "email" => $email,
                    "provincia" => $id_provincia

                ];
            }
            return response()->json([
                'status'=> 'success',
                'formularios' => $array_to_return
            ],200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 401);
        }

    }
    
    public function reinscripcion_index()
    {
        //
        $provincias = Provincias::select('id','nombre')->get();
        $productores = Productores::select('id','razonsocial')->get();
        return Inertia::render('Fakers/FormularioALtaProductor/reinscripciones_index', [
            'provincias' => $provincias,
            'productores' => $productores,
        ]);
    }

    
    public function create_reinscripcion(Request $request){
        //comprobar cuantos quiero crear y si el request llega bien
        try{
            $faker = Faker::create();
            $provincias = Provincias::select("id", "nombre")->get()->toArray();
            $array_to_return = array();
            //dd($request->all());
            for($i = 0;$i< $request->cantidad; $i++)
            {
                $nueva_reinscripcion = new Reinscripciones();

                if( $request->productor == -1){
                    dd("crear nuevo productor");
                }
                //buscar el user_id
                $productor = Productores::find($request->productor);
                //$usuario = User::find($productor->created_by);

                $nueva_reinscripcion->crear_reinscripcion_faker($request->productor,$productor->created_by,$request->provincia);
                $nueva_reinscripcion->comentar_y_aprobar_reincripcion();
                $nuevo_producto = new Productos();
                $nuevo_producto->producto_faker($nueva_reinscripcion->id,$productor->created_by);

                //dd($nueva_reinscripcion,$nuevo_producto);
            }
            return response()->json([
                'status'=> 'success',
                'formularios' => $array_to_return
            ],200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 401);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFormAltaProductorFakerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormAltaProductorFakerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function show(FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function edit(FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFormAltaProductorFakerRequest  $request
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFormAltaProductorFakerRequest $request, FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FormAltaProductorFaker  $formAltaProductorFaker
     * @return \Illuminate\Http\Response
     */
    public function destroy(FormAltaProductorFaker $formAltaProductorFaker)
    {
        //
    }
}
