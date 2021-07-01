<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formEstadoTerreno extends Model
{
    use HasFactory;
    protected $table = 'formEstadoTerreno';
    protected $fillable = [
        'id',
        'nombre',
    ];
    public function terreno()
    {
        return $this->belongsToMany(formTerreno::class);
    }
}
