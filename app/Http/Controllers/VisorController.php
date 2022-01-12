<?php

namespace App\Http\Controllers;

use Exception;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisorController extends Controller
{
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
    //         return response()->json(['provincia' => $provincia, 'id_provincia' => $id_provincia, 'data' => $arrayDatos], 200);
    //     } catch (Exception $e) {
    //         return response()->json(['msg' => $e->getMessage()], 500);
    //     }
    // }
    #inserta en la DB Nacion
    public function setDatos(Request $request)
    {

        try {

            return response()->json(['response' => 'insert correcta', 'data' => $request->provincia], 200);
        } catch (Exception $e) {
            return response()->json(['response' => $e->getMessage()], 500);
        }
    }

}
