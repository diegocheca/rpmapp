<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\FirstEmail;
use TCG\Voyager\Models\User;
use Carbon\Carbon;
use Auth;
use App\Mail\VerificationEmail;
use Illuminate\Support\Str;

class EmailController extends Controller
{
    public function sendEmail() {

        $to_email = "diegochecarelli@gmail.com";

        Mail::to($to_email)->send(new FirstEmail);

        return "<p> Success! Your E-mail has been sent.</p>";

    }
    public function reenviar_confirmacion_usuario($id_user) {

        /*
        codigos que devuelve al funcion:
        1- usuario inexistente
        2- email enviado correctamente
        3- el usuario ya confirmo su email
         */
        $persona = User::find($id_user);
        if($persona == null) // no existe el usuario
        {
            $data = ['message' => 'usuario inexistente!', 'numero' => 1];
            return response()->json($data, 204);
        }
        
        else // si existe el usuario
        {
            if($persona->confirmed != 1) // el usuario no ha confirmado
            {
                $to_email = $persona->email;
                //creo un nuevo verification token , lo guardo y despues lo envio
                $codigo = Str::random(25);
                $persona->confirmation_code = $codigo;
                $persona->save();
    
                Mail::to($to_email)->send(new VerificationEmail(
                    $codigo,
                    $persona->name,
                    $persona->cuil));
                $data = ['message' => 'email enviado correctamente!', 'numero' => 2];
                return response()->json($data, 204);
            }
            else
                {
                    $data = ['message' => 'el usuario ya confirmo su email!', 'numero' => 3];
                    return response()->json($data, 204);
                }
    
        }

        
    }

}