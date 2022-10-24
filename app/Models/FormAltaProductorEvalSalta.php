<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Faker\Factory as Faker;
use Exception;


class FormAltaProductorEvalSalta extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'form_alta_productoresMendoza';
    protected $date = ['created_by','created_at', 'deleted_at', 'updated_at'];
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
        'observacion_multas'
    ];


    public function crear_nuevo_salta_evaluacion($formualrio_salta){
        //$this->id_formulario_alta_salta = $formulario_salta->id_formulario_alta_salta;
        $this->correccion_tipo = $formulario_salta->correccion_tipo;
        $this->observacion_tipo = $formulario_salta->observacion_tipo;
        $this->correccion_representante_legal_apellido = $formulario_salta->correccion_representante_legal_apellido;
        $this->observacion_representante_legal_apellido = $formulario_salta->observacion_representante_legal_apellido;
        $this->correccion_representante_legal_dni = $formulario_salta->correccion_representante_legal_dni;
        $this->observacion_representante_legal_dni = $formulario_salta->observacion_representante_legal_dni;
        $this->correccion_representante_legal_email = $formulario_salta->correccion_representante_legal_email;
        $this->observacion_representante_legal_email = $formulario_salta->observacion_representante_legal_email;
        $this->correccion_representante_legal_cargo = $formulario_salta->correccion_representante_legal_cargo;
        $this->observacion_representante_legal_cargo = $formulario_salta->observacion_representante_legal_cargo;
        $this->correccion_representante_legal_domicilio = $formulario_salta->correccion_representante_legal_domicilio;
        $this->observacion_representante_legal_domicilio = $formulario_salta->observacion_representante_legal_domicilio;
        $this->correccion_nacionalidad = $formulario_salta->correccion_nacionalidad;
        $this->observacion_nacionalidad = $formulario_salta->observacion_nacionalidad;
        $this->correccion_telefono = $formulario_salta->correccion_telefono;
        $this->observacion_telefono = $formulario_salta->observacion_telefono;
        $this->correccion_superficie_mina = $formulario_salta->correccion_superficie_mina;
        $this->observacion_superficie_mina = $formulario_salta->observacion_superficie_mina;
        $this->correccion_volumenes_de_extraccion_periodo_anterior = $formulario_salta->correccion_volumenes_de_extraccion_periodo_anterior;
        $this->observacion_volumenes_de_extraccion_periodo_anterior = $formulario_salta->observacion_volumenes_de_extraccion_periodo_anterior;
        $this->correccion_n_resolucion_iia = $formulario_salta->correccion_n_resolucion_iia;
        $this->observacion_n_resolucion_iia = $formulario_salta->observacion_n_resolucion_iia;
        $this->correccion_etapa_de_exploracion = $formulario_salta->correccion_etapa_de_exploracion;
        $this->observacion_etapa_de_exploracion = $formulario_salta->observacion_etapa_de_exploracion;
        $this->correccion_n_resolucion_aprobacion_informe = $formulario_salta->correccion_n_resolucion_aprobacion_informe;
        $this->observacion_n_resolucion_aprobacion_informe = $formulario_salta->observacion_n_resolucion_aprobacion_informe;
        $this->correccion_etapa_de_exploracion_avanzada = $formulario_salta->correccion_etapa_de_exploracion_avanzada;
        $this->observacion_etapa_de_exploracion_avanzada = $formulario_salta->observacion_etapa_de_exploracion_avanzada;
        $this->correccion_volumenes_anuales_de_materias_primas = $formulario_salta->correccion_volumenes_anuales_de_materias_primas;
        $this->observacion_volumenes_anuales_de_materias_primas = $formulario_salta->observacion_volumenes_anuales_de_materias_primas;
        $this->correccion_material_obtenido = $formulario_salta->correccion_material_obtenido;
        $this->observacion_material_obtenido = $formulario_salta->observacion_material_obtenido;
        $this->correccion_autorizacion_extractivas_exploratorias = $formulario_salta->correccion_autorizacion_extractivas_exploratorias;
        $this->observacion_autorizacion_extractivas_exploratorias = $formulario_salta->observacion_autorizacion_extractivas_exploratorias;
        $this->correccion_responsable_nombre = $formulario_salta->correccion_responsable_nombre;
        $this->observacion_responsable_nombre = $formulario_salta->observacion_responsable_nombre;
        $this->correccion_responsable_apellido = $formulario_salta->correccion_responsable_apellido;
        $this->observacion_responsable_apellido = $formulario_salta->observacion_responsable_apellido;
        $this->correccion_responsable_dni = $formulario_salta->correccion_responsable_dni;
        $this->observacion_responsable_dni = $formulario_salta->observacion_responsable_dni;
        $this->correccion_responsable_titulo = $formulario_salta->correccion_responsable_titulo;
        $this->observacion_responsable_titulo = $formulario_salta->observacion_responsable_titulo;
        $this->correccion_responsable_matricula = $formulario_salta->correccion_responsable_matricula;
        $this->observacion_responsable_matricula = $formulario_salta->observacion_responsable_matricula;
        $this->correccion_ley_24196_numero = $formulario_salta->correccion_ley_24196_numero;
        $this->observacion_ley_24196_numero = $formulario_salta->observacion_ley_24196_numero;
        $this->correccion_ley_24196_inscripcion_renar = $formulario_salta->correccion_ley_24196_inscripcion_renar;
        $this->observacion_ley_24196_inscripcion_renar = $formulario_salta->observacion_ley_24196_inscripcion_renar;
        $this->correccion_ley_24196_explosivos = $formulario_salta->correccion_ley_24196_explosivos;
        $this->observacion_ley_24196_explosivos = $formulario_salta->observacion_ley_24196_explosivos;
        $this->correccion_ley_24196_propiedad = $formulario_salta->correccion_ley_24196_propiedad;
        $this->observacion_ley_24196_propiedad = $formulario_salta->observacion_ley_24196_propiedad;
        $this->correccion_estado_contable = $formulario_salta->correccion_estado_contable;
        $this->observacion_estado_contable = $formulario_salta->observacion_estado_contable;
        $this->correccion_listado_de_maquinaria = $formulario_salta->correccion_listado_de_maquinaria;
        $this->observacion_listado_de_maquinaria = $formulario_salta->observacion_listado_de_maquinaria;
        $this->correccion_regalias = $formulario_salta->correccion_regalias;
        $this->observacion_regalias = $formulario_salta->observacion_regalias;
        $this->correccion_personas_afectadas = $formulario_salta->correccion_personas_afectadas;
        $this->observacion_personas_afectadas = $formulario_salta->observacion_personas_afectadas;
        $this->correccion_multas = $formulario_salta->correccion_multas;
        $this->observacion_multas = $formulario_salta->observacion_multas;
        $this->save();
        
    }

    public static function get_form_salta($id_formulario){
        return FormAltaProductorEvalSalta::find($id_formulario);
    }


}
