<?php

namespace App\Http\Controllers;

use App\Models\Notificacion;
use App\Http\Requests\StoreNotificacionRequest;
use App\Http\Requests\UpdateNotificacionRequest;
use Auth;

class NotificacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    
    public function get_notifications_dos(){
        if(Auth::user() != null) {
            return response()->json([
                'status' => 'success',
                'msg' => 'notificaciones correctas',
                'datos' => auth()->user()->notifications()->latest()->paginate()
            ], 201);

        }
        else return response()->json([
            'status' => 'error',
            'msg' => 'notificaciones incorrectas',
            'datos' => null
        ], 201);
    }

    public function get_notifications(){
        if(Auth::user() != null) {
            return response()->json([
                'status' => 'success',
                'msg' => 'notificaciones correctas',
                'datos' => auth()->user()->notifications()->latest()->paginate()
            ], 201);

        }
        else return response()->json([
            'status' => 'error',
            'msg' => 'notificaciones incorrectas',
            'datos' => null
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotificacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotificacionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function show(Notificacion $notificacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Notificacion $notificacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotificacionRequest  $request
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotificacionRequest $request, Notificacion $notificacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notificacion  $notificacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notificacion $notificacion)
    {
        //
    }
}
