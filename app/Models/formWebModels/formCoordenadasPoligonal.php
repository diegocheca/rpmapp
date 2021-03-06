<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formCoordenadasPoligonal extends Model
{
    use HasFactory;
    protected $table = 'formCoordenadasPoligonal';
    protected $fillable = [
        'id',
        'X',
        'Y', 
        'terreno_id',
    ];
    //Relacion inversa de 1 a muchos con Terreno
    public function terreno_cor()
     {
        return $this->belongsTo(formTerreno::class);
     }
}
