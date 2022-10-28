<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Constants;
use Auth;
use App\Models\FormAltaProductor;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;

use Faker\Factory as Faker;
class FormAltaProductorSalta extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'form_alta_productoresSalta';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
    'id_formulario_alta',
    'tipo',
    'representante_legal_nombre',
    'representante_legal_apellido',
    'representante_legal_dni',
    'representante_legal_email',
    'representante_legal_cargo',
    'representante_legal_domicilio',
    'nacionalidad',
    'telefono',
    'superficie_mina',
    'volumenes_de_extraccion_periodo_anterior',
    'n_resolucion_iia',
    'etapa_de_exploracion',
    'n_resolucion_aprobacion_informe',
    'etapa_de_exploracion_avanzada',
    'volumenes_anuales_de_materias_primas',
    'material_obtenido',
    'autorizacion_extractivas_exploratorias',
    'responsable_nombre',
    'responsable_apellido',
    'responsable_dni',
    'responsable_titulo',
    'responsable_matricula',
    'ley_24196_numero',
    'ley_24196_inscripcion_renar',
    'ley_24196_explosivos',
    'ley_24196_propiedad',
    'estado_contable',
    'listado_de_maquinaria',
    'regalias',
    'personas_afectadas',
    'multas',
    'created_by',
    'updated_by'
    ];


    public static function crear_formulario_fake_salta($id_formulario_alta,$tipo=null,$representante_legal_nombre=null,$representante_legal_apellido=null,$representante_legal_dni=null,$representante_legal_email=null,$representante_legal_cargo=null,$representante_legal_domicilio=null,$nacionalidad=null,$telefono=null,$superficie_mina=null,$volumenes_de_extraccion_periodo_anterior=null,$n_resolucion_iia=null,$etapa_de_exploracion=null,$n_resolucion_aprobacion_informe=null,$etapa_de_exploracion_avanzada=null,$volumenes_anuales_de_materias_primas=null,$material_obtenido=null,$autorizacion_extractivas_exploratorias=null,$responsable_nombre=null,$responsable_apellido=null,$responsable_dni=null,$responsable_titulo=null,$responsable_matricula=null,$ley_24196_numero=null,$ley_24196_inscripcion_renar=null,$ley_24196_explosivos=null,$ley_24196_propiedad=null,$estado_contable=null,$listado_de_maquinaria=null,$regalias=null,$personas_afectadas=null,$multas=null,$created_by=null,$updated_by=null, $id_usuario)
	{
        $faker = Faker::create();
        try {
            $form_borrador = FormAltaProductor::findOrFail($id_formulario_alta);

            $formulario_provisorio = new FormAltaProductorSalta();

            $formulario_provisorio->id_formulario_alta = $id_formulario_alta;

            if ($formulario_provisorio->tipo==null) {
                $formulario_provisorio->tipo = Constants::$tipos_formularios_salta[$faker->numberBetween(0, count(Constants::$tipos_formularios_salta)-1)];
            } else {
                $formulario_provisorio->tipo = $tipo;
            }
            if ($formulario_provisorio->representante_legal_nombre==null) {
                $formulario_provisorio->representante_legal_nombre = $faker->firstName;
            } else {
                $formulario_provisorio->representante_legal_nombre = $representante_legal_nombre;
            }
            if ($formulario_provisorio->representante_legal_apellido==null) {
                $formulario_provisorio->representante_legal_apellido = $faker->lastName;
            } else {
                $formulario_provisorio->representante_legal_apellido = $representante_legal_apellido;
            }
            if ($formulario_provisorio->representante_legal_dni==null) {
                $formulario_provisorio->representante_legal_dni = $faker->numberBetween(15000000, 45999999);
            } else {
                $formulario_provisorio->representante_legal_dni = $representante_legal_dni;
            }
            if ($formulario_provisorio->representante_legal_email==null) {
                $formulario_provisorio->representante_legal_email = $faker->email;
            } else {
                $formulario_provisorio->representante_legal_email = $representante_legal_email;
            }
            if ($formulario_provisorio->representante_legal_cargo==null) {
                $formulario_provisorio->representante_legal_cargo =Constants::$cargos[$faker->numberBetween(0, count(Constants::$cargos)-1)];
            } else {
                $formulario_provisorio->representante_legal_cargo = $representante_legal_cargo;
            }
            if ($formulario_provisorio->representante_legal_domicilio==null) {
                $formulario_provisorio->representante_legal_domicilio = $faker->address;
            } else {
                $formulario_provisorio->representante_legal_domicilio = $representante_legal_domicilio;
            }
            if ($formulario_provisorio->nacionalidad==null) {
                $formulario_provisorio->nacionalidad = "argentino";
            } else {
                $formulario_provisorio->nacionalidad = $nacionalidad;
            }
            if ($formulario_provisorio->telefono==null) {
                $formulario_provisorio->telefono =  $faker->e164PhoneNumber;
            } else {
                $formulario_provisorio->telefono = $telefono;
            }
            if ($formulario_provisorio->superficie_mina==null) {
                $formulario_provisorio->superficie_mina = $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null);
            } else {
                $formulario_provisorio->superficie_mina = $superficie_mina;
            }
            if ($formulario_provisorio->volumenes_de_extraccion_periodo_anterior==null) {
                $formulario_provisorio->volumenes_de_extraccion_periodo_anterior = $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null);
            } else {
                $formulario_provisorio->volumenes_de_extraccion_periodo_anterior = $volumenes_de_extraccion_periodo_anterior;
            }
            if ($formulario_provisorio->n_resolucion_iia==null) {
                $formulario_provisorio->n_resolucion_iia = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->n_resolucion_iia = $n_resolucion_iia;
            }
            if ($formulario_provisorio->etapa_de_exploracion==null) {
                $formulario_provisorio->etapa_de_exploracion = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->etapa_de_exploracion = $etapa_de_exploracion;
            }
            if ($formulario_provisorio->n_resolucion_aprobacion_informe==null) {
                $formulario_provisorio->n_resolucion_aprobacion_informe = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->n_resolucion_aprobacion_informe = $n_resolucion_aprobacion_informe;
            }
            if ($formulario_provisorio->etapa_de_exploracion_avanzada==null) {
                $formulario_provisorio->etapa_de_exploracion_avanzada = '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->etapa_de_exploracion_avanzada = $etapa_de_exploracion_avanzada;
            }
            if ($formulario_provisorio->volumenes_anuales_de_materias_primas==null) {
                $formulario_provisorio->volumenes_anuales_de_materias_primas =  $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null);
            } else {
                $formulario_provisorio->volumenes_anuales_de_materias_primas = $volumenes_anuales_de_materias_primas;
            }
            if ($formulario_provisorio->material_obtenido==null) {
                $formulario_provisorio->material_obtenido =  $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = null);
            } else {
                $formulario_provisorio->material_obtenido = $material_obtenido;
            }
            if ($formulario_provisorio->autorizacion_extractivas_exploratorias==null) {
                $formulario_provisorio->autorizacion_extractivas_exploratorias =  '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->autorizacion_extractivas_exploratorias = $autorizacion_extractivas_exploratorias;
            }
            if ($formulario_provisorio->responsable_nombre==null) {
                $formulario_provisorio->responsable_nombre =  $faker->firstName;
            } else {
                $formulario_provisorio->responsable_nombre = $responsable_nombre;
            }
            if ($formulario_provisorio->responsable_apellido==null) {
                $formulario_provisorio->responsable_apellido = $faker->lastName;
            } else {
                $formulario_provisorio->responsable_apellido = $responsable_apellido;
            }
            if ($formulario_provisorio->responsable_dni==null) {
                $formulario_provisorio->responsable_dni = $faker->numberBetween(15000000, 45999999);
            } else {
                $formulario_provisorio->responsable_dni = $responsable_dni;
            }
            if ($formulario_provisorio->responsable_titulo==null) {
                $formulario_provisorio->responsable_titulo = Constants::$cargos[$faker->numberBetween(0, count(Constants::$cargos)-1)];
            } else {
                $formulario_provisorio->responsable_titulo = $responsable_titulo;
            }
            if ($formulario_provisorio->responsable_matricula==null) {
                $formulario_provisorio->responsable_matricula = $faker->numberBetween(15000000, 45999999);
            } else {
                $formulario_provisorio->responsable_matricula = $responsable_matricula;
            }
            if ($formulario_provisorio->ley_24196_numero==null) {
                $formulario_provisorio->ley_24196_numero = $faker->numberBetween(150, 4599);
            } else {
                $formulario_provisorio->ley_24196_numero = $ley_24196_numero;
            }
            if ($formulario_provisorio->ley_24196_inscripcion_renar==null) {
                $formulario_provisorio->ley_24196_inscripcion_renar = $faker->numberBetween(150, 4599);
            } else {
                $formulario_provisorio->ley_24196_inscripcion_renar = $ley_24196_inscripcion_renar;
            }
            if ($formulario_provisorio->ley_24196_explosivos==null) {
                $formulario_provisorio->ley_24196_explosivos = $faker->numberBetween(150, 4599);
            } else {
                $formulario_provisorio->ley_24196_explosivos = $ley_24196_explosivos;
            }
            if ($formulario_provisorio->ley_24196_propiedad==null) {
                $formulario_provisorio->ley_24196_propiedad = $faker->numberBetween(150, 4599);
            } else {
                $formulario_provisorio->ley_24196_propiedad = $ley_24196_propiedad;
            }
            if ($formulario_provisorio->estado_contable==null) {
                $formulario_provisorio->estado_contable =   '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->estado_contable = $estado_contable;
            }
            if ($formulario_provisorio->listado_de_maquinaria==null) {
                $formulario_provisorio->listado_de_maquinaria =   '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->listado_de_maquinaria = $listado_de_maquinaria;
            }
            if ($formulario_provisorio->regalias==null) {
                $formulario_provisorio->regalias =   '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->regalias = $regalias;
            }

            if ($formulario_provisorio->personas_afectadas==null) {
                $formulario_provisorio->personas_afectadas =   '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->personas_afectadas = $personas_afectadas;
            }

            if ($formulario_provisorio->multas==null) {
                $formulario_provisorio->multas =  '/storage/files_formularios/fake_pdfs/'.$faker->numberBetween(0, 388).'.pdf';
            } else {
                $formulario_provisorio->multas = $multas;
            }
            $formulario_provisorio->created_by = $id_usuario;
            $formulario_provisorio->updated_by = $id_usuario;

            $formulario_provisorio->save();

            return (["success",$formulario_provisorio->id]);
        } catch(ModelNotFoundException $e) {
            //dd(get_class_methods($e)); // lists all available methods for exception object
            return (["error",$e]);
        }
    }
    public static function crear_formulario_salta($id_formulario_alta,$tipo=null,$representante_legal_nombre=null,$representante_legal_apellido=null,$representante_legal_dni=null,$representante_legal_email=null,$representante_legal_cargo=null,$representante_legal_domicilio=null,$nacionalidad=null,$telefono=null,$superficie_mina=null,$volumenes_de_extraccion_periodo_anterior=null,$n_resolucion_iia=null,$etapa_de_exploracion=null,$n_resolucion_aprobacion_informe=null,$etapa_de_exploracion_avanzada=null,$volumenes_anuales_de_materias_primas=null,$material_obtenido=null,$autorizacion_extractivas_exploratorias=null,$responsable_nombre=null,$responsable_apellido=null,$responsable_dni=null,$responsable_titulo=null,$responsable_matricula=null,$ley_24196_numero=null,$ley_24196_inscripcion_renar=null,$ley_24196_explosivos=null,$ley_24196_propiedad=null,$estado_contable=null,$listado_de_maquinaria=null,$regalias=null,$personas_afectadas=null,$multas=null,$created_by=null,$updated_by=null, $id_usuario)
	{
        try {
                $form_borrador = FormAltaProductor::findOrFail($id_formulario_alta);

                $formulario_provisorio = new FormAltaProductorSalta();

                $formulario_provisorio->id_formulario_alta = $id_formulario_alta;

                $formulario_provisorio->tipo = $tipo;
                $formulario_provisorio->representante_legal_nombre = $representante_legal_nombre;
                $formulario_provisorio->representante_legal_apellido = $representante_legal_apellido;
                $formulario_provisorio->representante_legal_dni = $representante_legal_dni;
                $formulario_provisorio->representante_legal_email = $representante_legal_email;
                $formulario_provisorio->representante_legal_cargo = $representante_legal_cargo;
                $formulario_provisorio->representante_legal_domicilio = $representante_legal_domicilio;
                $formulario_provisorio->nacionalidad = $nacionalidad;
                $formulario_provisorio->telefono = $telefono;
                $formulario_provisorio->superficie_mina = $superficie_mina;
                $formulario_provisorio->volumenes_de_extraccion_periodo_anterior = $volumenes_de_extraccion_periodo_anterior;
                $formulario_provisorio->n_resolucion_iia = $n_resolucion_iia;
                $formulario_provisorio->etapa_de_exploracion = $etapa_de_exploracion;
                $formulario_provisorio->n_resolucion_aprobacion_informe = $n_resolucion_aprobacion_informe;
                $formulario_provisorio->etapa_de_exploracion_avanzada = $etapa_de_exploracion_avanzada;
                $formulario_provisorio->volumenes_anuales_de_materias_primas = $volumenes_anuales_de_materias_primas;
                $formulario_provisorio->material_obtenido = $material_obtenido;
                $formulario_provisorio->autorizacion_extractivas_exploratorias = $autorizacion_extractivas_exploratorias;
                $formulario_provisorio->responsable_nombre = $responsable_nombre;
                $formulario_provisorio->responsable_apellido = $responsable_apellido;
                $formulario_provisorio->responsable_dni = $responsable_dni;
                $formulario_provisorio->responsable_titulo = $responsable_titulo;
                $formulario_provisorio->responsable_matricula = $responsable_matricula;
                $formulario_provisorio->ley_24196_numero = $ley_24196_numero;
                $formulario_provisorio->ley_24196_inscripcion_renar = $ley_24196_inscripcion_renar;
                $formulario_provisorio->ley_24196_explosivos = $ley_24196_explosivos;
                $formulario_provisorio->ley_24196_propiedad = $ley_24196_propiedad;
                $formulario_provisorio->estado_contable = $estado_contable;
                $formulario_provisorio->listado_de_maquinaria = $listado_de_maquinaria;
                $formulario_provisorio->regalias = $regalias;
                $formulario_provisorio->personas_afectadas = $personas_afectadas;
                $formulario_provisorio->multas = $multas;
                $formulario_provisorio->created_by = $id_usuario;
                $formulario_provisorio->updated_by = $id_usuario;

                $formulario_provisorio->save();

            return (["success",$formulario_provisorio->id]);
        } catch(ModelNotFoundException $e) {
            return (["error",$e]);
        }
    }


    public static function crear_formulario_salta_all($formulario_salta,$id_formulario_alta)
	{
        try {
                $form_borrador = FormAltaProductor::findOrFail($id_formulario_alta);

                $formulario_provisorio = new FormAltaProductorSalta();

                $formulario_provisorio->id_formulario_alta = $id_formulario_alta;

                $formulario_provisorio->tipo = $formulario_salta["tipo"];
                $formulario_provisorio->representante_legal_nombre = $formulario_salta["representante_legal_nombre"];
                $formulario_provisorio->representante_legal_apellido = $formulario_salta["representante_legal_apellido"];
                $formulario_provisorio->representante_legal_dni = $formulario_salta["representante_legal_dni"];
                $formulario_provisorio->representante_legal_email = $formulario_salta["representante_legal_email"];
                $formulario_provisorio->representante_legal_cargo = $formulario_salta["representante_legal_cargo"];
                $formulario_provisorio->representante_legal_domicilio = $formulario_salta["representante_legal_domicilio"];
                $formulario_provisorio->nacionalidad = $formulario_salta["nacionalidad"];
                $formulario_provisorio->telefono = $formulario_salta["telefono"];
                $formulario_provisorio->superficie_mina = $formulario_salta["superficie_mina"];
                $formulario_provisorio->volumenes_de_extraccion_periodo_anterior = $formulario_salta["volumenes_de_extraccion_periodo_anterior"];
                $formulario_provisorio->n_resolucion_iia = $formulario_salta["n_resolucion_iia"];
                $formulario_provisorio->etapa_de_exploracion = $formulario_salta["etapa_de_exploracion"];
                $formulario_provisorio->n_resolucion_aprobacion_informe = $formulario_salta["n_resolucion_aprobacion_informe"];
                $formulario_provisorio->etapa_de_exploracion_avanzada = $formulario_salta["etapa_de_exploracion_avanzada"];
                $formulario_provisorio->volumenes_anuales_de_materias_primas = $formulario_salta["volumenes_anuales_de_materias_primas"];
                $formulario_provisorio->material_obtenido = $formulario_salta["material_obtenido"];
                $formulario_provisorio->autorizacion_extractivas_exploratorias = $formulario_salta["autorizacion_extractivas_exploratorias"];
                $formulario_provisorio->responsable_nombre = $formulario_salta["responsable_nombre"];
                $formulario_provisorio->responsable_apellido = $formulario_salta["responsable_apellido"];
                $formulario_provisorio->responsable_dni = $formulario_salta["responsable_dni"];
                $formulario_provisorio->responsable_titulo = $formulario_salta["responsable_titulo"];
                $formulario_provisorio->responsable_matricula = $formulario_salta["responsable_matricula"];
                $formulario_provisorio->ley_24196_numero = $formulario_salta["ley_24196_numero"];
                $formulario_provisorio->ley_24196_inscripcion_renar = $formulario_salta["ley_24196_inscripcion_renar"];
                $formulario_provisorio->ley_24196_explosivos = $formulario_salta["ley_24196_explosivos"];
                $formulario_provisorio->ley_24196_propiedad = $formulario_salta["ley_24196_propiedad"];
                $formulario_provisorio->estado_contable = $formulario_salta["estado_contable"];
                $formulario_provisorio->listado_de_maquinaria = $formulario_salta["listado_de_maquinaria"];
                $formulario_provisorio->regalias = $formulario_salta["regalias"];
                $formulario_provisorio->personas_afectadas = $formulario_salta["personas_afectadas"];
                $formulario_provisorio->multas = $formulario_salta["multas"];
                $formulario_provisorio->created_by = Auth::user()->id;
                $formulario_provisorio->updated_by = Auth::user()->id;

                $formulario_provisorio->save();

            return $formulario_provisorio->id;
        } catch(ModelNotFoundException $e) {
            return (["error",$e]);
        }
    }


    public function update_form($formulario_salta){
        //$this->id_formulario_alta = $formulario_salta["id_formulario_alta"];
        $this->tipo = $formulario_salta["tipo"];
        $this->representante_legal_nombre = $formulario_salta["representante_legal_nombre"];
        $this->representante_legal_apellido = $formulario_salta["representante_legal_apellido"];
        $this->representante_legal_dni = $formulario_salta["representante_legal_dni"];
        $this->representante_legal_email = $formulario_salta["representante_legal_email"];
        $this->representante_legal_cargo = $formulario_salta["representante_legal_cargo"];
        $this->representante_legal_domicilio = $formulario_salta["representante_legal_domicilio"];
        $this->nacionalidad = $formulario_salta["nacionalidad"];
        $this->telefono = $formulario_salta["telefono"];
        $this->superficie_mina = $formulario_salta["superficie_mina"];
        $this->volumenes_de_extraccion_periodo_anterior = $formulario_salta["volumenes_de_extraccion_periodo_anterior"];
        $this->n_resolucion_iia = $formulario_salta["n_resolucion_iia"];
        $this->etapa_de_exploracion = $formulario_salta["etapa_de_exploracion"];
        $this->n_resolucion_aprobacion_informe = $formulario_salta["n_resolucion_aprobacion_informe"];
        $this->etapa_de_exploracion_avanzada = $formulario_salta["etapa_de_exploracion_avanzada"];
        $this->volumenes_anuales_de_materias_primas = $formulario_salta["volumenes_anuales_de_materias_primas"];
        $this->material_obtenido = $formulario_salta["material_obtenido"];
        $this->autorizacion_extractivas_exploratorias = $formulario_salta["autorizacion_extractivas_exploratorias"];
        $this->responsable_nombre = $formulario_salta["responsable_nombre"];
        $this->responsable_apellido = $formulario_salta["responsable_apellido"];
        $this->responsable_dni = $formulario_salta["responsable_dni"];
        $this->responsable_titulo = $formulario_salta["responsable_titulo"];
        $this->responsable_matricula = $formulario_salta["responsable_matricula"];
        $this->ley_24196_numero = $formulario_salta["ley_24196_numero"];
        $this->ley_24196_inscripcion_renar = $formulario_salta["ley_24196_inscripcion_renar"];
        $this->ley_24196_explosivos = $formulario_salta["ley_24196_explosivos"];
        $this->ley_24196_propiedad = $formulario_salta["ley_24196_propiedad"];
        $this->estado_contable = $formulario_salta["estado_contable"];
        $this->listado_de_maquinaria = $formulario_salta["listado_de_maquinaria"];
        $this->regalias = $formulario_salta["regalias"];
        $this->personas_afectadas = $formulario_salta["personas_afectadas"];
        $this->multas = $formulario_salta["multas"];
        $this->created_by = Auth::user()->id;
        $this->updated_by = Auth::user()->id;
        return $this->save();
    }
    

}
