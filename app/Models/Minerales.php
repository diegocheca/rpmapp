<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minerales extends Model
{
    use HasFactory;
    protected $table = 'mineral';

    protected $fillable = [
        'id',
        'name',
        'categoria',
        'active',
        'created_uid',
        'created_date',
        'write_uid',
        'write_date',
    ];

    //Relacion de Muchos a Muchos con Mina 
    public function mina()
    {
        return $this->belongsToMany(formMina::class);
    }

    //Relacion de Muchos a Muchos con Terreno 
    public function terreno()
    {
        return $this->belongsToMany('App\Models\formWebModels\formTerreno');
    }

}
