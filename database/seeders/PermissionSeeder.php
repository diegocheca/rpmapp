<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Provincias;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //correr una sola vez para cargar los permisos:
        $provincias = Provincias::select("id")->get()->toArray();
        foreach($provincias as $provincia_for){  //logueo
            $provincia = $provincia_for["id"];
            for($rol = 1 ; $rol < 5 ; $rol++) { //rol // select
                if($rol==2) continue;
                for($accion = 1 ; $accion < 4 ; $accion++) { //accion // tab
                    for($estado = 1 ; $estado < 8 ; $estado++) { //estado 
                        //pagina 1
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 1;
                        $nuevo_permiso->data = '{"razon_social":{"disabled":false,"mostrar":false,"required":false},"razon_social_correccion":{"disabled":false,"mostrar":false,"required":false},"email":{"disabled":false,"mostrar":false,"required":false},"email_correccion":{"disabled":false,"mostrar":false,"required":false},"cuit":{"disabled":false,"mostrar":false,"required":false},"cuit_correccion":{"disabled":false,"mostrar":false,"required":false},"num_prod":{"disabled":false,"mostrar":false,"required":false},"num_prod_correccion":{"disabled":false,"mostrar":false,"required":false},"tipo_sociedad":{"disabled":false,"mostrar":false,"required":false},"tipo_sociedad_correccion":{"disabled":false,"mostrar":false,"required":false},"inscripcion_dgr":{"disabled":false,"mostrar":false,"required":false},"inscripcion_dgr_correccion":{"disabled":false,"mostrar":false,"required":false},"constancia_sociedad":{"disabled":false,"mostrar":false,"required":false},"cosntancia_sociedad_correccion":{"disabled":false,"mostrar":false,"required":false},"boton_guardar_uno":{"disabled":false,"mostrar":false,"required":false},"paso_uno":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();

                        //pagina 2
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 2;
                        $nuevo_permiso->data = '{"legal_calle":{"disabled":false,"mostrar":false,"required":false},"legal_calle_correccion":{"disabled":false,"mostrar":false,"required":false},"legal_calle_num":{"disabled":false,"mostrar":false,"required":false},"legal_calle_num_correccion":{"disabled":false,"mostrar":false,"required":false},"legal_telefono":{"disabled":false,"mostrar":false,"required":false},"legal_telefono_correccion":{"disabled":false,"mostrar":false,"required":false},"legal_prov":{"disabled":false,"mostrar":false,"required":false},"legal_prov_correccion":{"disabled":false,"mostrar":false,"required":false},"legal_dpto":{"disabled":false,"mostrar":false,"required":false},"legal_dpto_correccion":{"disabled":false,"mostrar":false,"required":false},"legal_localidad":{"disabled":false,"mostrar":false,"required":false},"legal_localidad_correccion":{"disabled":false,"mostrar":false,"required":false},"legal_cod_pos":{"disabled":false,"mostrar":false,"required":false},"legal_cod_pos_correccion":{"disabled":false,"mostrar":false,"required":false},"legal_otro":{"disabled":false,"mostrar":false,"required":false},"legal_otro_correccion":{"disabled":false,"mostrar":false,"required":false},"boton_guardar_dos":{"disabled":false,"mostrar":false,"required":false},"paso_dos":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();

                        // pagina 3
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 3;
                        $nuevo_permiso->data = '{"administracion_calle":{"disabled":false,"mostrar":false,"required":false},"administracion_correccion":{"disabled":false,"mostrar":false,"required":false},"administracion_calle_num":{"disabled":false,"mostrar":false,"required":false},"administracion_calle_num_correccion":{"disabled":false,"mostrar":false,"required":false},"administracion_telefono":{"disabled":false,"mostrar":false,"required":false},"administracion_telefono_correccion":{"disabled":false,"mostrar":false,"required":false},"administracion_prov":{"disabled":false,"mostrar":false,"required":false},"administracion_prov_correccion":{"disabled":false,"mostrar":false,"required":false},"administracion_dpto":{"disabled":false,"mostrar":false,"required":false},"administracion_dpto_correccion":{"disabled":false,"mostrar":false,"required":false},"administracion_localidad":{"disabled":false,"mostrar":false,"required":false},"administracion_localidad_correccion":{"disabled":false,"mostrar":false,"required":false},"administracion_cod_pos":{"disabled":false,"mostrar":false,"required":false},"administracion_cod_pos_correccion":{"disabled":false,"mostrar":false,"required":false},"administracion_otro":{"disabled":false,"mostrar":false,"required":false},"administracion_otro_correccion":{"disabled":false,"mostrar":false,"required":false},"boton_guardar_tres":{"disabled":false,"mostrar":false,"required":false},"paso_tres":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();

                        // pagina 4
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 4;
                        $nuevo_permiso->data = '{"num_exp":{"disabled":false,"mostrar":false,"required":false},"num_exp_correccion":{"disabled":false,"mostrar":false,"required":false},"distrito":{"disabled":false,"mostrar":false,"required":false},"distrito_correccion":{"disabled":false,"mostrar":false,"required":false},"categoria":{"disabled":false,"mostrar":false,"required":false},"categoria_correccion":{"disabled":false,"mostrar":false,"required":false},"nombre_mina":{"disabled":false,"mostrar":false,"required":false},"nombre_mina_correccion":{"disabled":false,"mostrar":false,"required":false},"descripcion_mina":{"disabled":false,"mostrar":false,"required":false},"descripcion_correccion":{"disabled":false,"mostrar":false,"required":false},"resolucion_concesion":{"disabled":false,"mostrar":false,"required":false},"resolucion_concesion_correccion":{"disabled":false,"mostrar":false,"required":false},"plano_mina":{"disabled":false,"mostrar":false,"required":false},"plano_mina_correccion":{"disabled":false,"mostrar":false,"required":false},"minerales":{"disabled":false,"mostrar":false,"required":false},"minerales_correccion":{"disabled":false,"mostrar":false,"required":false},"titulo":{"disabled":false,"mostrar":false,"required":false},"titulo_correccion":{"disabled":false,"mostrar":false,"required":false},"boton_guardar_cuatro":{"disabled":false,"mostrar":false,"required":false},"paso_cuatro":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();

                        // pagina 5
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 5;
                        $nuevo_permiso->data = '{"owner":{"disabled":false,"mostrar":false,"required":false},"owner_correccion":{"disabled":false,"mostrar":false,"required":false},"arrendatario":{"disabled":false,"mostrar":false,"required":false},"arrendatario_correccion":{"disabled":false,"mostrar":false,"required":false},"concesionario":{"disabled":false,"mostrar":false,"required":false},"concesionario_correccion":{"disabled":false,"mostrar":false,"required":false},"sustancias":{"disabled":false,"mostrar":false,"required":false},"sustancias_correccion":{"disabled":false,"mostrar":false,"required":false},"otros":{"disabled":false,"mostrar":false,"required":false},"otros_correccion":{"disabled":false,"mostrar":false,"required":false},"concesion":{"disabled":false,"mostrar":false,"required":false},"concesion_correccion":{"disabled":false,"mostrar":false,"required":false},"contancias_canon":{"disabled":false,"mostrar":false,"required":false},"constancias_canon_correccion":{"disabled":false,"mostrar":false,"required":false},"dia":{"disabled":false,"mostrar":false,"required":false},"dia_correccion":{"disabled":false,"mostrar":false,"required":false},"iia":{"disabled":false,"mostrar":false,"required":false},"iia_correccion":{"disabled":false,"mostrar":false,"required":false},"acciones":{"disabled":false,"mostrar":false,"required":false},"acciones_correccion":{"disabled":false,"mostrar":false,"required":false},"actividades":{"disabled":false,"mostrar":false,"required":false},"actividades_correccion":{"disabled":false,"mostrar":false,"required":false},"fecha_alta_dia":{"disabled":false,"mostrar":false,"required":false},"fecha_alta_dia_correccion":{"disabled":false,"mostrar":false,"required":false},"fecha_vencimiento_dia":{"disabled":false,"mostrar":false,"required":false},"fecha_vencimiento_dia_correccion":{"disabled":false,"mostrar":false,"required":false},"boton_guardar_cinco":{"disabled":false,"mostrar":false,"required":false},"paso_cinco":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();


                        // pagina 6
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 6;
                        $nuevo_permiso->data = '{"ubicacion_prov":{"disabled":false,"mostrar":false,"required":false},"ubicacion_prov_correccion":{"disabled":false,"mostrar":false,"required":false},"ubicacion_dpto":{"disabled":false,"mostrar":false,"required":false},"ubicacion_dpto_correccion":{"disabled":false,"mostrar":false,"required":false},"ubicacion_localidad":{"disabled":false,"mostrar":false,"required":false},"ubicacion_localidad_correccion":{"disabled":false,"mostrar":false,"required":false},"ubicacion_sistema":{"disabled":false,"mostrar":false,"required":false},"ubicacion_sistema_correccion":{"disabled":false,"mostrar":false,"required":false},"ubicacion_latitud":{"disabled":false,"mostrar":false,"required":false},"ubicacion_latitud_correccion":{"disabled":false,"mostrar":false,"required":false},"ubicacion_long":{"disabled":false,"mostrar":false,"required":false},"ubicacion_long_correccion":{"disabled":false,"mostrar":false,"required":false},"ubicacion_estado":{"disabled":false,"mostrar":false,"required":false},"ubicacion_estado_correccion":{"disabled":false,"mostrar":false,"required":false},"ubicacion_estado_observacion":{"disabled":false,"mostrar":false,"required":false},"boton_guardar_seis":{"disabled":false,"mostrar":false,"required":false},"paso_seis":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();

                        // pagina 7
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 7;
                        $nuevo_permiso->data = '{"cargo":{"disabled":false,"mostrar":false,"required":false},"nombre":{"disabled":false,"mostrar":false,"required":false},"dni":{"disabled":false,"mostrar":false,"required":false},"observacion":{"disabled":false,"mostrar":false,"required":false},"estado":{"disabled":false,"mostrar":false,"required":false},"boton_actualizar":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();

                        // pagina 8 (pagina catamarca)
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 8;
                        $nuevo_permiso->data = '{"nombre_gestor":{"disabled":false,"mostrar":false,"required":false},"nombre_gestor_correccion":{"disabled":false,"mostrar":false,"required":false},"dni_gestor":{"disabled":false,"mostrar":false,"required":false},"dni_gestor_correccion":{"disabled":false,"mostrar":false,"required":false},"profesion_gestor":{"disabled":false,"mostrar":false,"required":false},"profesion_gestor_correccion":{"disabled":false,"mostrar":false,"required":false},"telefono_gestor":{"disabled":false,"mostrar":false,"required":false},"telefono_gestor_correccion":{"disabled":false,"mostrar":false,"required":false},"notificacion_gestor":{"disabled":false,"mostrar":false,"required":false},"notificacion_gestor_correccion":{"disabled":false,"mostrar":false,"required":false},"email_gestor":{"disabled":false,"mostrar":false,"required":false},"email_gestor_correccion":{"disabled":false,"mostrar":false,"required":false},"dni_productor":{"disabled":false,"mostrar":false,"required":false},"dni_productor_correccion":{"disabled":false,"mostrar":false,"required":false},"foto_productor":{"disabled":false,"mostrar":false,"required":false},"foto_productor_correccion":{"disabled":false,"mostrar":false,"required":false},"constancia_afip":{"disabled":false,"mostrar":false,"required":false},"constancia_afip_correccion":{"disabled":false,"mostrar":false,"required":false},"autorizacion_gestor":{"disabled":false,"mostrar":false,"required":false},"autorizacion_gestor_correccion":{"disabled":false,"mostrar":false,"required":false},"paso_catamarca":{"disabled":false,"mostrar":false,"required":false},"boton_catamarca":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();

                        // pagina 9 (pagina mendoza)
                        $nuevo_permiso = new Permission();
                        $nuevo_permiso->id_provincia = $provincia;
                        $nuevo_permiso->accion = $accion ;
                        $nuevo_permiso->id_rol = $rol;
                        $nuevo_permiso->formulario = 1;
                        $nuevo_permiso->pagina = 9;
                        $nuevo_permiso->data = '{"decreto3737":{"disabled":false,"mostrar":false,"required":false},"decreto3737_correccion":{"disabled":false,"mostrar":false,"required":false},"situacion_mina":{"disabled":false,"mostrar":false,"required":false},"situacion_mina_correccion":{"disabled":false,"mostrar":false,"required":false},"concesion_minera_asiento_n":{"disabled":false,"mostrar":false,"required":false},"concesion_minera_fojas":{"disabled":false,"mostrar":false,"required":false},"concesion_minera_tomo_n":{"disabled":false,"mostrar":false,"required":false},"concesion_minera_reg_m_y_d":{"disabled":false,"mostrar":false,"required":false},"concesion_minera_reg_cant":{"disabled":false,"mostrar":false,"required":false},"concesion_minera_reg_men":{"disabled":false,"mostrar":false,"required":false},"concesion_minera_reg_d_y_c":{"disabled":false,"mostrar":false,"required":false},"obs_datos_minas":{"disabled":false,"mostrar":false,"required":false},"paso_mendoza":{"disabled":false,"mostrar":false,"required":false},"boton_mendoza":{"disabled":false,"mostrar":false,"required":false}}';
                        $nuevo_permiso->estado = $estado;
                        $nuevo_permiso->edited_by = 0;
                        $nuevo_permiso->created_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->deleted_at = null;
                        $nuevo_permiso->updated_at = date("Y-m-d H:i:s");
                        $nuevo_permiso->save();
                    } 
                } 
            } 
        }
        echo "listo";
        die();
    }
}
