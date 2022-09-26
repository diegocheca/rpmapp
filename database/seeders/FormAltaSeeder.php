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
use App\Models\Constants;
use stdClass;
use App\Models\FormAltaProductorCatamarca;

use App\Models\FormAltaProductorMendoza;
use App\Models\FormAltaProductorSalta;



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
            //dd( $num_aleatorio_provincia,$departamento->id);

            if($departamento == null ){
                $departamento = new stdClass();
                $departamento->id = 9999;
                $departamento->nombre ="departamento";
            }

            if(!property_exists($departamento, 'id') ){
                $departamento->id = 9999;
                $departamento->nombre ="departamento";
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

            $formulario_nuevo->completar_paso6_faker($id_provincia,$departamento->id,$id_user);
            $formulario_nuevo->aprobar_paso_seis($id_user);
            
            if($id_provincia == 10){//si es catamarca
                $formulario_catamarca = new FormAltaProductorCatamarca();
                $formulario_catamarca->completar_paso_catamarca_faker(null, null,null,null, null, null, null, null, null, null, null,$formulario_nuevo->id,$id_user);
                $formulario_catamarca->aprobar_paso_catamarca($id_user);
            }
            if($id_provincia == 50){//mendoza poner el correcto de mendoza
                $formulario_mendoza = new FormAltaProductorMendoza();
                $formulario_mendoza->completar_y_guardar_formu_fake($formulario_nuevo->id,$id_user);
                $formulario_catamarca->aprobar_paso_mendoza($id_user);
            }
            if($id_provincia == 66){//mendoza poner el correcto de salta
                $formulario_mendoza = new FormAltaProductorSalta();
                $formulario_mendoza->crear_formulario_fake_salta($formulario_nuevo->id,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null,null, $id_user);
            }
            $formulario_nuevo->completar_paso7_faker(null,null,null,null,$id_user);
            $formulario_nuevo->completar_paso8_faker($id_user);
            echo "-- ya cree uno --";
        }
    }
}