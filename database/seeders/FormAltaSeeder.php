<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\FormAltaProdPaso1;
use App\Models\FormularioAltaProd;
use App\Models\FormAltaProductor; //el q tiene mil columnas

use Carbon\Carbon;
use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\User;
use App\Models\Minerales;

use App\Models\FormAltaProductorCatamarca;



class FormAltaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
      
        $sociedades = [
            'Sociedad en nombre colectivo',
            'Sociedad en comandita simple',
            'Sociedad en responsabilidad limitada',
            'Sociedad anónima',
            'Sociedad en comandita por acciones',
            'Sociedad cooperativa',
            'Sociedad por acciones simplificada'
        ];
        $departamentos = [
            'Capital',
            'Rawson',
            'Chimbas',
            'Rivadavia',
            'San Lucía',
            'Pocito',
            'Caucete',
            'Jáchal',
            'Albardón',
            'Sarmiento',
            '25 de Mayo',
            'San Martín',
            'Calingasta',
            '9 de Julio',
            'Angaco',
            'Valle Fértil',
            'Iglesia',
            'Ullum',
            'Zonda'
        ];

        $cargos = [
            'CTO',
            'CTE',
            'CTF',
            'CTI',
            'Gerente',
            'Dueño',
            'Inversor',
            'Representante',
            'Abogado',
            'Empleado',
            'Apoderado',
            'Otro'
        ];
        $estados = [
            'aprobado',
            'reprobado',
            'en proceso',
            'con observaciones'
        ];

        $provincias = Provincias::select("id", "nombre")->get()->toArray();

        for($i = 0;$i< 2; $i++)
        {
            //INICIO DE VARIABLES
            $razon_social = $faker->name();
            $email = str_replace(" ","",$razon_social)."@gmail.com";
            $num_aleatorio_provincia = $faker->numberBetween(0,count($provincias)-1);
            $id_provincia = $provincias[$num_aleatorio_provincia]["id"];
            $nombre_provincia = $provincias[$num_aleatorio_provincia]["nombre"];
            $departamento = Departamentos::select("id", "nombre")->where("provincia_id", "=", $num_aleatorio_provincia)->first();

            $sociedad = $sociedades[$faker->numberBetween(0,count($sociedades)-1)];

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

            $estado = $estados[$faker->numberBetween(0,count($estados)-1)]; 
            $nuevo_formulario = new FormAltaProductor();

            /*$nuevo_formulario->tipoProductor = 'productor'; 
            $nuevo_formulario->cargoEmpresa = $cargos[$faker->numberBetween(0,count($cargos)-1)]; 
            $nuevo_formulario->presentadorNomApellido =  $faker->name(); 
            $nuevo_formulario->presentador_dni = $faker->numberBetween(15000000,45999999); 
            $nuevo_formulario->provincia_id = $provincias[$faker->numberBetween(0,count($provincias)-1)]["id"]; 
            $nuevo_formulario->observacion = $faker->text(100); 
            $nuevo_formulario->estado = $estado; 
            $nuevo_formulario->updated_by = $id_user;  // por ser creado por el seeder*/


            //PASO 1
            $formulario_nuevo  = new FormAltaProductor();
            //$formulario_nuevo->inicializar_faker(null,$id_user,$id_provincia);
            $formulario_nuevo->completar_paso1_faker(null,null,$razon_social,$email,$sociedad,null,null,null,$id_user,$id_provincia);
            
            $formulario_nuevo->completar_paso2_faker(null,null,null,$id_provincia,null,null,null,null,$id_user);

            $formulario_nuevo->completar_paso3_faker(null,null,null,$id_provincia,null,null,null,null,$id_user);



            $formulario_nuevo->completar_paso4_faker(null,null,null,null,null,null,null,$id_user);


            dd("voy por el 4",$formulario_nuevo, $id_user);


           

            //PASo 5
            $formulario_nuevo->owner = $faker->boolean;
            $formulario_nuevo->arrendatario = $faker->boolean;
            $formulario_nuevo->concesionario = $faker->boolean;
            //$formulario_nuevo->otros = $request->otros;
            /*var_dump($request->sustancias);
            die();*/
            if ($faker->boolean) {
                $formulario_nuevo->sustancias_de_aprovechamiento_comun = 1;
                $formulario_nuevo->sustancias_de_aprovechamiento_comun_aclaracion = $faker->text($maxNbChars = 10);
            } else {
                $formulario_nuevo->sustancias_de_aprovechamiento_comun = 0;
                $formulario_nuevo->sustancias_de_aprovechamiento_comun_aclaracion = null;
            }
            if ($faker->boolean) {
                $formulario_nuevo->otros = 1;
                $formulario_nuevo->otro_caracter_acalaracion = $faker->text($maxNbChars = 10);
            } else {
                $formulario_nuevo->otros = 0;
                $formulario_nuevo->otro_caracter_acalaracion = null;
            }

            //este es un archivo
            /*if ($request->constancia_pago_canon != null && $request->constancia_pago_canon != '' && $request->constancia_pago_canon != 'null') { //no es un archivo vacio
                if (substr($request->constancia_pago_canon, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                    $contents = file_get_contents($request->constancia_pago_canon->path());
                    $formulario_nuevo->constancia_pago_canon =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constancia_pago_canon);
                }
                //else //signifca que el archivo ya estaba cargado y no se modifico
            }*/
            $formulario_nuevo->constancia_pago_canon = null;

            //este es un archivo
            /*if ($request->iia != null && $request->iia != '' && $request->iia != 'null') { //no es un archivo vacio
                if (substr($request->iia, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                    $contents = file_get_contents($request->iia->path());
                    $formulario_nuevo->iia =  Storage::put('public/files_formularios' . '/' . $request->id, $request->iia);
                }
            }*/
            $formulario_nuevo->iia = null;
				
            //este es un archivo
            /*if ($request->dia != null && $request->dia != '' && $request->dia != "null") { //no es un archivo vacio
                if (substr($request->dia, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                    $contents = file_get_contents($request->dia->path());
                    $formulario_nuevo->dia =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dia);
                }
            }*/
            $formulario_nuevo->dia = null;

            $formulario_nuevo->acciones_a_desarrollar = $faker->realText($maxNbChars = 10, $indexSize = 0);
            $formulario_nuevo->actividad = $faker->realText($maxNbChars = 10, $indexSize = 0);

            $formulario_nuevo->fecha_alta_dia = Carbon::now();
            $formulario_nuevo->fecha_vencimiento_dia = Carbon::now()->addMonths(12);
            $formulario_nuevo->save();


            //PASO 6
            $formulario_nuevo->localidad_mina_pais = "Argentina";
            $formulario_nuevo->localidad_mina_provincia = $id_provincia;
            $formulario_nuevo->localidad_mina_departamento = $departamento->id;
            $formulario_nuevo->localidad_mina_localidad = $faker->state;
            $formulario_nuevo->tipo_sistema = null;
            $formulario_nuevo->longitud = null;
            $formulario_nuevo->latitud = null;

            $formulario_nuevo->updated_at = date("Y-m-d H:i:s");
            $formulario_nuevo->updated_paso_seis = date("Y-m-d H:i:s");
            $formulario_nuevo->updated_by = $id_usuario;
            $formulario_nuevo->save();


            //si es catamarca
            if($id_provincia == 10){
                $formularioNuevoCatamarca  = new FormAltaProductorCatamarca();
                $formularioNuevoCatamarca->gestor_nombre_apellido = $faker->name;
                $formularioNuevoCatamarca->gestor_dni = $faker->numberBetween(15000000,45999999);
                $formularioNuevoCatamarca->gestor_profesion = $cargos[$faker->numberBetween(0,count($cargos)-1)];
                $formularioNuevoCatamarca->gestor_telefono = $faker->e164PhoneNumber;
                $formularioNuevoCatamarca->gestor_notificacion = $faker->boolean;
                $formularioNuevoCatamarca->gestor_email = $faker->email;
                /*if (
                    ($request->primer_hoja_dni != null)
                    &&
                    ($request->primer_hoja_dni != '')
                    &&
                    (is_object($request->primer_hoja_dni))
                ) {
                    $contents = file_get_contents($request->primer_hoja_dni->path());
                    $formularioNuevoCatamarca->primer_hoja_dni =  Storage::put('public/files_formularios' . '/' . $request->id, $request->primer_hoja_dni);
                }*/
                $formularioNuevoCatamarca->primer_hoja_dni = null;

                /*if (
                    ($request->segunda_hoja_dni != null)
                    &&
                    ($request->segunda_hoja_dni != '')
                    &&
                    (is_object($request->segunda_hoja_dni))
                ) {
                    $contents = file_get_contents($request->segunda_hoja_dni->path());
                    $formularioNuevoCatamarca->segunda_hoja_dni =  Storage::put('public/files_formularios' . '/' . $request->id, $request->segunda_hoja_dni);
                }*/
                $formularioNuevoCatamarca->segunda_hoja_dni =null;

                /*if (
                    ($request->foto_4x4 != null)
                    &&
                    ($request->foto_4x4 != '')
                    &&
                    (is_object($request->foto_4x4))
                ) {
                    $contents = file_get_contents($request->foto_4x4->path());
                    $formularioNuevoCatamarca->foto_4x4 =  Storage::put('public/files_formularios' . '/' . $request->id, $request->foto_4x4);
                }*/
                $formularioNuevoCatamarca->foto_4x4 = null;

                /*if (
                    ($request->constancia_afip != null)
                    &&
                    ($request->constancia_afip != '')
                    &&
                    (is_object($request->constancia_afip))
                ) {
                    $contents = file_get_contents($request->constancia_afip->path());
                    $formularioNuevoCatamarca->constancia_afip =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constancia_afip);
                }*/
                $formularioNuevoCatamarca->constancia_afip = null;

                /*if (
                    ($request->autorizacion_gestor != null)
                    &&
                    ($request->autorizacion_gestor != '')
                    &&
                    (is_object($request->autorizacion_gestor))
                ) {
                    $contents = file_get_contents($request->autorizacion_gestor->path());
                    $formularioNuevoCatamarca->autorizacion_gestor =  Storage::put('public/files_formularios' . '/' . $request->id, $request->autorizacion_gestor);
                }*/
                $formularioNuevoCatamarca->autorizacion_gestor = null;

                $formularioNuevoCatamarca->paso_aprobado = null;
                $formularioNuevoCatamarca->paso_reprobado = null;
                $formularioNuevoCatamarca->paso_progreso = null;
                $formularioNuevoCatamarca->created_by = $id_user;
                $formularioNuevoCatamarca->updated_by = $id_user;
                $formularioNuevoCatamarca->id_formulario_alta = $request->id;
                $formularioNuevoCatamarca->save();

            }

            //cambiar estado
            $formulario_nuevo->observacion = $fake->text($maxNbChars = 10);
            $formulario_nuevo->cargo_empresa = $cargos[$faker->numberBetween(0,count($cargos)-1)];
            $formulario_nuevo->presentador_nom_apellido = $faker->suffix ." ". $faker->name;
            $formulario_nuevo->presentador_dni = $faker->numberBetween(15000000,45999999);

            $formulario_nuevo->estado = "en revision";
            $formulario_nuevo->updated_at = date("Y-m-d H:i:s");
            $formulario_nuevo->updated_by = $id_user;


            //aprobando el formulario
            $id_productor_nuevo = $this->crear_registro_productor($formulario_provisorio->id);
            $id_mina_nueva = $this->crear_registro_mina_cantera($formulario_provisorio->id);
            $id_dia_iia_nueva = $this->crear_registro_dia_iia($formulario_provisorio->id);
            $id_pago_canon_nuevo = $this->crear_registro_pago_canon($formulario_provisorio->id);
            $id_mina_productor = $this->crear_mina_productor($formulario_provisorio->id, $id_mina_nueva, $id_productor_nuevo, $id_dia_iia_nueva);
        


            //datos de presentador
            //dd($formulario_provisorio->estado, $request->estado);
            $resulado = $formulario_provisorio->save();


            //cambio estado
            $formulario_nuevo->estado = "aprobado";
			$formulario_nuevo->updated_at = date("Y-m-d H:i:s");
			$formulario_nuevo->updated_by = 1;
			$formulario_nuevo->save();










            $nuevo_productor = new FormAltaProdPaso1();
            $nuevo_productor->id_formulario = $nuevo_formulario->id;
            $nuevo_productor->cuit = strval($faker->numberBetween($min = 20, $max = 35))."-".strval(($faker->numberBetween($min = 15000000, $max = 40000000)))."-".strval(($faker->numberBetween($min = 0, $max = 9)));
            $nuevo_productor->razonsocial = $razon_social;
            $nuevo_productor->numeroproductor = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_productor->email = $email;
            $nuevo_productor->tiposociedad = $sociedades[$faker->numberBetween($min=0, $max=6)];

            $nuevo_productor->inscripciondgr = null;
            $nuevo_productor->constaciasociedad = null;
            $nuevo_productor->estado = $estado;
            $nuevo_productor->created_at = date("Y-m-d H:i:s");
            $nuevo_productor->deleted_at = null;
            $nuevo_productor->updated_at = date("Y-m-d H:i:s");

            $nuevo_productor->save();

            echo "-- ya cree uno --";
        }

    }
}
