<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailsAConfirmar;
use Auth;
use Inertia\Inertia;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("pagina.index");
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
        return Inertia::render('Dashboard', ['userType' => $mi_rol]);
    }


    public function valdiar_email_de_productor($codigo)
    {
        //
        //dd($codigo);
        $email_a_validar = EmailsAConfirmar::select('*')->where('codigo', '=',$codigo )->first();
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
