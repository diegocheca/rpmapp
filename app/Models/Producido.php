<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Producido extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'producido';

    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'unidades',
        'precio_venta',
        'created_by'
    ];
}
