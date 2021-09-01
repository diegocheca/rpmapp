<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\EmailsAConfirmar;
use App\Models\Reinscripciones;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // if (Auth::check()) {
            return view("pagina.index");
            // return Inertia::render('Auth/Login');
        // } else {
            // return Inertia::render('Auth/Login');
            // return view("pagina.index");
        // }
    }
    public function thanks()
    {
        //
        return view("confirmation.index");
    }
    public function dashboard()
    {
        $mi_rol = '';
        if(Auth::user()->hasRole('Autoridad'))
            $mi_rol = 'admin';
        if(Auth::user()->hasRole('Administrador'))
            $mi_rol = 'admin';
        if(Auth::user()->hasRole('Productor'))
            $mi_rol = 'productor';

        $departments = CountriesController::getDepartmentArray(Auth::user()->id_provincia);
        $dataChart = new \stdClass();
        $axis = new \stdClass();
        $axis->x = 'departamentos';
        $axis->y = 'cantidad';
        $dataChart->axis = $axis;
        $dataChart->data = $departments;
        $dataChart->province = CountriesController::getProvince(Auth::user()->id_provincia);

        

        return Inertia::render('Dashboard', ['userType' => $mi_rol,'dataChart'=> $dataChart ]);
    }


    public function valdiar_email_de_productor($codigo)
    {
        //
        //dd($codigo);
        $email_a_validar = EmailsAConfirmar::select('*')->where('codigo', '=', $codigo)->first();
        //dd($email_a_validar);
        $email_a_validar->codigo = null;
        $email_a_validar->confirmed_at = date("Y-m-d H:i:s");
        $email_a_validar->save();

        return view("confirmation.index");
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
