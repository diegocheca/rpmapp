<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicketsRequest;
use App\Http\Requests\UpdateTicketsRequest;
use App\Models\Tickets;
use Illuminate\Http\Request;
use Auth;
use App\Http\Traits\Notification;

class TicketsController extends Controller
{
    use Notification;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $v = \Validator::make($request->all(), [
            
            'name' => 'required|min:4|max:30',
            'email' => 'required|email|min:4|max:50',
            'message'    => 'required|min:5|max:250',
            'file' => ''
        ]);
        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        
        //crear en bd
        $new_ticket = Tickets::create_ticket($request->all());
        //notificaciones
        Notification::enviar_email_new_ticket($new_ticket);
        Notification::log_email_new_ticket($new_ticket);
        Notification::pusher_new_ticket($new_ticket);
        
        if($new_ticket != null){
            return response()->json([
                'status' => 'success',
                'msg' => 'ticket creado',
                'ticket' => true
            ], 201);
        } else {
            return response()->json([
                'status' => 'success',
                'msg' => 'ticket no creado',
                'ticket' => false
            ], 201);
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function show(Tickets $tickets)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickets $tickets)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketsRequest  $request
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketsRequest $request, Tickets $tickets)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickets  $tickets
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickets $tickets)
    {
        //
    }
}
