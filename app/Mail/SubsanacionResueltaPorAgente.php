<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SubsanacionResueltaPorAgente extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($nombre, $fecha_entrada, $subsanacion,  $nombre_area, $id_expediente, $num_expe, $path )
    {
        //
        $this->name = $nombre;
        $this->fecha_entrada = $fecha_entrada;
        $this->subsanacion = $subsanacion;
        $this->nombre_area = $nombre_area;
        $this->id_expediente = $id_expediente;
        $this->num_expe = $num_expe;
        $this->path = $path;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from("no-reply@ingagrimensor.com")->view('emails.subsanacion-resuleta-por-agente')->with([
            'nombre' => $this->name,
            'fecha_entrada' => $this->fecha_entrada,
            'nombre_area' => $this->nombre_area,
            'id_expediente' => $this->id_expediente,
            'num_expe' => $this->num_expe,
            'subsanacion' => $this->subsanacion,
            'path' => $this->path,
        ]);
    }
}
