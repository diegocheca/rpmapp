<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minerales extends Model
{
    use HasFactory;
    protected $table = 'mineral';

    protected $fillable = [
        'name',
        'categoria',
        'active',
        'created_uid',
        'created_date',
        'write_uid',
        'write_date',
    ];

}
