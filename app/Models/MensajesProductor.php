<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MensajesProductor extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'mensajes_productor';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'id',
        'id_productor',
        'id_provincia',
        'titulo',
        'mensaje',
        'estado',

    ];
}
