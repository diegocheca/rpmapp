<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    

}
