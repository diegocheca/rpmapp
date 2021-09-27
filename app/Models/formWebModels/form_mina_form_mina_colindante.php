<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class form_mina_form_mina_colindante extends Model
{
   // use HasFactory;
   protected $table = 'form_mina_form_mina_colindante';
   protected $fillable = [
       'id',
       'form_mina_id', 
       'form_mina_colindante_id'      
   ];
}
