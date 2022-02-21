<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Contacto extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'contactos';

    protected $dates = ['deleted_at', 'updated_at','created_at'];
 	public $fillable = ['name','email','message','estado'];
}
