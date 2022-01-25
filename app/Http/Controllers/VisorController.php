<?php

namespace App\Http\Controllers;

use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class VisorController extends Controller
{
    #obtiene la cantidad de productores de la provincia actual
    public function CantProductors()
    {
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

            // $response = Http::withOptions(['verify' => false, 'debug' => false,])
            $response = Http::retry(3, 100)
                ->withHeaders([
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json'
                ])
                // ->timeout(10)
                ->withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMTY1MzU0MSwibmJmIjoxNjMxNjUzNTQxLCJqdGkiOiIzNHA0U1JSMGRCazFTWm00Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-QWEx5YYjsfjBeIgI9LSdoXapADydx49qMKOXCfJd5M')
                ->post('http://45.5.153.83:3000/api/visor/setDatosCantidades', [
                    // 'provincia_id' => config('sincronizacion.pronvicia_id'),
                    'provincia_id' => $id_provincia,
                    'name_provincia' => $provincia,
                    'datos' => json_encode($arrayDatos),
                    'tabla' => 'productores',
                ]);
                // ->get('http://45.5.153.83:3000/api/datos/traer_provincias');

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
            // return 0;
        } catch (Exception $e) {
            // return 0;
            return response()->json(['msg' => $e->getMessage()], 500);
        }
    }
    #inserta en la DB Nacion
    public function setDatos(Request $request)
    {
        // print_r('hola');
        // die();
        try {
            $datos_recibidos = DB::connection('rpm')->table('job_recibos')->insertGetId(
                array(
                    'provincia_id' => $request->provincia_id,
                    'datos' => $request->datos,
                    'tabla' =>  $request->tabla,
                    'estado' => 0,
                )
            );
            $dt = new \DateTime();
            $dt = $dt->format('Y-m-d H:i:s');
            return response()->json(['response' => 'ok', 'id' => $datos_recibidos, 'DateInsert' => $dt], 200);
        } catch (Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }
}
