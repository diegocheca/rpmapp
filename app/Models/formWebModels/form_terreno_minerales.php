<?php

namespace App\Models\formWebModels;
use App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_terreno_minerales extends Model
{
    use HasFactory;
    protected $table = 'form_terreno_minerales';
    protected $fillable = [
        'id',
        'minerales_id',        
        'form_terreno_id',
        
    ];
}
