<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_estado_terreno_form_terreno extends Model
{
    use HasFactory;
    protected $table = 'form_estado_terreno_form_terreno';
    protected $fillable = [
        'form_estadoterreno_id',        
        'form_terreno_id',
        
    ];
}
