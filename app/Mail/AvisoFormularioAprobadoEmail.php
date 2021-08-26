<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AvisoFormularioAprobadoEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id, $razonsocial, $fecha)
    {
        //
        $this->id = $id;
        $this->razonsocial = $razonsocial;
        $this->fecha = $fecha;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("gismineronacional@gmail.com")->view('emails.aviso-formulario-aprobado')->with([
            'id' => $this->id,
            'razonsocial' => $this->razonsocial,
            'fecha' => $this->fecha,
        ]);
    }
}
