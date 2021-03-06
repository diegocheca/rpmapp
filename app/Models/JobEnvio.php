<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class JobEnvio extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'job_envios';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'datos',
        'estado',
        'tabla',
        'inicio',
        'fin',
        'provincia_id'
    ];

}