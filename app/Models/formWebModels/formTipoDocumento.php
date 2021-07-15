<?php

namespace App\Models\formWebModels;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class formTipoDocumento extends Model
{
    use HasFactory;
    protected $table = 'formTipoDocumento';
    protected $fillable = [
        'id',
        'nombre'
    ];

    public function tipodocumento()
    {
        return $this->BelongsTo('App\Models\formWebModels\formTipoDocumento');
    }
}
