<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagocanonmina extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pagocanonmina';

    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'id',
        'pagado',
        'fecha_pago',
        'monto',
        'fecha_desde',
        'fecha_hasta',
        'created_by',
        'estado',
    ];
}
