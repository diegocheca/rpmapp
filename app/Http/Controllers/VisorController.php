<?php

namespace App\Http\Controllers;

use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\JobRecibo;

class VisorController extends Controller
{
    #inserta en la DB Nacion
    public function setDatos(Request $request)
    {
        try {
            $datos_recibidos = JobRecibo::create([
                'provincia_id' => $request->provincia_id,
                'datos' => $request->datos,
                'tabla' =>  $request->tabla,
                'estado' => 0,
            ]);
            $dt = new \DateTime();
            $dt = $dt->format('Y-m-d H:i:s');
            return response()->json(['response' => 'ok', 'id' => $datos_recibidos->id, 'DateInsert' => $dt], 200);
        } catch (Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }
        #obtiene la cantidad de productores de la provincia actual
        // public function CantProductors()
        // {
        //     $user = Auth::user();
        //     $id_provincia = $user->id_provincia;
        //     $provincia = $user->provincia;
        //     try {
        //         $productores = DB::connection('rpm')->table('productores')
        //             // ->where('deleted_at','!=',null)
        //             ->count();
        //         // dd($productores);
        //         $arrayDatos = array(
        //             'cantidadProductores' => $productores,
        //             'cantidadMinas' => 5,
        //             'cantidadReinsc' => 10,
        //             'mineralPrimeraCat' => 1,
        //             'mineralSegundaCat' => 2,
        //             'mineralTerceraCat' => 3,
        //         );
    
        //         // $response = Http::withOptions(['verify' => false, 'debug' => false,])
        //         $response = Http::retry(3, 100)
        //             // ->withOptions(['observe' => 'response'])
        //             ->withHeaders([
        //                 'Content-Type' => 'application/json',
        //                 'Accept' => 'application/json'
        //             ])
        //             // ->timeout(10){observe: 'response'}
        //             ->withToken('eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODA4MFwvYXBpXC9hdXRoXC9sb2dpbiIsImlhdCI6MTYzMTY1MzU0MSwibmJmIjoxNjMxNjUzNTQxLCJqdGkiOiIzNHA0U1JSMGRCazFTWm00Iiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-QWEx5YYjsfjBeIgI9LSdoXapADydx49qMKOXCfJd5M')
        //             ->post('http://45.5.153.83:3000/api/visor/setDatosCantidades', [
        //                 // 'provincia_id' => config('sincronizacion.pronvicia_id'),
        //                 'provincia_id' => $id_provincia,
        //                 'name_provincia' => $provincia,
        //                 'datos' => json_encode($arrayDatos),
        //                 'tabla' => 'productores',
        //             ]);
        //         // ->get('http://45.5.153.83:3000/api/datos/traer_provincias');
    
        //         $responseData = $response->getBody();
        //         $result = $response->object();
        //         // $array = json_decode( $result );
        //         // $result = json_decode($response->getBody());
        //         // echo $response->getBody();
        //         // echo $response;
    
        //         // dd($response);
        //         return response()->json($result, 200);
        //         // return 0;
        //     } catch (Exception $e) {
        //         // return 0;
        //         return response()->json(['msg' => $e->getMessage()], 500);
        //     }
        // }
}
