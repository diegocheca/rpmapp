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
                if($inputs[0]) {
                    $num++;
                }
                if($inputs[1]) {
                    $num+=2;
                }
                if($inputs[2]) {
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
        return $filas->save();
    }
    public static function dame_permisos($id_provincia ,$perfil, $formualrio, $accion , $estado, $pagina){
        if($pagina == 99){
            //devuelvo todas las paginas
            $filas = Permission::select('*')
            ->where('id_provincia', '=', $id_provincia)
            ->where('id_rol', '=', $perfil)
            ->where('formulario', '=', intval($formualrio) )
            ->where('accion', '=', $accion)
            ->where('estado', '=', $estado)
            ->get();
        } else {
            $filas = Permission::select('*')
            ->where('id_provincia', '=', $id_provincia)
            ->where('id_rol', '=', $perfil)
            ->where('formulario', '=', intval($formualrio) )
            ->where('accion', '=', $accion)
            ->where('estado', '=', $estado)
            ->where('pagina', '=', $pagina)
            ->get();
            $array = array();
            $array_de_permisos_db = explode( '-', $filas->data);
            //orden en la base de datos
            //"numeroproductor-cuit-razonsocial-email-tiposociedad-inscripciondgr-constaciasociedad-paso-boton";
            $array = Permission::permisos_pagina_uno($perfil,$array_de_permisos_db[2],$array_de_permisos_db[3],$array_de_permisos_db[1],$array_de_permisos_db[0],$array_de_permisos_db[4],$array_de_permisos_db[5],$array_de_permisos_db[6],$array_de_permisos_db[7],$array_de_permisos_db[8]);
        }
        return $filas;
    }

    public static function permisos_pagina_uno($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton ){
        $mostrar = array();
        $disable = array();
        dd($rol,$razon_social,$email,$cuit,$num_prod,$tipo_sociedad,$inscripcion_dgr, $constancia_sociedad,$paso,$boton);

        //value
        if($razon_social[$rol] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["razon_social"] = true;
        else $mostrar["razon_social"] = false;
        if($razon_social[$rol] & 2 == 2) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["razon_social"] = true;
        else $disabled["razon_social"] = false;
        //correccion de razon social
        if($razon_social[$rol+3] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["razon_social_correccion"] = true;
        else $mostrar["razon_social_correccion"] = false;
        if($razon_social[$rol+3] & 2 == 2) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["razon_social_correccion"] = true;
        else $disabled["razon_social_correccion"] = false;

        //value
        if($email[$rol] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["email"] = true;
        else $mostrar["email"] = false;
        if($email[$rol] & 2 == 2) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["email"] = true;
        else $disabled["email"] = false;
        //correccion de razon social
        if($email[$rol+3] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["email_correccion"] = true;
        else $mostrar["email_correccion"] = false;
        if($email[$rol+3] & 2 == 2) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["email_correccion"] = true;
        else $disabled["email_correccion"] = false;


        //value
        if($cuit[$rol] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["cuit"] = true;
        else $mostrar["cuit"] = false;
        if($cuit[$rol] & 2 == 2) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["cuit"] = true;
        else $disabled["cuit"] = false;
        //correccion de razon social
        if($cuit[$rol+3] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["cuit_correccion"] = true;
        else $mostrar["cuit_correccion"] = false;
        if($cuit[$rol+3] & 2 == 2) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["cuit_correccion"] = true;
        else $disabled["cuit_correccion"] = false;


        //value
        if($num_prod[$rol] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["num_prod"] = true;
        else $mostrar["num_prod"] = false;
        if($num_prod[$rol] & 2 == 2) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["num_prod"] = true;
        else $disabled["num_prod"] = false;
        //correccion de razon social
        if($num_prod[$rol+3] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["num_prod_correccion"] = true;
        else $mostrar["num_prod_correccion"] = false;
        if($num_prod[$rol+3] & 2 == 2) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["num_prod_correccion"] = true;
        else $disabled["num_prod_correccion"] = false;


        //value
        if($tipo_sociedad[$rol] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        $mostrar["tipo_sociedad"] = true;
        else $mostrar["tipo_sociedad"] = false;
        if($tipo_sociedad[$rol] & 2 == 2) // razon social & 100  --> resultado 2 si coinciden los bits  
        $disabled["tipo_sociedad"] = true;
        else $disabled["tipo_sociedad"] = false;
        //correccion de razon social
        if($tipo_sociedad[$rol+3] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
        $mostrar["tipo_sociedad_correccion"] = true;
        else $mostrar["tipo_sociedad_correccion"] = false;
        if($tipo_sociedad[$rol+3] & 2 == 2) // razon social & 100  --> resultado 4 si coinciden los bits  
        $disabled["tipo_sociedad_correccion"] = true;
        else $disabled["tipo_sociedad_correccion"] = false;


        //value
        if($inscripcion_dgr[$rol] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["inscripcion_dgr"] = true;
        else $mostrar["inscripcion_dgr"] = false;
        if($inscripcion_dgr[$rol] & 2 == 2) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["inscripcion_dgr"] = true;
        else $disabled["inscripcion_dgr"] = false;
        //correccion de razon social
        if($inscripcion_dgr[$rol+3] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["inscripcion_dgr_correccion"] = true;
        else $mostrar["inscripcion_dgr_correccion"] = false;
        if($inscripcion_dgr[$rol+3] & 2 == 2) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["inscripcion_dgr_correccion"] = true;
        else $disabled["inscripcion_dgr_correccion"] = false;



        //value
        if($constancia_sociedad[$rol] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
            $mostrar["constancia_sociedad"] = true;
        else $mostrar["constancia_sociedad"] = false;
        if($constancia_sociedad[$rol] & 2 == 2) // razon social & 100  --> resultado 2 si coinciden los bits  
            $disabled["constancia_sociedad"] = true;
        else $disabled["constancia_sociedad"] = false;
        //correccion de razon social
        if($constancia_sociedad[$rol+3] & 4 == 4) // razon social & 100  --> resultado 4 si coinciden los bits  
        //sumo 3 a al rol original para asi poder  ver los segundos 3 digitos del string 77777
            $mostrar["constancia_sociedad_correccion"] = true;
        else $mostrar["constancia_sociedad_correccion"] = false;
        if($constancia_sociedad[$rol+3] & 2 == 2) // razon social & 100  --> resultado 4 si coinciden los bits  
            $disabled["constancia_sociedad_correccion"] = true;
        else $disabled["constancia_sociedad_correccion"] = false;



        //value
        $mostrar["boton_guardar_uno"] = true;
        $disabled["boton_guardar_uno"] = true;
        $mostrar["paso_uno"] = true;
        $disabled["paso_uno"] = true;
    }
}
