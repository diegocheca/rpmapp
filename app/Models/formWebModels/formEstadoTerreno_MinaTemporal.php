<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoTerreno_MinaTemporal extends Model
{
   // use HasFactory;
   protected $table = 'EstadoTerreno_MinaTemporal';
   protected $fillable = [
       'id',
       'estadoterreno_id', 
       'minatemporal_id'      
   ];
}
