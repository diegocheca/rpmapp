<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formTerreno extends Model
{
    use HasFactory;
    protected $table = 'formTerreno';
    protected $fillable = [
        'id',
        'categoria_mineral',
        'superficie',
        'provincia',
        'departamento',
        'localidad',
    ];
    public function estado_terreno()
    {
        return $this->belongsToMany(formEstadoTerreno::class);
    }
}
