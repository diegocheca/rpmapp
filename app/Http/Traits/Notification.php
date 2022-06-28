<?php
namespace App\Http\Traits;
use App\Models\Tickets;

use Mail;
use App\Mail\NewTicketEmail;

use App\Events\MyEvent;


trait Notification {
    public function index() {
        // Fetch all the students from the 'student' table.
        $student = Tickets::all();
        return view('welcome')->with(compact('student'));
    }
    public static function enviar_email_new_ticket($ticket){

        Mail::to(config('variables.email_admin'))->send(new NewTicketEmail($ticket));

    }
    public static function log_email_new_ticket($ticket){
        \Log::notice('Se creo un nuevo ticket para el admin con id: ' . $ticket->id. ' y mensaje:'. $ticket->message);
    }

    public static function pusher_new_ticket($ticket){
        broadcast(new MyEvent('Se creo un nuevo ticket para el admin con id: ' . $ticket->id. ' y mensaje:'. $ticket->message));
    }
    

}