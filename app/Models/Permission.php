<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'permissions_form';
    protected $dates = ['deleted_at', 'updated_at','created_at'];
    protected $fillable = [
        'id_provincia',
        'accion',
        'id_rol',
        'formulario',
        'pagina',
        'estado',
        'data',
        'edited_by'
    ];
    public function transformar_string_a_array($filas){

    }
    public static function guardar_paso($id_provincia ,$perfil, $formualrio, $accion , $estado, $i , $data) {
        $filas = Permission::select('*')
        ->where('id_provincia', '=', $id_provincia)
        ->where('id_rol', '=', $perfil)
        ->where('formulario', '=', $formualrio)
        ->where('accion', '=', $accion)
        ->where('estado', '=', $estado)
        ->first();

        $filas->data = $data;  
        $filas->edited_by = Auth::user()->id;      
        return $filas->save();
    }
    public static function query_permissions_all_page($id_provincia ,$perfil, $formualrio, $accion , $estado, $pagina) {
        $filas = Permission::select('*')
        ->where('id_provincia', '=', $id_provincia)
        ->where('id_rol', '=', $perfil)
        ->where('formulario', '=', intval($formualrio) )
        ->where('accion', '=', $accion)
        ->where('estado', '=', $estado)
        ->where('pagina', '=', $pagina)
        ->get();
        return $filas;
    }
    public static function permisos_a_numeros ($super_array) {
        $super_texto = '';
        
        foreach($super_array as $permiso ) {
            $num = 0;
            $num_text = '';
            foreach($permiso as $inputs) {
                if($inputs[2]) {
                    $num++;
                }
                if($inputs[1]) {
                    $num+=2;
                }
                if($inputs[0]) {
                    $num+=4;
                }
                $num_text .=$num;
                $num = 0;
            }
            $super_texto.=$num_text."-";
        }
        return substr($super_texto, 0, -1);
    }
    public static function update_query_permissions_all_page($id_provincia ,$perfil, $formualrio, $accion , $estado, $pagina, $permisos,$id) {
        $filas = Permission::find($id);
        $filas->data = Permission::permisos_a_numeros($permisos);
        //dd($filas->data);
        return $filas->save();
    }
    public static function dame_permisos($id_provincia ,$perfil, $formualrio, $accion , $estado, $pagina){
        $array = array();
        if($pagina == 99){
            //devuelvo todas las paginas
            $filas = Permission::select('*')
            ->where('id_provincia', '=', $id_provincia)
            ->where('id_rol', '=', $perfil)
            ->where('formulario', '=', intval($formualrio) )
            ->where('accion', '=', $accion)
            ->where('estado', '=', $estado)
            ->orderBy('pagina', 'asc')
            ->get();

            
            $mostrar_a_devolver = array();
            $disabled_a_devolver = array();
            $array_de_permisos_db = explode( '-', $filas[0]->data);
            //dd( $filas,$filas[0]->data);
            //"numeroproductor-cuit-razonsocial-email-tiposociedad-inscripciondgr-constaciasociedad-paso-boton";
            $array[0] = Permission::permisos_pagina_uno($perfil,$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[1],$array_de_permisos_db[0],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8]);
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[0][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[0][1]);
            

            $array_de_permisos_db = explode( '-', $filas[1]->data);
            //"leal_calle-leal_numero-leal_telefono-leal_pais-leal_provincia-leal_departamento-leal_localidad-leal_cp-leal_otro-paso-boton";
            //dd( $filas[1]->data,"dsda",$array_de_permisos_db);
            $array[1] = Permission::permisos_pagina_dos($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8],$array_de_permisos_db[9],$array_de_permisos_db[10],"legal");
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[1][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[1][1]);

            $array_de_permisos_db = explode( '-', $filas[2]->data);
            
            //"administracion_calle-administracion_numero-administracion_telefono-administracion_pais-administracion_provincia-administracion_departamento-administracion_localidad-administracion_cp-administracion_otro-paso-boton";
            $array[2] = Permission::permisos_pagina_tres($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8],$array_de_permisos_db[9],$array_de_permisos_db[10],"administrativo");
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[2][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[2][1]);
            
            $array_de_permisos_db = explode( '-', $filas[3]->data);
            //dd($filas[8],$array_de_permisos_db);
            //"numero_expdiente-categoria-nombre_mina-descripcion_mina-distrito_minero-mina_cantera-plano_inmueble-minerales_variedad-paso-boton";
            $array[3] = Permission::permisos_pagina_cuatro($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8],$array_de_permisos_db[9]);
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[3][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[3][1]);
            
            $array_de_permisos_db = explode( '-', $filas[4]->data);
            //"owner-arrendatario-concesionario-otros-titulo_contrato_posecion-resolucion_concesion_minera-constancia_pago_canon-iia-dia-acciones_a_desarrollar-actividad-fecha_alta_dia-fecha_vencimiento_dia-paso-boton";
            $array[4] = Permission::permisos_pagina_cinco($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8],$array_de_permisos_db[9],$array_de_permisos_db[10],$array_de_permisos_db[11],$array_de_permisos_db[12],$array_de_permisos_db[13],$array_de_permisos_db[14]);
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[4][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[4][1]);
            
            $array_de_permisos_db = explode( '-', $filas[5]->data);
            // 'localidad_mina_pais-localidad_mina_provincia-localidad_mina_departamento-localidad_mina_localidad-tipo_sistema-longitud-latitud-paso-boton';
            $array[5] = Permission::permisos_pagina_seis($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8],$array_de_permisos_db[9]);
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[5][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[5][1]);

            $array_de_permisos_db = explode( '-', $filas[6]->data);
            //"cargo_empresa-presentador_nom_apellido-presentador_dni-observacion-paso-boton";
            $array[6] = Permission::permisos_pagina_siete($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5]);
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[6][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[6][1]);



            $array_de_permisos_db = explode( '-', $filas[7]->data);
            //"nombre_gestor-dni_gestor-profesion_gestor-telefono_gestor-notificacion_gestor-email_gestor-dni_productor-foto_productor-constancia_afip-autorizacion_gestor-paso-boton";
           // dd($array_de_permisos_db,$filas[7]);
            $array[7] = Permission::permisos_pagina_ocho($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8],$array_de_permisos_db[9],$array_de_permisos_db[10],$array_de_permisos_db[11]);
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[7][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[7][1]);


            $array_de_permisos_db = explode( '-', $filas[8]->data);
            //"decreto3737-situacion_mina-concesion_minera_asiento_n-concesion_minera_fojas-concesion_minera_tomo_n-concesion_minera_reg_m_y_d-concesion_minera_reg_cant-concesion_minera_reg_men-concesion_minera_reg_d_y_c-obs_datos_minas-paso_mendoza";
            $array[8] = Permission::permisos_pagina_nueve($perfil,$array_de_permisos_db[0],$array_de_permisos_db[1],$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8],$array_de_permisos_db[9],$array_de_permisos_db[10],$array_de_permisos_db[11],$array_de_permisos_db[12]);
            $mostrar_a_devolver = array_merge($mostrar_a_devolver, $array[8][0]);
            $disabled_a_devolver = array_merge($disabled_a_devolver, $array[8][1]);



            

            $array  = array();

            $array["mostrar"] =  $mostrar_a_devolver;
            $array["disabled"] =  $disabled_a_devolver;
            return $array; 

            
            



        } else {
            $filas = Permission::select('*')
            ->where('id_provincia', '=', $id_provincia)
            ->where('id_rol', '=', $perfil)
            ->where('formulario', '=', intval($formualrio) )
            ->where('accion', '=', $accion)
            ->where('estado', '=', $estado)
            ->where('pagina', '=', $pagina)
            ->get();
            
            $array_de_permisos_db = explode( '-', $filas[0]->data);
            //orden en la base de datos
            //"numeroproductor-cuit-razonsocial-email-tiposociedad-inscripciondgr-constaciasociedad-paso-boton";
            $array = Permission::permisos_pagina_uno($perfil,$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[1],$array_de_permisos_db[0],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8]);
        }
        return $array;
    }
    public static function permisos_pagina_uno($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton ){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($razon_social[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["razon_social"] = false;
        else $mostrar["razon_social"] = true;
        if( (intval($razon_social[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["razon_social"] = false;
        else $disabled["razon_social"] = true;
        //correccion de razon social
        if((intval($razon_social[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["razon_social_correccion"] = false ;
        else $mostrar["razon_social_correccion"] = true;
        if( (intval ($razon_social[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["razon_social_correccion"] = false;
        else $disabled["razon_social_correccion"] = true;
        

        
        //value
        if((intval($email[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["email"] = false;
        else $mostrar["email"] = true;
        if((intval($email[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["email"] = false;
        else $disabled["email"] = true;
        //correccion de email
        if( (intval($email[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["email_correccion"] = false;
        else $mostrar["email_correccion"] = true;
        if( (intval($email[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["email_correccion"] = false;
        else $disabled["email_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($cuit[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["cuit"] = false;
        else $mostrar["cuit"] = true;
        if( (intval($cuit[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["cuit"] = false;
        else $disabled["cuit"] = true;
        //correccion de cuit
        if( (intval($cuit[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["cuit_correccion"] = false;
        else $mostrar["cuit_correccion"] = true;
        if((intval($cuit[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["cuit_correccion"] = false;
        else $disabled["cuit_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($num_prod[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["num_prod"] = false;
        else $mostrar["num_prod"] = true;
        if((intval( $num_prod[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["num_prod"] = false;
        else $disabled["num_prod"] = true;
        //correccion de razon social
        if((intval($num_prod[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["num_prod_correccion"] = false;
        else $mostrar["num_prod_correccion"] = true;
        if((intval($num_prod[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["num_prod_correccion"] = false;
        else $disabled["num_prod_correccion"] = true;


        //value
        if((intval($tipo_sociedad[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["tipo_sociedad"] = false;
        else $mostrar["tipo_sociedad"] = true;
        if((intval($tipo_sociedad[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["tipo_sociedad"] = false;
        else $disabled["tipo_sociedad"] = true;
        //correccion de razon social
        if((intval($tipo_sociedad[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["tipo_sociedad_correccion"] = false;
        else $mostrar["tipo_sociedad_correccion"] = true;
        if((intval($tipo_sociedad[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["tipo_sociedad_correccion"] = false;
        else $disabled["tipo_sociedad_correccion"] = true;


        //value
        if((intval($inscripcion_dgr[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["inscripcion_dgr"] = false;
        else $mostrar["inscripcion_dgr"] = true;
        if((intval($inscripcion_dgr[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["inscripcion_dgr"] = false;
        else $disabled["inscripcion_dgr"] = true;
        //correccion de razon social
        if((intval($inscripcion_dgr[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["inscripcion_dgr_correccion"] = false;
        else $mostrar["inscripcion_dgr_correccion"] = true;
        if((intval($inscripcion_dgr[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["inscripcion_dgr_correccion"] = false;
        else $disabled["inscripcion_dgr_correccion"] = true;



        //value
        if((intval($constancia_sociedad[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["constancia_sociedad"] = false;
        else $mostrar["constancia_sociedad"] = true;
        if((intval($constancia_sociedad[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["constancia_sociedad"] = false;
        else $disabled["constancia_sociedad"] = true;
        //correccion de razon social
        if((intval($constancia_sociedad[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["constancia_sociedad_correccion"] = false;
        else $mostrar["constancia_sociedad_correccion"] = true;
        if((intval($constancia_sociedad[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["constancia_sociedad_correccion"] = false;
        else $disabled["constancia_sociedad_correccion"] = true;



        //value
        if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["boton_guardar_uno"] = false;
        else $mostrar["boton_guardar_uno"] = true;
        if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["boton_guardar_uno"] = false;
        else $disabled["boton_guardar_uno"] = true;
        //correccion de razon social
        if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["boton_guardar_uno"] = false;
        else $mostrar["boton_guardar_uno"] = true;
        if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["boton_guardar_uno"] = false;
        else $disabled["boton_guardar_uno"] = true;

        //value
        if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["paso_uno"] = false;
        else $mostrar["paso_uno"] = true;
        if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["paso_uno"] = false;
        else $disabled["paso_uno"] = true;
        //correccion de razon social
        if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["paso_uno"] = false;
        else $mostrar["paso_uno"] = true;
        if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["paso_uno"] = false;
        else $disabled["paso_uno"] = true;

        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

    }

    public static function permisos_pagina_dos($rol,$legal_calle,$legal_numero,$legal_telefono,$legal_pais,$legal_provincia,$legal_departamento, $legal_localidad,$legal_cp,$legal_otro,$paso,$boton,$tipo){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($legal_calle[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_calle"] = false;
        else $mostrar["legal_calle"] = true;
        if( (intval($legal_calle[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_calle"] = false;
        else $disabled["legal_calle"] = true;
        //correccion de razon social
        if((intval($legal_calle[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["legal_calle_correccion"] = false ;
        else $mostrar["legal_calle_correccion"] = true;
        if( (intval ($legal_calle[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["legal_calle_correccion"] = false;
        else $disabled["legal_calle_correccion"] = true;
        

        
        //value
        if((intval($legal_numero[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_calle_num"] = false;
        else $mostrar["legal_calle_num"] = true;
        if((intval($legal_numero[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_calle_num"] = false;
        else $disabled["legal_calle_num"] = true;
        //correccion de legal_numero
        if( (intval($legal_numero[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_calle_num_correccion"] = false;
        else $mostrar["legal_calle_num_correccion"] = true;
        if( (intval($legal_numero[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_calle_num_correccion"] = false;
        else $disabled["legal_calle_num_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($legal_telefono[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_telefono"] = false;
        else $mostrar["legal_telefono"] = true;
        if( (intval($legal_telefono[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["legal_telefono"] = false;
        else $disabled["legal_telefono"] = true;
        //correccion de legal_telefono
        if( (intval($legal_telefono[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_telefono_correccion"] = false;
        else $mostrar["legal_telefono_correccion"] = true;
        if((intval($legal_telefono[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_telefono_correccion"] = false;
        else $disabled["legal_telefono_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($legal_pais[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["legal_pais"] = false;
        else $mostrar["legal_pais"] = true;
        if((intval( $legal_pais[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_pais"] = false;
        else $disabled["legal_pais"] = true;
        //correccion de razon social
        if((intval($legal_pais[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_pais_correccion"] = false;
        else $mostrar["legal_pais_correccion"] = true;
        if((intval($legal_pais[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_pais_correccion"] = false;
        else $disabled["legal_pais_correccion"] = true;


        //value
        if((intval($legal_provincia[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_prov"] = false;
        else $mostrar["legal_prov"] = true;
        if((intval($legal_provincia[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_prov"] = false;
        else $disabled["legal_prov"] = true;
        //correccion de razon social
        if((intval($legal_provincia[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_prov_correccion"] = false;
        else $mostrar["legal_prov_correccion"] = true;
        if((intval($legal_provincia[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_prov_correccion"] = false;
        else $disabled["legal_prov_correccion"] = true;


        //value
        if((intval($legal_departamento[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_dpto"] = false;
        else $mostrar["legal_dpto"] = true;
        if((intval($legal_departamento[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_dpto"] = false;
        else $disabled["legal_dpto"] = true;
        //correccion de razon social
        if((intval($legal_departamento[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_dpto_correccion"] = false;
        else $mostrar["legal_dpto_correccion"] = true;
        if((intval($legal_departamento[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_dpto_correccion"] = false;
        else $disabled["legal_dpto_correccion"] = true;



        //value
        if((intval($legal_localidad[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_localidad"] = false;
        else $mostrar["legal_localidad"] = true;
        if((intval($legal_localidad[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_localidad"] = false;
        else $disabled["legal_localidad"] = true;
        //correccion de razon social
        if((intval($legal_localidad[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_localidad_correccion"] = false;
        else $mostrar["legal_localidad_correccion"] = true;
        if((intval($legal_localidad[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_localidad_correccion"] = false;
        else $disabled["legal_localidad_correccion"] = true;

            //value
        if((intval($legal_cp[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_cod_pos"] = false;
        else $mostrar["legal_cod_pos"] = true;
        if((intval($legal_cp[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_cod_pos"] = false;
        else $disabled["legal_cod_pos"] = true;
        //correccion de razon social
        if((intval($legal_cp[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_cod_pos_correccion"] = false;
        else $mostrar["legal_cod_pos_correccion"] = true;
        if((intval($legal_cp[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_cod_pos_correccion"] = false;
        else $disabled["legal_cod_pos_correccion"] = true;

        //value
        if((intval($legal_otro[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["legal_otro"] = false;
        else $mostrar["legal_otro"] = true;
        if((intval($legal_otro[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_otro"] = false;
        else $disabled["legal_otro"] = true;
        //correccion de razon social
        if((intval($legal_otro[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_otro_correccion"] = false;
        else $mostrar["legal_otro_correccion"] = true;
        if((intval($legal_otro[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_otro_correccion"] = false;
        else $disabled["legal_otro_correccion"] = true;


        if($tipo == "legal"){
            //value
            if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["boton_guardar_dos"] = false;
            else $mostrar["boton_guardar_dos"] = true;
            if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["boton_guardar_dos"] = false;
            else $disabled["boton_guardar_dos"] = true;
            //correccion de razon social
            if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["boton_guardar_dos"] = false;
            else $mostrar["boton_guardar_dos"] = true;
            if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["boton_guardar_dos"] = false;
            else $disabled["boton_guardar_dos"] = true;
    
            //value
            if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["paso_dos"] = false;
            else $mostrar["paso_dos"] = true;
            if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["paso_dos"] = false;
            else $disabled["paso_dos"] = true;
            //correccion de razon social
            if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["paso_dos"] = false;
            else $mostrar["paso_dos"] = true;
            if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["paso_dos"] = false;
            else $disabled["paso_dos"] = true;
        }
        else {
             //value
             if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["boton_guardar_tres"] = false;
            else $mostrar["boton_guardar_tres"] = true;
            if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["boton_guardar_tres"] = false;
            else $disabled["boton_guardar_tres"] = true;
            //correccion de razon social
            if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["boton_guardar_tres"] = false;
            else $mostrar["boton_guardar_tres"] = true;
            if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["boton_guardar_tres"] = false;
            else $disabled["boton_guardar_tres"] = true;
    
            //value
            if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["paso_tres"] = false;
            else $mostrar["paso_tres"] = true;
            if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["paso_tres"] = false;
            else $disabled["paso_tres"] = true;
            //correccion de razon social
            if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["paso_tres"] = false;
            else $mostrar["paso_tres"] = true;
            if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["paso_tres"] = false;
            else $disabled["paso_tres"] = true;
        }


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }
    public static function permisos_pagina_tres($rol,$legal_calle,$legal_numero,$legal_telefono,$legal_pais,$legal_provincia,$legal_departamento, $legal_localidad,$legal_cp,$legal_otro,$paso,$boton,$tipo){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($legal_calle[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_calle"] = false;
        else $mostrar["administracion_calle"] = true;
        if( (intval($legal_calle[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["administracion_calle"] = false;
        else $disabled["administracion_calle"] = true;
        //correccion de razon social
        if((intval($legal_calle[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["administracion_calle_correccion"] = false ;
        else $mostrar["administracion_calle_correccion"] = true;
        if( (intval ($legal_calle[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["administracion_calle_correccion"] = false;
        else $disabled["administracion_calle_correccion"] = true;
        

        
        //value
        if((intval($legal_numero[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_calle_num"] = false;
        else $mostrar["administracion_calle_num"] = true;
        if((intval($legal_numero[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["administracion_calle_num"] = false;
        else $disabled["administracion_calle_num"] = true;
        //correccion de legal_numero
        if( (intval($legal_numero[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["administracion_calle_num_correccion"] = false;
        else $mostrar["administracion_calle_num_correccion"] = true;
        if( (intval($legal_numero[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["administracion_calle_num_correccion"] = false;
        else $disabled["administracion_calle_num_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($legal_telefono[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_telefono"] = false;
        else $mostrar["administracion_telefono"] = true;
        if( (intval($legal_telefono[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["administracion_telefono"] = false;
        else $disabled["administracion_telefono"] = true;
        //correccion de legal_telefono
        if( (intval($legal_telefono[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["administracion_telefono_correccion"] = false;
        else $mostrar["administracion_telefono_correccion"] = true;
        if((intval($legal_telefono[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["administracion_telefono_correccion"] = false;
        else $disabled["administracion_telefono_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($legal_pais[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["legal_pais"] = false;
        else $mostrar["legal_pais"] = true;
        if((intval( $legal_pais[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["legal_pais"] = false;
        else $disabled["legal_pais"] = true;
        //correccion de razon social
        if((intval($legal_pais[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["legal_pais_correccion"] = false;
        else $mostrar["legal_pais_correccion"] = true;
        if((intval($legal_pais[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["legal_pais_correccion"] = false;
        else $disabled["legal_pais_correccion"] = true;


        //value
        if((intval($legal_provincia[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_prov"] = false;
        else $mostrar["administracion_prov"] = true;
        if((intval($legal_provincia[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["administracion_prov"] = false;
        else $disabled["administracion_prov"] = true;
        //correccion de razon social
        if((intval($legal_provincia[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["administracion_prov_correccion"] = false;
        else $mostrar["administracion_prov_correccion"] = true;
        if((intval($legal_provincia[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["administracion_prov_correccion"] = false;
        else $disabled["administracion_prov_correccion"] = true;


        //value
        if((intval($legal_departamento[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_dpto"] = false;
        else $mostrar["administracion_dpto"] = true;
        if((intval($legal_departamento[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["administracion_dpto"] = false;
        else $disabled["administracion_dpto"] = true;
        //correccion de razon social
        if((intval($legal_departamento[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["administracion_dpto_correccion"] = false;
        else $mostrar["administracion_dpto_correccion"] = true;
        if((intval($legal_departamento[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["administracion_dpto_correccion"] = false;
        else $disabled["administracion_dpto_correccion"] = true;



        //value
        if((intval($legal_localidad[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_localidad"] = false;
        else $mostrar["administracion_localidad"] = true;
        if((intval($legal_localidad[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["administracion_localidad"] = false;
        else $disabled["administracion_localidad"] = true;
        //correccion de razon social
        if((intval($legal_localidad[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["administracion_localidad_correccion"] = false;
        else $mostrar["administracion_localidad_correccion"] = true;
        if((intval($legal_localidad[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["administracion_localidad_correccion"] = false;
        else $disabled["administracion_localidad_correccion"] = true;

            //value
        if((intval($legal_cp[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_cod_pos"] = false;
        else $mostrar["administracion_cod_pos"] = true;
        if((intval($legal_cp[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["administracion_cod_pos"] = false;
        else $disabled["administracion_cod_pos"] = true;
        //correccion de razon social
        if((intval($legal_cp[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["administracion_cod_pos_correccion"] = false;
        else $mostrar["administracion_cod_pos_correccion"] = true;
        if((intval($legal_cp[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["administracion_cod_pos_correccion"] = false;
        else $disabled["administracion_cod_pos_correccion"] = true;

        //value
        if((intval($legal_otro[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["administracion_otro"] = false;
        else $mostrar["administracion_otro"] = true;
        if((intval($legal_otro[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["administracion_otro"] = false;
        else $disabled["administracion_otro"] = true;
        //correccion de razon social
        if((intval($legal_otro[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["administracion_otro_correccion"] = false;
        else $mostrar["administracion_otro_correccion"] = true;
        if((intval($legal_otro[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["administracion_otro_correccion"] = false;
        else $disabled["administracion_otro_correccion"] = true;


        if($tipo == "legal"){
            //value
            if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["boton_guardar_dos"] = false;
            else $mostrar["boton_guardar_dos"] = true;
            if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["boton_guardar_dos"] = false;
            else $disabled["boton_guardar_dos"] = true;
            //correccion de razon social
            if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["boton_guardar_dos"] = false;
            else $mostrar["boton_guardar_dos"] = true;
            if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["boton_guardar_dos"] = false;
            else $disabled["boton_guardar_dos"] = true;
    
            //value
            if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["paso_dos"] = false;
            else $mostrar["paso_dos"] = true;
            if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["paso_dos"] = false;
            else $disabled["paso_dos"] = true;
            //correccion de razon social
            if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["paso_dos"] = false;
            else $mostrar["paso_dos"] = true;
            if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["paso_dos"] = false;
            else $disabled["paso_dos"] = true;
        }
        else {
             //value
             if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["boton_guardar_tres"] = false;
            else $mostrar["boton_guardar_tres"] = true;
            if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["boton_guardar_tres"] = false;
            else $disabled["boton_guardar_tres"] = true;
            //correccion de razon social
            if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["boton_guardar_tres"] = false;
            else $mostrar["boton_guardar_tres"] = true;
            if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["boton_guardar_tres"] = false;
            else $disabled["boton_guardar_tres"] = true;
    
            //value
            if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $mostrar["paso_tres"] = false;
            else $mostrar["paso_tres"] = true;
            if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
                $disabled["paso_tres"] = false;
            else $disabled["paso_tres"] = true;
            //correccion de razon social
            if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
                $mostrar["paso_tres"] = false;
            else $mostrar["paso_tres"] = true;
            if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
                $disabled["paso_tres"] = false;
            else $disabled["paso_tres"] = true;
        }


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }
    public static function permisos_pagina_cuatro($rol,$num_exp,$categoria,$nombre_mina,$descripcion_mina,$distrito,$mina_cantera, $plano_mina,$minerales,$paso,$boton){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($num_exp[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["num_exp"] = false;
        else $mostrar["num_exp"] = true;
        if( (intval($num_exp[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["num_exp"] = false;
        else $disabled["num_exp"] = true;
        //correccion de razon social
        if((intval($num_exp[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["num_exp_correccion"] = false ;
        else $mostrar["num_exp_correccion"] = true;
        if( (intval ($num_exp[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["num_exp_correccion"] = false;
        else $disabled["num_exp_correccion"] = true;
        

        
        //value
        if((intval($categoria[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["categoria"] = false;
        else $mostrar["categoria"] = true;
        if((intval($categoria[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["categoria"] = false;
        else $disabled["categoria"] = true;
        //correccion de categoria
        if( (intval($categoria[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["categoria_correccion"] = false;
        else $mostrar["categoria_correccion"] = true;
        if( (intval($categoria[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["categoria_correccion"] = false;
        else $disabled["categoria_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($nombre_mina[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["nombre_mina"] = false;
        else $mostrar["nombre_mina"] = true;
        if( (intval($nombre_mina[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["nombre_mina"] = false;
        else $disabled["nombre_mina"] = true;
        //correccion de nombre_mina
        if( (intval($nombre_mina[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["nombre_mina_correccion"] = false;
        else $mostrar["nombre_mina_correccion"] = true;
        if((intval($nombre_mina[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["nombre_mina_correccion"] = false;
        else $disabled["nombre_mina_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($descripcion_mina[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["descripcion_mina"] = false;
        else $mostrar["descripcion_mina"] = true;
        if((intval( $descripcion_mina[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["descripcion_mina"] = false;
        else $disabled["descripcion_mina"] = true;
        //correccion de razon social
        if((intval($descripcion_mina[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["descripcion_mina_correccion"] = false;
        else $mostrar["descripcion_mina_correccion"] = true;
        if((intval($descripcion_mina[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["descripcion_mina_correccion"] = false;
        else $disabled["descripcion_mina_correccion"] = true;


        //value
        if((intval($distrito[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["distrito"] = false;
        else $mostrar["distrito"] = true;
        if((intval($distrito[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["distrito"] = false;
        else $disabled["distrito"] = true;
        //correccion de razon social
        if((intval($distrito[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["distrito_correccion"] = false;
        else $mostrar["distrito_correccion"] = true;
        if((intval($distrito[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["distrito_correccion"] = false;
        else $disabled["distrito_correccion"] = true;


        //value
        if((intval($mina_cantera[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["mina_cantera"] = false;
        else $mostrar["mina_cantera"] = true;
        if((intval($mina_cantera[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["mina_cantera"] = false;
        else $disabled["mina_cantera"] = true;
        //correccion de razon social
        if((intval($mina_cantera[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["mina_cantera_correccion"] = false;
        else $mostrar["mina_cantera_correccion"] = true;
        if((intval($mina_cantera[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["mina_cantera_correccion"] = false;
        else $disabled["mina_cantera_correccion"] = true;



        //value
        if((intval($plano_mina[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["plano_mina"] = false;
        else $mostrar["plano_mina"] = true;
        if((intval($plano_mina[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["plano_mina"] = false;
        else $disabled["plano_mina"] = true;
        //correccion de razon social
        if((intval($plano_mina[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["plano_mina_correccion"] = false;
        else $mostrar["plano_mina_correccion"] = true;
        if((intval($plano_mina[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["plano_mina_correccion"] = false;
        else $disabled["plano_mina_correccion"] = true;

            //value
        if((intval($minerales[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["minerales"] = false;
        else $mostrar["minerales"] = true;
        if((intval($minerales[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["minerales"] = false;
        else $disabled["minerales"] = true;
        //correccion de razon social
        if((intval($minerales[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["minerales_correccion"] = false;
        else $mostrar["minerales_correccion"] = true;
        if((intval($minerales[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["minerales_correccion"] = false;
        else $disabled["minerales_correccion"] = true;

        //value
        if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["boton_guardar_cuatro"] = false;
        else $mostrar["boton_guardar_cuatro"] = true;
        if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["boton_guardar_cuatro"] = false;
        else $disabled["boton_guardar_cuatro"] = true;
        //correccion de razon social
        if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["boton_guardar_cuatro"] = false;
        else $mostrar["boton_guardar_cuatro"] = true;
        if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["boton_guardar_cuatro"] = false;
        else $disabled["boton_guardar_cuatro"] = true;

        //value
        if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["paso_cuatro"] = false;
        else $mostrar["paso_cuatro"] = true;
        if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["paso_cuatro"] = false;
        else $disabled["paso_cuatro"] = true;
        //correccion de razon social
        if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["paso_cuatro"] = false;
        else $mostrar["paso_cuatro"] = true;
        if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["paso_cuatro"] = false;
        else $disabled["paso_cuatro"] = true;

        $mostrar["resolucion_concesion"] = true;
        $mostrar["resolucion_concesion_correccion"] = false;


        


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }
    public static function permisos_pagina_cinco($rol,$owner,$arrendatario,$concesionario,$otros,$titulo_contrato_posecion,$resolucion_concesion_minera, $contancias_canon,$iia,$dia,$acciones,$actividades,$fecha_alta_dia,$fecha_vencimiento_dia,$paso,$boton){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($owner[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["owner"] = false;
        else $mostrar["owner"] = true;
        if( (intval($owner[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["owner"] = false;
        else $disabled["owner"] = true;
        //correccion de razon social
        if((intval($owner[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["owner_correccion"] = false ;
        else $mostrar["owner_correccion"] = true;
        if( (intval ($owner[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["owner_correccion"] = false;
        else $disabled["owner_correccion"] = true;
        

        
        //value
        if((intval($arrendatario[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["arrendatario"] = false;
        else $mostrar["arrendatario"] = true;
        if((intval($arrendatario[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["arrendatario"] = false;
        else $disabled["arrendatario"] = true;
        //correccion de arrendatario
        if( (intval($arrendatario[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["arrendatario_correccion"] = false;
        else $mostrar["arrendatario_correccion"] = true;
        if( (intval($arrendatario[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["arrendatario_correccion"] = false;
        else $disabled["arrendatario_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($concesionario[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["concesionario"] = false;
        else $mostrar["concesionario"] = true;
        if( (intval($concesionario[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["concesionario"] = false;
        else $disabled["concesionario"] = true;
        //correccion de concesionario
        if( (intval($concesionario[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesionario_correccion"] = false;
        else $mostrar["concesionario_correccion"] = true;
        if((intval($concesionario[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesionario_correccion"] = false;
        else $disabled["concesionario_correccion"] = true;

        

        $mostrar["sustancias"] = true;
        $mostrar["sustancias_correccion"] = false;


        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($otros[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["otros"] = false;
        else $mostrar["otros"] = true;
        if((intval( $otros[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["otros"] = false;
        else $disabled["otros"] = true;
        //correccion de razon social
        if((intval($otros[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["otros_correccion"] = false;
        else $mostrar["otros_correccion"] = true;
        if((intval($otros[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["otros_correccion"] = false;
        else $disabled["otros_correccion"] = true;

        

        //value
        if((intval($titulo_contrato_posecion[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["concesion"] = false;
        else $mostrar["concesion"] = true;
        if((intval($titulo_contrato_posecion[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["concesion"] = false;
        else $disabled["concesion"] = true;
        //correccion de razon social
        if((intval($titulo_contrato_posecion[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_correccion"] = false;
        else $mostrar["concesion_correccion"] = true;
        if((intval($titulo_contrato_posecion[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_correccion"] = false;
        else $disabled["concesion_correccion"] = true;


        //value
        if((intval($resolucion_concesion_minera[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["resolucion_concesion_minera"] = false;
        else $mostrar["resolucion_concesion_minera"] = true;
        if((intval($resolucion_concesion_minera[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["resolucion_concesion_minera"] = false;
        else $disabled["resolucion_concesion_minera"] = true;
        //correccion de razon social
        if((intval($resolucion_concesion_minera[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["resolucion_concesion_minera_correccion"] = false;
        else $mostrar["resolucion_concesion_minera_correccion"] = true;
        if((intval($resolucion_concesion_minera[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["resolucion_concesion_minera_correccion"] = false;
        else $disabled["resolucion_concesion_minera_correccion"] = true;



        //value
        if((intval($contancias_canon[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["contancias_canon"] = false;
        else $mostrar["contancias_canon"] = true;
        if((intval($contancias_canon[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["contancias_canon"] = false;
        else $disabled["contancias_canon"] = true;
        //correccion de razon social
        if((intval($contancias_canon[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["contancias_canon_correccion"] = false;
        else $mostrar["contancias_canon_correccion"] = true;
        if((intval($contancias_canon[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["contancias_canon_correccion"] = false;
        else $disabled["contancias_canon_correccion"] = true;

            //value
        if((intval($iia[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["iia"] = false;
        else $mostrar["iia"] = true;
        if((intval($iia[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["iia"] = false;
        else $disabled["iia"] = true;
        //correccion de razon social
        if((intval($iia[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["iia_correccion"] = false;
        else $mostrar["iia_correccion"] = true;
        if((intval($iia[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["iia_correccion"] = false;
        else $disabled["iia_correccion"] = true;



            //value
            if((intval($dia[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["dia"] = false;
        else $mostrar["dia"] = true;
        if((intval($dia[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["dia"] = false;
        else $disabled["dia"] = true;
        //correccion de razon social
        if((intval($dia[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["dia_correccion"] = false;
        else $mostrar["dia_correccion"] = true;
        if((intval($dia[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["dia_correccion"] = false;
        else $disabled["dia_correccion"] = true;




            //value
            if((intval($acciones[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["acciones"] = false;
        else $mostrar["acciones"] = true;
        if((intval($acciones[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["acciones"] = false;
        else $disabled["acciones"] = true;
        //correccion de razon social
        if((intval($acciones[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["acciones_correccion"] = false;
        else $mostrar["acciones_correccion"] = true;
        if((intval($acciones[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["acciones_correccion"] = false;
        else $disabled["acciones_correccion"] = true;



            //value
            if((intval($actividades[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["actividades"] = false;
        else $mostrar["actividades"] = true;
        if((intval($actividades[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["actividades"] = false;
        else $disabled["actividades"] = true;
        //correccion de razon social
        if((intval($actividades[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["actividades_correccion"] = false;
        else $mostrar["actividades_correccion"] = true;
        if((intval($actividades[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["actividades_correccion"] = false;
        else $disabled["actividades_correccion"] = true;



        //value
        if((intval($fecha_alta_dia[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["fecha_alta_dia"] = false;
        else $mostrar["fecha_alta_dia"] = true;
        if((intval($fecha_alta_dia[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["fecha_alta_dia"] = false;
        else $disabled["fecha_alta_dia"] = true;
        //correccion de razon social
        if((intval($fecha_alta_dia[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["fecha_alta_dia_correccion"] = false;
        else $mostrar["fecha_alta_dia_correccion"] = true;
        if((intval($fecha_alta_dia[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["fecha_alta_dia_correccion"] = false;
        else $disabled["fecha_alta_dia_correccion"] = true;

         //value
        if((intval($fecha_vencimiento_dia[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["fecha_vencimiento_dia"] = false;
        else $mostrar["fecha_vencimiento_dia"] = true;
        if((intval($fecha_vencimiento_dia[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["fecha_vencimiento_dia"] = false;
        else $disabled["fecha_vencimiento_dia"] = true;
        //correccion de razon social
        if((intval($fecha_vencimiento_dia[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["fecha_vencimiento_dia_correccion"] = false;
        else $mostrar["fecha_vencimiento_dia_correccion"] = true;
        if((intval($fecha_vencimiento_dia[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["fecha_vencimiento_dia_correccion"] = false;
        else $disabled["fecha_vencimiento_dia_correccion"] = true;

        //value
        if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["boton_guardar_cinco"] = false;
        else $mostrar["boton_guardar_cinco"] = true;
        if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["boton_guardar_cinco"] = false;
        else $disabled["boton_guardar_cinco"] = true;
        //correccion de razon social
        if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["boton_guardar_cinco"] = false;
        else $mostrar["boton_guardar_cinco"] = true;
        if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["boton_guardar_cinco"] = false;
        else $disabled["boton_guardar_cinco"] = true;

        //value
        if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["paso_cinco"] = false;
        else $mostrar["paso_cinco"] = true;
        if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["paso_cinco"] = false;
        else $disabled["paso_cinco"] = true;
        //correccion de razon social
        if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["paso_cinco"] = false;
        else $mostrar["paso_cinco"] = true;
        if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["paso_cinco"] = false;
        else $disabled["paso_cinco"] = true;
        


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }
    public static function permisos_pagina_seis($rol,$localidad_mina_pais,$ubicacion_prov,$ubicacion_dpto,$ubicacion_localidad,$ubicacion_sistema,$ubicacion_long, $ubicacion_latitud,$paso,$boton){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($localidad_mina_pais[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["localidad_mina_pais"] = false;
        else $mostrar["localidad_mina_pais"] = true;
        if( (intval($localidad_mina_pais[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["localidad_mina_pais"] = false;
        else $disabled["localidad_mina_pais"] = true;
        //correccion de razon social
        if((intval($localidad_mina_pais[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["localidad_mina_pais_correccion"] = false ;
        else $mostrar["localidad_mina_pais_correccion"] = true;
        if( (intval ($localidad_mina_pais[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["localidad_mina_pais_correccion"] = false;
        else $disabled["localidad_mina_pais_correccion"] = true;
        

        
        //value
        if((intval($ubicacion_prov[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["ubicacion_prov"] = false;
        else $mostrar["ubicacion_prov"] = true;
        if((intval($ubicacion_prov[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["ubicacion_prov"] = false;
        else $disabled["ubicacion_prov"] = true;
        //correccion de ubicacion_prov
        if( (intval($ubicacion_prov[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["ubicacion_prov_correccion"] = false;
        else $mostrar["ubicacion_prov_correccion"] = true;
        if( (intval($ubicacion_prov[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["ubicacion_prov_correccion"] = false;
        else $disabled["ubicacion_prov_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($ubicacion_dpto[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["ubicacion_dpto"] = false;
        else $mostrar["ubicacion_dpto"] = true;
        if( (intval($ubicacion_dpto[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["ubicacion_dpto"] = false;
        else $disabled["ubicacion_dpto"] = true;
        //correccion de ubicacion_dpto
        if( (intval($ubicacion_dpto[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["ubicacion_dpto_correccion"] = false;
        else $mostrar["ubicacion_dpto_correccion"] = true;
        if((intval($ubicacion_dpto[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["ubicacion_dpto_correccion"] = false;
        else $disabled["ubicacion_dpto_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($ubicacion_localidad[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["ubicacion_localidad"] = false;
        else $mostrar["ubicacion_localidad"] = true;
        if((intval( $ubicacion_localidad[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["ubicacion_localidad"] = false;
        else $disabled["ubicacion_localidad"] = true;
        //correccion de razon social
        if((intval($ubicacion_localidad[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["ubicacion_localidad_correccion"] = false;
        else $mostrar["ubicacion_localidad_correccion"] = true;
        if((intval($ubicacion_localidad[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["ubicacion_localidad_correccion"] = false;
        else $disabled["ubicacion_localidad_correccion"] = true;


        //value
        if((intval($ubicacion_sistema[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["ubicacion_sistema"] = false;
        else $mostrar["ubicacion_sistema"] = true;
        if((intval($ubicacion_sistema[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["ubicacion_sistema"] = false;
        else $disabled["ubicacion_sistema"] = true;
        //correccion de razon social
        if((intval($ubicacion_sistema[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["ubicacion_sistema_correccion"] = false;
        else $mostrar["ubicacion_sistema_correccion"] = true;
        if((intval($ubicacion_sistema[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["ubicacion_sistema_correccion"] = false;
        else $disabled["ubicacion_sistema_correccion"] = true;


        //value
        if((intval($ubicacion_long[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["ubicacion_long"] = false;
        else $mostrar["ubicacion_long"] = true;
        if((intval($ubicacion_long[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["ubicacion_long"] = false;
        else $disabled["ubicacion_long"] = true;
        //correccion de razon social
        if((intval($ubicacion_long[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["ubicacion_long_correccion"] = false;
        else $mostrar["ubicacion_long_correccion"] = true;
        if((intval($ubicacion_long[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["ubicacion_long_correccion"] = false;
        else $disabled["ubicacion_long_correccion"] = true;



        //value
        if((intval($ubicacion_latitud[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["ubicacion_latitud"] = false;
        else $mostrar["ubicacion_latitud"] = true;
        if((intval($ubicacion_latitud[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["ubicacion_latitud"] = false;
        else $disabled["ubicacion_latitud"] = true;
        //correccion de razon social
        if((intval($ubicacion_latitud[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["ubicacion_latitud_correccion"] = false;
        else $mostrar["ubicacion_latitud_correccion"] = true;
        if((intval($ubicacion_latitud[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["ubicacion_latitud_correccion"] = false;
        else $disabled["ubicacion_latitud_correccion"] = true;

        $mostrar["ubicacion_estado"] = false;
        $mostrar["ubicacion_estado_correccion"] = false;
        $mostrar["ubicacion_estado_observacion"] = false;

        $disabled["ubicacion_estado"] = false;
        $disabled["ubicacion_estado_correccion"] = false;
        $disabled["ubicacion_estado_observacion"] = false;


        
        
        

        //value
        if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["boton_guardar_seis"] = false;
        else $mostrar["boton_guardar_seis"] = true;
        if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["boton_guardar_seis"] = false;
        else $disabled["boton_guardar_seis"] = true;
        //correccion de razon social
        if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["boton_guardar_seis"] = false;
        else $mostrar["boton_guardar_seis"] = true;
        if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["boton_guardar_seis"] = false;
        else $disabled["boton_guardar_seis"] = true;

        //value
        if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["paso_seis"] = false;
        else $mostrar["paso_seis"] = true;
        if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["paso_seis"] = false;
        else $disabled["paso_seis"] = true;
        //correccion de razon social
        if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["paso_seis"] = false;
        else $mostrar["paso_seis"] = true;
        if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["paso_seis"] = false;
        else $disabled["paso_seis"] = true;
        


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }
    public static function permisos_pagina_siete($rol,$cargo_empresa,$presentador_nom_apellido,$presentador_dni,$observacion,$paso,$boton){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($cargo_empresa[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["cargo_empresa"] = false;
        else $mostrar["cargo_empresa"] = true;
        if( (intval($cargo_empresa[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["cargo_empresa"] = false;
        else $disabled["cargo_empresa"] = true;
        //correccion de razon social
        if((intval($cargo_empresa[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["cargo_empresa_correccion"] = false ;
        else $mostrar["cargo_empresa_correccion"] = true;
        if( (intval ($cargo_empresa[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["cargo_empresa_correccion"] = false;
        else $disabled["cargo_empresa_correccion"] = true;
        

        
        //value
        if((intval($presentador_nom_apellido[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["presentador_nom_apellido"] = false;
        else $mostrar["presentador_nom_apellido"] = true;
        if((intval($presentador_nom_apellido[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["presentador_nom_apellido"] = false;
        else $disabled["presentador_nom_apellido"] = true;
        //correccion de presentador_nom_apellido
        if( (intval($presentador_nom_apellido[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["presentador_nom_apellido_correccion"] = false;
        else $mostrar["presentador_nom_apellido_correccion"] = true;
        if( (intval($presentador_nom_apellido[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["presentador_nom_apellido_correccion"] = false;
        else $disabled["presentador_nom_apellido_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($presentador_dni[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["presentador_dni"] = false;
        else $mostrar["presentador_dni"] = true;
        if( (intval($presentador_dni[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["presentador_dni"] = false;
        else $disabled["presentador_dni"] = true;
        //correccion de presentador_dni
        if( (intval($presentador_dni[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["presentador_dni_correccion"] = false;
        else $mostrar["presentador_dni_correccion"] = true;
        if((intval($presentador_dni[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["presentador_dni_correccion"] = false;
        else $disabled["presentador_dni_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($observacion[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["observacion"] = false;
        else $mostrar["observacion"] = true;
        if((intval( $observacion[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["observacion"] = false;
        else $disabled["observacion"] = true;
        //correccion de razon social
        if((intval($observacion[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["observacion_correccion"] = false;
        else $mostrar["observacion_correccion"] = true;
        if((intval($observacion[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["observacion_correccion"] = false;
        else $disabled["observacion_correccion"] = true;
        
        //value
        if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["boton_guardar_siete"] = false;
        else $mostrar["boton_guardar_siete"] = true;
        if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["boton_guardar_siete"] = false;
        else $disabled["boton_guardar_siete"] = true;
        //correccion de razon social
        if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["boton_guardar_siete"] = false;
        else $mostrar["boton_guardar_siete"] = true;
        if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["boton_guardar_siete"] = false;
        else $disabled["boton_guardar_siete"] = true;

        //value
        if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["paso_siete"] = false;
        else $mostrar["paso_siete"] = true;
        if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["paso_siete"] = false;
        else $disabled["paso_siete"] = true;
        //correccion de razon social
        if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["paso_siete"] = false;
        else $mostrar["paso_siete"] = true;
        if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["paso_siete"] = false;
        else $disabled["paso_siete"] = true;
        


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }
    public static function permisos_pagina_ocho($rol,$nombre_gestor,$dni_gestor,$profesion_gestor,$telefono_gestor,$notificacion_gestor,$email_gestor,$dni_productor,$foto_productor,$constancia_afip,$autorizacion_gestor,$paso,$boton){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($nombre_gestor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["nombre_gestor"] = false;
        else $mostrar["nombre_gestor"] = true;
        if( (intval($nombre_gestor[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["nombre_gestor"] = false;
        else $disabled["nombre_gestor"] = true;
        //correccion de razon social
        if((intval($nombre_gestor[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["nombre_gestor_correccion"] = false ;
        else $mostrar["nombre_gestor_correccion"] = true;
        if( (intval ($nombre_gestor[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["nombre_gestor_correccion"] = false;
        else $disabled["nombre_gestor_correccion"] = true;
        

        
        //value
        if((intval($dni_gestor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["dni_gestor"] = false;
        else $mostrar["dni_gestor"] = true;
        if((intval($dni_gestor[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["dni_gestor"] = false;
        else $disabled["dni_gestor"] = true;
        //correccion de dni_gestor
        if( (intval($dni_gestor[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["dni_gestor_correccion"] = false;
        else $mostrar["dni_gestor_correccion"] = true;
        if( (intval($dni_gestor[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["dni_gestor_correccion"] = false;
        else $disabled["dni_gestor_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($profesion_gestor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["profesion_gestor"] = false;
        else $mostrar["profesion_gestor"] = true;
        if( (intval($profesion_gestor[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["profesion_gestor"] = false;
        else $disabled["profesion_gestor"] = true;
        //correccion de profesion_gestor
        if( (intval($profesion_gestor[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["profesion_gestor_correccion"] = false;
        else $mostrar["profesion_gestor_correccion"] = true;
        if((intval($profesion_gestor[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["profesion_gestor_correccion"] = false;
        else $disabled["profesion_gestor_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($telefono_gestor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["telefono_gestor"] = false;
        else $mostrar["telefono_gestor"] = true;
        if((intval( $telefono_gestor[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["telefono_gestor"] = false;
        else $disabled["telefono_gestor"] = true;
        //correccion de razon social
        if((intval($telefono_gestor[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["telefono_gestor_correccion"] = false;
        else $mostrar["telefono_gestor_correccion"] = true;
        if((intval($telefono_gestor[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["telefono_gestor_correccion"] = false;
        else $disabled["telefono_gestor_correccion"] = true;







        //value
        if((intval($notificacion_gestor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["notificacion_gestor"] = false;
        else $mostrar["notificacion_gestor"] = true;
        if((intval( $notificacion_gestor[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["notificacion_gestor"] = false;
        else $disabled["notificacion_gestor"] = true;
        //correccion de razon social
        if((intval($notificacion_gestor[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["notificacion_gestor_correccion"] = false;
        else $mostrar["notificacion_gestor_correccion"] = true;
        if((intval($notificacion_gestor[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["notificacion_gestor_correccion"] = false;
        else $disabled["notificacion_gestor_correccion"] = true;
        














        //value
        if((intval($email_gestor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["email_gestor"] = false;
        else $mostrar["email_gestor"] = true;
        if((intval( $email_gestor[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["email_gestor"] = false;
        else $disabled["email_gestor"] = true;
        //correccion de razon social
        if((intval($email_gestor[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["email_gestor_correccion"] = false;
        else $mostrar["email_gestor_correccion"] = true;
        if((intval($email_gestor[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["email_gestor_correccion"] = false;
        else $disabled["email_gestor_correccion"] = true;
        















        //value
        if((intval($dni_productor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["dni_productor"] = false;
        else $mostrar["dni_productor"] = true;
        if((intval( $dni_productor[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["dni_productor"] = false;
        else $disabled["dni_productor"] = true;
        //correccion de razon social
        if((intval($dni_productor[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["dni_productor_correccion"] = false;
        else $mostrar["dni_productor_correccion"] = true;
        if((intval($dni_productor[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["dni_productor_correccion"] = false;
        else $disabled["dni_productor_correccion"] = true;
        













        //value
        if((intval($foto_productor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["foto_productor"] = false;
        else $mostrar["foto_productor"] = true;
        if((intval( $foto_productor[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["foto_productor"] = false;
        else $disabled["foto_productor"] = true;
        //correccion de razon social
        if((intval($foto_productor[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["foto_productor_correccion"] = false;
        else $mostrar["foto_productor_correccion"] = true;
        if((intval($foto_productor[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["foto_productor_correccion"] = false;
        else $disabled["foto_productor_correccion"] = true;
        

        //value
        if((intval($constancia_afip[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["constancia_afip"] = false;
        else $mostrar["constancia_afip"] = true;
        if((intval( $constancia_afip[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["constancia_afip"] = false;
        else $disabled["constancia_afip"] = true;
        //correccion de razon social
        if((intval($constancia_afip[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["constancia_afip_correccion"] = false;
        else $mostrar["constancia_afip_correccion"] = true;
        if((intval($constancia_afip[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["constancia_afip_correccion"] = false;
        else $disabled["constancia_afip_correccion"] = true;


        //value
        if((intval($autorizacion_gestor[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["autorizacion_gestor"] = false;
        else $mostrar["autorizacion_gestor"] = true;
        if((intval( $autorizacion_gestor[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["autorizacion_gestor"] = false;
        else $disabled["autorizacion_gestor"] = true;
        //correccion de razon social
        if((intval($autorizacion_gestor[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["autorizacion_gestor_correccion"] = false;
        else $mostrar["autorizacion_gestor_correccion"] = true;
        if((intval($autorizacion_gestor[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["autorizacion_gestor_correccion"] = false;
        else $disabled["autorizacion_gestor_correccion"] = true;



        
        //value
        if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["boton_guardar_ocho"] = false;
        else $mostrar["boton_guardar_ocho"] = true;
        if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["boton_guardar_ocho"] = false;
        else $disabled["boton_guardar_ocho"] = true;
        //correccion de razon social
        if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["boton_guardar_ocho"] = false;
        else $mostrar["boton_guardar_ocho"] = true;
        if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["boton_guardar_ocho"] = false;
        else $disabled["boton_guardar_ocho"] = true;

        //value
        if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["paso_ocho"] = false;
        else $mostrar["paso_ocho"] = true;
        if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["paso_ocho"] = false;
        else $disabled["paso_ocho"] = true;
        //correccion de razon social
        if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["paso_ocho"] = false;
        else $mostrar["paso_ocho"] = true;
        if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["paso_ocho"] = false;
        else $disabled["paso_ocho"] = true;
        


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }

    
    public static function permisos_pagina_nueve($rol,$decreto3737,$situacion_mina,$concesion_minera_asiento_n,$concesion_minera_fojas,$concesion_minera_tomo_n,$concesion_minera_reg_m_y_d,$concesion_minera_reg_cant,$concesion_minera_reg_men,$concesion_minera_reg_d_y_c,$obs_datos_minas,$paso_mendoza,$paso,$boton){
        $mostrar = array();
        $disable = array();
        //dd($paso,$boton);
        //dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);
        
        //value
        if( ( intval($decreto3737[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["decreto3737"] = false;
        else $mostrar["decreto3737"] = true;
        if( (intval($decreto3737[$rol-1])  & 2 ) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["decreto3737"] = false;
        else $disabled["decreto3737"] = true;
        //correccion de razon social
        if((intval($decreto3737[$rol+3-1])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["decreto3737_correccion"] = false ;
        else $mostrar["decreto3737_correccion"] = true;
        if( (intval ($decreto3737[$rol+3-1]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["decreto3737_correccion"] = false;
        else $disabled["decreto3737_correccion"] = true;
        

        
        //value
        if((intval($situacion_mina[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["situacion_mina"] = false;
        else $mostrar["situacion_mina"] = true;
        if((intval($situacion_mina[$rol-1])& 2)  == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["situacion_mina"] = false;
        else $disabled["situacion_mina"] = true;
        //correccion de situacion_mina
        if( (intval($situacion_mina[$rol+2])  & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["situacion_mina_correccion"] = false;
        else $mostrar["situacion_mina_correccion"] = true;
        if( (intval($situacion_mina[$rol+2])  & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["situacion_mina_correccion"] = false;
        else $disabled["situacion_mina_correccion"] = true;

        //$cuit = "400400";

        //value
        if((intval($concesion_minera_asiento_n[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["concesion_minera_asiento_n"] = false;
        else $mostrar["concesion_minera_asiento_n"] = true;
        if( (intval($concesion_minera_asiento_n[$rol-1])  & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["concesion_minera_asiento_n"] = false;
        else $disabled["concesion_minera_asiento_n"] = true;
        //correccion de concesion_minera_asiento_n
        if( (intval($concesion_minera_asiento_n[$rol+2] & 4)) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_minera_asiento_n_correccion"] = false;
        else $mostrar["concesion_minera_asiento_n_correccion"] = true;
        if((intval($concesion_minera_asiento_n[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_minera_asiento_n_correccion"] = false;
        else $disabled["concesion_minera_asiento_n_correccion"] = true;

        
        //dd($mostrar,$disabled);
        //dd( intval($email[$rol-1]), $razon_social,"mostrar",$mostrar, "disables", $disabled);


        //value
        if((intval($concesion_minera_fojas[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["concesion_minera_fojas"] = false;
        else $mostrar["concesion_minera_fojas"] = true;
        if((intval( $concesion_minera_fojas[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["concesion_minera_fojas"] = false;
        else $disabled["concesion_minera_fojas"] = true;
        //correccion de razon social
        if((intval($concesion_minera_fojas[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_minera_fojas_correccion"] = false;
        else $mostrar["concesion_minera_fojas_correccion"] = true;
        if((intval($concesion_minera_fojas[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_minera_fojas_correccion"] = false;
        else $disabled["concesion_minera_fojas_correccion"] = true;







        //value
        if((intval($concesion_minera_tomo_n[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["concesion_minera_tomo_n"] = false;
        else $mostrar["concesion_minera_tomo_n"] = true;
        if((intval( $concesion_minera_tomo_n[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["concesion_minera_tomo_n"] = false;
        else $disabled["concesion_minera_tomo_n"] = true;
        //correccion de razon social
        if((intval($concesion_minera_tomo_n[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_minera_tomo_n_correccion"] = false;
        else $mostrar["concesion_minera_tomo_n_correccion"] = true;
        if((intval($concesion_minera_tomo_n[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_minera_tomo_n_correccion"] = false;
        else $disabled["concesion_minera_tomo_n_correccion"] = true;
        














        //value
        if((intval($concesion_minera_reg_m_y_d[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["concesion_minera_reg_m_y_d"] = false;
        else $mostrar["concesion_minera_reg_m_y_d"] = true;
        if((intval( $concesion_minera_reg_m_y_d[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["concesion_minera_reg_m_y_d"] = false;
        else $disabled["concesion_minera_reg_m_y_d"] = true;
        //correccion de razon social
        if((intval($concesion_minera_reg_m_y_d[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_minera_reg_m_y_d_correccion"] = false;
        else $mostrar["concesion_minera_reg_m_y_d_correccion"] = true;
        if((intval($concesion_minera_reg_m_y_d[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_minera_reg_m_y_d_correccion"] = false;
        else $disabled["concesion_minera_reg_m_y_d_correccion"] = true;
        















        //value
        if((intval($concesion_minera_reg_cant[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["concesion_minera_reg_cant"] = false;
        else $mostrar["concesion_minera_reg_cant"] = true;
        if((intval( $concesion_minera_reg_cant[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["concesion_minera_reg_cant"] = false;
        else $disabled["concesion_minera_reg_cant"] = true;
        //correccion de razon social
        if((intval($concesion_minera_reg_cant[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_minera_reg_cant_correccion"] = false;
        else $mostrar["concesion_minera_reg_cant_correccion"] = true;
        if((intval($concesion_minera_reg_cant[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_minera_reg_cant_correccion"] = false;
        else $disabled["concesion_minera_reg_cant_correccion"] = true;
        













        //value
        if((intval($concesion_minera_reg_men[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["concesion_minera_reg_men"] = false;
        else $mostrar["concesion_minera_reg_men"] = true;
        if((intval( $concesion_minera_reg_men[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["concesion_minera_reg_men"] = false;
        else $disabled["concesion_minera_reg_men"] = true;
        //correccion de razon social
        if((intval($concesion_minera_reg_men[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_minera_reg_men_correccion"] = false;
        else $mostrar["concesion_minera_reg_men_correccion"] = true;
        if((intval($concesion_minera_reg_men[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_minera_reg_men_correccion"] = false;
        else $disabled["concesion_minera_reg_men_correccion"] = true;
        

        //value
        if((intval($concesion_minera_reg_d_y_c[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["concesion_minera_reg_d_y_c"] = false;
        else $mostrar["concesion_minera_reg_d_y_c"] = true;
        if((intval( $concesion_minera_reg_d_y_c[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["concesion_minera_reg_d_y_c"] = false;
        else $disabled["concesion_minera_reg_d_y_c"] = true;
        //correccion de razon social
        if((intval($concesion_minera_reg_d_y_c[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["concesion_minera_reg_d_y_c_correccion"] = false;
        else $mostrar["concesion_minera_reg_d_y_c_correccion"] = true;
        if((intval($concesion_minera_reg_d_y_c[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["concesion_minera_reg_d_y_c_correccion"] = false;
        else $disabled["concesion_minera_reg_d_y_c_correccion"] = true;


        //value
        if((intval($obs_datos_minas[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["obs_datos_minas"] = false;
        else $mostrar["obs_datos_minas"] = true;
        if((intval( $obs_datos_minas[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["obs_datos_minas"] = false;
        else $disabled["obs_datos_minas"] = true;
        //correccion de razon social
        if((intval($obs_datos_minas[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["obs_datos_minas_correccion"] = false;
        else $mostrar["obs_datos_minas_correccion"] = true;
        if((intval($obs_datos_minas[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["obs_datos_minas_correccion"] = false;
        else $disabled["obs_datos_minas_correccion"] = true;



        
        //value
        if((intval($boton[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["boton_guardar_nueve"] = false;
        else $mostrar["boton_guardar_nueve"] = true;
        if((intval($boton[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["boton_guardar_nueve"] = false;
        else $disabled["boton_guardar_nueve"] = true;
        //correccion de razon social
        if((intval($boton[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["boton_guardar_nueve"] = false;
        else $mostrar["boton_guardar_nueve"] = true;
        if((intval($boton[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["boton_guardar_nueve"] = false;
        else $disabled["boton_guardar_nueve"] = true;

        //value
        if((intval($paso[$rol-1]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["paso_nueve"] = false;
        else $mostrar["paso_nueve"] = true;
        if((intval($paso[$rol-1]) & 2) == 0) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["paso_nueve"] = false;
        else $disabled["paso_nueve"] = true;
        //correccion de razon social
        if((intval($paso[$rol+2]) & 4) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["paso_nueve"] = false;
        else $mostrar["paso_nueve"] = true;
        if((intval($paso[$rol+2]) & 2) == 0) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["paso_nueve"] = false;
        else $disabled["paso_nueve"] = true;
        


        $array_a_devolver = array();
        $array_a_devolver[0] = $mostrar;
        $array_a_devolver[1] = $disabled;

        return $array_a_devolver;

        

    }
}
