<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_estado_terreno_form_mina extends Model
{
   // use HasFactory;
   protected $table = 'form_estado_terreno_form_mina';
   protected $fillable = [
       'id',
       'form_estado_terreno_id', 
       'form_mina_id'      
   ];
}
