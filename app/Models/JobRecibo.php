<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Provincias;

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
            ->orderBy('created_at', 'DESC')
            ->groupBy('provincia_id','id')
            ->get();
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
                $acumulador_exportacion += intval( json_decode($key->datos)->porcentajes_ventas[0]->exterior);
                $acumulador_provincia += intval( json_decode($key->datos)->porcentajes_ventas[0]->provincia);
                $acumulador_otras_provincias += intval( json_decode($key->datos)->porcentajes_ventas[0]->pais);
                $cantidad_registros++;
            }
        }
        //dd(count($provincias_ya_leidas));
        if ($cantidad_registros != 0) {
            $datos_front["exportacion"] =  $acumulador_exportacion / $cantidad_registros;  
            $datos_front["otras_prov"] =  $acumulador_otras_provincias / $cantidad_registros;
            $datos_front["prov"] = $acumulador_provincia / $cantidad_registros;
        }
        else {
            $datos_front["exportacion"] = 0;
            $datos_front["otras_prov"] = 0;
            $datos_front["prov"] = 0;
        }
        return $datos_front;
    }

    public function calcular_porcentajes_personas(){
        $datos = $this->select('*')
        ->where('datos', 'not like', '%sin%%datos%')
       //  ->where('estado', '=', 'success')
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
                $acumulador_profesionales_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes[0]->profesionales;
                $acumulador_profesionales_contratados += json_decode($key->datos)->porcentajes_personas->transitorios[0]->profesionales;
                $acumulador_otros_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes[0]->otros;
                $acumulador_otros_contratados += json_decode($key->datos)->porcentajes_personas->transitorios[0]->otros;
                $acumulador_administrativos_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes[0]->administrativos;
                $acumulador_administrativos_contratados += json_decode($key->datos)->porcentajes_personas->transitorios[0]->administrativos;
                $acumulador_obreros_permanentes += json_decode($key->datos)->porcentajes_personas->permanentes[0]->obreros;
                $acumulador_obreros_contratados += json_decode($key->datos)->porcentajes_personas->transitorios[0]->obreros;
                $cantidad_registros++;
                $total_de_personas += json_decode($key->datos)->porcentajes_personas->permanentes[0]->profesionales +json_decode($key->datos)->porcentajes_personas->transitorios[0]->profesionales +json_decode($key->datos)->porcentajes_personas->permanentes[0]->otros +json_decode($key->datos)->porcentajes_personas->transitorios[0]->otros +json_decode($key->datos)->porcentajes_personas->permanentes[0]->administrativos +json_decode($key->datos)->porcentajes_personas->transitorios[0]->administrativos +json_decode($key->datos)->porcentajes_personas->permanentes[0]->obreros +json_decode($key->datos)->porcentajes_personas->transitorios[0]->obreros;

            }
        }
        
        if ($total_de_personas != 0) {
            $datos_front["acumulador_profesionales_permanentes"] =  ($acumulador_profesionales_permanentes / $total_de_personas)*100;
            $datos_front["acumulador_profesionales_contratados"] =  ($acumulador_profesionales_contratados / $total_de_personas)*100;
            
            $datos_front["acumulador_otros_permanentes"] =  ($acumulador_otros_permanentes / $total_de_personas)*100;
            $datos_front["acumulador_otros_contratados"] =  ($acumulador_otros_contratados / $total_de_personas)*100;
            
            $datos_front["acumulador_administrativos_permanentes"] =  ($acumulador_administrativos_permanentes / $total_de_personas) * 100;
            $datos_front["acumulador_administrativos_contratados"] =  ($acumulador_administrativos_contratados / $total_de_personas) * 100;
            
            $datos_front["acumulador_obreros_permanentes"] =  ($acumulador_obreros_permanentes / $total_de_personas)*100;
            $datos_front["acumulador_obreros_contratados"] =  ($acumulador_obreros_contratados / $total_de_personas)*100;
        }
        else {
            $datos_front["acumulador_profesionales_permanentes"] = 0;
            $datos_front["acumulador_profesionales_contratados"] = 0;
            $datos_front["acumulador_otros_permanentes"] = 0;
            $datos_front["acumulador_otros_contratados"] = 0;
            $datos_front["acumulador_administrativos_permanentes"] = 0;
            $datos_front["acumulador_administrativos_contratados"] = 0;
            $datos_front["acumulador_obreros_permanentes"] = 0;
            $datos_front["acumulador_obreros_contratados"] = 0;
        }
        //dd($datos_front);

        return $datos_front;
    }

    public function buscar_minerales_por_provincia($id_provincia){
        $datos = $this->select('*')
        ->where('datos', 'not like', '%sin%%datos%')
       //  ->where('estado', '=', 'success')
        ->where('provincia_id', '=', $id_provincia)
        ->orderBy('created_at', 'DESC')
        ->first();

        //dd($datos->datos);
        if ($datos != null && $datos != false) {
            $datos = json_decode($datos->datos); 
            $datos_front = array();
            return $datos_front;
        }
        else {
            return false;
        }
    }
    
    public function cantidadMineralesPorPais(){
        $provinciaModel = new Provincias();
        $datos = $this->select('*')
        ->where('datos', 'not like', '%sin%%datos%')
       //  ->where('estado', '=', 'success')
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

                $nombre_provincia = $provinciaModel->nombreDeProvinciaPorId($key->provincia_id);
                $datos_front[$cantidad_registros] = array(
                    "nombre" => $nombre_provincia->nombre,
                    "id_provincia" => $key->provincia_id,
                    "primera" =>  json_decode($key->datos)->mineralPrimeraCat,
                    "segunda" => json_decode($key->datos)->mineralSegundaCat,
                    "tercera" => json_decode($key->datos)->mineralTerceraCat
                );
                $cantidad_registros++;
            }
        }
        return $datos_front;
    }
}