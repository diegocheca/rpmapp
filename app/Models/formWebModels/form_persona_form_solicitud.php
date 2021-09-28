<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_persona_form_solicitud extends Model
{
    use HasFactory;
    protected $table = 'form_persona_form_solicitud';
    protected $fillable = [
        'form_persona_id',        
        'form_solicitud_id',
        'rol',
        'tipo_persona',
    ];
}
