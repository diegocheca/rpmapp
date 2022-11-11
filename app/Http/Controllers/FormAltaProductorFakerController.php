<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFormAltaProductorFakerRequest;
use App\Http\Requests\UpdateFormAltaProductorFakerRequest;
use App\Models\FormAltaProductorFaker;
use Inertia\Inertia;
use App\Models\Provincias;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
use App\Models\MinaCantera;


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
        $provincias = Provincias::select('id', 'nombre')->get();
        return Inertia::render('Fakers/FormularioALtaProductor/index', [
            'provincias' => $provincias,
        ]);
    }

    public function create_formularios_alta_productores(Request $request)
    {
        //comprobar cuantos quiero crear y si el request llega bien
        try {
            $data = file_get_contents("json/prodMineros.json");
            $prodMinero = json_decode($data, true);

            $provincias = Provincias::select("id", "nombre")->get()->toArray();
            $array_to_return = array();
            $provincia = Provincias::select("id", "nombre")->where("id", "=", $request->provincia)->first()->toArray();
            $id_provincia = $provincia["id"];
            $nombre_provincia = $provincia["nombre"];
            $departamentos = Departamentos::select("id", "nombre")->where("provincia_id", "=", $request->provincia)->get()->toArray();
            if ($request->provincia == 26) {
                for ($i = 0; $i < count($prodMinero); $i++) {
                    //INICIO DE VARIABLES

                    $razon_social = $prodMinero[$i]['RAZON_SOCIAL'];
                    $email = str_replace(" ", "", $razon_social) . "@gmail.com";
                    //dd($email);

                    $departamento = isset($prodMinero[$i]["DEPTO"]) ? $prodMinero[$i]["DEPTO"] : null;

                    if ($departamento == null) {
                        $departamento = new stdClass();
                        $departamento["id"] = 9999;
                        $departamento["nombre"] = "departamento";
                    }

                    //$sociedad = Constants::$sociedades[$faker->numberBetween(0, count(Constants::$sociedades) - 1)];
                    $sociedad = null;

                    $id_user = 0;
                    //$profile_photo = "profile-photos/" . $faker->numberBetween(1, 100) . ".png";
                    $profile_photo = null;
                    //crear el usuario
                    $resultado = User::create([
                        'name' => $razon_social,
                        'email' => $email,
                        'password' => bcrypt('password'),
                        'current_team_id' => 10, // team_catamarca
                        'profile_photo_path' => $profile_photo,
                        'first_name' => $razon_social,
                        'last_name' =>  "nada",
                        'provincia' => $nombre_provincia,
                        'id_provincia' => $id_provincia,
                    ])->assignRole('Productor');
                    $id_user = $resultado->id;
                    //Termino de crear usuario

                    /*Crear formulario*/
                    //$estado = Constants::$estados[$faker->numberBetween(0,count(Constants::$estados)-1)]; 
                    $formulario_nuevo  = new FormAltaProductor();
                    //$formulario_nuevo->inicializar_faker(null,$id_user,$id_provincia);
                    $formulario_nuevo->completar_paso1_faker(intval($prodMinero[$i]["N"]), " ", $razon_social, $email, " ", " ", " ", null, $id_user, $id_provincia);

                    $formulario_nuevo->aprobar_paso_uno($id_user);

                    $formulario_nuevo->completar_paso2_faker($prodMinero[$i]["DIRECCION"], 0, $prodMinero[$i]["TELEFONO"], $id_provincia, $prodMinero[$i]["DEPTO"], " ", 0, " ", $id_user);

                    $formulario_nuevo->aprobar_paso_dos($id_user);

                    $formulario_nuevo->completar_paso3_faker($prodMinero[$i]["DIRECCION"], 0, $prodMinero[$i]["TELEFONO"], $id_provincia, $prodMinero[$i]["DEPTO"], " ", 0, " ", $id_user);
                    $formulario_nuevo->aprobar_paso_tres($id_user);

                    $formulario_nuevo->completar_paso4_faker("Cantera", intval($prodMinero[$i]["EXPTE"]), "distrito numero: ", $prodMinero[$i]["ESTADO"], $prodMinero[$i]["RAZON_SOCIAL"], " ", $prodMinero[$i]["SUST"], $id_user);
                    $formulario_nuevo->aprobar_paso_cuatro($id_user);

                    $formulario_nuevo->completar_paso5_faker(null, null, null, null, null, $id_user);
                    $formulario_nuevo->aprobar_paso_cinco($id_user);

                    $formulario_nuevo->completar_paso6_faker($id_provincia, intval($departamento["id"]), $id_user);
                    $formulario_nuevo->aprobar_paso_seis($id_user);

                    $formulario_nuevo->completar_paso7_faker(" ", 'Otro', $prodMinero[$i]["CONTACTO"], " ", $id_user);

                    $formulario_nuevo->completar_paso8_faker($id_user, false);


                    $array_to_return[$i] = [
                        "id_fomulario" => $formulario_nuevo->id,
                        "id_usario" => $id_user,
                        "profile_photo" => $profile_photo,
                        "email" => $email,
                        "name" => $razon_social,
                        "provincia_id" => $id_provincia,
                        "provincia_name" => $nombre_provincia

                    ];
                }
            } else {
                $faker = Faker::create();
                for ($i = 0; $i < $request->cantidad; $i++) {
                    //INICIO DE VARIABLES
                    $razon_social = $prodMinero->name();
                    $email = str_replace(" ", "", $razon_social) . "@gmail.com";
                    if ($request->provincia == -1) {
                        $num_aleatorio_provincia = $faker->numberBetween(0, count($provincias) - 1);
                        $id_provincia = $provincias[$num_aleatorio_provincia]["id"];
                        $nombre_provincia = $provincias[$num_aleatorio_provincia]["nombre"];
                        $departamento = Departamentos::select("id", "nombre")->where("provincia_id", "=", $num_aleatorio_provincia)->first();
                    } else { //provincia seleccionada en el front
                        $provincia = Provincias::select("id", "nombre")->where("id", "=", $request->provincia)->first()->toArray();
                        $id_provincia = $provincia["id"];
                        $nombre_provincia = $provincia["nombre"];
                        $departamentos = Departamentos::select("id", "nombre")->where("provincia_id", "=", $request->provincia)->get()->toArray();
                        $departamento = $departamentos[$faker->numberBetween(0, count(Constants::$departamentos) - 1)];
                    }
                    if ($departamento == null) {
                        $departamento = new stdClass();
                        $departamento["id"] = 9999;
                        $departamento["nombre"] = "departamento";
                    }
                    $sociedad = Constants::$sociedades[$faker->numberBetween(0, count(Constants::$sociedades) - 1)];
                    $id_user = 0;
                    $profile_photo = "profile-photos/" . $faker->numberBetween(1, 100) . ".png";
                    //crear el usuario
                    $resultado = User::create([
                        'name' => $razon_social,
                        'email' => $email,
                        'password' => bcrypt('password'),
                        'current_team_id' => 10, // team_catamarca
                        'profile_photo_path' => $profile_photo,
                        'first_name' => $razon_social,
                        'last_name' =>  "nada",
                        'provincia' => $nombre_provincia,
                        'id_provincia' => $id_provincia,
                    ])->assignRole('Productor');
                    $id_user = $resultado->id;
                    //Termino de crear usuario

                    /*Crear formulario*/
                    //$estado = Constants::$estados[$faker->numberBetween(0,count(Constants::$estados)-1)]; 
                    $formulario_nuevo  = new FormAltaProductor();
                    //$formulario_nuevo->inicializar_faker(null,$id_user,$id_provincia);
                    $formulario_nuevo->completar_paso1_faker(null, null, $razon_social, $email, $sociedad, null, null, null, $id_user, $id_provincia);
                    $formulario_nuevo->aprobar_paso_uno($id_user);

                    $formulario_nuevo->completar_paso2_faker(null, null, null, $id_provincia, null, null, null, null, $id_user);
                    $formulario_nuevo->aprobar_paso_dos($id_user);

                    $formulario_nuevo->completar_paso3_faker(null, null, null, $id_provincia, null, null, null, null, $id_user);
                    $formulario_nuevo->aprobar_paso_tres($id_user);

                    $formulario_nuevo->completar_paso4_faker(null, null, null, null, null, null, null, $id_user);
                    $formulario_nuevo->aprobar_paso_cuatro($id_user);
                    $formulario_nuevo->completar_paso5_faker(null, null, null, null, null, $id_user);
                    $formulario_nuevo->aprobar_paso_cinco($id_user);

                    $formulario_nuevo->completar_paso6_faker($id_provincia, $departamento["id"], $id_user);
                    $formulario_nuevo->aprobar_paso_seis($id_user);


                    if ($request->provincia == 10) { //si es catamarca
                        $formulario_catamarca = new FormAltaProductorCatamarca();
                        $formulario_catamarca->completar_paso_catamarca_faker(null, null, null, null, null, null, null, null, null, null, null, $formulario_nuevo->id, $id_user);
                        $formulario_catamarca->aprobar_paso_catamarca($id_user);
                    }
                    if ($request->provincia == 50) { //mendoza poner el correcto de mendoza
                        $formulario_mendoza = new FormAltaProductorMendoza();
                        $formulario_mendoza->completar_y_guardar_formu_fake($formulario_nuevo->id, $id_user);
                        $formulario_catamarca->aprobar_paso_mendoza($id_user);
                    }
                    if ($request->provincia == 66) { //mendoza poner el correcto de salta
                        $formulario_mendoza = new FormAltaProductorSalta();
                        $formulario_mendoza->crear_formulario_fake_salta($formulario_nuevo->id, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $id_user);
                    }
                    $formulario_nuevo->completar_paso7_faker(null, null, null, null, $id_user);

                    $formulario_nuevo->completar_paso8_faker($id_user, false);


                    $array_to_return[$i] = [
                        "id_fomulario" => $formulario_nuevo->id,
                        "id_usario" => $id_user,
                        "profile_photo" => $profile_photo,
                        "email" => $email,
                        "name" => $razon_social,
                        "provincia_id" => $id_provincia,
                        "provincia_name" => $nombre_provincia

                    ];
                }
            }

            return response()->json([
                'status' => 'success',
                'formularios' => $array_to_return
            ], 200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 401);
        }
    }

    public function reinscripcion_index()
    {
        //
        $provincias = Provincias::select('id', 'nombre')->get();
        $productores = Productores::select('id', 'razonsocial')->get();
        return Inertia::render('Fakers/FormularioALtaProductor/reinscripciones_index', [
            'provincias' => $provincias,
            'productores' => $productores,
        ]);
    }


    public function create_reinscripcion(Request $request)
    {
        //comprobar cuantos quiero crear y si el request llega bien
        try {
            $faker = Faker::create();
            $provincias = Provincias::select("id", "nombre")->get()->toArray();
            $array_to_return = array();
            //dd($request->all());
            //for($i = 0;$i< $request->cantidad; $i++)

            if($request->provincia == 26) {
                // CHUBUT
                $this->ChubutStore();
                return response()->json([
                    'status' => 'success',
                    'formularios' => "CARGA CORRECTA"
                ], 200);
            }
            $datos_a_mostrar = array();
            for ($i = 0; $i < 1; $i++) {
                $nueva_reinscripcion = new Reinscripciones();

                if ($request->productor == -1) {
                    dd("crear nuevo productor");
                }
                //buscar el user_id
                $productor = Productores::find($request->productor);
                //dd($productor);
                //$usuario = User::find($productor->created_by);

                $formulario_de_alta = FormAltaProductor::find($productor->id_formulario);
                //dd($formulario_de_alta);
                $nueva_reinscripcion->crear_reinscripcion_faker($request->productor, $productor->created_by, $formulario_de_alta->provincia, $request->mina_id);
                $nueva_reinscripcion->comentar_y_aprobar_reincripcion();
                $nuevo_producto = new Productos();
                //dd($nueva_reinscripcion->id);
                $nuevo_producto->producto_faker($nueva_reinscripcion->id, $productor->created_by);
                $nuevo_producto_dos = new Productos();
                $nuevo_producto_dos->producto_faker($nueva_reinscripcion->id, $productor->created_by);
                $nuevo_producto_tres = new Productos();
                $nuevo_producto_tres->producto_faker($nueva_reinscripcion->id, $productor->created_by);
                /*$datos_a_mostrar["id_reinscripcion"] = $nueva_reinscripcion->id;
                $datos_a_mostrar["id_nuevo_producto"] = $nuevo_producto->id;
                $datos_a_mostrar["id_nuevo_producto_dos"] = $nuevo_producto_dos->id;
                $datos_a_mostrar["id_nuevo_producto_tres"] = $nuevo_producto_tres->id;
                $datos_a_mostrar["id_mina"] = $nueva_reinscripcion->id_mina;
                $datos_a_mostrar["provincia"] = $formulario_de_alta->provincia;
                $datos_a_mostrar["formulario"] = 99;//; $formulario_de_alta->id;
                */

                //dd($nueva_reinscripcion,$nuevo_producto);
            }
            return response()->json([
                'status' => 'success',
                'formularios' => $datos_a_mostrar
            ], 200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 401);
        }
    }


    public function mina_index()
    {
        //
        $productores = Productores::select('id', 'razonsocial')->get();
        return Inertia::render('Fakers/FormularioALtaProductor/minas_index', [
            'productores' => $productores,
        ]);
    }


    public function user_index()
    {
        //
        $provincias = Provincias::select('id', 'nombre')->get();
        return Inertia::render('Fakers/FormularioALtaProductor/users_index', [
            'provincias' => $provincias,
        ]);
    }

    public function create_users(Request $request)
    {
        //comprobar cuantos quiero crear y si el request llega bien
        try {
            $provincia = Provincias::find($request->provincia);
            $faker = Faker::create();
            $datos_a_mostrar = array();
            $index = 0;
            for ($i = 0; $i < $request->cantidad; $i++) {
                $id_user = 0;
                //crear el usuario
                $profile_photo = "profile-photos/" . $faker->numberBetween(1, 100) . ".png";
                $email = $faker->email();
                $name = $faker->name();
                $nombre_provincia = $provincia->nombre;
                $id_provincia = $provincia->id;

                $resultado = User::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt('password'),
                    'current_team_id' => 10, // team_catamarca
                    'profile_photo_path' => $profile_photo,
                    'first_name' => $name,
                    'last_name' =>  "nada",
                    'provincia' => $nombre_provincia,
                    'id_provincia' => $id_provincia,
                ])->assignRole('Productor');
                $id_user = $resultado->id;

                //dd(User::find($resultado->id));

                $resultado["id"] = $resultado->id;
                //Termino de crear usuario
                $array_to_return[$index] = $resultado;
                $index++;
            }
            return response()->json([
                'status' => 'success',
                'usuarios' => $array_to_return
            ], 200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 401);
        }
    }


    public function create_minas(Request $request)
    {
        //comprobar cuantos quiero crear y si el request llega bien
        try {

            $faker = Faker::create();
            $datos_a_mostrar = array();
            for ($i = 0; $i < 1; $i++) {
                $nueva_mina = new MinaCantera();
                //buscar el user_id
                $productor = Productores::find($request->productor);
                $formulario_de_alta_anterior = FormAltaProductor::find($productor->id_formulario);

                $departamentos = Departamentos::select("id", "nombre")->where("provincia_id", "=", $formulario_de_alta_anterior->provincia)->get();
                $departamento = $departamentos[$faker->numberBetween(0, count($departamentos) - 1)];

                //empieza a crear la mina
                //primero creo un nuevo formulario con mis datos del formulario anterior
                $formulario_nuevo  = new FormAltaProductor();
                $id_user = $formulario_de_alta_anterior->created_by;
                $formulario_nuevo->completar_paso1_faker($formulario_de_alta_anterior->numeroproductor, $formulario_de_alta_anterior->cuit, $formulario_de_alta_anterior->razonsocial, $formulario_de_alta_anterior->email, $formulario_de_alta_anterior->tiposociedad, null, null, null, $id_user, $formulario_de_alta_anterior->provincia);
                //completar_paso1_faker($numeroproductor = null,                                      $cuit= null,                        $razonsocial= null                          ,$email= null,                      $tiposociedad= null,            $inscripciondgr= null,$constaciasociedad= null,$estado,$id_user,$id_provincia){
                $formulario_nuevo->aprobar_paso_uno($id_user);

                $formulario_nuevo->completar_paso2_faker($formulario_de_alta_anterior->leal_calle, $formulario_de_alta_anterior->leal_numero, $formulario_de_alta_anterior->leal_telefono, $formulario_de_alta_anterior->leal_provincia, $departamento->id, $formulario_de_alta_anterior->leal_localidad, $formulario_de_alta_anterior->leal_cp, $formulario_de_alta_anterior->leal_otro, $id_user);
                //completar_paso2_faker(                $leal_calle = null,                          $leal_numero= null,                      $leal_telefono= null,                      $leal_provincia= null,                  $leal_departamento= null                               ,$leal_localidad= null,                          $leal_cp= null,                               $leal_otro=null,$id_user){
                $formulario_nuevo->aprobar_paso_dos($id_user);

                $formulario_nuevo->completar_paso3_faker($formulario_de_alta_anterior->administracion_calle, $formulario_de_alta_anterior->administracion_numero, $formulario_de_alta_anterior->administracion_telefono, $formulario_de_alta_anterior->administracion_provincia, $departamento->id, $formulario_de_alta_anterior->administracion_localidad, $formulario_de_alta_anterior->administracion_cp, $formulario_de_alta_anterior->administracion_otro, $id_user);
                //completar_paso3_faker($administracion_calle = null,                                                 $administracion_numero= null,                  $administracion_telefono= null,                $administracion_provincia= null                        ,$administracion_departamento= null                          ,$administracion_localidad= null,                     $administracion_cp= null                         ,$administracion_otro=null,$id_user){
                $formulario_nuevo->aprobar_paso_tres($id_user);

                $formulario_nuevo->completar_paso4_faker(null, null, null, null, null, null, null, $id_user);
                //completar_paso4_fake($mina_cantera = null,$numero_expdiente= null,$distrito_minero= null,$descripcion_mina= null,$nombre_mina= null,$plano_inmueble= null,$minerales_variedad= null,$id_user){
                $formulario_nuevo->aprobar_paso_cuatro($id_user);
                $formulario_nuevo->completar_paso5_faker(null, null, null, null, null, $id_user);
                $formulario_nuevo->aprobar_paso_cinco($id_user);






                $formulario_nuevo->completar_paso6_faker($formulario_de_alta_anterior->provincia, $departamento->id, $id_user);
                $formulario_nuevo->aprobar_paso_seis($id_user);


                if ($request->provincia == 10) { //si es catamarca
                    $formulario_catamarca = new FormAltaProductorCatamarca();
                    $formulario_catamarca->completar_paso_catamarca_faker(null, null, null, null, null, null, null, null, null, null, null, $formulario_nuevo->id, $id_user);
                    $formulario_catamarca->aprobar_paso_catamarca($id_user);
                }
                if ($request->provincia == 50) { //mendoza poner el correcto de mendoza
                    $formulario_mendoza = new FormAltaProductorMendoza();
                    $formulario_mendoza->completar_y_guardar_formu_fake($formulario_nuevo->id, $id_user);
                    $formulario_catamarca->aprobar_paso_mendoza($id_user);
                }
                if ($request->provincia == 66) { //mendoza poner el correcto de salta
                    $formulario_mendoza = new FormAltaProductorSalta();
                    $formulario_mendoza->crear_formulario_fake_salta($formulario_nuevo->id, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, $id_user);
                }
                $formulario_nuevo->completar_paso7_faker(null, null, null, null, $id_user);

                $formulario_nuevo->completar_paso8_faker($id_user, $request->productor);


                //formulario creado 
                $minas_del_prod = MinaCantera::select("id", "nombre")->where("id_formulario", "=", $formulario_nuevo->id)->get();




                $array_to_return = [
                    "id_fomulario" => $formulario_nuevo->id,
                    "id_usario" => $id_user,
                    "provincia" => $formulario_nuevo->provincia,
                    "mina_nueva" => $minas_del_prod

                ];
            }
            return response()->json([
                'status' => 'success',
                'formularios' => $array_to_return
            ], 200);
        } catch (Exception $e) {
            return response()->json(['status' => 'error', 'error' => $e->getMessage()], 401);
        }
    }
    public function buscar_minas_faker(Request $request)
    {
        //dd("voy a buscar el productor", $request->all());
        /*$productor = Productores::find($request->productor);
        //$formulario_de_alta = FormAltaProductor::find($productor->id_formulario);
        $minas_prod  = ProductorMina::select('*')->where("id_productor","=",$request->productor)->get();
        $minas = MinaCantera::select('*')->where("id_formulario","=",$productor->id_formulario)->get();
        */


        $minas = DB::table('mina_cantera')
            ->join('productor_mina', 'mina_cantera.id', '=', 'productor_mina.id_mina')
            ->where("productor_mina.id_productor", "=", $request->productor)
            ->select('mina_cantera.id', 'mina_cantera.nombre')
            ->get();

        return response()->json([
            'status' => 'success',
            'minas' => $minas
        ], 200);
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

    public function p1_fake()
    {
        $faker = Faker::create();
        $prod_fake = array();
        $prod_fake["numeroproductor"] = $faker->numberBetween(100, 459999);
        $prod_fake["cuit"] =  "20-" . $faker->numberBetween(15000000, 45999999) . "-0";
        $prod_fake["razon_social"] =  $faker->company();
        $prod_fake["email"] =  $faker->email();
        $prod_fake["tiposociedad"] = Constants::$sociedades[$faker->numberBetween(0, count(Constants::$sociedades) - 1)];
        $prod_fake["inscripciondgr"] =  '/storage/files_formularios/fake_pdfs/' . $faker->numberBetween(0, 388) . '.pdf';
        $prod_fake["constaciasociedad"] = '/storage/files_formularios/fake_pdfs/' . $faker->numberBetween(0, 388) . '.pdf';
        return response()->json([
            'status' => 'ok',
            'msg' => 'formulario encontrado',
            'data' => $prod_fake,
        ], 200);
    }
    public function p2_fake()
    {
        $faker = Faker::create();
        $prod_fake = array();
        $prod_fake["leal_calle"] =  $faker->address;
        $prod_fake["leal_numero"] =  $faker->numberBetween(1000, 9999);
        $prod_fake["leal_telefono"] =   $faker->e164PhoneNumber;
        $prod_fake["leal_provincia"] =  Auth::user()->id_provincia;
        $departamentos = Departamentos::select("id", "nombre")->where("provincia_id", "=", Auth::user()->id_provincia)->get();
        $prod_fake["leal_departamento"] = $departamentos[$faker->numberBetween(0, ($departamentos->count()) - 1)]->id;
        $prod_fake["leal_localidad"] =  $faker->state;
        $prod_fake["leal_cp"] =   $faker->numberBetween(1000, 9999);
        $prod_fake["leal_otro"] = $faker->text($maxNbChars = 50);
        return response()->json([
            'status' => 'ok',
            'msg' => 'formulario encontrado',
            'data' => $prod_fake,
        ], 200);
    }
    public function p4_fake()
    {
        $faker = Faker::create();
        $prod_fake = array();
        $mina_cantera = null;
        $categoria = null;
        if ($faker->boolean) {
            $mina_cantera = "Cantera";
            $categoria = "tercera";
        } else {
            $mina_cantera = "Mina";
            if ($faker->boolean) {
                $categoria = "primera";
            } else {
                $categoria = "segunda";
            }
        }
        $prod_fake["mina_cantera"] = $mina_cantera;
        $prod_fake["categoria"] = $categoria;
        $prod_fake["numero_expdiente"] =  $faker->numberBetween(1000, 9999);
        $prod_fake["distrito_minero"] = "distrito numero: " . $faker->numberBetween(0, 9999);
        $prod_fake["descripcion_mina"] = $faker->realText($maxNbChars = 35, $indexSize = 1);
        $prod_fake["nombre_mina"] =  Constants::$nombres_minas[$faker->numberBetween(0, count(Constants::$nombres_minas))];
        $prod_fake["plano_inmueble"] = '/storage/files_formularios/fake_pdfs/' . $faker->numberBetween(0, 388) . '.pdf';
        $prod_fake["titulo_contrato_posecion"] = '/storage/files_formularios/fake_pdfs/' . $faker->numberBetween(0, 388) . '.pdf';
        $prod_fake["resolucion_concesion_minera"] = '/storage/files_formularios/fake_pdfs/' . $faker->numberBetween(0, 388) . '.pdf';

        return response()->json([
            'status' => 'ok',
            'msg' => 'formulario encontrado',
            'data' => $prod_fake,
        ], 200);
    }

    protected function ChubutStore()
    {
        $reinscripcion = [];
        $data = file_get_contents("json/reinscripcionChubut.json");
        $reinscripcion = json_decode(json_encode(json_decode($data, true))) ;

            $user = HomeController::userData();
            // $provinceData = Provincias::where('id','=', $user->province->value)->first();
            // $period = date('Y-m-d', strtotime("+$provinceData->duracion_reinscripcion months", strtotime(date("Y-m-d"))));
    
            $saveData = [];
            $newProducts = [];
            dd($reinscripcion[0]->EXPEDIENTE);
            foreach ($reinscripcion as $key => $data) {
                // $key = strtolower($key);
                // if ($data == "on" || $data == true) {
                //     $saveData[$key] = 1;
                //     continue;
                // }
                   
    
                if ($key == "productos") {
    
                    if (!empty($reinscripcion['production_checkbox']) && $reinscripcion['production_checkbox'] == false) continue;
    
                    $saveData["cantidad_productos"] = count($data);
    
                    for ($i = 0; $i < count($data); $i++) {
                        $product = [];
    
                        foreach ($data[$i] as $key2 => $data2) {
    
                            if (in_array($key2, ["nombre_mineral", "unidades"])) {
                                // $product[$key2] = json_encode($data2);
                                $product[$key2] = $data2["value"];
                                continue;
                            }
    
                            $product[$key2] = $data2;
                            // $product["variedad"] =
                            // $product["otra_unidad"] =
                            $product["estado"] = "aprobado";
                        }
    
                        array_push($newProducts, $product);
                    }
    
                    continue;
                } else {
                    $saveData["cantidad_productos"] = 0;
                }
    
    
                if (in_array($key, ["id_mina", "id_productor", "polvorin", "id_departamento", "id_localidad"])) {
    
                    $saveData[$key] = $reinscripcion[$key]["value"];
                    continue;
                }
    
                $saveData[$key] = $data;
            }
    
            $saveData['fecha_vto'] = null;
            $saveData['estado'] = 'en proceso';
    
            DB::beginTransaction();
            try {
                
                $arrayValues = $saveData;
                $arrayValues["cantidad_productos"] = 1;
                // nueva reinscripcion
                dd($arrayValues["expediente"]);
                $newReinscription = Reinscripciones::create($arrayValues);
    
                foreach ($newProducts as $key => $new) {
                    $newProduct = [
                        "id_reinscripcion" => $newReinscription["id"],
                        "nombre_mineral" => $new["nombre_mineral"],
                        "expediente" => $new["expediente"],
                        "estado" => $new["estado"],
                        "derecho" => $new["derecho"],
                        "sustancia" => $new["sustancia"],
                        "ubicacion" => $new["ubicacion"],
                        "superficie" => $new["superficie"],
                        "etapa" => $new["etapa"],
                        "resolucion" => $new["resolucion"],
                        "estado" => "en proceso"
                    ];
                    //productos
                    $addProducts = Productos::create($newProduct);
                }

                DB::commit();

            } catch (\Exception $ex) {
                DB::rollback();
                return response()->json(['error' => $ex->getMessage()], 500);
            }

    }
}
