<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ValidarEmailProductorPrimeraVez extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $fecha_entrada, $codigo )
    {
        //
        $this->email = $email;
        $this->fecha_entrada = $fecha_entrada;
        $this->codigo = $codigo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("gismineronacional@gmail.com")->view('emails.validar-email-productor-primero')->with([
            'email' => $this->email,
            'fecha_entrada' => $this->fecha_entrada,
            'codigo' => $this->codigo,
        ]);
    }
}