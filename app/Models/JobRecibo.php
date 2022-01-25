<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobRecibo extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'job_recibos';
    protected $guarded = [];
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'datos',
        'estado',
        'tabla',
        'provincia_id'
    ];

}