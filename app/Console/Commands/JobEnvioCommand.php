<?php

namespace App\Console\Commands;

use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Exception;

use Illuminate\Console\Command;
use App\Models\Productores;
use App\Models\JobEnvio;
use App\Http\Controllers\FormAltaProductorController;
use Faker\Factory as Faker;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class JobEnvioCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'enviar:datos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Este job envía los datos que posee la provincia hacia la bd de nación para la sincronización';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    // public function handle2()
    // {
    //     /*
    //     Pasos a seguir:
    //     1 - buscar la ultima actualizacion de mi provincia
    //     2 - buscar los datos q voy a mandar en base al updated and created
    //     3 - enviarlos
    //     4 - esperar la respues
    //     5 - actualizar el cron que recien creo
    //     6 - 
    //      */
    //     //1
    //     $ultima_job = JobEnvio::select("created_at")
    //         ->orderBy('created_at', 'desc')
    //         ->where('provincia_id', '=', config('sincronizacion.pronvicia_id'))
    //         ->where('estado', '=', 'success')
    //         ->first();
    //     $ultima_job = strval($ultima_job->created_at);
    //     //2
    //     $datos_productores = Productores::select('*')->where('updated_at', '>', $ultima_job)
    //         ->orWhere('created_at', '>', $ultima_job)
    //         ->get();
    //     $datos_productores_a_mandar = array();
    //     $indice = 0;
    //     foreach ($datos_productores as $productor) {
    //         //esto es cada uno de los rows que voy a mandar
    //         $datos_productores_a_mandar[$indice] = array(
    //             "id" => $productor->id,
    //             'cuit' => $productor->cuit,
    //             'razonsocial' => $productor->razonsocial,
    //             'numeroproductor' => $productor->numeroproductor,
    //             'email' => $productor->email,
    //             'domicilio_prod' => $productor->domicilio_prod,
    //             'tiposociedad' => $productor->tiposociedad,
    //             'inscripciondgr' => $productor->inscripciondgr,
    //             'constaciasociedad' => $productor->constaciasociedad,
    //             'leal_calle' => $productor->leal_calle,
    //             'leal_numero' => $productor->leal_numero,
    //             'leal_telefono' => $productor->leal_telefono,
    //             'leal_pais' => $productor->leal_pais,
    //             'leal_provincia' => $productor->leal_provincia,
    //             'leal_departamento' => $productor->leal_departamento,
    //             'leal_localidad' => $productor->leal_localidad,
    //             'leal_cp' => $productor->leal_cp,
    //             'leal_otro' => $productor->leal_otro,
    //             'administracion_calle' => $productor->administracion_calle,
    //             'administracion_numero' => $productor->administracion_numero,
    //             'administracion_telefono' => $productor->administracion_telefono,
    //             'administracion_pais' => $productor->administracion_pais,
    //             'administracion_provincia' => $productor->administracion_provincia,
    //             'administracion_departamento' => $productor->administracion_departamento,
    //             'administracion_localidad' => $productor->administracion_localidad,
    //             'administracion_cp' => $productor->administracion_cp,
    //             'administracion_otro' => $productor->administracion_otro,
    //             'numero_expdiente' => $productor->numero_expdiente,
    //             'created_by' => $productor->created_by,
    //             'estado' => $productor->estado,
    //             'created_at' => $productor->created_at,
    //             'deleted_at' => $productor->deleted_at,
    //             'updated_at' => $productor->updated_at,
    //             'id_formulario' => $productor->id_formulario,
    //             'usuario_creador' => $productor->usuario_creador,
    //         );
    //         $indice++;
    //     }
    //     //$response = Http::get('https://laravel.com/docs/8.x/http-client#introduction');
    //     $envio_todo_junto = array("id" => $productor->id, "datos" => json_encode($envio));
    //     $response = Http::post('http://example.com/users', [
    //         'provincia_id' => config('sincronizacion.pronvicia_id'),
    //         'datos' => json_encode($datos_productores_a_mandar),
    //         'tabla' => 'productores',
    //     ]);

    //     //el servidor recibe los datos
    //     // el servidor guardos en la bd , en la tabla job_recibo
    //     // el servidor me respondo code=200 y status ok

    //     // guardo el correcto funcionamiento del script
    //     // esto seria actualizar la fila de job_envio , estado exitoso y hora y fun de ejecucion

    //     //        dd();
    //     return 0;
    // }


    public function handle()
    {
        /*
        Pasos a seguir:
        1 - 
        2 - 
        3 - 
        4 - 
        5 - 
        6 - 
         */
        //1

        // $texto = "[" . date("Y-m-d H:i:s") . "] : Hola, mi nombre es Kucho";
        // Storage::appends("archivo.txt", $texto);
        $user = Auth::user();
        $id_provincia = $user->id_provincia;
        $provincia = $user->provincia;
        try {
            $productores = DB::connection('rpm')->table('productores')
                // ->where('deleted_at','!=',null)
                ->count();
            // dd($productores);
            $arrayDatos = array(
                'cantidadProductores' => $productores,
                'cantidadMinas' => 5,
                'cantidadReinsc' => 10,
                'mineralPrimeraCat' => 1,
                'mineralSegundaCat' => 2,
                'mineralTerceraCat' => 3,
            );

            $response = Http::withOptions(['verify' => false,])
                ->retry(3, 100)
                ->timeout(10)
                ->withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMTY1MzU0MSwibmJmIjoxNjMxNjUzNTQxLCJqdGkiOiIzNHA0U1JSMGRCazFTWm00Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-QWEx5YYjsfjBeIgI9LSdoXapADydx49qMKOXCfJd5M')
                ->post('http://localhost:8080/api/visor/setDatosCantidades', [
                    // 'provincia_id' => config('sincronizacion.pronvicia_id'),
                    'provincia_id' => $id_provincia,
                    'name_provincia' => $provincia,
                    'datos' => json_encode($arrayDatos),
                    'tabla' => 'productores',
                ]);

            // $var1 = $response->successful();
            // $var2 = $response->failed();
            // $var3 = $response->serverError();
            // $var4 = $response->clientError();
            $responseData = $response->getBody()->getContents();
            $result = json_decode($responseData);
            // $result = json_decode($response->getBody());
            // echo $response->getBody();
            // var_dump($result);

            // dd($response);
            return response()->json(['response' => $result], 200);
            return 0;
        } catch (Exception $e) {
            // return 0;
            return response()->json(['msg' => $e->getMessage()], 500);
        }


        //$response = Http::get('https://laravel.com/docs/8.x/http-client#introduction');


        //el servidor recibe los datos
        // el servidor guardos en la bd , en la tabla job_recibo
        // el servidor me respondo code=200 y status ok

        // guardo el correcto funcionamiento del script
        // esto seria actualizar la fila de job_envio , estado exitoso y hora y fun de ejecucion

        //        dd();
        // return 0;
    }
}
