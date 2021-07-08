<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formTipoSolicitud extends Model
{
    use HasFactory;
    protected $table = 'formTipoSolicitud';
    protected $fillable = [
        'id',
        'nombre',
    ];
     public function solicitud()
     {
         return $this->hasMany(formSolicitud::class,'tiposolicitud_id'); 
     }
}
