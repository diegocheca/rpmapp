<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmailsAConfirmar extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'emails_a_confirmar';

    protected $dates = ['deleted_at', 'updated_at','created_at'];
 	protected $fillable = [
        'email',
        'codigo',
        'comentario',
        'confirmed_at',
    ];
}
