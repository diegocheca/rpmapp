<?php

namespace App\Http\Controllers;

use App\Mail\MensajesEmail;
use App\Models\MensajesProductor;
use App\Models\Productores;
use Inertia\Inertia;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class BandejaEntradaEmailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = HomeController::userData();
        $productors = Productores::select('*')->where('leal_provincia', '=', $user->id_provincia)->get();
        for ($i=0; $i < count($productors); $i++) {
            $productors[$i]->lastMessage = MensajesProductor::select('*')->where('id_productor', $productors[$i]->id)->orderBy('created_at', 'desc')->first();
        }
        return Inertia::render('BandejaEntrada/List', ['productors' => $productors]);
    }

    public function indexId($id)
    {
        $user = HomeController::userData();
        $productors = Productores::select('*')->where('leal_provincia', '=', $user->id_provincia)->get();
        for ($i=0; $i < count($productors); $i++) {
            $productors[$i]->lastMessage = MensajesProductor::select('*')->where('id_productor', $productors[$i]->id)->orderBy('created_at', 'desc')->first();
        }
        return Inertia::render('BandejaEntrada/List', ['productors' => $productors, 'productorSelected' => $id]);
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
        $data = $request->all();
        $user = HomeController::userData();

        $message = [
            'id_productor' => $data['selectedProductor'],
            'id_provincia' => $user->id_provincia,
            'mensaje' => $data['newMessage'],
            'titulo' => $data['titulo']
        ];

        $productor = Productores::select('*')->where('id', '=', $data['selectedProductor'])->first();

        try {

            Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MensajesEmail(
                $productor->email,
                date("d-m-Yd H:i:s"),
                $message['mensaje']
            ));

            $message['estado'] = 'enviado';
            $newMessage = MensajesProductor::create($message);
            return response()->json([
                'newMessage' => $newMessage,
                'success' => true
            ], 200);
        } catch (\Exception $ex) {
            $message['estado'] = 'error';
            $newMessage = MensajesProductor::create($message);
            return response()->json(['error' => $ex->getMessage(), 'success' => false], 500);
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $messages = MensajesProductor::select('*')->where('id_productor', $id)->orderBy('created_at', 'desc')->get();
        return response()->json($messages);
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
