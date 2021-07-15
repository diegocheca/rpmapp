<?php

namespace App\Models\formWebModels;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formTipoRol extends Model
{
    //use HasFactory;
    protected $table = 'formTipoRol';
    protected $fillable = [
        'id',
        'nombre_rol'        
    ];
    //Relacion de uno a muchos RolPersona (inversa)
    public function rolpersona()
    {
        return $this->BelongsTo('App\Models\formWebModels\formRolPersona');
    }
}
