<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_estado_solicitud_form_solicitud extends Model
{
   // use HasFactory;
   protected $table = 'form_estado_solicitud_form_solicitud';
   protected $fillable = [
       'id',
       'form_estado_solicitud_id', 
       'form_solicitud_id'      
   ];
}
