<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_mineral_form_terreno extends Model
{
    use HasFactory;
    protected $table = 'form_mineral_form_terreno';
    protected $fillable = [
        'form_mineral_id',        
        'form_terreno_id',
        
    ];
}
