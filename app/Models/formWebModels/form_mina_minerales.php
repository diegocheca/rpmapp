<?php

namespace App\Models\formWebModels;
use App\Models\Minerales;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_mina_minerales extends Model
{
    //use HasFactory;
    protected $table = 'form_mina_minerales';
    protected $fillable = [
        'id',
        'form_mina_id', 
        'minerales_id',
        'categoria',
              
    ];
}
