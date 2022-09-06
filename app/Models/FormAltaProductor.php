<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use Faker\Factory as Faker;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\FormAltaProdPaso1;
use App\Models\FormularioAltaProd;

use Carbon\Carbon;
use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\User;
use App\Models\Minerales;

use App\Models\FormAltaProductorCatamarca;


use App\Models\Constants;



use App\Models\Productores;
use App\Models\MinaCantera;
use App\Models\iia_dia;
use App\Models\Pagocanonmina;

use App\Models\ProductorMina;
use App\Models\Minerales_Borradores;


class FormAltaProductor extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'form_alta_productores';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'tipo_productor',
        'cuit',
        'cuit_correcto',
        'obs_cuit',
        'razonsocial',
        'razon_social_correcto',
        'obs_razon_social',
        'numeroproductor',
        'numeroproductor_correcto',
        'obs_numeroproductor',
        'email',
        'email_correcto',
        'obs_email',
        'tiposociedad',
        'tiposociedad_correcto',
        'obs_tiposociedad',
        'inscripciondgr',
        'inscripciondgr_correcto',
        'obs_inscripciondgr',
        'constaciasociedad',
        'constaciasociedad_correcto',
        'obs_constaciasociedad',
        'paso_1_progreso',
        'paso_1_aprobado',
        'paso_1_reprobado',
        'leal_calle',
        'leal_numero',
        'leal_telefono',
        'leal_pais',
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
        'estado',
        'tipo_tramite',
        'updated_by',
        'tiposociedad_correcto',
        'created_by',
        'created_by',
        'updated_by',
        'updated_paso_uno',
        'updated_paso_dos',
        'leal_calle_correcto',
        'obs_leal_calle',
        'leal_numero_correcto',
        'obs_leal_numero',
        'leal_telefono_correcto',
        'obs_leal_telefono',
        'leal_provincia_correcto',
        'obs_leal_provincia',
        'leal_departamento_correcto',
        'obs_leal_departamento',
        'leal_localidad_correcto',
        'obs_leal_localidad',
        'leal_cp_correcto',
        'obs_leal_cp',
        'leal_otro_correcto',
        'obs_leal_otro',
        'paso_2_progreso',
        'paso_2_aprobado',
        'paso_2_reprobado',
        'administracion_calle_correcto',
        'obs_administracion_calle',
        'administracion_numero_correcto',
        'obs_administracion_numero',
        'administracion_telefono_correcto',
        'obs_administracion_telefono',
        'administracion_provincia_correcto',
        'obs_administracion_provincia',
        'administracion_departamento_correcto',
        'obs_administracion_departamento',
        'administracion_localidad_correcto',
        'obs_administracion_localidad',
        'administracion_cp_correcto',
        'obs_administracion_cp',
        'administracion_otro_correcto',
        'obs_administracion_otro',
        'paso_3_progreso',
        'paso_3_aprobado',
        'paso_3_reprobado',
        'numero_expdiente_correcto',
        'obs_numero_expdiente',
        'categoria_correcto',
        'obs_categoria',
        'nombre_mina_correcto',
        'obs_nombre_mina',
        'descripcion_mina_correcto',
        'obs_descripcion_mina',
        'obs_distrito_minero',
        'distrito_minero_correcto',
        'mina_cantera_correcto',
        'obs_mina_cantera',
        'plano_inmueble_correcto',
        'obs_plano_inmueble',
        'obs_resolucion_concesion_minera',
        'resolucion_concesion_minera_correcto',
        'titulo_contrato_posecion_correcto',
        'obs_titulo_contrato_posecion',
        'paso_4_progreso',
        'paso_4_aprobado',
        'paso_4_reprobado',
        'updated_paso_cuatro',
        'updated_paso_tres',
        'otro_caracter_acalaracion',
        'concesion_minera_acalracion',
        'sustancias_de_aprovechamiento_comun',
        'owner_correcto',
        'obs_owner',
        'arrendatario_correcto',
        'obs_arrendatario',
        'concesionario_correcto',
        'obs_concesionario',
        'otros_correcto',
        'obs_otros',
        'sustancias_de_aprovechamiento_comun_correcto',
        'obs_sustancias_de_aprovechamiento_comun_correcto',
        'constancia_pago_canon_correcto',
        'obs_constancia_pago_canon',
        'iia_correcto',
        'obs_iia',
        'dia_correcto',
        'obs_dia',
        'acciones_a_desarrollar_correcto',
        'obs_acciones_a_desarrollar',
        'actividad_correcto',
        'obs_actividad',
        'fecha_alta_dia_correcto',
        'obs_fecha_alta_dia',
        'paso_5_progreso',
        'paso_5_aprobado',
        'paso_5_reprobado',
        'fecha_vencimiento_dia_correcto',
        'obs_fecha_vencimiento_dia',
        'updated_paso_cinco',
        'localidad_mina_provincia_correcto',
		'obs_localidad_mina_provincia',
		'localidad_mina_departamento_correcto',
		'obs_localidad_mina_departamento',
		'localidad_mina_localidad_correcto',
		'obs_localidad_mina_localidad',
		'tipo_sistema_correcto',
		'obs_tipo_sistema',
		'longitud_correcto',
		'obs_longitud',
		'latitud_correcto',
		'obs_latitud',
		'paso_6_progreso',
		'paso_6_aprobado',
		'paso_6_reprobado',
		'updated_paso_seis',
        'sustancias_de_aprovechamiento_comun_aclaracion',
        'provincia',
        'constancia_paga_canon_monto',
        'constancia_paga_canon_monto_correcto',
        'obs_constancia_paga_canon_monto',
        'constancia_paga_canon_inicio',
        'constancia_paga_canon_inicio_correct',
        'obs_constancia_paga_canon_inicio',
        'constancia_paga_canon_fin',
        'constancia_paga_canon_fin_correcto',
        'obs_constancia_paga_canon_fin',
        'cargo_empresa',
        'presentador_nom_apellido',
        'presentador_dni',
        'observacion'
        ];
    
    
    
    /*id
    cuit
    razonsocial
    numeroproductor
    tiposociedad
    inscripciondgr
    constaciasociedad
    leal_calle
    leal_numero
    leal_telefono
    leal_pais
    leal_provincia
    leal_departamento
    leal_localidad
    leal_cp
    administracion_calle
    administracion_numero
    administracion_telefono
    administracion_pais
    administracion_provincia
    administracion_departamento
    administracion_localidad
    administracion_cp
    numero_expdiente
    categoria
    nombre_mina
    descripcion_mina
    distrito_minero
    mina_cantera
    plano_inmueble
    caracter_invoca
    titulo_contrato_posecion
    resolucion_concesion_minera
    constancia_pago_canon
    iia
    dia
    acciones_a_desarrollar
    actividad
    fecha_alta_dia
    fecha_vencimiento_dia
    localidad_mina_pais
    localidad_mina_provincia
    localidad_mina_departamento
    localidad_mina_localidad
    longitud
    latitud
    created_by
    estado
    created_at
    deleted_at
    updated_at
    */


    public function inicializar_faker($estado=null,$user,$provincia=null){
        $faker = Faker::create();
        $this->updated_at = date("Y-m-d H:i:s");
        if($estado== null){
            $this->estado =  "borrador";
        } else {
            $this->estado = $estado;
        }
		$this->updated_paso_uno = date("Y-m-d H:i:s");
		$this->updated_by = $user; // by seeder
		$this->created_by = $user;
        if($provincia== null){
            $provincias = Provincias::select("id", "nombre")->get()->toArray();
            $num_aleatorio_provincia = $faker->numberBetween(0,count($provincias)-1);
            $this->provincia = $provincias[$num_aleatorio_provincia]["id"];
        } else {
            $this->provincia = $provincia;
        }
		$this->save();
    }

    public function completar_paso1_faker($numeroproductor = null,$cuit= null,$razonsocial= null,$email= null,$tiposociedad= null,$inscripciondgr= null,$constaciasociedad= null,$estado,$id_user,$id_provincia){
        $faker = Faker::create();
        


        if($numeroproductor== null){
            $this->numeroproductor = $faker->numberBetween(100,459999);
        } else {
            $this->numeroproductor = $numeroproductor;
        }

        if($cuit== null){
            $this->cuit =  "20-".$faker->numberBetween(15000000,45999999)."-0";
        } else {
            $this->cuit = $cuit;
        }

        if($razonsocial== null){
            $this->razonsocial =  $faker->name();
        } else {
            $this->razonsocial = $razonsocial;
        }

        if($email== null){
            $this->email =  $faker->email();
        } else {
            $this->email = $email;
        }

        if($tiposociedad== null){
            $this->tiposociedad = $tiposociedad;
        } else {
            $this->tiposociedad = Constants::$sociedades[$faker->numberBetween(0,count(Constants::$sociedades)-1)];
        }

        if($inscripciondgr == null){
            $this->inscripciondgr =  '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0,388).'.pdf';
        } else {
            $this->inscripciondgr = $inscripciondgr; // poner ruta de archivo fake
        }

        if($constaciasociedad== null){
            $this->constaciasociedad = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0,388).'.pdf';
        } else {
            $this->constaciasociedad =$constaciasociedad;
        }


        if($estado== null){
            $this->estado =  "borrador";
        } else {
            $this->estado = $estado;
        }
		$this->updated_paso_uno = date("Y-m-d H:i:s");
		$this->updated_by = $id_user; // by seeder
		$this->created_by = $id_user;

        if($id_provincia== null){
            $provincias = Provincias::select("id", "nombre")->get()->toArray();
            $num_aleatorio_provincia = $faker->numberBetween(0,count($provincias)-1);
            $this->provincia = $provincias[$num_aleatorio_provincia]["id"];
        } else {
            $this->provincia = $id_provincia;
        }


        $this->updated_at = date("Y-m-d H:i:s");

        return $this->save();


    }


    public function completar_paso2_faker($leal_calle = null,$leal_numero= null,$leal_telefono= null,$leal_provincia= null,$leal_departamento= null,$leal_localidad= null,$leal_cp= null,$leal_otro=null,$id_user){
        $faker = Faker::create();

        if($leal_calle== null){
            $this->leal_calle =  $faker->address;
        } else {
            $this->leal_calle = $leal_calle;
        }

        if($leal_numero== null){
            $this->leal_numero =  $faker->numberBetween(1000,9999);
        } else {
            $this->leal_numero = $leal_numero;
        }

        if($leal_telefono== null){
            $this->leal_telefono =   $faker->e164PhoneNumber;
        } else {
            $this->leal_telefono = $leal_telefono;
        }
        
        $this->leal_pais = "Argentina";

        if($leal_provincia== null){
            $this->leal_provincia =  $this->provincia;
        } else {
            $this->leal_provincia = $leal_provincia;
        }


        if($leal_departamento== null){
            $departamentos = Departamentos::select("id", "nombre")->where("provincia_id", "=",$this->provincia)->get();
            $this->leal_departamento = $departamentos[$faker->numberBetween(0,($departamentos->count())-1)]->id; 
            
        } else {
            $this->leal_departamento = $leal_departamento;
        }

        if($leal_localidad== null){
            $this->leal_localidad =  $faker->state;
        } else {
            $this->leal_localidad = $leal_localidad;
        }

        if($leal_cp== null){
            $this->leal_cp =   $faker->numberBetween(1000,9999);
        } else {
            $this->leal_cp = $leal_cp;
        }

        if($leal_otro== null){
            $this->leal_otro = $faker->text($maxNbChars = 50);
        } else {
            $this->leal_otro = $leal_otro;
        }

		$this->updated_paso_uno = date("Y-m-d H:i:s");
		$this->updated_by = $id_user; // by seeder
		$this->created_by = $id_user;

        return $this->save();
    }




    public function completar_paso3_faker($administracion_calle = null,$administracion_numero= null,$administracion_telefono= null,$administracion_provincia= null,$administracion_departamento= null,$administracion_localidad= null,$administracion_cp= null,$administracion_otro=null,$id_user){
        $faker = Faker::create();

        if($administracion_calle== null){
            $this->administracion_calle =  $faker->address;
        } else {
            $this->administracion_calle = $administracion_calle;
        }

        if($administracion_numero== null){
            $this->administracion_numero =  $faker->numberBetween(1000,9999);
        } else {
            $this->administracion_numero = $administracion_numero;
        }

        if($administracion_telefono== null){
            $this->administracion_telefono =   $faker->e164PhoneNumber;
        } else {
            $this->administracion_telefono = $administracion_telefono;
        }
        
        $this->administracion_pais = "Argentina";

        if($administracion_provincia== null){
            $this->administracion_provincia =  $this->provincia;
        } else {
            $this->administracion_provincia = $administracion_provincia;
        }


        if($administracion_departamento== null){
            $departamentos = Departamentos::select("id", "nombre")->where("provincia_id", "=",$this->provincia)->get();
            $this->administracion_departamento = $departamentos[$faker->numberBetween(0,($departamentos->count())-1)]->id; 
            
        } else {
            $this->administracion_departamento = $administracion_departamento;
        }

        if($administracion_localidad== null){
            $this->administracion_localidad =  $faker->state;
        } else {
            $this->administracion_localidad = $administracion_localidad;
        }

        if($administracion_cp== null){
            $this->administracion_cp =   $faker->numberBetween(1000,9999);
        } else {
            $this->administracion_cp = $administracion_cp;
        }

        if($administracion_otro== null){
            $this->administracion_otro = $faker->text($maxNbChars = 50);
        } else {
            $this->administracion_otro = $administracion_otro;
        }

		$this->updated_paso_uno = date("Y-m-d H:i:s");
		$this->updated_by = $id_user; // by seeder
		$this->created_by = $id_user;

        return $this->save();
    }



    public function completar_paso4_faker($mina_cantera = null,$numero_expdiente= null,$distrito_minero= null,$descripcion_mina= null,$nombre_mina= null,$plano_inmueble= null,$minerales_variedad= null,$id_user){
        $faker = Faker::create();
        
        //PASO 4
        if($mina_cantera== null){
            if($faker->boolean ){
                $mina_cantera = "Cantera";
                $categoria = "tercera";
            }else {
                $mina_cantera = "Mina";
                if($faker->boolean ){
                    $categoria ="primera";
                } else {
                    $categoria ="segunda";
                }
            }
            $this->mina_cantera = $mina_cantera;
        } else {
            $this->mina_cantera = $mina_cantera;
            $categoria ="tercera";
        }


        if($numero_expdiente== null){
            $this->numero_expdiente =  $faker->numberBetween(1000,9999);
        } else {
            $this->numero_expdiente = $numero_expdiente;
        }

        if($distrito_minero== null){
            $this->distrito_minero = "distrito numero: ".$faker->numberBetween(0,9999);
        } else {
            $this->distrito_minero = $distrito_minero;
        }

        if($descripcion_mina== null){
            $this->descripcion_mina =$faker->realText($maxNbChars = 35, $indexSize = 1);
        } else {
            $this->descripcion_mina = $descripcion_mina;
        }


        if($nombre_mina== null){
            $this->nombre_mina =  Constants::$nombres_minas[$faker->numberBetween(0,count(Constants::$nombres_minas))];
        } else {
            $this->nombre_mina = $nombre_mina;
        }

        
        //$this->plano_inmueble = $request->mina_plano_inmueble;
        $this->categoria =$categoria;

        if($plano_inmueble== null){
            $this->plano_inmueble = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0,388).'.pdf';
        } else {
            $this->plano_inmueble = $plano_inmueble;
        }

        if($minerales_variedad== null){
            $this->minerales_variedad =  null;
        } else {
            $this->minerales_variedad = $minerales_variedad;
        }

        //lista de minerales
        $ya_elegidos = array();
        $cantidad_de_minerales = $faker->numberBetween(1,4);
        for ($i=0; $i < $cantidad_de_minerales ; $i++) { 
                $nuevo_min = new Minerales_Borradores();
                $nuevo_min->id_formulario = $this->id;
                //get mineral id
                $minerales_todos = Minerales::select("*")->where("categoria", "=", $categoria)->where("active", "=", true)->get()->toArray();
                $mineral =$minerales_todos[$faker->numberBetween(0,count($minerales_todos)-1)];
                $nuevo_min->id_mineral = $mineral["id"];
                $nuevo_min->lugar_donde_se_encuentra = $faker->state;
                $nuevo_min->variedad = null;
                //para segunda categoria
                $nuevo_min->segunda_cat_mineral_explotado = null;
                $nuevo_min->mostrar_lugar_segunda_cat = null;
                $nuevo_min->mostrar_otro_mineral_segunda_cat = null;
                $nuevo_min->otro_mineral_segunda_cat = null;
                //fin segunda categoria
                $nuevo_min->observacion = $faker->realText($maxNbChars = 50, $indexSize =1);
                $nuevo_min->clase_text_area_presentacion = null;
                $nuevo_min->clase_text_evaluacion_de_text_area_presentacion =null;
                $nuevo_min->texto_validacion_text_area_presentacion = null;
                $nuevo_min->presentacion_valida = true;
                $nuevo_min->evaluacion_correcto = null;
                $nuevo_min->observacion_autoridad = null;
                $nuevo_min->clase_text_area = null;
                $nuevo_min->clase_text_evaluacion_de_text_area = null;
                $nuevo_min->texto_validacion_text_area =null;
                $nuevo_min->obs_valida = null;
                $nuevo_min->lista_de_minerales_array = null;
                $nuevo_min->thumb = null;
                $nuevo_min->created_by = $id_user;
                $nuevo_min->estado = "aprobado";
                $nuevo_min->updated_by = $id_user;

                $nuevo_min->created_at = null;
                $nuevo_min->updated_at =null;
                $resultado = $nuevo_min->save();
        }





		$this->updated_paso_uno = date("Y-m-d H:i:s");
		$this->updated_by = $id_user; // by seeder
		$this->created_by = $id_user;

        return $this->save();
    }



    public function completar_paso5_faker($owner = null,$arrendatario= null,$concesionario= null,$acciones_a_desarrollar= null,$actividad= null,$id_user){
        $faker = Faker::create();
        
        //PASo 5
        if($owner== null){
            $this->owner = $faker->boolean;
        } else {
            $this->owner = $owner;
        }
        if($arrendatario== null){
            $this->arrendatario = $faker->boolean;
        } else {
            $this->arrendatario = $arrendatario;
        }
        if($concesionario== null){
            $this->concesionario = $faker->boolean;
        } else {
            $this->concesionario = $concesionario;
        }
        if ($faker->boolean) {
            $this->sustancias_de_aprovechamiento_comun = 1;
            $this->sustancias_de_aprovechamiento_comun_aclaracion = $faker->text($maxNbChars = 10);
        } else {
            $this->sustancias_de_aprovechamiento_comun = 0;
            $this->sustancias_de_aprovechamiento_comun_aclaracion = null;
        }
        if ($faker->boolean) {
            $this->otros = 1;
            $this->otro_caracter_acalaracion = $faker->text($maxNbChars = 10);
        } else {
            $this->otros = 0;
            $this->otro_caracter_acalaracion = null;
        }

        //este es un archivo
        /*if ($request->constancia_pago_canon != null && $request->constancia_pago_canon != '' && $request->constancia_pago_canon != 'null') { //no es un archivo vacio
            if (substr($request->constancia_pago_canon, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                $contents = file_get_contents($request->constancia_pago_canon->path());
                $formulario_nuevo->constancia_pago_canon =  Storage::put('public/files_formularios' . '/' . $request->id, $request->constancia_pago_canon);
            }
            //else //signifca que el archivo ya estaba cargado y no se modifico
        }*/
        $this->constancia_pago_canon = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0,388).'.pdf';

        //este es un archivo
        /*if ($request->iia != null && $request->iia != '' && $request->iia != 'null') { //no es un archivo vacio
            if (substr($request->iia, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                $contents = file_get_contents($request->iia->path());
                $formulario_nuevo->iia =  Storage::put('public/files_formularios' . '/' . $request->id, $request->iia);
            }
        }*/
        $this->iia = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0,388).'.pdf';
            
        //este es un archivo
        /*if ($request->dia != null && $request->dia != '' && $request->dia != "null") { //no es un archivo vacio
            if (substr($request->dia, 0, strlen(env('APP_URL') . '/storage/files_formularios')) != env('APP_URL') . '/storage/files_formularios') {
                $contents = file_get_contents($request->dia->path());
                $formulario_nuevo->dia =  Storage::put('public/files_formularios' . '/' . $request->id, $request->dia);
            }
        }*/
        $this->dia = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0,388).'.pdf';

        if($acciones_a_desarrollar== null){
            $this->acciones_a_desarrollar = $faker->realText($maxNbChars = 10, $indexSize = 0);
        } else {
            $this->acciones_a_desarrollar = $acciones_a_desarrollar;
        }
        
        if($actividad== null){
            $this->actividad = $faker->realText($maxNbChars = 10, $indexSize = 0);
        } else {
            $this->actividad = $actividad;
        }


        $this->fecha_alta_dia = Carbon::now();
        $this->fecha_vencimiento_dia = Carbon::now()->addMonths(12);



		$this->updated_paso_uno = date("Y-m-d H:i:s");
		$this->updated_by = $id_user; // by seeder
		$this->created_by = $id_user;

        return $this->save();
    }

    public function completar_paso6_faker($id_provincia = null,$departamento= null,$id_user){
        $faker = Faker::create();
        
        //PASO 6
        $this->localidad_mina_pais = "Argentina";
        $this->localidad_mina_provincia = $id_provincia;
        $this->localidad_mina_departamento = $departamento->id;
        $this->localidad_mina_localidad = $faker->state;
        $this->tipo_sistema = null;
        $this->longitud = null;
        $this->latitud = null;

        $this->updated_at = date("Y-m-d H:i:s");
        $this->updated_paso_seis = date("Y-m-d H:i:s");


		$this->updated_by = $id_user; // by seeder
		$this->created_by = $id_user;

        return $this->save();
    }
    public function completar_paso7_faker($observacion=null, $cargo_empresa=null, $presentador_nom_apellido=null, $presentador_dni=null, $id_user){
        $faker = Faker::create();
        
        if($observacion== null){
            $this->observacion = $faker->text($maxNbChars = 10);
        } else {
            $this->observacion = $observacion;
        }

        if($cargo_empresa== null){
            $this->cargo_empresa =  Constants::$cargos[$faker->numberBetween(0,count(Constants::$cargos)-1)];
        } else {
            $this->cargo_empresa = $cargo_empresa;
        }

        if($presentador_nom_apellido== null){
            $this->presentador_nom_apellido = $faker->suffix ." ". $faker->name;
        } else {
            $this->presentador_nom_apellido = $presentador_nom_apellido;
        }

        if($presentador_dni== null){
            $this->presentador_dni =  $faker->numberBetween(15000000,45999999);
        } else {
            $this->presentador_dni = $presentador_nom_apellido;
        }

        $this->estado = "en revision";
        $this->updated_at = date("Y-m-d H:i:s");
        $this->updated_by = $id_user;

		$this->updated_by = $id_user; // by seeder

        return $this->save();
    }


    public function completar_paso8_faker($id_user){
        $this->estado = "aprobado";
        $this->updated_at = date("Y-m-d H:i:s");
        $this->updated_by = $id_user;
        $this->save();
        //creo el nuevo productor
        $id_productor_nuevo = Productores::crear_registro_productor($this->id);
        $id_mina_nueva = MinaCantera::crear_registro_mina_cantera($this->id);
        $id_dia_iia_nueva = iia_dia::crear_registro_dia_iia($this->id);
        $id_pago_canon_nuevo = Pagocanonmina::crear_registro_pago_can($this->id);
        $id_mina_productor = ProductorMina::crear_mina_productor($this->id, $id_mina_nueva, $id_productor_nuevo, $id_dia_iia_nueva);
        $id_minerales_borradores = Minerales_Borradores::actualizar_registros_minerales_en_mina($this->id);
    }
}
