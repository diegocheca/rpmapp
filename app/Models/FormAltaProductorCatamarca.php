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
use App\Models\Constants;


use App\Models\Minerales_Borradores;

class FormAltaProductorCatamarca extends Model
{
    use HasFactory;

    protected $table = 'form_alta_productoresCatamarca';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'gestor_nombre_apellido',
        'gestor_dni',
        'gestor_profesion',
        'gestor_telefono',
        'gestor_notificacion',
        'gestor_email',
        'primer_hoja_dni',
        'segunda_hoja_dni',
        'foto_4x4',
        'constancia_afip',
        'gestor_nombre_apellido_correcto',
        'obs_gestor_nombre_apellido',
        'gestor_dni_correcto',
        'obs_gestor_dni',
        'gestor_profesion_correcto',
        'obs_gestor_profesion',
        'gestor_telefono_correcto',
        'obs_gestor_telefono',
        'gestor_notificacion_correcto',
        'obs_gestor_notificacion',
        'gestor_email_correcto',
        'obs_gestor_email',
        'hoja_dni_correcto',
        'obs_hoja_dni',
        'foto_4x4_correcto',
        'obs_foto_4x4',
        'constancia_afip_correcto',
        'obs_constancia_afip',
        'paso_aprobado',
        'paso_reprobado',
        'paso_progreso',
        'created_by',
        'updated_by',
        'id_formulario_alta',
        'created_at',
        'updated_at',
        'deleted_at',
        'autorizacion_gestor',
        'autorizacion_gestor_correcto',
        'obs_autorizacion_gestor',
    ];
    public function completar_paso_catamarca($gestor_nombre_apellido= null, $gestor_dni= null,$gestor_profesion= null,$gestor_telefono= null,$gestor_notificacion= null,$gestor_email= null,$primer_hoja_dni= null,$segunda_hoja_dni= null,$foto_4x4= null,$constancia_afip= null,$autorizacion_gestor= null,$id_formulario_alta,$id_user){
        $faker = Faker::create();

        if($gestor_nombre_apellido== null){
            $this->gestor_nombre_apellido = $faker->name;
        } else {
            $this->gestor_nombre_apellido = $gestor_nombre_apellido;
        }

        if($gestor_dni== null){
            $this->gestor_dni = $faker->numberBetween(15000000,45999999);
        } else {
            $this->gestor_dni = $gestor_dni;
        }

        if($gestor_profesion== null){
            $this->gestor_profesion = $message = Constants::$cargos[$faker->numberBetween(0,count(Constants::$cargos)-1)];
        } else {
            $this->gestor_profesion = $gestor_profesion;
        }


        if($gestor_telefono== null){
            $this->gestor_telefono = $faker->e164PhoneNumber;
        } else {
            $this->gestor_telefono = $gestor_telefono;
        }

        if($gestor_notificacion== null){
            $this->gestor_notificacion = $faker->boolean;
        } else {
            $this->gestor_notificacion = $gestor_notificacion;
        }

        if($gestor_email== null){
            $this->gestor_email = $faker->gestor_email;
        } else {
            $this->gestor_email = $gestor_email;
        }


        if($primer_hoja_dni== null){
            $this->primer_hoja_dni = null;
        } else {
            $this->primer_hoja_dni = $primer_hoja_dni;
        }

        if($segunda_hoja_dni== null){
            $this->segunda_hoja_dni = null;
        } else {
            $this->segunda_hoja_dni = $segunda_hoja_dni;
        }

        if($foto_4x4== null){
            $this->foto_4x4 = null;
        } else {
            $this->foto_4x4 = $foto_4x4;
        }


        if($constancia_afip== null){
            $this->constancia_afip = null;
        } else {
            $this->constancia_afip = $constancia_afip;
        }


        if($autorizacion_gestor== null){
            $this->autorizacion_gestor = null;
        } else {
            $this->autorizacion_gestor = $autorizacion_gestor;
        }

        $this->paso_aprobado = true;
        $this->paso_reprobado = false;
        $this->paso_progreso = 100;
        $this->created_by = $id_user;
        $this->updated_by = $id_user;
        $this->id_formulario_alta = $id_formulario_alta;
        $this->save();
        return $this->id();
    }
}
