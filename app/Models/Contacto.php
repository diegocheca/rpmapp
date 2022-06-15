<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;

use Illuminate\Notifications\Notifiable;
use Auth;

class Contacto extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;
    protected $table = 'contactos';

    protected $dates = ['deleted_at', 'updated_at','created_at'];
 	public $fillable = ['name','email','message','estado','user_id'];

     public function user()
    {
        return $this->belongsTo(User::class);
    }

}
