<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MensajesEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $fecha_entrada, $mensaje )
    {
        //
        $this->email = $email;
        $this->fecha_entrada = $fecha_entrada;
        $this->mensaje = $mensaje;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("gismineronacional@gmail.com")->view('emails.mensaje-productor')->with([
            'email' => $this->email,
            'fecha_entrada' => $this->fecha_entrada,
            'mensaje' => $this->mensaje,
        ]);
    }
}