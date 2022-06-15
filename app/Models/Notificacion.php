<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Auth;
class Notificacion extends Model
{
    
    use HasFactory;
    protected $table = 'notifications';
    protected $guarded = [];
    protected $date = ['created_at', 'updated_at'];
    protected $fillable = [
        'user_id',
        'message',
        'table_id',
        'name_id',
        'notification_id',
        'url',
        'seen_at'
    ];
    public static function get_notifications(){
        return Notificacion::select('*')->where('user_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
    }
    

}
