<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class JobRecibo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'job_recibos';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'datos',
        'estado',
        'tabla',
        'provincia_id'
    ];

    public function datos_grafico_ventas(){
        $datos = $this->select('*')
            ->where('datos', 'not like', '%sin%%datos%')
            ->where('estado', '=', 'success')
            ->orderBy('created_at', 'DESC')
            ->groupBy('provincia_id')
            ->get();
        dd($datos);
        $acumulador_exportacion = 0;
        $acumulador_provincia = 0;
        $acumulador_otras_provincias = 0;

        foreach($temporal as $key){
            $acumulador_exportacion += $key->porcentaje_exportado;
            $acumulador_provincia += $key->porcentaje_venta_provincia;
            $acumulador_otras_provincias += $key->porcentaje_venta_otras_provincias;
        }
        $datos["exportacion"] = $temporal->count() > 0 ? $acumulador_exportacion / $temporal->count() : 0;  
        $datos["otras_prov"] = $temporal->count() > 0 ? $acumulador_otras_provincias / $temporal->count() : 0;  
        $datos["prov"] = $temporal->count() > 0 ? $acumulador_provincia / $temporal->count() : 0;  
        return $datos;
    }


}