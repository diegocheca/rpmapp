<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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
            ->groupBy('provincia_id','id')
            ->get();
        /*foreach($datos as $key){
            var_dump($key->provincia_id);
            var_dump( 
                Carbon::createFromFormat('Y-m-d H:i:s',$key->created_at)->format('M d Y') );
            var_dump("---------");
        }
        die();*/
        $acumulador_exportacion = 0;
        $acumulador_provincia = 0;
        $acumulador_otras_provincias = 0;
        $provincias_ya_leidas = array();
        $cantidad_registros = 0;
        foreach($datos as $key){
            //var_dump(json_decode($key->datos)->porcentajes_ventas);die();
            if(array_search($key->provincia_id, $provincias_ya_leidas) ) {
                continue;
            }
            else {
                array_push($provincias_ya_leidas,$key->provincia_id);
                $acumulador_exportacion += json_decode($key->datos)->porcentajes_ventas->exterior;
                $acumulador_provincia += json_decode($key->datos)->porcentajes_ventas->provincia;
                $acumulador_otras_provincias += json_decode($key->datos)->porcentajes_ventas->pais;
                $cantidad_registros++;
            }
        }
        //dd(count($provincias_ya_leidas));
        $datos_front["exportacion"] =  $acumulador_exportacion / $cantidad_registros;  
        $datos_front["otras_prov"] =  $acumulador_otras_provincias / $cantidad_registros;
        $datos_front["prov"] = $acumulador_provincia / $cantidad_registros;
        return $datos_front;
    }

    public function calcular_porcentajes_personas(){
        $datos = $this->select('*')
        ->where('datos', 'not like', '%sin%%datos%')
        ->where('estado', '=', 'success')
        ->orderBy('created_at', 'DESC')
        ->groupBy('provincia_id','id')
        ->get();
        $acumulador_profesionales_permanentes = 0;
        $acumulador_profesionales_contratados = 0;
        $acumulador_otros_permanentes = 0;
        $acumulador_otros_contratados = 0;
        $acumulador_administrativos_permanentes = 0;
        $acumulador_administrativos_contratados = 0;
        $acumulador_obreros_permanentes = 0;
        $acumulador_obreros_contratados = 0;
        $provincias_ya_leidas = array();
        $cantidad_registros = 0;
        $total_de_personas = 0;
        foreach($datos as $key){
            //var_dump(json_decode($key->datos)->porcentajes_ventas);die();
            if(array_search($key->provincia_id, $provincias_ya_leidas) ) {
                continue;
            }
            else {
                array_push($provincias_ya_leidas,$key->provincia_id);
                $acumulador_profesionales_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes->profesionales;
                $acumulador_profesionales_contratados += json_decode($key->datos)->porcentajes_personas->transitorios->profesionales;
                $acumulador_otros_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes->otros;
                $acumulador_otros_contratados += json_decode($key->datos)->porcentajes_personas->transitorios->otros;
                $acumulador_administrativos_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes->administrativos;
                $acumulador_administrativos_contratados += json_decode($key->datos)->porcentajes_personas->transitorios->administrativos;
                $acumulador_obreros_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes->obreros;
                $acumulador_obreros_contratados += json_decode($key->datos)->porcentajes_personas->transitorios->obreros;
                $cantidad_registros++;
                $total_de_personas += json_decode($key->datos)->porcentajes_personas->permanentes->profesionales +json_decode($key->datos)->porcentajes_personas->transitorios->profesionales +json_decode($key->datos)->porcentajes_personas->permanentes->otros +json_decode($key->datos)->porcentajes_personas->transitorios->otros +json_decode($key->datos)->porcentajes_personas->permanentes->administrativos +json_decode($key->datos)->porcentajes_personas->transitorios->administrativos +json_decode($key->datos)->porcentajes_personas->permanentes->obreros +json_decode($key->datos)->porcentajes_personas->transitorios->obreros;

            }
        }
        
        $datos_front["acumulador_profesionales_permanentes"] =  ($acumulador_profesionales_permanentes / $total_de_personas)*100;
        $datos_front["acumulador_profesionales_contratados"] =  ($acumulador_profesionales_contratados / $total_de_personas)*100;
        
        $datos_front["acumulador_otros_permanentes"] =  ($acumulador_otros_permanentes / $total_de_personas)*100;
        $datos_front["acumulador_otros_contratados"] =  ($acumulador_otros_contratados / $total_de_personas)*100;
        
        $datos_front["acumulador_administrativos_permanentes"] =  ($acumulador_administrativos_permanentes / $total_de_personas) * 100;
        $datos_front["acumulador_administrativos_contratados"] =  ($acumulador_administrativos_contratados / $total_de_personas) * 100;
        
        $datos_front["acumulador_obreros_permanentes"] =  ($acumulador_obreros_permanentes / $total_de_personas)*100;
        $datos_front["acumulador_obreros_contratados"] =  ($acumulador_obreros_contratados / $total_de_personas)*100;
        //dd($datos_front);

        return $datos_front;
    }

    public function buscar_minerales_por_provincia($id_provincia){
        $datos = $this->select('*')
        ->where('datos', 'not like', '%sin%%datos%')
        ->where('estado', '=', 'success')
        ->where('provincia_id', '=', $id_provincia)
        ->orderBy('created_at', 'DESC')
        ->first();

        //dd($datos->datos);
        $datos = json_decode($datos->datos); 
       // dd((array)$datos->mineralPrimeraCat);
        $datos_front = array();
        /*$datos_front["datos_primer"] = json_decode($datos->mineralPrimeraCat);
        $datos_front["datos_segunda"] = json_decode($datos->mineralSegundaCat);
        $datos_front["datos_tercera"] = json_decode($datos->mineralTerceraCat);

        dd($datos_front);
*/
        return $datos_front;
    }
    
    public function cantidadMineralesPorPais(){
        $datos = $this->select('*')
        ->where('datos', 'not like', '%sin%%datos%')
        ->where('estado', '=', 'success')
        ->orderBy('created_at', 'DESC')
        ->groupBy('provincia_id','id')
        ->get();
        $provincias_ya_leidas = array();
        $cantidad_registros = 0;
        $total_de_personas = 0;
        $datos_front = array();
        foreach($datos as $key){
            if(array_search($key->provincia_id, $provincias_ya_leidas) ) {
                continue;
            }
            else {
                array_push($provincias_ya_leidas,$key->provincia_id);
                $datos_front[$key->provincia_id]["primera"] = json_decode($key->datos)->mineralPrimeraCat;
                $datos_front[$key->provincia_id]["segunda"] = json_decode($key->datos)->mineralSegundaCat;
                $datos_front[$key->provincia_id]["tercera"] = json_decode($key->datos)->mineralTerceraCat;
                $cantidad_registros++;
            }
        }
        return $datos_front;
    }
}