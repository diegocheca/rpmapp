<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Notificacion extends Model
{
    
    use HasFactory;
    use SoftDeletes;
    protected $table = 'notifications';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'user_id',
        'message',
        'table_id',
        'name_id',
        'notification_id',
        'url',
        'seen_at'
    ];
    
    

}
