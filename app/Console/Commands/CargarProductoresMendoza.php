<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\FormAltaProductor;
use App\Http\Controllers\FormAltaProductorController;



use Exception;
use App\Models\FormAltaProductorCatamarca;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\ValidarEmailProductorPrimeraVez;
use App\Mail\AvisoFormularioPresentadoEmail;
use App\Mail\AvisoFormularioAprobadoEmail;
use App\Mail\AvisoFormularioConObservaciones;

use Faker\Factory as Faker;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

use App\Models\EmailsAConfirmar;
use App\Models\Productors;
use App\Models\Productores;


use App\Models\MinaCantera;
use App\Models\Pagocanonmina;
use App\Models\iia_dia;
use App\Models\ProductorMina;

use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\Localidades;
use App\Models\Minerales;

use App\Models\Minerales_Borradores;

use App\Models\User;

class CargarProductoresMendoza extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'CargarProductoresMendoza';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este comando sirve para cargar los productores de Mendoza';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        require 'Mendoza.php';
        $auth = 0;
        $faker = Faker::create();
		for ($i = 1; $i <= 894; $i++) {
            if ($i == 549)
            continue;
			var_dump("\n\nvoy por la vuelta: " . $i);
            
			//PASO 1
			$formulario_provisorio = new FormAltaProductor();
			$formulario_provisorio->razonsocial = $array[$i][11];
			$formulario_provisorio->email = $faker->email();
			$formulario_provisorio->cuit = $array[$i][12];
			$formulario_provisorio->numeroproductor = $i;
			$formulario_provisorio->tiposociedad = 'S.A.';
			$formulario_provisorio->constaciasociedad = null;
			$formulario_provisorio->inscripciondgr = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->estado = "borrador";
			$formulario_provisorio->updated_paso_uno = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = $auth;
			$formulario_provisorio->created_by = $auth;
			$formulario_provisorio->provincia = 50;
			$resultado = $formulario_provisorio->save();

			//Paso 2 
			$formulario_provisorio->leal_calle = null;
			$formulario_provisorio->leal_numero = null;
			$formulario_provisorio->leal_telefono = null;
			$formulario_provisorio->leal_provincia = 50;
			$formulario_provisorio->leal_departamento = intval($array[$i][2]);
			$formulario_provisorio->leal_localidad = $array[$i][1];
			$formulario_provisorio->leal_cp = null;
			$formulario_provisorio->leal_otro = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_paso_dos = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = $auth;
			$formulario_provisorio->save();

			//paso 3 
			$formulario_provisorio->administracion_calle = null;
			$formulario_provisorio->administracion_numero = null;
			$formulario_provisorio->administracion_telefono = null;
			$formulario_provisorio->administracion_pais = null;
			$formulario_provisorio->administracion_provincia = 50;
			$formulario_provisorio->administracion_departamento = $array[$i][2];
			$formulario_provisorio->administracion_localidad = $array[$i][1];
			$formulario_provisorio->administracion_cp = null;
			$formulario_provisorio->administracion_otro = null;
			$formulario_provisorio->updated_paso_tres = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = $auth;
			$formulario_provisorio->save();

			//PASO 4
			if ($array[$i][9] == 1) {
				$nombre_mina = 'Mina';
				$categoria = 'primera';
			} elseif ($array[$i][9] == 2) {
				$nombre_mina = 'Mina';
				$categoria = 'segunda';
			} else {
				$nombre_mina = 'Cantera';
				$categoria = 'tercera';
			}
			$formulario_provisorio->numero_expdiente = $array[$i][4];
			$formulario_provisorio->categoria = $categoria;
			$formulario_provisorio->nombre_mina = $array[$i][6];
			$formulario_provisorio->descripcion_mina = null;
			$formulario_provisorio->distrito_minero = $array[$i][0];
			$formulario_provisorio->mina_cantera = $nombre_mina;
			$formulario_provisorio->resolucion_concesion_minera = null;
			$formulario_provisorio->titulo_contrato_posecion = null;
			$formulario_provisorio->plano_inmueble = null;
			$formulario_provisorio->titulo_contrato_posecion = null;
			$formulario_provisorio->resolucion_concesion_minera = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();
			
			//Paso 5
			$formulario_provisorio->owner = null;
			$formulario_provisorio->arrendatario = null;
			$formulario_provisorio->concesionario = null;
			$formulario_provisorio->sustancias_de_aprovechamiento_comun = 0;
			$formulario_provisorio->sustancias_de_aprovechamiento_comun_aclaracion = null;
			$formulario_provisorio->otros = 0;
			$formulario_provisorio->otro_caracter_acalaracion = null;
			$formulario_provisorio->constancia_pago_canon = null;
			$formulario_provisorio->iia = null;
			$formulario_provisorio->dia = null;
			$formulario_provisorio->acciones_a_desarrollar = $array[$i][13];
			$actividad = null;
			if (isset($array[$i][15]))
				$actividad = $array[$i][15];
			$formulario_provisorio->actividad = $actividad;
			$formulario_provisorio->fecha_alta_dia = null;
			$formulario_provisorio->fecha_vencimiento_dia = null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->save();

			//Paso 6
			$formulario_provisorio->localidad_mina_pais = null;
			$formulario_provisorio->localidad_mina_provincia = 50;
			$formulario_provisorio->localidad_mina_departamento =  $array[$i][2];
			$formulario_provisorio->localidad_mina_localidad = $array[$i][1];
			$formulario_provisorio->tipo_sistema = null;
			$formulario_provisorio->longitud = null;
			$formulario_provisorio->latitud =  null;
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_paso_seis = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = $auth;
			$formulario_provisorio->save();

			$formulario_provisorio->estado = "aprobado";
			$formulario_provisorio->updated_at = date("Y-m-d H:i:s");
			$formulario_provisorio->updated_by = $auth;
			$formulario_provisorio->save();

			//parto el string de minerales
			$mineralesACargar = explode("*", $array[$i][7]);
			for ($y = 0; $y < count($mineralesACargar); $y++) {
				//dd(count($mineralesACargar), $mineralesACargar, $y, $mineralesACargar[$y]);
				$nuevo_min = new Minerales_Borradores();
				$nuevo_min->id_formulario = $formulario_provisorio->id;
				$nuevo_min->id_mineral = $mineralesACargar[$y];
				$nuevo_min->lugar_donde_se_encuentra = null;
				$nuevo_min->variedad = null;
				$nuevo_min->segunda_cat_mineral_explotado = null;
				$nuevo_min->mostrar_lugar_segunda_cat = null;
				$nuevo_min->mostrar_otro_mineral_segunda_cat = null;
				$nuevo_min->otro_mineral_segunda_cat = null;
				$nuevo_min->observacion = null;
				$nuevo_min->clase_text_area_presentacion = null;
				$nuevo_min->clase_text_evaluacion_de_text_area_presentacion = null;
				$nuevo_min->texto_validacion_text_area_presentacion = null;
				$nuevo_min->presentacion_valida = null;
				$nuevo_min->evaluacion_correcto = null;
				$nuevo_min->observacion_autoridad = null;
				$nuevo_min->clase_text_area = null;
				$nuevo_min->clase_text_evaluacion_de_text_area = null;
				$nuevo_min->texto_validacion_text_area = null;
				$nuevo_min->obs_valida = null;
				$nuevo_min->lista_de_minerales_array = '';
				$nuevo_min->thumb = null;
				$nuevo_min->created_by = $auth;
				$nuevo_min->estado = "aprobado";
				$nuevo_min->updated_by =  $auth;

				$nuevo_min->created_at = null; //date("Y-m-d H:i:s");
				$nuevo_min->updated_at = null; //date("Y-m-d H:i:s");

				$nuevo_min->save();
			}

            $formualrio_contorller = new FormAltaProductorController;
			$id_productor_nuevo = $formualrio_contorller->crear_registro_productor($formulario_provisorio->id);
			$id_mina_nueva = $formualrio_contorller->crear_registro_mina_cantera($formulario_provisorio->id);
			$id_dia_iia_nueva = $formualrio_contorller->crear_registro_dia_iia($formulario_provisorio->id);
			$id_pago_canon_nuevo = $formualrio_contorller->crear_registro_pago_canon($formulario_provisorio->id);
			$id_mina_productor = $formualrio_contorller->crear_mina_productor($formulario_provisorio->id, $id_mina_nueva, $id_productor_nuevo, $id_dia_iia_nueva);

			var_dump("El id del borrador es:");
			var_dump($formulario_provisorio->id);
			var_dump("El id del productor es:");
			var_dump($id_productor_nuevo);
			var_dump("El id de la mina es:");
			var_dump($id_mina_nueva);
			var_dump("El id de la id_dia_iia_nueva es:");
			var_dump($id_dia_iia_nueva);
			var_dump("El id de la id_dia_iia_nueva es:");
			var_dump($id_dia_iia_nueva);
			var_dump("El id de la id_pago_canon_nuevo es:");
			var_dump($id_pago_canon_nuevo);
			var_dump("El id de la id_mina_productor es:");
			var_dump($id_mina_productor);
			var_dump("el dpto es:" . intval($array[$i][2]));
			echo "\n\n";
		}
        return 0;
    }
}
