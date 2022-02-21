<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisoFormularioPresentadoEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $razonsocial, $id, $fecha)
    {
        //
        $this->email = $email;
        $this->razonsocial = $razonsocial;
        $this->id = $id;
        $this->fecha = $fecha;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("gismineronacional@gmail.com")->view('emails.aviso-formulario-presentado')->with([
            'email' => $this->email,
            'razonsocial' => $this->razonsocial,
            'id' => $this->id,
            'fecha' => $this->fecha
        ]);
    }
}
