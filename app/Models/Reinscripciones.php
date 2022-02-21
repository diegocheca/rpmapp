<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reinscripciones extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reinscripciones';

    protected $date = ['created_at', 'deleted_at', 'updated_at', 'fecha_vto' ];
    protected $fillable = [
        // 'id_mina',
        'id_productor',
        'fecha_vto',
        'prospeccion',
        'exploracion',
        'explotacion',
        'desarrollo',
        'cantidad_productos',
        'porcentaje_venta_provincia',
        'porcentaje_venta_otras_provincias',
        'porcentaje_exportado',
        'personal_perm_profesional',
        'personal_perm_operarios',
        'personal_perm_administrativos',
        'personal_perm_otros',
        'personal_trans_profesional',
        'personal_trans_operarios',
        'personal_trans_administrativos',
        'personal_trans_otros',
        'nombre',
        'dni',
        'cargo',

        // San Luis
        'id_departamento',
        'id_localidad',
        'subterranea',
        'cielo_abierto',
        'manual',
        'mecanizada',
        'expediente',
        'polvorin',
        'ubicacion',
        'dimensiones',
        'personal_permanente',
        'temporario',
        'total',

        //Catamarca
        'production_checkbox',

        //La Rioja
        'reserva',
        'vida_util',
        'volumen_total',
        'volumen_unitario',
        'volumen_comercializado',
        'procesamiento_mineral',
        'personal_perm_tecnicos',
        'permiso_anmac',
        'fecha_concesion',
        'anios_concesion',
        'inicio_explotacion',

        //Mendoza
        'semimecanizada',
        'compresores',
        'grupo_electrogeno',
        'camion_mineralero',
        'cargadora_frontal',
        'equipo_ventilacion',
        'martillo_neumatico',
        'via_decauville',
        'vagoneta',
        'bomba_desagote',
        'taller_equipado',
        'campamento',
        'vivienda',
        'meses_trabajo',
        'razones_meses_trabajo',

        'created_by',
        'estado',
    ];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'id_reinscripcion');
    }

    public function combustibles()
    {
        return $this->hasMany(ReinscripcionesCombustible::class, 'id_reinscripcion');
    }

    public function explosivos()
    {
        return $this->hasMany(ReinscripcionesExplosivos::class, 'id_reinscripcion');
    }

    public function anexo1()
    {
        return $this->hasMany(ReinscripcionesAnexo1::class, 'id_reinscripcion');
    }

    public function equipos()
    {
        return $this->hasMany(ReinscripcionesEquipos::class, 'id_reinscripcion');
    }

}
