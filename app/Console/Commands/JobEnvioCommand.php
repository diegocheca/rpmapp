<?php

namespace App\Console\Commands;

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
    public function handle()
    {
        /*
        Pasos a seguir:
        1 - buscar la ultima actualizacion de mi provincia
        2 - buscar los datos q voy a mandar en base al updated and created
        3 - enviarlos
        4 - esperar la respues
        5 - actualizar el cron que recien creo
        6 - 
         */
        //1
        $ultima_job = JobEnvio::select("created_at")
        ->orderBy('created_at', 'desc')
        ->where('provincia_id','=',config('sincronizacion.pronvicia_id'))
        ->where('estado','=','success')
        ->first();
        $ultima_job = strval($ultima_job->created_at);
        //2
        $datos_productores = Productores::select('*')->where('updated_at','>',$ultima_job)
        ->orWhere('created_at','>',$ultima_job)
        ->get();
        $datos_productores_a_mandar = array();
        $indice = 0;
        foreach($datos_productores as $productor){
            //esto es cada uno de los rows que voy a mandar
            $datos_productores_a_mandar[$indice] = array(
                "id"=>$productor->id,
                'cuit' => $productor->cuit,
                'razonsocial' => $productor->razonsocial,
                'numeroproductor' => $productor->numeroproductor,
                'email' => $productor->email,
                'domicilio_prod' => $productor->domicilio_prod,
                'tiposociedad' => $productor->tiposociedad,
                'inscripciondgr' => $productor->inscripciondgr,
                'constaciasociedad' => $productor->constaciasociedad,
                'leal_calle' => $productor->leal_calle,
                'leal_numero' => $productor->leal_numero,
                'leal_telefono' => $productor->leal_telefono,
                'leal_pais' => $productor->leal_pais,
                'leal_provincia' => $productor->leal_provincia,
                'leal_departamento' => $productor->leal_departamento,
                'leal_localidad' => $productor->leal_localidad,
                'leal_cp' => $productor->leal_cp,
                'leal_otro' => $productor->leal_otro,
                'administracion_calle' => $productor->administracion_calle,
                'administracion_numero' => $productor->administracion_numero,
                'administracion_telefono' => $productor->administracion_telefono,
                'administracion_pais' => $productor->administracion_pais,
                'administracion_provincia' => $productor->administracion_provincia,
                'administracion_departamento' => $productor->administracion_departamento,
                'administracion_localidad' => $productor->administracion_localidad,
                'administracion_cp' => $productor->administracion_cp,
                'administracion_otro' => $productor->administracion_otro,
                'numero_expdiente' => $productor->numero_expdiente,
                'created_by' => $productor->created_by,
                'estado' => $productor->estado,
                'created_at' => $productor->created_at,
                'deleted_at' => $productor->deleted_at,
                'updated_at' => $productor->updated_at,
                'id_formulario' => $productor->id_formulario,
                'usuario_creador' => $productor->usuario_creador,
            );
            $indice++;
        }
        //$response = Http::get('https://laravel.com/docs/8.x/http-client#introduction');
        $envio_todo_junto = array("id"=>$productor->id,"datos"=>json_encode($envio));
        $response = Http::post('http://example.com/users', [
            'provincia_id' => config('sincronizacion.pronvicia_id'),
            'datos' => json_encode($datos_productores_a_mandar),
            'tabla' => 'productores',
        ]);

        //el servidor recibe los datos
       // el servidor guardos en la bd , en la tabla job_recibo
       // el servidor me respondo code=200 y status ok

        // guardo el correcto funcionamiento del script
        // esto seria actualizar la fila de job_envio , estado exitoso y hora y fun de ejecucion

//        dd();
        return 0;
    }
}
