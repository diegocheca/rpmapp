<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formMatriculaCatastral extends Model
{
    use HasFactory;
    protected $table = 'formMatriculaCatastral';
    protected $fillable = [
        'id',
        'NE_X',
        'NE_Y',
        'SO_X',          
        'SO_Y', 
        'terreno_id',
    ];
    
    public function terreno()
     {
         return $this->belongsTo(formTerreno::class);
     }
   
}
