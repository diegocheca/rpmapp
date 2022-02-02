<?php

namespace App\Console\Commands;

use Auth;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Console\Command;
use App\Models\Productores;
use App\Models\MinaCantera;
use App\Models\Minerales_Borradores;
use App\Models\Reinscripciones;
use App\Models\JobEnvio;
use App\Http\Controllers\FormAltaProductorController;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class JobEnvioCommand extends Command
{
    protected $signature = 'enviar:datos';
    protected $description = 'Este job envía los datos que posee la provincia hacia la bd de nación para la sincronización';
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            # id de la provincia 
            $id_provincia = config('sincronizacion.provincia_id');
            # nombre de la provincia 
            $provincia = config('sincronizacion.provincia');
            # url del servidor de Nación
            $urlServer = config('sincronizacion.servidorNacion');
            # token para el endpoint de nación
            $token = config('sincronizacion.tokenNacion');
            # obtengo fecha y hora para inicio del job 
            $dtInicio = new \DateTime;
            $dtInicio = $dtInicio->format('Y-m-d H:i:s');

            /***** PORCENTAHE DE PERSONAL *****/
            $procentajePersonal = $this->porcPersonal();
            /**********************************/
            /************ MINERALES ***********/
            $arrayMinPrim = $this->cantCategoriasMinerales("primera");
            $arrayMinSec = $this->cantCategoriasMinerales("segunda");
            $arrayMinTer = $this->cantCategoriasMinerales("tercera");
            /**********************************/
            /****** PORCENTAJE DE VENTAS ******/
            $arrayPorcVent = $this->porcVentas();
            /**********************************/

            # Cantidad de Productores
            $productores = Productores::count();
            # Cantidad de Minas Canteras
            $minas = MinaCantera::count();
            # Cantidad de Reinscripciones
            $reinscripciones = Reinscripciones::count();

            # Array para enviar
            $arrayDatos = array(
                'cantidadProductores' => $productores,
                'cantidadMinas' => $minas,
                'cantidadReinsc' => $reinscripciones,
                'mineralPrimeraCat' => $arrayMinPrim,
                'mineralSegundaCat' => $arrayMinSec,
                'mineralTerceraCat' => $arrayMinTer,
                "porcentajes_ventas" => $arrayPorcVent,
                "porcentajes_personas" => $procentajePersonal,
            );

            $response = Http::retry(3, 100)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ])
                // ->timeout(10)
                ->withToken($token)
                ->post($urlServer . 'visor/setDatosCantidades', [
                    'provincia_id' => $id_provincia,
                    'name_provincia' => $provincia,
                    'datos' => json_encode($arrayDatos, JSON_UNESCAPED_UNICODE),
                    'tabla' => 'productores',
                ]);

            // $responseData = (is_object($response) ? ((isset($response->DateInsert)) ? $response->DateInsert  : '') : '');
            // $arrayRespuestas = array(
            //     'getStatusCode' => $response->getStatusCode(),
            //     'successful' => $response->successful(),
            //     'failed' => $response->failed(),
            //     'serverError' => $response->serverError(),
            //     'clientError' => $response->clientError(),
            // );

            file_put_contents('dataRecivido.txt', $response);
            file_put_contents('dataEnviado.txt',  json_encode($arrayDatos, JSON_UNESCAPED_UNICODE));

            #{"getStatusCode":200,"successful":true,"failed":false,"serverError":false,"clientError":false}
            if ($response->successful()) {
                $envio = JobEnvio::create([
                    'datos' => json_encode($arrayDatos, JSON_UNESCAPED_UNICODE),
                    'estado' => 'enviado',
                    'tabla' => $response['id'],
                    'inicio' => $dtInicio,
                    'fin' => $response['DateInsert'],
                    'provincia_id' => $id_provincia,
                ]);
            } else {
                $envio = JobEnvio::create([
                    'datos' => json_encode($arrayDatos, JSON_UNESCAPED_UNICODE),
                    'estado' => 'errorEnvio',
                    'tabla' => null,
                    'inicio' => $dtInicio,
                    'fin' => null,
                    'provincia_id' => $id_provincia,
                ]);
            }
        } catch (Exception $e) {
            file_put_contents('dataKucho.txt', $e);
            $envio = JobEnvio::create([
                'datos' => json_encode($arrayDatos, JSON_UNESCAPED_UNICODE),
                'estado' => $e->getMessage(),
                'tabla' => null,
                'inicio' => $dtInicio,
                'fin' => null,
                'provincia_id' => $id_provincia,
            ]);
        }
    }
    public function cantCategoriasMinerales($categoria)
    {
        $sql = "select g.name, count (*) as cantidad from
        (SELECT f.id as id_formulario, f.estado, m.id as id_mineral, m.name, m.categoria FROM minerales_borradores as b
        left join form_alta_productores as f on b.id_formulario = f.id
        left join mineral as m on m.id = b.id_mineral
        where lower(f.estado) = lower('aprobado') and lower(m.categoria)=lower('" . $categoria . "')) as g
        group by g.name having count(*)>=1";
        $arrayCategoria = DB::connection('rpm')->select($sql);
        return  $arrayCategoria;
    }
    public function porcVentas()
    {
        $sql = 'select sum(porcentaje_venta_provincia) as provincia, sum (porcentaje_venta_otras_provincias) as pais, sum(porcentaje_exportado) as exterior from reinscripciones where fecha_vto >= now() and fecha_vto is not null';
        $arrayVentas  = DB::connection('rpm')->select($sql);
        return $arrayVentas;
    }
    public function porcPersonal()
    {
        $sqlPerm = 'select 
        sum(personal_perm_profesional) as profesional, 
        sum(personal_perm_operarios) as operarios, 
        sum(personal_perm_administrativos) as administrativos,
        sum(personal_perm_otros) as otros
        FROM reinscripciones
        where fecha_vto is not null and fecha_vto >= now()';
        $permanente = DB::connection('rpm')->select($sqlPerm);

        $sqlTran = 'select 
        sum(personal_trans_profesional) as profesional, 
        sum(personal_trans_operarios) as operarios, 
        sum(personal_trans_administrativos) as administrativos,
        sum(personal_trans_otros) as otros
        FROM reinscripciones
        where fecha_vto is not null and fecha_vto >= now()';
        $transitorios = DB::connection('rpm')->select($sqlTran);
        $result = array(
            'permanentes' => $permanente,
            'transitorios' => $transitorios,
        );
        // dd($result);
        return $result;
    }
}
