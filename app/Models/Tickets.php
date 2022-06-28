<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Auth;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tickets extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'tickets';

    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'name',
        'email',
        'user',
        'message',
        'file',
        'status',
        'seen_at',
        'seen_by'
    ];

    public static function create_ticket($params){
        $ticket = new Tickets();
        $ticket->name = $params["name"];
        $ticket->email = $params["email"];
        $ticket->message = $params["message"];
        $ticket->user = Auth::user()->id;
        if($params["file"]!= null)
            $ticket->file = $params["file"];
        else $ticket->file =  null;
        $ticket->status =  'Sin ver';
        $ticket->seen_at =  null;
        $ticket->seen_by =  null;
        $result = $ticket->save();
        if($result)
            return $ticket;
        else false;
    }
}