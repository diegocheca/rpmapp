<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Faker\Factory as Faker;
use Exception;
class FormAltaProductorMendoza extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'form_alta_productoresMendoza';
    protected $date = ['created_by','created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'id_formulario_alta',
        'decreto3737',
        'decreto3737_correcto',
        'obs_decreto3737',
        'situacion_mina',
        'situacion_mina_correcto',
        'obs_situacion_mina',
        'concesion_minera_asiento_n',
        'concesion_minera_fojas',
        'concesion_minera_tomo_n',
        'concesion_minera_reg_m_y_d',
        'concesion_minera_reg_cant',
        'concesion_minera_reg_men',
        'concesion_minera_reg_d_y_c',
        'obs_concesion_minera_reg_d_y_c',
        'concesion_minera_reg_d_y_c_correcto',
        
		'paso_mend_progreso',
		'paso_mend_aprobado',
		'paso_mend_reprobado',
        'created_by',
    ];


    public function completar_y_guardar_formu_fake($id_formulario,$id_usuario){
        $faker = Faker::create();
        try {
            //validations 
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $formulario_provisorio_general = FormAltaProductor::findOrFail($id_formulario);
            if ($formulario_provisorio_general != null) {
                //significa que existe el formulario padre, ahora reviso el form de mendz
                //$formulario_provisorio = new FormAltaProductorMendoza();
                $this->id_formulario_alta = $id_formulario;
                $this->decreto3737 =  $faker->text($maxNbChars = 50);
                $this->situacion_mina = $faker->text($maxNbChars = 50);
                $this->concesion_minera_asiento_n = $faker->text($maxNbChars = 50);
                $this->concesion_minera_fojas =$faker->numberBetween(1,200);
                $this->concesion_minera_tomo_n = $faker->numberBetween(1,200);
                $this->concesion_minera_reg_m_y_d =$faker->text($maxNbChars = 50);
                $this->concesion_minera_reg_cant = $faker->text($maxNbChars = 50);
                $this->concesion_minera_reg_men =$faker->text($maxNbChars = 50);
                $this->concesion_minera_reg_d_y_c =$faker->text($maxNbChars = 50);

                $this->obs_datos_minas =$faker->realText($faker->numberBetween(10,150));

                $this->updated_by =  $id_usuario;
                $this->created_by =  $id_usuario;
                $this->paso_mend_progreso = 100;
                $this->paso_mend_aprobado = 100;
                $this->paso_mend_reprobado = 100;
                $this->updated_at = date("Y-m-d H:i:s");

                $this->save();
                return (["success",$this->id]);
            }
        } catch (Exception $e) {
            return (['error', $e->getMessage()]);
        }

    }

    public function crear_formulario($id_formulario,$id_usuario,$decreto3737,$situacion_mina,$concesion_minera_asiento_n,$concesion_minera_fojas,$concesion_minera_tomo_n,$concesion_minera_reg_m_y_d,$concesion_minera_reg_cant,$concesion_minera_reg_men,$concesion_minera_reg_d_y_c,$observacion){
        try {
            //validations 
            date_default_timezone_set('America/Argentina/Buenos_Aires');
            $formulario_provisorio_general = FormAltaProductor::findOrFail($id_formulario);
            if ($formulario_provisorio_general != null) {
                //significa que existe el formulario padre, ahora reviso el form de mendz
                $formulario_provisorio = new FormAltaProductorMendoza();
                $formulario_provisorio->id_formulario_alta = $id_formulario;
                $formulario_provisorio->decreto3737 =  $decreto3737;
                $formulario_provisorio->situacion_mina = $situacion_mina;
                $formulario_provisorio->concesion_minera_asiento_n = $concesion_minera_asiento_n;
                $formulario_provisorio->concesion_minera_fojas =$$concesion_minera_fojas;
                $formulario_provisorio->concesion_minera_tomo_n = $concesion_minera_tomo_n;
                $formulario_provisorio->concesion_minera_reg_m_y_d =$concesion_minera_reg_m_y_d;
                $formulario_provisorio->concesion_minera_reg_cant = $concesion_minera_reg_cant;
                $formulario_provisorio->concesion_minera_reg_men =$concesion_minera_reg_men;
                $formulario_provisorio->concesion_minera_reg_d_y_c =$concesion_minera_reg_d_y_c;
                $formulario_provisorio->obs_datos_minas =$observacion;
                $formulario_provisorio->updated_by =  $id_usuario;
                $formulario_provisorio->created_by =  $id_usuario;
                $formulario_provisorio->paso_mend_progreso = 100; //sin uso por ahora
                $formulario_provisorio->paso_mend_aprobado = 100; //sin uso por ahora
                $formulario_provisorio->paso_mend_reprobado = 100; //sin uso por ahora
                $formulario_provisorio->save();
                return (["success",$formulario_provisorio]);
            }
        } catch (Exception $e) {
            return (['error', $e->getMessage()]);
        }

    }
    

}
