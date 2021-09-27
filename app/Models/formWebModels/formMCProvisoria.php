<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formMCProvisoria extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = 'formMCProvisoria';
    protected $fillable = [
        'id',
        'PD_X',
        'PD_Y',
        'terreno_id',
        'mina_id',
        
    ];

//Relacion inversa de 1 a 1 con Mina
 public function mina_mcp()
 {
    return $this->belongsTo(formMina::class);
 }

 //Relacion inversa de 1 a 1 con terreno
 public function terreno_mcp()
 {
    return $this->belongsTo(formMina::class);
 }
}
 