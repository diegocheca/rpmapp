<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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

    public function cantidad_de_personas_transitorias($id_provincia)
    {
        $datos = [];
        if($id_provincia > 1 && $id_provincia<99) {
            //soy una autoridad de mineria y filtro solo para provincia
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            ->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }
        else {
            //soy visor de buenos aires
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            //->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }

        $acumulador_profesionales_transitorios = 0;
        $acumulador_operarios_tansitorios = 0;
        $acumulador_administrativos_transitorios = 0;
        $acumulador_otros_transitorios = 0;

        foreach($temporal as $key){
            $acumulador_profesionales_transitorios += $key->personal_trans_profesional;
            $acumulador_operarios_tansitorios += $key->personal_trans_operarios;
            $acumulador_administrativos_transitorios += $key->personal_trans_administrativos;
            $acumulador_otros_transitorios += $key->personal_trans_otros;
        }
        $datos["profesionales_transitorios"] = $temporal->count() > 0 ? $acumulador_profesionales_transitorios  : 0;
        $datos["operarios_tansitorios"] = $temporal->count() > 0 ? $acumulador_operarios_tansitorios : 0;
        $datos["administrativos_transitorios"] = $temporal->count() > 0 ? $acumulador_administrativos_transitorios : 0;
        $datos["otros_transitorios"] = $temporal->count() > 0 ? $acumulador_otros_transitorios : 0;

        return $datos;
    }

    public function cantidad_de_personas_permante($id_provincia)
    {
        $datos = [];
        if($id_provincia > 1 && $id_provincia<99) {
            //soy una autoridad de mineria y filtro solo para provincia
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            ->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }
        else {
            //soy visor de buenos aires
            $temporal = DB::table('reinscripciones')
            ->join('productores', 'productores.id', '=', 'reinscripciones.id_productor')
            ->where('reinscripciones.estado', '=', 'aprobada')
            //->where('productores.leal_provincia', '=', $id_provincia)
            ->select('reinscripciones.*')
            ->get();
        }

        $acumulador_profesionales_permanentes = 0;
        $acumulador_operarios_permanentes = 0;
        $acumulador_administrativos_permanentes = 0;
        $acumulador_otros_permanentes = 0;

        foreach($temporal as $key){
            $acumulador_profesionales_permanentes += $key->personal_perm_profesional;
            $acumulador_operarios_permanentes += $key->personal_perm_operarios;
            $acumulador_administrativos_permanentes += $key->personal_perm_administrativos;
            $acumulador_otros_permanentes += $key->personal_perm_otros;
        }
        $datos["profesionales_permanentes"] = $temporal->count() > 0 ? $acumulador_profesionales_permanentes  : 0;
        $datos["operarios_permanentes"] = $temporal->count() > 0 ? $acumulador_operarios_permanentes : 0;
        $datos["administrativos_permanentes"] = $temporal->count() > 0 ? $acumulador_administrativos_permanentes : 0;
        $datos["otros_permanentes"] = $temporal->count() > 0 ? $acumulador_otros_permanentes : 0;

        return $datos;
    }


}
