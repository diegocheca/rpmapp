<?php

namespace App\Http\Controllers\formWebController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\formWebModels\formSolicitud;
use App\Models\formWebModels\formTipoSolicitud;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CountriesController;

class SolicitudesController extends Controller
{
    public function menu()
    {
        return view("formWeb.prueba");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $solicitudes = formTipoSolicitud::with(['solicitud'])->get();
        $solicitudes = formSolicitud::with(['tipo_solicitud', 'terreno'])->get();
        // return ($solicitudes);
        return  Inertia::render('formWeb/mostrar', ['solicitudes' => $solicitudes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return Inertia::render('formWeb/FormCrear');
        // dd(CountriesController::getProvinces());
        $provinces = CountriesController::getProvinces();
        // dd(env('PROVINCE', ''));
        //
        // return Inertia::render('Reinscripciones/Form');
        return Inertia::render('formWeb/Form', [
            'action' => "create",
            'saveUrl' => "solicitudes.store",
            // 'saveFileUrl' => "/solicitudes/upload",
            'saveFileUrl' => "solicitudes.update",
            'province' => env('PROVINCE', 'sanjuan') . "/reinscripciones-wizard",
            'folder' => 'solicitudes',
            'reinscripcion' => [],
            'titleForm' => 'Crear Solicitud',
            'evaluate' => false,
            'provincia' => $provinces
        ]);
    }
    public function prueba()
    {
        return Inertia::render('formWeb/formPrueba');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postSolicitudes(Request $request)
    {
        $Step = $request->step;
        $Datos = $request->datos;
        // if ($Step == 1) {
        //     foreach ($Datos as $key => $value) {
        //         if ($key == 'provincia' || $key == 'departamento' || $key == 'localidad') {
        //             echo $key . ': ' . $value['label'] . "\n";
        //             continue;
        //         }
        //         echo $key . ': ' . $value . "\n";
        //     }
        // } else {
        //     echo 'no es 1';
        // }

        switch ($Step) {
            case 1:
                echo 'Step 1';
                break;
            case 2:
                echo 'Step 2';
                break;
            case 3:
                echo 'Step 3';
                break;
            case 4:
                echo 'Step 4';
                break;
            case 5:
                echo 'Step 5';
                break;

            default:
                echo 'Ninguno';
                break;
        }

        // dd($request);
        return response()->json('ok');
    }

    public function store(Request $request)
    {
        // dd($request);
        // dd(isset($request->content));
        //formSolicitud::create($request->all()); content
        return Redirect::route('solicitudes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
