<?php

namespace App\Models\formWebModels;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formMinaColindante extends Model
{
    //use HasFactory;
    protected $table = 'formMinaColindante';
    protected $fillable = [
        'id',
        'nom_mina',                    
    ];
    
    //Relacion de Muchos a Muchos con mina
    public function minas()
    {
        return $this->belongsToMany(formMina::class);
    }
    
}
