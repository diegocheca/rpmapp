<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Faker\Factory as Faker;
use Exception;
use Auth;

class FormAltaProductorEvalSalta extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'form_alta_productoresEvalSalta';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'id_formulario_alta_salta',
        'correccion_tipo',
        'observacion_tipo',
        'correccion_representante_legal_apellido',
        'observacion_representante_legal_apellido',
        'correccion_representante_legal_dni',
        'observacion_representante_legal_dni',
        'correccion_representante_legal_email',
        'observacion_representante_legal_email',
        'correccion_representante_legal_cargo',
        'observacion_representante_legal_cargo',
        'correccion_representante_legal_domicilio',
        'observacion_representante_legal_domicilio',
        'correccion_nacionalidad',
        'observacion_nacionalidad',
        'correccion_telefono',
        'observacion_telefono',
        'correccion_superficie_mina',
        'observacion_superficie_mina',
        'correccion_volumenes_de_extraccion_periodo_anterior',
        'observacion_volumenes_de_extraccion_periodo_anterior',
        'correccion_n_resolucion_iia',
        'observacion_n_resolucion_iia',
        'correccion_etapa_de_exploracion',
        'observacion_etapa_de_exploracion',
        'correccion_n_resolucion_aprobacion_informe',
        'observacion_n_resolucion_aprobacion_informe',
        'correccion_etapa_de_exploracion_avanzada',
        'observacion_etapa_de_exploracion_avanzada',
        'correccion_volumenes_anuales_de_materias_primas',
        'observacion_volumenes_anuales_de_materias_primas',
        'correccion_material_obtenido',
        'observacion_material_obtenido',
        'correccion_autorizacion_extractivas_exploratorias',
        'observacion_autorizacion_extractivas_exploratorias',
        'correccion_responsable_nombre',
        'observacion_responsable_nombre',
        'correccion_responsable_apellido',
        'observacion_responsable_apellido',
        'correccion_responsable_dni',
        'observacion_responsable_dni',
        'correccion_responsable_titulo',
        'observacion_responsable_titulo',
        'correccion_responsable_matricula',
        'observacion_responsable_matricula',
        'correccion_ley_24196_numero',
        'observacion_ley_24196_numero',
        'correccion_ley_24196_inscripcion_renar',
        'observacion_ley_24196_inscripcion_renar',
        'correccion_ley_24196_explosivos',
        'observacion_ley_24196_explosivos',
        'correccion_ley_24196_propiedad',
        'observacion_ley_24196_propiedad',
        'correccion_estado_contable',
        'observacion_estado_contable',
        'correccion_listado_de_maquinaria',
        'observacion_listado_de_maquinaria',
        'correccion_regalias',
        'observacion_regalias',
        'correccion_personas_afectadas',
        'observacion_personas_afectadas',
        'correccion_multas',
        'observacion_multas',

        'correccion_representante_legal_nombre',
        'observacion_representante_legal_nombre',
        'correccion_empresas',
        'observacion_empresas',

    ];

    public function change_null_to_nada(){
        if(is_null($this->correccion_tipo)){
            $this->correccion_tipo = 'nada';
        }
        if(is_null($this->correccion_representante_legal_nombre)){
            $this->correccion_representante_legal_nombre = 'nada';
        }
        if(is_null($this->correccion_representante_legal_apellido)){
            $this->correccion_representante_legal_apellido = 'nada';
        }
        if(is_null($this->correccion_representante_legal_dni)){
            $this->correccion_representante_legal_dni = 'nada';
        }
        if(is_null($this->correccion_representante_legal_email)){
            $this->correccion_representante_legal_email = 'nada';
        }
        if(is_null($this->correccion_representante_legal_cargo)){
            $this->correccion_representante_legal_cargo = 'nada';
        }
        if(is_null($this->correccion_representante_legal_domicilio)){
            $this->correccion_representante_legal_domicilio = 'nada';
        }
        if(is_null($this->correccion_nacionalidad)){
            $this->correccion_nacionalidad = 'nada';
        }
        if(is_null($this->correccion_telefono)){
            $this->correccion_telefono = 'nada';
        }
        if(is_null($this->correccion_superficie_mina)){
            $this->correccion_superficie_mina = 'nada';
        }
        if(is_null($this->correccion_volumenes_de_extraccion_periodo_anterior)){
            $this->correccion_volumenes_de_extraccion_periodo_anterior = 'nada';
        }
        if(is_null($this->correccion_n_resolucion_iia)==null){
            $this->correccion_n_resolucion_iia = 'nada';
        }
        if(is_null($this->correccion_etapa_de_exploracion)){
            $this->correccion_etapa_de_exploracion = 'nada';
        }
        if(is_null($this->correccion_n_resolucion_aprobacion_informe)){
            $this->correccion_n_resolucion_aprobacion_informe = 'nada';
        }
        if(is_null($this->correccion_etapa_de_exploracion_avanzada)){
            $this->correccion_etapa_de_exploracion_avanzada = 'nada';
        }
        if(is_null($this->correccion_volumenes_anuales_de_materias_primas)){
            $this->correccion_volumenes_anuales_de_materias_primas = 'nada';
        }
        if(is_null($this->correccion_material_obtenido)){
            $this->correccion_material_obtenido = 'nada';
        }
        if(is_null($this->correccion_autorizacion_extractivas_exploratorias)){
            $this->correccion_autorizacion_extractivas_exploratorias = 'nada';
        }
        if(is_null($this->correccion_responsable_nombre)){
            $this->correccion_responsable_nombre = 'nada';
        }
        if(is_null($this->correccion_responsable_apellido)){
            $this->correccion_responsable_apellido = 'nada';
        }
        if(is_null($this->correccion_responsable_dni)){
            $this->correccion_responsable_dni = 'nada';
        }
        if(is_null($this->correccion_responsable_titulo)){
            $this->correccion_responsable_titulo = 'nada';
        }
        if(is_null($this->correccion_responsable_matricula)){
            $this->correccion_responsable_matricula = 'nada';
        }
        if(is_null($this->correccion_ley_24196_numero)){
            $this->correccion_ley_24196_numero = 'nada';
        }
        if(is_null($this->correccion_ley_24196_inscripcion_renar)){
            $this->correccion_ley_24196_inscripcion_renar = 'nada';
        }
        if(is_null($this->correccion_ley_24196_explosivos)){
            $this->correccion_ley_24196_explosivos = null;
        }
        if(is_null($this->correccion_ley_24196_propiedad)){
            $this->correccion_ley_24196_propiedad = 'nada';
        }
        if(is_null($this->correccion_estado_contable)){
            $this->correccion_estado_contable = 'nada';
        }
        if(is_null($this->correccion_listado_de_maquinaria)){
            $this->correccion_listado_de_maquinaria = 'nada';
        }
        if(is_null($this->correccion_regalias)){
            $this->correccion_regalias = 'nada';
        }
        if(is_null($this->correccion_personas_afectadas)){
            $this->correccion_personas_afectadas = 'nada';
        }
        if(is_null($this->correccion_multas)){
            $this->correccion_multas = 'nada';
        }
        if(is_null($this->correccion_empresas)){
            $this->correccion_empresas = 'nada';
        }
    }


    public static function change_nada_to_null_array($array){
        if(is_string($array["correccion_tipo"]) && $array["correccion_tipo"] == 'nada'  ){
            $array["correccion_tipo"]=null;
        }
        if(is_string($array["correccion_representante_legal_nombre"])   && $array["correccion_representante_legal_nombre"] == 'nada' ){
            $array["correccion_representante_legal_nombre"]=null;
        }
        if(is_string($array["correccion_representante_legal_apellido"])   && $array["correccion_representante_legal_apellido"] == 'nada' ){
            $array["correccion_representante_legal_apellido"]=null;
        }
        if(is_string($array["correccion_representante_legal_dni"])   && $array["correccion_representante_legal_dni"] == 'nada' ){
            $array["correccion_representante_legal_dni"]=null;
        }
        if(is_string($array["correccion_representante_legal_email"])   && $array["correccion_representante_legal_email"] == 'nada' ){
            $array["correccion_representante_legal_email"]=null;
        }
        if(is_string($array["correccion_representante_legal_cargo"])   && $array["correccion_representante_legal_cargo"] == 'nada' ){
            $array["correccion_representante_legal_cargo"]=null;
        }
        if(is_string($array["correccion_representante_legal_domicilio"])    && $array["correccion_representante_legal_domicilio"] == 'nada' ){
            $array["correccion_representante_legal_domicilio"]=null;
        }
        if(is_string($array["correccion_nacionalidad"])    && $array["correccion_nacionalidad"] == 'nada' ){
            $array["correccion_nacionalidad"]=null;
        }
        if(is_string($array["correccion_telefono"])    && $array["correccion_telefono"] == 'nada' ){
            $array["correccion_telefono"]=null;
        }
        if(is_string($array["correccion_superficie_mina"])    && $array["correccion_superficie_mina"] == 'nada' ){
            $array["correccion_superficie_mina"]=null;
        }
        if(is_string($array["correccion_volumenes_de_extraccion_periodo_anterior"])    && $array["correccion_volumenes_de_extraccion_periodo_anterior"] == 'nada' ){
            $array["correccion_volumenes_de_extraccion_periodo_anterior"]=null;
        }
        if(is_string($array["correccion_n_resolucion_iia"])&& $array["correccion_n_resolucion_iia"] == 'nada' ){
            $array["correccion_n_resolucion_iia"]=null;
        }
        if(is_string($array["correccion_etapa_de_exploracion"])&& $array["correccion_etapa_de_exploracion"] == 'nada' ){
            $array["correccion_etapa_de_exploracion"]=null;
        }
        if(is_string($array["correccion_n_resolucion_aprobacion_informe"])&& $array["correccion_n_resolucion_aprobacion_informe"] == 'nada' ){
            $array["correccion_n_resolucion_aprobacion_informe"]=null;
        }
        if(is_string($array["correccion_etapa_de_exploracion_avanzada"])&& $array["correccion_etapa_de_exploracion_avanzada"] == 'nada' ){
            $array["correccion_etapa_de_exploracion_avanzada"]=null;
        }
        if(is_string($array["correccion_volumenes_anuales_de_materias_primas"])&& $array["correccion_volumenes_anuales_de_materias_primas"] == 'nada' ){
            $array["correccion_volumenes_anuales_de_materias_primas"]=null;
        }
        if(is_string($array["correccion_material_obtenido"])&& $array["correccion_material_obtenido"] == 'nada' ){
            $array["correccion_material_obtenido"]=null;
        }
        if(is_string($array["correccion_autorizacion_extractivas_exploratorias"])&& $array["correccion_autorizacion_extractivas_exploratorias"] == 'nada' ){
            $array["correccion_autorizacion_extractivas_exploratorias"]=null;
        }
        if(is_string($array["correccion_responsable_nombre"])&& $array["correccion_responsable_nombre"] == 'nada' ){
            $array["correccion_responsable_nombre"]=null;
        }
        if(is_string($array["correccion_responsable_apellido"])&& $array["correccion_responsable_apellido"] == 'nada' ){
            $array["correccion_responsable_apellido"]=null;
        }
        if(is_string($array["correccion_responsable_dni"])&& $array["correccion_responsable_dni"] == 'nada' ){
            $array["correccion_responsable_dni"]=null;
        }
        if(is_string($array["correccion_responsable_titulo"])&& $array["correccion_responsable_titulo"] == 'nada' ){
            $array["correccion_responsable_titulo"]=null;
        }
        if(is_string($array["correccion_responsable_matricula"])&& $array["correccion_responsable_matricula"] == 'nada' ){
            $array["correccion_responsable_matricula"]=null;
        }
        if(is_string($array["correccion_ley_24196_numero"])&& $array["correccion_ley_24196_numero"] == 'nada' ){
            $array["correccion_ley_24196_numero"]=null;
        }
        if(is_string($array["correccion_ley_24196_inscripcion_renar"])&& $array["correccion_ley_24196_inscripcion_renar"] == 'nada' ){
            $array["correccion_ley_24196_inscripcion_renar"]=null;
        }
        if(is_string($array["correccion_ley_24196_explosivos"])&& $array["correccion_ley_24196_explosivos"] == 'nada' ){
            $array["correccion_ley_24196_explosivos"] = null;
        }
        if(is_string($array["correccion_ley_24196_propiedad"])&& $array["correccion_ley_24196_propiedad"] == 'nada' ){
            $array["correccion_ley_24196_propiedad"]=null;
        }
        if(is_string($array["correccion_estado_contable"])&& $array["correccion_estado_contable"] == 'nada' ){
            $array["correccion_estado_contable"]=null;
        }
        if(is_string($array["correccion_listado_de_maquinaria"])&& $array["correccion_listado_de_maquinaria"] == 'nada' ){
            $array["correccion_listado_de_maquinaria"]=null;
        }
        if(is_string($array["correccion_regalias"])&& $array["correccion_regalias"] == 'nada' ){
            $array["correccion_regalias"]=null;
        }
        if(is_string($array["correccion_personas_afectadas"])&& $array["correccion_personas_afectadas"] == 'nada' ){
            $array["correccion_personas_afectadas"]=null;
        }
        if(is_string($array["correccion_multas"])&& $array["correccion_multas"] == 'nada' ){
            $array["correccion_multas"]=null;
        }
        if(is_string($array["correccion_empresas"])&& $array["correccion_empresas"] == 'nada' ){
            $array["correccion_empresas"]=null;
        }

        return $array;
    }

    
    public static function change_true_string_to_true_bool($array){
        if(is_string($array["correccion_tipo"]) && $array["correccion_tipo"] == 'true'  ){
            $array["correccion_tipo"]=true;
        }
        if(is_string($array["correccion_representante_legal_nombre"])   && $array["correccion_representante_legal_nombre"] == 'true' ){
            $array["correccion_representante_legal_nombre"]=true;
        }
        if(is_string($array["correccion_representante_legal_apellido"])   && $array["correccion_representante_legal_apellido"] == 'true' ){
            $array["correccion_representante_legal_apellido"]=true;
        }
        if(is_string($array["correccion_representante_legal_dni"])   && $array["correccion_representante_legal_dni"] == 'true' ){
            $array["correccion_representante_legal_dni"]=true;
        }
        if(is_string($array["correccion_representante_legal_email"])   && $array["correccion_representante_legal_email"] == 'true' ){
            $array["correccion_representante_legal_email"]=true;
        }
        if(is_string($array["correccion_representante_legal_cargo"])   && $array["correccion_representante_legal_cargo"] == 'true' ){
            $array["correccion_representante_legal_cargo"]=true;
        }
        if(is_string($array["correccion_representante_legal_domicilio"])    && $array["correccion_representante_legal_domicilio"] == 'true' ){
            $array["correccion_representante_legal_domicilio"]=true;
        }
        if(is_string($array["correccion_nacionalidad"])    && $array["correccion_nacionalidad"] == 'true' ){
            $array["correccion_nacionalidad"]=true;
        }
        if(is_string($array["correccion_telefono"])    && $array["correccion_telefono"] == 'true' ){
            $array["correccion_telefono"]=true;
        }
        if(is_string($array["correccion_superficie_mina"])    && $array["correccion_superficie_mina"] == 'true' ){
            $array["correccion_superficie_mina"]=true;
        }
        if(is_string($array["correccion_volumenes_de_extraccion_periodo_anterior"])    && $array["correccion_volumenes_de_extraccion_periodo_anterior"] == 'true' ){
            $array["correccion_volumenes_de_extraccion_periodo_anterior"]=true;
        }
        if(is_string($array["correccion_n_resolucion_iia"])&& $array["correccion_n_resolucion_iia"] == 'true' ){
            $array["correccion_n_resolucion_iia"]=true;
        }
        if(is_string($array["correccion_etapa_de_exploracion"])&& $array["correccion_etapa_de_exploracion"] == 'true' ){
            $array["correccion_etapa_de_exploracion"]=true;
        }
        if(is_string($array["correccion_n_resolucion_aprobacion_informe"])&& $array["correccion_n_resolucion_aprobacion_informe"] == 'true' ){
            $array["correccion_n_resolucion_aprobacion_informe"]=true;
        }
        if(is_string($array["correccion_etapa_de_exploracion_avanzada"])&& $array["correccion_etapa_de_exploracion_avanzada"] == 'true' ){
            $array["correccion_etapa_de_exploracion_avanzada"]=true;
        }
        if(is_string($array["correccion_volumenes_anuales_de_materias_primas"])&& $array["correccion_volumenes_anuales_de_materias_primas"] == 'true' ){
            $array["correccion_volumenes_anuales_de_materias_primas"]=true;
        }
        if(is_string($array["correccion_material_obtenido"])&& $array["correccion_material_obtenido"] == 'true' ){
            $array["correccion_material_obtenido"]=true;
        }
        if(is_string($array["correccion_autorizacion_extractivas_exploratorias"])&& $array["correccion_autorizacion_extractivas_exploratorias"] == 'true' ){
            $array["correccion_autorizacion_extractivas_exploratorias"]=true;
        }
        if(is_string($array["correccion_responsable_nombre"])&& $array["correccion_responsable_nombre"] == 'true' ){
            $array["correccion_responsable_nombre"]=true;
        }
        if(is_string($array["correccion_responsable_apellido"])&& $array["correccion_responsable_apellido"] == 'true' ){
            $array["correccion_responsable_apellido"]=true;
        }
        if(is_string($array["correccion_responsable_dni"])&& $array["correccion_responsable_dni"] == 'true' ){
            $array["correccion_responsable_dni"]=true;
        }
        if(is_string($array["correccion_responsable_titulo"])&& $array["correccion_responsable_titulo"] == 'true' ){
            $array["correccion_responsable_titulo"]=true;
        }
        if(is_string($array["correccion_responsable_matricula"])&& $array["correccion_responsable_matricula"] == 'true' ){
            $array["correccion_responsable_matricula"]=true;
        }
        if(is_string($array["correccion_ley_24196_numero"])&& $array["correccion_ley_24196_numero"] == 'true' ){
            $array["correccion_ley_24196_numero"]=true;
        }
        if(is_string($array["correccion_ley_24196_inscripcion_renar"])&& $array["correccion_ley_24196_inscripcion_renar"] == 'true' ){
            $array["correccion_ley_24196_inscripcion_renar"]=true;
        }
        if(is_string($array["correccion_ley_24196_explosivos"])&& $array["correccion_ley_24196_explosivos"] == 'true' ){
            $array["correccion_ley_24196_explosivos"] = true;
        }
        if(is_string($array["correccion_ley_24196_propiedad"])&& $array["correccion_ley_24196_propiedad"] == 'true' ){
            $array["correccion_ley_24196_propiedad"]=true;
        }
        if(is_string($array["correccion_estado_contable"])&& $array["correccion_estado_contable"] == 'true' ){
            $array["correccion_estado_contable"]=true;
        }
        if(is_string($array["correccion_listado_de_maquinaria"])&& $array["correccion_listado_de_maquinaria"] == 'true' ){
            $array["correccion_listado_de_maquinaria"]=true;
        }
        if(is_string($array["correccion_regalias"])&& $array["correccion_regalias"] == 'true' ){
            $array["correccion_regalias"]=true;
        }
        if(is_string($array["correccion_personas_afectadas"])&& $array["correccion_personas_afectadas"] == 'true' ){
            $array["correccion_personas_afectadas"]=true;
        }
        if(is_string($array["correccion_multas"])&& $array["correccion_multas"] == 'true' ){
            $array["correccion_multas"]=true;
        }
        if(is_string($array["correccion_empresas"])&& $array["correccion_empresas"] == 'true' ){
            $array["correccion_empresas"]=true;
        }

        return $array;
    }


    
    public static function change_false_string_to_false_bool($array){
        if(is_string($array["correccion_tipo"]) && $array["correccion_tipo"] == 'false'  ){
            $array["correccion_tipo"]=false;
        }
        if(is_string($array["correccion_representante_legal_nombre"])   && $array["correccion_representante_legal_nombre"] == 'false' ){
            $array["correccion_representante_legal_nombre"]=false;
        }
        if(is_string($array["correccion_representante_legal_apellido"])   && $array["correccion_representante_legal_apellido"] == 'false' ){
            $array["correccion_representante_legal_apellido"]=false;
        }
        if(is_string($array["correccion_representante_legal_dni"])   && $array["correccion_representante_legal_dni"] == 'false' ){
            $array["correccion_representante_legal_dni"]=false;
        }
        if(is_string($array["correccion_representante_legal_email"])   && $array["correccion_representante_legal_email"] == 'false' ){
            $array["correccion_representante_legal_email"]=false;
        }
        if(is_string($array["correccion_representante_legal_cargo"])   && $array["correccion_representante_legal_cargo"] == 'false' ){
            $array["correccion_representante_legal_cargo"]=false;
        }
        if(is_string($array["correccion_representante_legal_domicilio"])    && $array["correccion_representante_legal_domicilio"] == 'false' ){
            $array["correccion_representante_legal_domicilio"]=false;
        }
        if(is_string($array["correccion_nacionalidad"])    && $array["correccion_nacionalidad"] == 'false' ){
            $array["correccion_nacionalidad"]=false;
        }
        if(is_string($array["correccion_telefono"])    && $array["correccion_telefono"] == 'false' ){
            $array["correccion_telefono"]=false;
        }
        if(is_string($array["correccion_superficie_mina"])    && $array["correccion_superficie_mina"] == 'false' ){
            $array["correccion_superficie_mina"]=false;
        }
        if(is_string($array["correccion_volumenes_de_extraccion_periodo_anterior"])    && $array["correccion_volumenes_de_extraccion_periodo_anterior"] == 'false' ){
            $array["correccion_volumenes_de_extraccion_periodo_anterior"]=false;
        }
        if(is_string($array["correccion_n_resolucion_iia"])&& $array["correccion_n_resolucion_iia"] == 'false' ){
            $array["correccion_n_resolucion_iia"]=false;
        }
        if(is_string($array["correccion_etapa_de_exploracion"])&& $array["correccion_etapa_de_exploracion"] == 'false' ){
            $array["correccion_etapa_de_exploracion"]=false;
        }
        if(is_string($array["correccion_n_resolucion_aprobacion_informe"])&& $array["correccion_n_resolucion_aprobacion_informe"] == 'false' ){
            $array["correccion_n_resolucion_aprobacion_informe"]=false;
        }
        if(is_string($array["correccion_etapa_de_exploracion_avanzada"])&& $array["correccion_etapa_de_exploracion_avanzada"] == 'false' ){
            $array["correccion_etapa_de_exploracion_avanzada"]=false;
        }
        if(is_string($array["correccion_volumenes_anuales_de_materias_primas"])&& $array["correccion_volumenes_anuales_de_materias_primas"] == 'false' ){
            $array["correccion_volumenes_anuales_de_materias_primas"]=false;
        }
        if(is_string($array["correccion_material_obtenido"])&& $array["correccion_material_obtenido"] == 'false' ){
            $array["correccion_material_obtenido"]=false;
        }
        if(is_string($array["correccion_autorizacion_extractivas_exploratorias"])&& $array["correccion_autorizacion_extractivas_exploratorias"] == 'false' ){
            $array["correccion_autorizacion_extractivas_exploratorias"]=false;
        }
        if(is_string($array["correccion_responsable_nombre"])&& $array["correccion_responsable_nombre"] == 'false' ){
            $array["correccion_responsable_nombre"]=false;
        }
        if(is_string($array["correccion_responsable_apellido"])&& $array["correccion_responsable_apellido"] == 'false' ){
            $array["correccion_responsable_apellido"]=false;
        }
        if(is_string($array["correccion_responsable_dni"])&& $array["correccion_responsable_dni"] == 'false' ){
            $array["correccion_responsable_dni"]=false;
        }
        if(is_string($array["correccion_responsable_titulo"])&& $array["correccion_responsable_titulo"] == 'false' ){
            $array["correccion_responsable_titulo"]=false;
        }
        if(is_string($array["correccion_responsable_matricula"])&& $array["correccion_responsable_matricula"] == 'false' ){
            $array["correccion_responsable_matricula"]=false;
        }
        if(is_string($array["correccion_ley_24196_numero"])&& $array["correccion_ley_24196_numero"] == 'false' ){
            $array["correccion_ley_24196_numero"]=false;
        }
        if(is_string($array["correccion_ley_24196_inscripcion_renar"])&& $array["correccion_ley_24196_inscripcion_renar"] == 'false' ){
            $array["correccion_ley_24196_inscripcion_renar"]=false;
        }
        if(is_string($array["correccion_ley_24196_explosivos"])&& $array["correccion_ley_24196_explosivos"] == 'false' ){
            $array["correccion_ley_24196_explosivos"] = false;
        }
        if(is_string($array["correccion_ley_24196_propiedad"])&& $array["correccion_ley_24196_propiedad"] == 'false' ){
            $array["correccion_ley_24196_propiedad"]=false;
        }
        if(is_string($array["correccion_estado_contable"])&& $array["correccion_estado_contable"] == 'false' ){
            $array["correccion_estado_contable"]=false;
        }
        if(is_string($array["correccion_listado_de_maquinaria"])&& $array["correccion_listado_de_maquinaria"] == 'false' ){
            $array["correccion_listado_de_maquinaria"]=false;
        }
        if(is_string($array["correccion_regalias"])&& $array["correccion_regalias"] == 'false' ){
            $array["correccion_regalias"]=false;
        }
        if(is_string($array["correccion_personas_afectadas"])&& $array["correccion_personas_afectadas"] == 'false' ){
            $array["correccion_personas_afectadas"]=false;
        }
        if(is_string($array["correccion_multas"])&& $array["correccion_multas"] == 'false' ){
            $array["correccion_multas"]=false;
        }
        if(is_string($array["correccion_empresas"])&& $array["correccion_empresas"] == 'false' ){
            $array["correccion_empresas"]=false;
        }

        return $array;
    }

    public static function limpiar_observaciones($array){
        if($array["correccion_tipo"]!=false){
            $array["observacion_tipo"]=null;
        }
        if($array["correccion_representante_legal_nombre"]!=false){
            $array["observacion_representante_legal_nombre"]=true;
        }
        if($array["correccion_representante_legal_apellido"]!=false){
            $array["observacion_representante_legal_apellido"]=true;
        }
        if($array["correccion_representante_legal_dni"]!=false){
            $array["observacion_representante_legal_dni"]=null;
        }
        if($array["correccion_representante_legal_email"]!=false){
            $array["observacion_representante_legal_email"]=null;
        }
        if($array["correccion_representante_legal_cargo"]!=false){
            $array["observacion_representante_legal_cargo"]=null;
        }
        if($array["correccion_representante_legal_domicilio"]!=false){
            $array["observacion_representante_legal_domicilio"]=null;
        }
        if($array["correccion_nacionalidad"]!=false){
            $array["observacion_nacionalidad"]=null;
        }
        if($array["correccion_telefono"]!=false){
            $array["observacion_telefono"]=null;
        }
        if($array["correccion_superficie_mina"]!=false){
            $array["observacion_superficie_mina"]=null;
        }
        if($array["correccion_volumenes_de_extraccion_periodo_anterior"]!=false){
            $array["observacion_volumenes_de_extraccion_periodo_anterior"]=null;
        }
        if($array["correccion_n_resolucion_iia"]!=false){
            $array["observacion_n_resolucion_iia"]=null;
        }
        if($array["correccion_etapa_de_exploracion"]!=false){
            $array["observacion_etapa_de_exploracion"]=null;
        }
        if($array["correccion_n_resolucion_aprobacion_informe"]!=false){
            $array["observacion_n_resolucion_aprobacion_informe"]=null;
        }
        if($array["correccion_etapa_de_exploracion_avanzada"]!=false){
            $array["observacion_etapa_de_exploracion_avanzada"]=null;
        }
        if($array["correccion_volumenes_anuales_de_materias_primas"]!=false){
            $array["observacion_volumenes_anuales_de_materias_primas"]=null;
        }
        if($array["correccion_material_obtenido"]!=false){
            $array["observacion_material_obtenido"]=null;
        }
        if($array["correccion_autorizacion_extractivas_exploratorias"]!=false){
            $array["observacion_autorizacion_extractivas_exploratorias"]=null;
        }
        if($array["correccion_responsable_nombre"]!=false){
            $array["observacion_responsable_nombre"]=null;
        }
        if($array["correccion_responsable_apellido"]!=false){
            $array["observacion_responsable_apellido"]=null;
        }
        if($array["correccion_responsable_dni"]!=false){
            $array["observacion_responsable_dni"]=null;
        }
        if($array["correccion_responsable_titulo"]!=false){
            $array["observacion_responsable_titulo"]=null;
        }
        if($array["correccion_responsable_matricula"]!=false){
            $array["observacion_responsable_matricula"]=null;
        }
        if($array["correccion_ley_24196_numero"]!=false){
            $array["observacion_ley_24196_numero"]=null;
        }
        if($array["correccion_ley_24196_inscripcion_renar"]!=false){
            $array["observacion_ley_24196_inscripcion_renar"]=null;
        }
        if($array["correccion_ley_24196_explosivos"]!=false){
            $array["observacion_ley_24196_explosivos"] = null;
        }
        if($array["correccion_ley_24196_propiedad"]!=false){
            $array["observacion_ley_24196_propiedad"]=null;
        }
        if($array["correccion_estado_contable"]!=false){
            $array["observacion_estado_contable"]=null;
        }
        if($array["correccion_listado_de_maquinaria"]!=false){
            $array["observacion_listado_de_maquinaria"]=null;
        }
        if($array["correccion_regalias"]!=false){
            $array["observacion_regalias"]=null;
        }
        if($array["correccion_personas_afectadas"]!=false){
            $array["observacion_personas_afectadas"]=null;
        }
        if($array["correccion_multas"]!=false){
            $array["observacion_multas"]=null;
        }
        if($array["correccion_empresas"]!=false){
            $array["observacion_empresas"]=null;
        }

        return $array;
    }


    
    public function crear_nuevo_salta_evaluacion($formulario_salta){

        $formulario_salta  = FormAltaProductorEvalSalta::change_nada_to_null_array($formulario_salta);
        
        $this->id_formulario_alta_salta = $formulario_salta["id_formulario_alta_salta"];


/*

        if($formulario_salta["correccion_tipo"] == 'false'){
            $formulario_salta["correccion_tipo"] = false;
        }
        if($formulario_salta["correccion_representante_legal_nombre"] == 'false'){
            $formulario_salta["correccion_representante_legal_nombre"] = false;
        }
        if($formulario_salta["correccion_representante_legal_apellido"] == 'false'){
            $formulario_salta["correccion_representante_legal_apellido"] = false;
        }
        if($formulario_salta["correccion_representante_legal_dni"] == 'false'){
            $formulario_salta["correccion_representante_legal_dni"] = false;
        }
        if($formulario_salta["correccion_representante_legal_email"] == 'false'){
            $formulario_salta["correccion_representante_legal_email"] = false;
        }
        if($formulario_salta["correccion_representante_legal_cargo"] == 'false'){
            $formulario_salta["correccion_representante_legal_cargo"] = false;
        }
        if($formulario_salta["correccion_representante_legal_domicilio"] == 'false'){
            $formulario_salta["correccion_representante_legal_domicilio"] = false;
        }
        if($formulario_salta["correccion_nacionalidad"] == 'false'){
            $formulario_salta["correccion_nacionalidad"] = false;
        }
        if($formulario_salta["correccion_telefono"] == 'false'){
            $formulario_salta["correccion_telefono"] = false;
        }
        if($formulario_salta["correccion_superficie_mina"] == 'false'){
            $formulario_salta["correccion_superficie_mina"] = false;
        }
        if($formulario_salta["correccion_volumenes_de_extraccion_periodo_anterior"] == 'false'){
            $formulario_salta["correccion_volumenes_de_extraccion_periodo_anterior"] = false;
        }
        if($formulario_salta["correccion_n_resolucion_iia"] == 'false'){
            $formulario_salta["correccion_n_resolucion_iia"] = false;
        }
        if($formulario_salta["correccion_etapa_de_exploracion"] == 'false'){
            $formulario_salta["correccion_etapa_de_exploracion"] = false;
        }
        if($formulario_salta["correccion_n_resolucion_aprobacion_informe"] == 'false'){
            $formulario_salta["correccion_n_resolucion_aprobacion_informe"] = false;
        }
        if($formulario_salta["correccion_etapa_de_exploracion_avanzada"] == 'false'){
            $formulario_salta["correccion_etapa_de_exploracion_avanzada"] = false;
        }
        if($formulario_salta["correccion_volumenes_anuales_de_materias_primas"] == 'false'){
            $formulario_salta["correccion_volumenes_anuales_de_materias_primas"] = false;
        }
        if($formulario_salta["correccion_material_obtenido"] == 'false'){
            $formulario_salta["correccion_material_obtenido"] = false;
        }
        if($formulario_salta["correccion_autorizacion_extractivas_exploratorias"] == 'false'){
            $formulario_salta["correccion_autorizacion_extractivas_exploratorias"] = false;
        }
        if($formulario_salta["correccion_responsable_nombre"] == 'false'){
            $formulario_salta["correccion_responsable_nombre"] = false;
        }
        if($formulario_salta["correccion_responsable_apellido"] == 'false'){
            $formulario_salta["correccion_responsable_apellido"] = false;
        }
        if($formulario_salta["correccion_responsable_dni"] == 'false'){
            $formulario_salta["correccion_responsable_dni"] = false;
        }
        if($formulario_salta["correccion_responsable_titulo"] == 'false'){
            $formulario_salta["correccion_responsable_titulo"] = false;
        }
        if($formulario_salta["correccion_responsable_matricula"] == 'false'){
            $formulario_salta["correccion_responsable_matricula"] = false;
        }
        if($formulario_salta["correccion_ley_24196_numero"] == 'false'){
            $formulario_salta["correccion_ley_24196_numero"] = false;
        }
        if($formulario_salta["correccion_ley_24196_inscripcion_renar"] == 'false'){
            $formulario_salta["correccion_ley_24196_inscripcion_renar"] = false;
        }
        if($formulario_salta["correccion_ley_24196_explosivos"] == 'false'){
            $formulario_salta["correccion_ley_24196_explosivos"] = false;
        }
        if($formulario_salta["correccion_ley_24196_propiedad"] == 'false'){
            $formulario_salta["correccion_ley_24196_propiedad"] = false;
        }
        if($formulario_salta["correccion_estado_contable"] == 'false'){
            $formulario_salta["correccion_estado_contable"] = false;
        }
        if($formulario_salta["correccion_listado_de_maquinaria"] == 'false'){
            $formulario_salta["correccion_listado_de_maquinaria"] = false;
        }
        if($formulario_salta["correccion_regalias"] == 'false'){
            $formulario_salta["correccion_regalias"] = false;
        }
        if($formulario_salta["correccion_personas_afectadas"] == 'false'){
            $formulario_salta["correccion_personas_afectadas"] = false;
        }
        if($formulario_salta["correccion_multas"] == 'false'){
            $formulario_salta["correccion_multas"] = false;
        }

        if($formulario_salta["correccion_empresas"] == 'false'){
            $formulario_salta["correccion_empresas"] = false;
        }











        if($formulario_salta["correccion_tipo"] == 'true'){
            $formulario_salta["correccion_tipo"] = true;
        }
        if($formulario_salta["correccion_representante_legal_nombre"] == 'true'){
            $formulario_salta["correccion_representante_legal_nombre"] = true;
        }
        if($formulario_salta["correccion_representante_legal_apellido"] == 'true'){
            $formulario_salta["correccion_representante_legal_apellido"] = true;
        }
        if($formulario_salta["correccion_representante_legal_dni"] == 'true'){
            $formulario_salta["correccion_representante_legal_dni"] = true;
        }
        if($formulario_salta["correccion_representante_legal_email"] == 'true'){
            $formulario_salta["correccion_representante_legal_email"] = true;
        }
        if($formulario_salta["correccion_representante_legal_cargo"] == 'true'){
            $formulario_salta["correccion_representante_legal_cargo"] = true;
        }
        if($formulario_salta["correccion_representante_legal_domicilio"] == 'true'){
            $formulario_salta["correccion_representante_legal_domicilio"] = true;
        }
        if($formulario_salta["correccion_nacionalidad"] == 'true'){
            $formulario_salta["correccion_nacionalidad"] = true;
        }
        if($formulario_salta["correccion_telefono"] == 'true'){
            $formulario_salta["correccion_telefono"] = true;
        }
        if($formulario_salta["correccion_superficie_mina"] == 'true'){
            $formulario_salta["correccion_superficie_mina"] = true;
        }
        if($formulario_salta["correccion_volumenes_de_extraccion_periodo_anterior"] == 'true'){
            $formulario_salta["correccion_volumenes_de_extraccion_periodo_anterior"] = true;
        }
        if($formulario_salta["correccion_n_resolucion_iia"] == 'true'){
            $formulario_salta["correccion_n_resolucion_iia"] = true;
        }
        if($formulario_salta["correccion_etapa_de_exploracion"] == 'true'){
            $formulario_salta["correccion_etapa_de_exploracion"] = true;
        }
        if($formulario_salta["correccion_n_resolucion_aprobacion_informe"] == 'true'){
            $formulario_salta["correccion_n_resolucion_aprobacion_informe"] = true;
        }
        if($formulario_salta["correccion_etapa_de_exploracion_avanzada"] == 'true'){
            $formulario_salta["correccion_etapa_de_exploracion_avanzada"] = true;
        }
        if($formulario_salta["correccion_volumenes_anuales_de_materias_primas"] == 'true'){
            $formulario_salta["correccion_volumenes_anuales_de_materias_primas"] = true;
        }
        if($formulario_salta["correccion_material_obtenido"] == 'true'){
            $formulario_salta["correccion_material_obtenido"] = true;
        }
        if($formulario_salta["correccion_autorizacion_extractivas_exploratorias"] == 'true'){
            $formulario_salta["correccion_autorizacion_extractivas_exploratorias"] = true;
        }
        if($formulario_salta["correccion_responsable_nombre"] == 'true'){
            $formulario_salta["correccion_responsable_nombre"] = true;
        }
        if($formulario_salta["correccion_responsable_apellido"] == 'true'){
            $formulario_salta["correccion_responsable_apellido"] = true;
        }
        if($formulario_salta["correccion_responsable_dni"] == 'true'){
            $formulario_salta["correccion_responsable_dni"] = true;
        }
        if($formulario_salta["correccion_responsable_titulo"] == 'true'){
            $formulario_salta["correccion_responsable_titulo"] = true;
        }
        if($formulario_salta["correccion_responsable_matricula"] == 'true'){
            $formulario_salta["correccion_responsable_matricula"] = true;
        }
        if($formulario_salta["correccion_ley_24196_numero"] == 'true'){
            $formulario_salta["correccion_ley_24196_numero"] = true;
        }
        if($formulario_salta["correccion_ley_24196_inscripcion_renar"] == 'true'){
            $formulario_salta["correccion_ley_24196_inscripcion_renar"] = true;
        }
        if($formulario_salta["correccion_ley_24196_explosivos"] == 'true'){
            $formulario_salta["correccion_ley_24196_explosivos"] = true;
        }
        if($formulario_salta["correccion_ley_24196_propiedad"] == 'true'){
            $formulario_salta["correccion_ley_24196_propiedad"] = true;
        }
        if($formulario_salta["correccion_estado_contable"] == 'true'){
            $formulario_salta["correccion_estado_contable"] = true;
        }
        if($formulario_salta["correccion_listado_de_maquinaria"] == 'true'){
            $formulario_salta["correccion_listado_de_maquinaria"] = true;
        }
        if($formulario_salta["correccion_regalias"] == 'true'){
            $formulario_salta["correccion_regalias"] = true;
        }
        if($formulario_salta["correccion_personas_afectadas"] == 'true'){
            $formulario_salta["correccion_personas_afectadas"] = true;
        }
        if($formulario_salta["correccion_multas"] == 'true'){
            $formulario_salta["correccion_multas"] = true;
        }

        if($formulario_salta["correccion_empresas"] == 'true'){
            $formulario_salta["correccion_empresas"] = true;
        }

*/



        $this->correccion_tipo = $formulario_salta["correccion_tipo"];
        $this->observacion_tipo = $formulario_salta["observacion_tipo"];
        $this->correccion_representante_legal_nombre = $formulario_salta["correccion_representante_legal_nombre"];
        $this->observacion_representante_legal_nombre = $formulario_salta["observacion_representante_legal_nombre"];

        
        $this->correccion_representante_legal_apellido = $formulario_salta["correccion_representante_legal_apellido"];
        $this->observacion_representante_legal_apellido = $formulario_salta["observacion_representante_legal_apellido"];
        $this->correccion_representante_legal_dni = $formulario_salta["correccion_representante_legal_dni"];
        $this->observacion_representante_legal_dni = $formulario_salta["observacion_representante_legal_dni"];
        $this->correccion_representante_legal_email = $formulario_salta["correccion_representante_legal_email"];
        $this->observacion_representante_legal_email = $formulario_salta["observacion_representante_legal_email"];
        $this->correccion_representante_legal_cargo = $formulario_salta["correccion_representante_legal_cargo"];
        $this->observacion_representante_legal_cargo = $formulario_salta["observacion_representante_legal_cargo"];
        $this->correccion_representante_legal_domicilio = $formulario_salta["correccion_representante_legal_domicilio"];
        $this->observacion_representante_legal_domicilio = $formulario_salta["observacion_representante_legal_domicilio"];
        $this->correccion_nacionalidad = $formulario_salta["correccion_nacionalidad"];
        $this->observacion_nacionalidad = $formulario_salta["observacion_nacionalidad"];
        $this->correccion_telefono = $formulario_salta["correccion_telefono"];
        $this->observacion_telefono = $formulario_salta["observacion_telefono"];
        $this->correccion_superficie_mina = $formulario_salta["correccion_superficie_mina"];
        $this->observacion_superficie_mina = $formulario_salta["observacion_superficie_mina"];
        $this->correccion_volumenes_de_extraccion_periodo_anterior = $formulario_salta["correccion_volumenes_de_extraccion_periodo_anterior"];
        $this->observacion_volumenes_de_extraccion_periodo_anterior = $formulario_salta["observacion_volumenes_de_extraccion_periodo_anterior"];
        $this->correccion_n_resolucion_iia = $formulario_salta["correccion_n_resolucion_iia"];
        $this->observacion_n_resolucion_iia = $formulario_salta["observacion_n_resolucion_iia"];
        $this->correccion_etapa_de_exploracion = $formulario_salta["correccion_etapa_de_exploracion"];
        $this->observacion_etapa_de_exploracion = $formulario_salta["observacion_etapa_de_exploracion"];
        $this->correccion_n_resolucion_aprobacion_informe = $formulario_salta["correccion_n_resolucion_aprobacion_informe"];
        $this->observacion_n_resolucion_aprobacion_informe = $formulario_salta["observacion_n_resolucion_aprobacion_informe"];
        $this->correccion_etapa_de_exploracion_avanzada = $formulario_salta["correccion_etapa_de_exploracion_avanzada"];
        $this->observacion_etapa_de_exploracion_avanzada = $formulario_salta["observacion_etapa_de_exploracion_avanzada"];
        $this->correccion_volumenes_anuales_de_materias_primas = $formulario_salta["correccion_volumenes_anuales_de_materias_primas"];
        $this->observacion_volumenes_anuales_de_materias_primas = $formulario_salta["observacion_volumenes_anuales_de_materias_primas"];
        $this->correccion_material_obtenido = $formulario_salta["correccion_material_obtenido"];
        $this->observacion_material_obtenido = $formulario_salta["observacion_material_obtenido"];
        $this->correccion_autorizacion_extractivas_exploratorias = $formulario_salta["correccion_autorizacion_extractivas_exploratorias"];
        $this->observacion_autorizacion_extractivas_exploratorias = $formulario_salta["observacion_autorizacion_extractivas_exploratorias"];
        $this->correccion_responsable_nombre = $formulario_salta["correccion_responsable_nombre"];
        $this->observacion_responsable_nombre = $formulario_salta["observacion_responsable_nombre"];
        $this->correccion_responsable_apellido = $formulario_salta["correccion_responsable_apellido"];
        $this->observacion_responsable_apellido = $formulario_salta["observacion_responsable_apellido"];
        $this->correccion_responsable_dni = $formulario_salta["correccion_responsable_dni"];
        $this->observacion_responsable_dni = $formulario_salta["observacion_responsable_dni"];
        $this->correccion_responsable_titulo = $formulario_salta["correccion_responsable_titulo"];
        $this->observacion_responsable_titulo = $formulario_salta["observacion_responsable_titulo"];
        $this->correccion_responsable_matricula = $formulario_salta["correccion_responsable_matricula"];
        $this->observacion_responsable_matricula = $formulario_salta["observacion_responsable_matricula"];
        $this->correccion_ley_24196_numero = $formulario_salta["correccion_ley_24196_numero"];
        $this->observacion_ley_24196_numero = $formulario_salta["observacion_ley_24196_numero"];
        $this->correccion_ley_24196_inscripcion_renar = $formulario_salta["correccion_ley_24196_inscripcion_renar"];
        $this->observacion_ley_24196_inscripcion_renar = $formulario_salta["observacion_ley_24196_inscripcion_renar"];
        $this->correccion_ley_24196_explosivos = $formulario_salta["correccion_ley_24196_explosivos"];
        $this->observacion_ley_24196_explosivos = $formulario_salta["observacion_ley_24196_explosivos"];
        $this->correccion_ley_24196_propiedad = $formulario_salta["correccion_ley_24196_propiedad"];
        $this->observacion_ley_24196_propiedad = $formulario_salta["observacion_ley_24196_propiedad"];
        $this->correccion_estado_contable = $formulario_salta["correccion_estado_contable"];
        $this->observacion_estado_contable = $formulario_salta["observacion_estado_contable"];
        $this->correccion_listado_de_maquinaria = $formulario_salta["correccion_listado_de_maquinaria"];
        $this->observacion_listado_de_maquinaria = $formulario_salta["observacion_listado_de_maquinaria"];
        $this->correccion_regalias = $formulario_salta["correccion_regalias"];
        $this->observacion_regalias = $formulario_salta["observacion_regalias"];
        $this->correccion_personas_afectadas = $formulario_salta["correccion_personas_afectadas"];
        $this->observacion_personas_afectadas = $formulario_salta["observacion_personas_afectadas"];
        $this->correccion_multas = $formulario_salta["correccion_multas"];
        $this->observacion_multas = $formulario_salta["observacion_multas"];

        $this->correccion_empresas = $formulario_salta["correccion_empresas"];
        $this->observacion_empresas = $formulario_salta["observacion_empresas"];

        $this->created_by = Auth::user()->id;
        $this->updated_by = Auth::user()->id;

        $this->save();
        
    }



    public static function get_evaluacion($id_formulario){
        return FormAltaProductorEvalSalta::find($id_formulario);
    }

    public function update_eval($eval){

        $eval = FormAltaProductorEvalSalta::change_nada_to_null_array($eval);

        $eval = FormAltaProductorEvalSalta::change_true_string_to_true_bool($eval);
        $eval = FormAltaProductorEvalSalta::change_false_string_to_false_bool($eval);

        $eval = FormAltaProductorEvalSalta::limpiar_observaciones($eval);
        

        $this->correccion_tipo = $eval["correccion_tipo"];
        $this->observacion_tipo = $eval["observacion_tipo"];
        $this->correccion_representante_legal_nombre = $eval["correccion_representante_legal_nombre"];
        $this->observacion_representante_legal_nombre = $eval["observacion_representante_legal_nombre"];

        
        $this->correccion_representante_legal_apellido = $eval["correccion_representante_legal_apellido"];
        $this->observacion_representante_legal_apellido = $eval["observacion_representante_legal_apellido"];
        $this->correccion_representante_legal_dni = $eval["correccion_representante_legal_dni"];
        $this->observacion_representante_legal_dni = $eval["observacion_representante_legal_dni"];
        $this->correccion_representante_legal_email = $eval["correccion_representante_legal_email"];
        $this->observacion_representante_legal_email = $eval["observacion_representante_legal_email"];
        $this->correccion_representante_legal_cargo = $eval["correccion_representante_legal_cargo"];
        $this->observacion_representante_legal_cargo = $eval["observacion_representante_legal_cargo"];
        $this->correccion_representante_legal_domicilio = $eval["correccion_representante_legal_domicilio"];
        $this->observacion_representante_legal_domicilio = $eval["observacion_representante_legal_domicilio"];
        $this->correccion_nacionalidad = $eval["correccion_nacionalidad"];
        $this->observacion_nacionalidad = $eval["observacion_nacionalidad"];
        $this->correccion_telefono = $eval["correccion_telefono"];
        $this->observacion_telefono = $eval["observacion_telefono"];
        $this->correccion_superficie_mina = $eval["correccion_superficie_mina"];
        $this->observacion_superficie_mina = $eval["observacion_superficie_mina"];
        $this->correccion_volumenes_de_extraccion_periodo_anterior = $eval["correccion_volumenes_de_extraccion_periodo_anterior"];
        $this->observacion_volumenes_de_extraccion_periodo_anterior = $eval["observacion_volumenes_de_extraccion_periodo_anterior"];
        $this->correccion_n_resolucion_iia = $eval["correccion_n_resolucion_iia"];
        $this->observacion_n_resolucion_iia = $eval["observacion_n_resolucion_iia"];
        $this->correccion_etapa_de_exploracion = $eval["correccion_etapa_de_exploracion"];
        $this->observacion_etapa_de_exploracion = $eval["observacion_etapa_de_exploracion"];
        $this->correccion_n_resolucion_aprobacion_informe = $eval["correccion_n_resolucion_aprobacion_informe"];
        $this->observacion_n_resolucion_aprobacion_informe = $eval["observacion_n_resolucion_aprobacion_informe"];
        $this->correccion_etapa_de_exploracion_avanzada = $eval["correccion_etapa_de_exploracion_avanzada"];
        $this->observacion_etapa_de_exploracion_avanzada = $eval["observacion_etapa_de_exploracion_avanzada"];
        $this->correccion_volumenes_anuales_de_materias_primas = $eval["correccion_volumenes_anuales_de_materias_primas"];
        $this->observacion_volumenes_anuales_de_materias_primas = $eval["observacion_volumenes_anuales_de_materias_primas"];
        $this->correccion_material_obtenido = $eval["correccion_material_obtenido"];
        $this->observacion_material_obtenido = $eval["observacion_material_obtenido"];
        $this->correccion_autorizacion_extractivas_exploratorias = $eval["correccion_autorizacion_extractivas_exploratorias"];
        $this->observacion_autorizacion_extractivas_exploratorias = $eval["observacion_autorizacion_extractivas_exploratorias"];
        $this->correccion_responsable_nombre = $eval["correccion_responsable_nombre"];
        $this->observacion_responsable_nombre = $eval["observacion_responsable_nombre"];
        $this->correccion_responsable_apellido = $eval["correccion_responsable_apellido"];
        $this->observacion_responsable_apellido = $eval["observacion_responsable_apellido"];
        $this->correccion_responsable_dni = $eval["correccion_responsable_dni"];
        $this->observacion_responsable_dni = $eval["observacion_responsable_dni"];
        $this->correccion_responsable_titulo = $eval["correccion_responsable_titulo"];
        $this->observacion_responsable_titulo = $eval["observacion_responsable_titulo"];
        $this->correccion_responsable_matricula = $eval["correccion_responsable_matricula"];
        $this->observacion_responsable_matricula = $eval["observacion_responsable_matricula"];
        $this->correccion_ley_24196_numero = $eval["correccion_ley_24196_numero"];
        $this->observacion_ley_24196_numero = $eval["observacion_ley_24196_numero"];
        $this->correccion_ley_24196_inscripcion_renar = $eval["correccion_ley_24196_inscripcion_renar"];
        $this->observacion_ley_24196_inscripcion_renar = $eval["observacion_ley_24196_inscripcion_renar"];
        $this->correccion_ley_24196_explosivos = $eval["correccion_ley_24196_explosivos"];
        $this->observacion_ley_24196_explosivos = $eval["observacion_ley_24196_explosivos"];
        $this->correccion_ley_24196_propiedad = $eval["correccion_ley_24196_propiedad"];
        $this->observacion_ley_24196_propiedad = $eval["observacion_ley_24196_propiedad"];
        $this->correccion_estado_contable = $eval["correccion_estado_contable"];
        $this->observacion_estado_contable = $eval["observacion_estado_contable"];
        $this->correccion_listado_de_maquinaria = $eval["correccion_listado_de_maquinaria"];
        $this->observacion_listado_de_maquinaria = $eval["observacion_listado_de_maquinaria"];
        $this->correccion_regalias = $eval["correccion_regalias"];
        $this->observacion_regalias = $eval["observacion_regalias"];
        $this->correccion_personas_afectadas = $eval["correccion_personas_afectadas"];
        $this->observacion_personas_afectadas = $eval["observacion_personas_afectadas"];
        $this->correccion_multas = $eval["correccion_multas"];
        $this->observacion_multas = $eval["observacion_multas"];

        $this->correccion_empresas = $eval["correccion_empresas"];
        $this->observacion_empresas = $eval["observacion_empresas"];

        $this->created_by = Auth::user()->id;
        $this->updated_by = Auth::user()->id;

        $this->save();
    }


}
