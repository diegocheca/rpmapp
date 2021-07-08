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
        $solicitudes = formSolicitud::with(['tipo_solicitud','terreno'])->get();
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
            'province' => env('PROVINCE', 'sanjuan')."/reinscripciones-wizard",
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
    public function store(Request $request)
    {
        formSolicitud::create($request->all());
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
