<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use Datetime;

use App\Models\User;
use App\Models\Team;
use App\Models\Producido;
use App\Models\MinaCantera;
use App\Models\Productores;
use App\Models\Reinscripciones;
use App\Models\Productos;
use App\Models\FormAltaProductor;

class RelacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

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
        $sociedades = [
            'Sociedad en nombre colectivo',
            'Sociedad en comandita simple',
            'Sociedad en responsabilidad limitada',
            'Sociedad anónima',
            'Sociedad en comandita por acciones',
            'Sociedad cooperativa',
            'Sociedad por acciones simplificada'
        ];
        $cargos = [
            'operario',
            'CEO',
            'presidente',
            'ingeniero',
            'administrativo',
            'contador',
            'geólogo'  
            
        ];
        $minerales = [
            'Oro',
            'Plata',
            'Platino',
            'Mercurio',
            'Cobre',
            'Hierro',
            'Plomo',
            'Estaño',
            'Zinc',
            'Níquel',
            'Cobalto',
            'Bismuto',
            'Manganeso',
            'Antimonio',
            'Wolfram',
            'Aluminio',
            'Berilio',
            'Vanadio',
            'Cadmio',
            'Tantalio',
            'Molibdeno',
            'Litio',
            'Potasio',
            'Hulla',
            'Lignito',
            'Antracita',
            'Uranio',
            'Torio',
            'Hidrocarburos Sólidos',
            'Arsénico',
            'Cuarzo',
            'Feldespato',
            'Mica',
            'Fluorita',
            'Fosfatos Calizos',
            'Azufre',
            'Boratos',
            'Piedras Preciosas',
            'Vapores Endagenos',
            'Arenas Metalíferas',
            'Piedras Preciosas',
            'Desmontes',
            'Relaves',
            'Escoriales',
            'Abrasivos',
            'Amianto',
            'Baritina',
            'Bentonita',
            'Caolí­n',
            'Caparrosas',
            'Esteatitas',
            'Grafito',
            'Metales no comprendidos en 1° Categ.',
            'Ocres',
            'Resinas',
            'Sales Alcalinas o Alcalino Terrosas',
            'Salinas',
            'Salitres',
            'Tierras Piritosas y Aluminosas',
            'Turberas',
            'Zeolitas o Minerales Permutantes o Permutíticos',
            'Piedras Calizas',
            'Calcáreas',
            'Margas',
            'Yeso',
            'Alabastro',
            'Mármoles',
            'Granitos',
            'Dolomita',
            'Pizarras',
            'Areniscas',
            'Cuarcitas',
            'Basaltos',
            'Arenas No Metalíferas',
            'Cascajo',
            'Canto Rodado',
            'Pedregullo',
            'Grava',
            'Conchilla',
            'Piedra Laja',
            'Ceniza Volcánica',
            'Perlita',
            'Piedra Pómez',
            'Piedra Afilar',
            'Puzzolanas',
            'Porfidos',
            'Tobas',
            'Tosca',
            'Serpentina',
            'Piedra Sapo',
            'Loes',
            'Arcillas Comunes',
            'Otro'

        ];
        $unidades = ['m3', 'm2', 'kilos','metros'];

        for($i=0;$i<10;$i++){
            //USUARIO
            $nuevo_usuario = new User;

            $nuevo_usuario->name = $faker->name;
            $nuevo_usuario->email = str_replace(' ', '', $nuevo_usuario->name).'@example.com';
            $nuevo_usuario->password = bcrypt('123');
            $nuevo_usuario->remember_token = $nuevo_usuario->password;
            $nuevo_usuario->avatar = 'users/default.png';
            $nuevo_usuario->created_at = new Datetime;
            $nuevo_usuario->updated_at = new Datetime;
            $nuevo_usuario->role_id = 2;

            $nuevo_usuario->save();

            $nuevo_team = new Team;

            $nuevo_team->name = substr($nuevo_usuario->name, 0, (strpos($nuevo_usuario->name, ' ')+1))."'s Team";
            $nuevo_team->user_id = $nuevo_usuario->id;
            $nuevo_team->personal_team = true;
            $nuevo_team->created_at = new Datetime;
            $nuevo_team->updated_at = new Datetime;

            $nuevo_team->save();

            $nuevo_usuario->current_team_id = $nuevo_team->id;

            $nuevo_usuario->save();

            //PRODUCIDO
            $nuevo_producido = new Producido;
            $nuevo_producido->unidades = $faker->numberBetween($min=1, $max=1000000);
            $nuevo_producido->precio_venta = $faker->numberBetween($min=1000, $max=10000);
            $nuevo_producido->estado = $faker->randomElement(['aprobado','reprobado','en proceso']);
            $nuevo_producido->created_by = $nuevo_usuario->i;       
            $nuevo_producido->created_at = new Datetime; 
            $nuevo_producido->deleted_at = null; 
            $nuevo_producido->updated_at = new Datetime;
            $nuevo_producido->save();

            //MINA CANTERA
            $nueva_minacantera = new MinaCantera;
            $nueva_minacantera->localidad_mina_pais = 'Argentina';
            $nueva_minacantera->localidad_mina_provincia = 'San Juan';
            $nueva_minacantera->localidad_mina_departamento = $departamentos[$faker->numberBetween($min=0,$max=18)];
            $nueva_minacantera->localidad_mina_localidad = $nueva_minacantera->localidad_mina_departamento;
            $nueva_minacantera->nombre = $faker->name;
            $nueva_minacantera->descripcion = $faker->text;
            $nueva_minacantera->categoria = $faker->randomElement(['primera','segunda','tercera']);  //1 y 2 mina 3 cantera
            if($nueva_minacantera->categoria == 'tercera'){
                $nueva_minacantera->tipo = 'cantera';
                $nueva_minacantera->plano_inmueble = 'public/files_formularios/ochamplin@gmail.com/d81pSC9W4nKj7FY4eoh1wX9TXRSliW2c8E0VsX8y.pdf';
            }else{
                $nueva_minacantera->tipo = 'mina';
                $nueva_minacantera->plano_inmueble = null;
            }
            $nueva_minacantera->distrito_minero = $faker->numberBetween($min=1000000,$max=10000000);
            $nueva_minacantera->tipo_sistema = $faker->randomElement(['Gauss Kruger Posgar 07','Gauss Kruger Posgar 94','Geográfica']);
            $nueva_minacantera->longitud = -68.5363900;
            $nueva_minacantera->latitud = -31.5375000;
            $nueva_minacantera->labores = $faker->text;
            $nueva_minacantera->id_producido = $nuevo_producido->id;
            $nueva_minacantera->created_by = $nuevo_usuario->i;
            $nueva_minacantera->estado = $faker->randomElement(['en proceso','aprobado','rechazado']);
            $nueva_minacantera->created_at = new Datetime; 
            $nueva_minacantera->deleted_at = null; 
            $nueva_minacantera->updated_at = new Datetime; 
            $nueva_minacantera->save(); 

            //FORM_ALTA_PRODUCTORES
            $nuevo_formAltaProductor = new FormAltaProductor;
            $nuevo_formAltaProductor->tipo_productor = 'productor';
            //$nuevo_formAltaProductor->cuit = strval($faker->numberBetween($min = 20, $max = 35))."-".strval(($faker->numberBetween($min = 15000000, $max = 40000000)))."-".strval(($faker->numberBetween($min = 0, $max = 9)));
            $nuevo_formAltaProductor->cuit = strval($faker->numberBetween($min = 20, $max = 35)).strval(($faker->numberBetween($min = 15000000, $max = 40000000))).strval(($faker->numberBetween($min = 0, $max = 9)));
            $nuevo_formAltaProductor->cuit_correcto = 0;
            $nuevo_formAltaProductor->obs_cuit = null;
            $nuevo_formAltaProductor->razonsocial = $faker->name();
            $nuevo_formAltaProductor->razon_social_correcto = null;
            $nuevo_formAltaProductor->obs_razon_social =  $nuevo_formAltaProductor->razonsocial;
            $nuevo_formAltaProductor->numeroproductor = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_formAltaProductor->numeroproductor_correcto = null;
            $nuevo_formAltaProductor->obs_numeroproductor = null;
            $nuevo_formAltaProductor->email = str_replace(' ','', $nuevo_formAltaProductor->razonsocial)."@gmail.com";
            $nuevo_formAltaProductor->email_correcto = 0;
            $nuevo_formAltaProductor->obs_email = null;
            $nuevo_formAltaProductor->tiposociedad = $sociedades[$faker->numberBetween($min=0, $max=6)];
            $nuevo_formAltaProductor->tiposociedad_correcto = null;
            $nuevo_formAltaProductor->obs_tiposociedad = null;
            $nuevo_formAltaProductor->inscripciondgr = null;
            $nuevo_formAltaProductor->inscripciondgr_correcto = 0;
            $nuevo_formAltaProductor->obs_inscripciondgr = null;
            $nuevo_formAltaProductor->constaciasociedad = null;
            $nuevo_formAltaProductor->constaciasociedad_correcto = null;
            $nuevo_formAltaProductor->obs_constaciasociedad = null;
            $nuevo_formAltaProductor->paso_1_progreso = 100;
            $nuevo_formAltaProductor->paso_1_aprobado = 100;
            $nuevo_formAltaProductor->paso_1_reprobado = 0;
            $nuevo_formAltaProductor->leal_calle = $faker->name();
            $nuevo_formAltaProductor->leal_numero = $faker->numberBetween($min = 1, $max = 2000);
            $nuevo_formAltaProductor->leal_telefono = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_formAltaProductor->leal_pais = 'Argentina';
            $nuevo_formAltaProductor->leal_provincia = 'San Juan';
            $nuevo_formAltaProductor->leal_departamento = $nueva_minacantera->localidad_mina_departamento;
            $nuevo_formAltaProductor->leal_localidad = $nuevo_formAltaProductor->leal_localidad;
            $nuevo_formAltaProductor->leal_cp = 5400;
            $nuevo_formAltaProductor->leal_otro = null;
            $nuevo_formAltaProductor->administracion_calle = $faker->name();
            $nuevo_formAltaProductor->administracion_numero = $faker->numberBetween($min = 1, $max = 2000);
            $nuevo_formAltaProductor->administracion_telefono = $faker->numberBetween($min = 150000000, $max = 159999999);
            $nuevo_formAltaProductor->administracion_pais = 'Argentina';
            $nuevo_formAltaProductor->administracion_provincia = 'San Juan';
            $nuevo_formAltaProductor->administracion_departamento = $nueva_minacantera->localidad_mina_departamento;
            $nuevo_formAltaProductor->administracion_localidad = $nueva_minacantera->localidad_mina_departamento;
            $nuevo_formAltaProductor->administracion_cp = 5400;
            $nuevo_formAltaProductor->administracion_otro = null;
            $nuevo_formAltaProductor->numero_expdiente = $faker->numberBetween($min = 1000, $max = 9999);
            $nuevo_formAltaProductor->categoria = $nueva_minacantera->categoria;
            $nuevo_formAltaProductor->nombre_mina = $nueva_minacantera->nombre;
            $nuevo_formAltaProductor->descripcion_mina = $nueva_minacantera->descripcion;
            $nuevo_formAltaProductor->distrito_minero = $nueva_minacantera->distrito_minero;
            $nuevo_formAltaProductor->mina_cantera = $nueva_minacantera->tipo;
            $nuevo_formAltaProductor->plano_inmueble = $nueva_minacantera->plano_inmueble;
            $nuevo_formAltaProductor->minerales_variedad = $faker->text;
            $nuevo_formAltaProductor->owner = 1;
            $nuevo_formAltaProductor->arrendatario = 1;
            $nuevo_formAltaProductor->concesionario = 1;
            $nuevo_formAltaProductor->otros = 0;
            $nuevo_formAltaProductor->titulo_contrato_posecion = 'public/files_formularios/ochamplin@gmail.com/v5bTpUsD5Ux6XuwT7nBAxx14yEQ1in6X2NKhuQin.pdf';
            $nuevo_formAltaProductor->resolucion_concesion_minera = 'public/files_formularios/ochamplin@gmail.com/vyuTtd9lvRRP84Z81MD9LfFADx5RNJqJIDVOLq8Y.pdf';
            $nuevo_formAltaProductor->constancia_pago_canon = 'public/files_formularios/ochamplin@gmail.com/DqyXtd2SvENw15ErMBOTF7JxRVTj8PjkxayoL2ib.pdf';
            $nuevo_formAltaProductor->iia = 'public/files_formularios/ochamplin@gmail.com/7SrGIGLdVPRkGLM08cVhrlZen5hHAzmF1mkNurDu.pdf';
            $nuevo_formAltaProductor->dia = 'public/files_formularios/ochamplin@gmail.com/7SrGIGLdVPRkGLM08cVhrlZen5hHAzmF1mkNurDu.pdf';
            $nuevo_formAltaProductor->acciones_a_desarrollar = $nueva_minacantera->labores;
            $nuevo_formAltaProductor->actividad = $nuevo_formAltaProductor->acciones_a_desarrollar;
            $nuevo_formAltaProductor->fecha_alta_dia = new Datetime;
            $nuevo_formAltaProductor->fecha_vencimiento_dia = new Datetime;
            $nuevo_formAltaProductor->localidad_mina_pais = $nueva_minacantera->localidad_mina_pais;
            $nuevo_formAltaProductor->localidad_mina_provincia = $nueva_minacantera->localidad_mina_provincia;
            $nuevo_formAltaProductor->localidad_mina_departamento = $nueva_minacantera->localidad_mina_departamento;
            $nuevo_formAltaProductor->localidad_mina_localidad = $nueva_minacantera->localidad_mina_localidad;
            $nuevo_formAltaProductor->tipo_sistema = $nueva_minacantera->tipo_sistema;
            $nuevo_formAltaProductor->longitud = $nueva_minacantera->longitud;
            $nuevo_formAltaProductor->latitud = $nueva_minacantera->latitud;
            $nuevo_formAltaProductor->created_by = $nuevo_usuario->i;
            $nuevo_formAltaProductor->estado = 'aprobado';
            $nuevo_formAltaProductor->tipo_tramite = 'inscripción';
            $nuevo_formAltaProductor->updated_by = $nuevo_formAltaProductor->created_by;
            $nuevo_formAltaProductor->save();

            //PRODUCTORES
            $nuevo_productor = new Productores();
            $nuevo_productor->cuit = $nuevo_formAltaProductor->cuit;
            $nuevo_productor->razonsocial =  $nuevo_formAltaProductor->razonsocial;
            $nuevo_productor->numeroproductor = $nuevo_formAltaProductor->numeroproductor;
            $nuevo_productor->email = $nuevo_formAltaProductor->email;
            $nuevo_productor->domicilio_prod = $faker->name." ".strval($faker->numberBetween($min = 1, $max = 2000));
            $nuevo_productor->tiposociedad = $nuevo_formAltaProductor->tiposociedad;
            $nuevo_productor->inscripciondgr = null;
            $nuevo_productor->constaciasociedad = null;
            $nuevo_productor->leal_calle = $nuevo_formAltaProductor->leal_calle;
            $nuevo_productor->leal_numero = $nuevo_formAltaProductor->leal_numero;
            $nuevo_productor->leal_telefono = $nuevo_formAltaProductor->leal_telefono;
            $nuevo_productor->leal_pais = 'Argentina';
            $nuevo_productor->leal_provincia = 'San Juan';
            $nuevo_productor->leal_departamento = $nueva_minacantera->localidad_mina_departamento;
            $nuevo_productor->leal_localidad = $nuevo_productor->leal_departamento;
            $nuevo_productor->leal_cp = 5400;
            $nuevo_productor->leal_otro = null;
            $nuevo_productor->administracion_calle = $nuevo_formAltaProductor->administracion_calle; 
            $nuevo_productor->administracion_numero = $nuevo_formAltaProductor->administracion_numero;
            $nuevo_productor->administracion_telefono = $nuevo_formAltaProductor->administracion_telefono;
            $nuevo_productor->administracion_pais = 'Argentina';
            $nuevo_productor->administracion_provincia = 'San Juan';
            $nuevo_productor->administracion_departamento =$nuevo_formAltaProductor->administracion_departamento;
            $nuevo_productor->administracion_localidad = $nuevo_productor->administracion_departamento;
            $nuevo_productor->administracion_cp = 5400;
            $nuevo_productor->administracion_otro = null;
            $nuevo_productor->numero_expdiente = $nuevo_formAltaProductor->numero_expdiente;
            $nuevo_productor->created_by = $nuevo_usuario->i;
            $nuevo_productor->estado = 'en proceso';
            $nuevo_productor->created_at = new Datetime;
            $nuevo_productor->deleted_at = null;
            $nuevo_productor->updated_at =  new Datetime;
            $nuevo_productor->save();



            //REINSCRIPCIONES
            $nueva_reinscripcion = new Reinscripciones();
            $nueva_reinscripcion->id_mina =  $nueva_minacantera->id;
            $nueva_reinscripcion->id_productor =  $nuevo_formAltaProductor->id;  //revisar porque chequea con form_alta_productores
            $nueva_reinscripcion->fecha_vto = $faker->date ;
            $nueva_reinscripcion->prospeccion =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->exploracion =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->explotacion =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->desarrollo =  $faker->numberBetween($min=0, $max=1);
            $nueva_reinscripcion->cantidad_productos = $faker->numberBetween($min=1, $max=10) ;
            $nueva_reinscripcion->porcentaje_venta_provincia =  $faker->numberBetween($min=0, $max=20);
            $nueva_reinscripcion->porcentaje_venta_otras_provincias =  $faker->numberBetween($min=0, $max=50);
            $nueva_reinscripcion->porcentaje_exportado =  100 - ($nueva_reinscripcion->porcentaje_venta_otras_provincias + $nueva_reinscripcion->porcentaje_venta_provincia);
            $nueva_reinscripcion->personal_perm_profesional =  $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_perm_operarios =  $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_perm_administrativos =  $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_perm_otros = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_profesional = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_operarios = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_administrativos = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->personal_trans_otros = $faker->numberBetween($min=0, $max=100);
            $nueva_reinscripcion->nombre = $faker->name();
            $nueva_reinscripcion->dni = $faker->numberBetween($min=15000000, $max=45000000);
            $nueva_reinscripcion->cargo = $cargos[$faker->numberBetween($min=0, $max=6)];
            $nueva_reinscripcion->created_by = $nuevo_usuario->i;
            $nueva_reinscripcion->estado = $faker->randomElement(['aprobado','reprobado','en proceso']);
            $nueva_reinscripcion->save();

            //PRODUCTO
            $nuevo_producto = new Productos();
            $nuevo_producto->id_reinscripcion = $nueva_reinscripcion->id;
            $nuevo_producto->nombre_mineral = $minerales[$faker->numberBetween($min = 0, $max = 91)];
            $nuevo_producto->variedad = $faker->colorName() ;
            $nuevo_producto->produccion =  $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8000) ;
            $nuevo_producto->unidades = $unidades[$faker->numberBetween($min = 0, $max = 3)];
            $nuevo_producto->otra_unidad = null;
            $nuevo_producto->precio_venta = $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8000) ;
            $nuevo_producto->created_by = $nuevo_usuario->i ;
            $nuevo_producto->estado = $faker->randomElement(['aprobado','reprobado','en proceso']);
            $nuevo_producto->save();    
            }
        }
        
}
