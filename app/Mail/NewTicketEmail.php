<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Expediente;
use App\Models\User;
use App\Models\Tramite;

class NewTicketEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket)
    {
        $this->name = $ticket->name;
        $this->fecha_creado = date("d/m/Y H:i:s");
        $this->email = $ticket->email;
        $this->id_ticket = $ticket->id;
        $this->mensaje = $ticket->message;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        return $this->from("gismineronacional@gmail.com")->view('emails.new-ticket-email')->with([
            'nombre' => $this->name,
            'fecha_creado' => $this->fecha_creado,
            'email' => $this->email,
            'id_ticket' => $this->id_ticket,
            'mensaje' => $this->mensaje
        ]);
    }
}
