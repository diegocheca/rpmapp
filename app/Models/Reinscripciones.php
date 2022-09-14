<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;


use Faker\Factory as Faker;
use App\Models\Productores;

use App\Models\Provincias;
use App\Models\Departamentos;
use App\Models\Localidades;
use App\Models\Minerales;
use App\Models\Reinscripciones;



use App\Models\FormAltaProdPaso1;
use App\Models\FormularioAltaProd;
use App\Models\FormAltaProductor; //el q tiene mil columnas

use Carbon\Carbon;
use App\Models\User;
use App\Models\Constants;
use stdClass;
use App\Models\FormAltaProductorCatamarca;

use App\Models\FormAltaProductorMendoza;
use App\Models\FormAltaProductorSalta;




class Reinscripciones extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reinscripciones';

    protected $date = ['created_at', 'deleted_at', 'updated_at', 'fecha_vto' ];
    protected $fillable = [
        'id_mina',
        'id_productor',
        'fecha_vto',
        'prospeccion',
        'exploracion',
        'explotacion',
        'desarrollo',
        'cantidad_productos',
        'porcentaje_venta_provincia',
        'porcentaje_venta_otras_provincias',
        'porcentaje_exportado',
        'personal_perm_profesional',
        'personal_perm_operarios',
        'personal_perm_administrativos',
        'personal_perm_otros',
        'personal_trans_profesional',
        'personal_trans_operarios',
        'personal_trans_administrativos',
        'personal_trans_otros',
        'nombre',
        'dni',
        'cargo',

        // San Luis
        'id_departamento',
        'id_localidad',
        'subterranea',
        'cielo_abierto',
        'manual',
        'mecanizada',
        'expediente',
        'polvorin',
        'ubicacion',
        'dimensiones',
        'personal_permanente',
        'temporario',
        'total',

        //Catamarca
        'production_checkbox',

        //La Rioja
        'reserva',
        'vida_util',
        'volumen_total',
        'volumen_unitario',
        'volumen_comercializado',
        'procesamiento_mineral',
        'personal_perm_tecnicos',
        'permiso_anmac',
        'fecha_concesion',
        'anios_concesion',
        'inicio_explotacion',

        //Mendoza
        'semimecanizada',
        'compresores',
        'grupo_electrogeno',
        'camion_mineralero',
        'cargadora_frontal',
        'equipo_ventilacion',
        'martillo_neumatico',
        'via_decauville',
        'vagoneta',
        'bomba_desagote',
        'taller_equipado',
        'campamento',
        'vivienda',
        'meses_trabajo',
        'razones_meses_trabajo',

        'created_by',
        'estado',
    ];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'id_reinscripcion');
    }

    public function combustibles()
    {
        return $this->hasMany(ReinscripcionesCombustible::class, 'id_reinscripcion');
    }

    public function explosivos()
    {
        return $this->hasMany(ReinscripcionesExplosivos::class, 'id_reinscripcion');
    }

    public function anexo1()
    {
        return $this->hasMany(ReinscripcionesAnexo1::class, 'id_reinscripcion');
    }

    public function equipos()
    {
        return $this->hasMany(ReinscripcionesEquipos::class, 'id_reinscripcion');
    }

    public function cantidad_de_personas_transitorias($id_provincia)
    {
        $datos = [];
        if($id_provincia > 1 && $id_provincia<99) {
            //soy una autoridad de mineria y filtro solo para provincia
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            ->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }
        else {
            //soy visor de buenos aires
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            //->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }

        $acumulador_profesionales_transitorios = 0;
        $acumulador_operarios_tansitorios = 0;
        $acumulador_administrativos_transitorios = 0;
        $acumulador_otros_transitorios = 0;

        foreach($temporal as $key){
            $acumulador_profesionales_transitorios += $key->personal_trans_profesional;
            $acumulador_operarios_tansitorios += $key->personal_trans_operarios;
            $acumulador_administrativos_transitorios += $key->personal_trans_administrativos;
            $acumulador_otros_transitorios += $key->personal_trans_otros;
        }
        $datos["profesionales_transitorios"] = $temporal->count() > 0 ? $acumulador_profesionales_transitorios  : 0;
        $datos["operarios_tansitorios"] = $temporal->count() > 0 ? $acumulador_operarios_tansitorios : 0;
        $datos["administrativos_transitorios"] = $temporal->count() > 0 ? $acumulador_administrativos_transitorios : 0;
        $datos["otros_transitorios"] = $temporal->count() > 0 ? $acumulador_otros_transitorios : 0;

        return $datos;
    }

    public function cantidad_de_personas_permante($id_provincia)
    {
        $datos = [];
        if($id_provincia > 1 && $id_provincia<99) {
            //soy una autoridad de mineria y filtro solo para provincia
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            ->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }
        else {
            //soy visor de buenos aires
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            //->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }

        $acumulador_profesionales_permanentes = 0;
        $acumulador_operarios_permanentes = 0;
        $acumulador_administrativos_permanentes = 0;
        $acumulador_otros_permanentes = 0;

        foreach($temporal as $key){
            $acumulador_profesionales_permanentes += $key->personal_perm_profesional;
            $acumulador_operarios_permanentes += $key->personal_perm_operarios;
            $acumulador_administrativos_permanentes += $key->personal_perm_administrativos;
            $acumulador_otros_permanentes += $key->personal_perm_otros;
        }
        $datos["profesionales_permanentes"] = $temporal->count() > 0 ? $acumulador_profesionales_permanentes  : 0;
        $datos["operarios_permanentes"] = $temporal->count() > 0 ? $acumulador_operarios_permanentes : 0;
        $datos["administrativos_permanentes"] = $temporal->count() > 0 ? $acumulador_administrativos_permanentes : 0;
        $datos["otros_permanentes"] = $temporal->count() > 0 ? $acumulador_otros_permanentes : 0;

        return $datos;
    }


    public function crear_reinscripcion_faker($id_productor,$user_id,$id_provincia){
        $faker = Faker::create();

        $razon_social = $faker->name();


        $departamento = Departamentos::select("id", "nombre")->where("provincia_id", "=", $id_provincia)->first();

        if($departamento == null ){
            $departamento = new stdClass();
            $departamento->id = 9999;
            $departamento->nombre ="departamento";
        }



        $sociedad = Constants::$sociedades[$faker->numberBetween(0,count(Constants::$sociedades)-1)];


        $this->id_productor = $id_productor;
        $this->fecha_vto = date('Y-m-d', strtotime("2021-12-01". ' + 6 months'));

        $this->prospeccion = 1;
        $this->prospeccion_evaluacion = null;
        $this->prospeccion_comentario = null;
        
        $this->exploracion = $faker->numberBetween($min = 0, $max = 1);
        $this->exploracion_evaluacion = null;
        $this->exploracion_comentario = null;
        
        
        $this->explotacion = $faker->numberBetween($min = 0, $max = 1);
        $this->explotacion_evaluacion = null;
        $this->explotacion_comentario = null;
        
        
        $this->desarrollo = $faker->numberBetween($min = 0, $max = 1);
        $this->desarrollo_evaluacion = null;
        $this->desarrollo_comentario = null;



        $this->cantidad_productos = $faker->numberBetween($min = 0, $max = 4);
        $this->cantidad_productos_evaluacion = null;
        $this->cantidad_productos_comentario = null;

        
        $this->porcentaje_venta_provincia =  $faker->numberBetween($min = 0, $max = 100);
        $limite_uno = 100-$this->porcentaje_venta_provincia;
        $this->porcentaje_venta_provincia_evaluacion = null;
        $this->porcentaje_venta_provincia_comentario = null;

        
        $this->porcentaje_venta_otras_provincias =  $faker->numberBetween($min = 0, $max = $limite_uno);
        $this->porcentaje_venta_otras_provincias_evaluacion = null;
        $this->porcentaje_venta_otras_provincias_comentario = null;


        $this->porcentaje_exportado =  100 - ( $this->porcentaje_venta_provincia + $this->porcentaje_venta_otras_provincias );
        $this->porcentaje_exportado_evaluacion = null;
        $this->porcentaje_exportado_comentario = null;
        
        $this->personal_perm_profesional = $faker->numberBetween($min = 0, $max = 50);
        $this->personal_perm_operarios = $faker->numberBetween($min = 0, $max = 50);
        $this->personal_perm_administrativos = $faker->numberBetween($min = 0, $max = 50);
        $this->personal_perm_otros = $faker->numberBetween($min = 0, $max = 50);
        $this->personal_trans_profesional = $faker->numberBetween($min = 0, $max = 50);
        $this->personal_trans_operarios = $faker->numberBetween($min = 0, $max = 50);
        $this->personal_trans_administrativos = $faker->numberBetween($min = 0, $max = 50);
        $this->personal_trans_otros = $faker->numberBetween($min = 0, $max = 50);
        
        $this->personal_perm_operarios_evaluacion = null;
        $this->personal_perm_operarios_comentario = null;
        $this->personal_perm_administrativos_evaluacion = null;
        $this->personal_perm_administrativos_comentario = null;
        $this->personal_perm_otros_evaluacion = null;
        $this->personal_perm_otros_comentario = null;
        $this->personal_trans_profesional_evaluacion = null;
        $this->personal_trans_profesional_comentario = null;
        $this->personal_trans_operarios_evaluacion = null;
        $this->personal_trans_operarios_comentario = null;
        $this->personal_trans_administrativos_evaluacion = null;
        $this->personal_trans_administrativos_comentario = null;
        $this->personal_trans_otros_evaluacion = null;
        $this->personal_trans_otros_comentario = null;
        
        
        

        
        $this->nombre = $faker->name;
        $this->nombre_evaluacion = null;
        $this->nombre_comentario = null;


        $this->dni = $faker->numberBetween($min = 25000000, $max = 50000000);
        $this->dni_evaluacion = null;
        $this->dni_comentario =null;


        $this->cargo =  $faker->jobTitle;
        $this->cargo_evaluacion = null;
        $this->cargo_comentario = null;




        $id_depatamento_faker = $this->id_depto_rando($idProvincia);
        $this->id_departamento = $id_depatamento_faker[$faker->numberBetween($min = 0, $max = (count($id_depatamento_faker))-1)]["id"];
        $this->id_departamento_evaluacion = null;
        $this->id_departamento_comentario = null;




        $this->id_localidad = $faker->numberBetween($min = 10, $max = 100);
        $this->id_localidad_evaluacion = null;
        $this->id_localidad_comentario = null;


        $this->subterranea = null;
        $this->subterranea_evaluacion = null;
        $this->subterranea_comentario = null;


        $this->cielo_abierto= null;
        $this->cielo_abierto_evaluacion = null;
        $this->cielo_abierto_comentario = null;


        $this->manual = null;
        $this->manual_evaluacion = null;
        $this->manual_comentario = null;


        $this->mecanizada= null;
        $this->mecanizada_evaluacion = null;
        $this->mecanizada_comentario = null;



        $this->expediente = $faker->swiftBicNumber;
        $this->expediente_evaluacion = null;
        $this->expediente_comentario = null;



        $this->polvorin= null;
        $this->polvorin_evaluacion = null;
        $this->polvorin_comentario = null;




        $this->ubicacion= null;
        $this->ubicacion_evaluacion = null;
        $this->ubicacion_comentario = null;



        $this->dimensiones= null;
        $this->dimensiones_evaluacion = null;
        $this->dimensiones_comentario = null;



        $this->personal_permanente= $faker->numberBetween($min = 0, $max = 100);
        $this->personal_permanente_evaluacion = null;
        $this->personal_permanente_comentario = null;



        $this->temporario = $faker->numberBetween($min = 0, $max = 100);
        $this->temporario_evaluacion = null;
        $this->temporario_comentario = null;


        $this->total = $faker->numberBetween($min = 0, $max = 100);
        $this->total_evaluacion = null;
        $this->total_comentario = null;


        $this->production_checkbox = null;
        $this->production_checkbox_evaluacion = null;
        $this->production_checkbox_comentario = null;
        
        
        

        $this->id_productor_evaluacion = null;
        $this->id_productor_comentario = null;





        $this->reserva = null;
        $this->reserva_evaluacion = null;
        $this->reserva_comentario = null;



        $this->vida_util = null;
        $this->vida_util_evaluacion = null;
        $this->vida_util_comentario = null;



        $this->volumen_total = null;
        $this->volumen_total_evaluacion = null;
        $this->volumen_total_comentario = null;


        $this->volumen_unitario = null;
        $this->volumen_unitario_evaluacion = null;
        $this->volumen_unitario_comentario = null;


        $this->volumen_comercializado= null;
        $this->volumen_comercializado_evaluacion = null;
        $this->volumen_comercializado_comentario = null;



        
        $this->procesamiento_mineral= null;
        $this->procesamiento_mineral_evaluacion = null;
        $this->procesamiento_mineral_comentario = null;
        
        
        
        
        
        
        $this->personal_perm_tecnicos= null;
        $this->personal_perm_tecnicos_comentario = null;
        $this->personal_perm_tecnicos_evaluacion = null;



        $this->permiso_anmac= null;
        $this->permiso_anmac_evaluacion = null;
        $this->permiso_anmac_comentario = null;




        $this->fecha_concesion = null;
        $this->fecha_concesion_evaluacion = null;
        $this->fecha_concesion_comentario = null;



        $this->anios_concesion= null;
        $this->anios_concesion_evaluacion = null;
        $this->anios_concesion_comentario = null;



        
        $this->inicio_explotacion= null;
        $this->inicio_explotacion_evaluacion = null;
        $this->inicio_explotacion_comentario = null;
        
        
        $this->compresores= null;
        $this->compresores_evaluacion = null;
        $this->compresores_comentario = null;



        $this->grupo_electrogeno= null;
        $this->grupo_electrogeno_evaluacion = null;
        $this->grupo_electrogeno_comentario = null;







        $this->camion_mineralero = null;
        $this->camion_mineralero_evaluacion= null;
        $this->camion_mineralero_comentario= null;



        $this->cargadora_frontal = null;
        $this->cargadora_frontal_evaluacion= null;
        $this->cargadora_frontal_comentario= null;



        $this->equipo_ventilacion = null;
        $this->equipo_ventilacion_evaluacion= null;
        $this->equipo_ventilacion_comentario= null;




        $this->martillo_neumatico = null;
        $this->martillo_neumatico_evaluacion= null;
        $this->martillo_neumatico_comentario= null;







        $this->via_decauville = null;
        $this->via_decauville_evaluacion= null;
        $this->via_decauville_comentario= null;


        
        
        $this->vagoneta = null;
        $this->vagoneta_evaluacion= null;
        $this->vagoneta_comentario= null;





        $this->bomba_desagote = null;
        $this->bomba_desagote_evaluacion= null;
        $this->bomba_desagote_comentario= null;


        $this->taller_equipado = null;
        $this->taller_equipado_evaluacion= null;
        $this->taller_equipado_comentario= null;



        $this->campamento = null;
        $this->campamento_evaluacion= null;
        $this->campamento_comentario= null;




        $this->vivienda = null;
        $this->vivienda_evaluacion= null;
        $this->vivienda_comentario= null;




        $this->meses_trabajo = null;
        $this->meses_trabajo_evaluacion= null;
        $this->meses_trabajo_comentario= null;



        $this->razones_meses_trabajo = null;
        $this->razones_meses_trabajo_evaluacion= null;
        $this->razones_meses_trabajo_comentario= null;



        $this->id_mina = null;

        $this->estado = $estados[ $faker->numberBetween($min = 0, $max = 2)];


        
        
        
        //evaluacion
        $this->prospeccion_evaluacion = 1;
        $this->prospeccion_comentario = $faker->text($maxNbChars = 50);
        
        $this->exploracion_evaluacion = $faker->text($maxNbChars = 50);
        $this->exploracion_comentario = $faker->text($maxNbChars = 50);

        $this->explotacion_evaluacion = $faker->text($maxNbChars = 50);
        $this->explotacion_comentario = $faker->text($maxNbChars = 50);
        
        $this->desarrollo_evaluacion = $faker->text($maxNbChars = 50);
        $this->desarrollo_comentario = $faker->text($maxNbChars = 50);
        $this->cantidad_productos_evaluacion = $faker->text($maxNbChars = 50);
        $this->cantidad_productos_comentario = $faker->text($maxNbChars = 50);
        
        $this->porcentaje_venta_provincia_evaluacion = $faker->text($maxNbChars = 50);
        $this->porcentaje_venta_provincia_comentario = $faker->text($maxNbChars = 50);
        
        $this->porcentaje_venta_otras_provincias_evaluacion = $faker->text($maxNbChars = 50);
        $this->porcentaje_venta_otras_provincias_comentario = $faker->text($maxNbChars = 50);
        
        $this->porcentaje_exportado_evaluacion = $faker->text($maxNbChars = 50);
        $this->porcentaje_exportado_comentario = $faker->text($maxNbChars = 50);


        $this->personal_perm_operarios_evaluacion = $faker->text($maxNbChars = 50);
        $this->personal_perm_operarios_comentario = $faker->text($maxNbChars = 50);
        $this->personal_perm_administrativos_evaluacion = $faker->text($maxNbChars = 50);
        $this->personal_perm_administrativos_comentario = $faker->text($maxNbChars = 50);
        $this->personal_perm_otros_evaluacion = $faker->text($maxNbChars = 50);
        $this->personal_perm_otros_comentario = $faker->text($maxNbChars = 50);
        $this->personal_trans_profesional_evaluacion = $faker->text($maxNbChars = 50);
        $this->personal_trans_profesional_comentario = $faker->text($maxNbChars = 50);
        $this->personal_trans_operarios_evaluacion = $faker->text($maxNbChars = 50);
        $this->personal_trans_operarios_comentario = $faker->text($maxNbChars = 50);
        $this->personal_trans_administrativos_evaluacion = $faker->text($maxNbChars = 50);
        $this->personal_trans_administrativos_comentario = $faker->text($maxNbChars = 50);
        $this->personal_trans_otros_evaluacion = $faker->text($maxNbChars = 50);
        $this->personal_trans_otros_comentario = $faker->text($maxNbChars = 50);



        $this->nombre_evaluacion = $faker->text($maxNbChars = 50);
        $this->nombre_comentario = $faker->text($maxNbChars = 50);
        $this->dni_evaluacion = $faker->text($maxNbChars = 50);
        $this->dni_comentario = $faker->text($maxNbChars = 50);
        $this->cargo_evaluacion =  $faker->text($maxNbChars = 50);
        $this->cargo_comentario =  $faker->text($maxNbChars = 50);
        $this->id_departamento_evaluacion = $faker->text($maxNbChars = 50);
        $this->id_departamento_comentario =$faker->text($maxNbChars = 50);




        
        $this->save();



    }


}
