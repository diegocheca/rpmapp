<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisoFormularioConObservaciones extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($razonsocial, $fecha, $id)
    {
        //
        $this->razonsocial = $razonsocial;
        $this->fecha = $fecha;
        $this->id = $id;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("gismineronacional@gmail.com")->view('emails.aviso-formulario-con-observaciones')->with([
            'razonsocial' => $this->razonsocial,
            'fecha' => $this->fecha,
            'id' => $this->id,
        ]);
    }
}
