<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'permissions_form';
    protected $dates = ['deleted_at', 'updated_at','created_at'];
    protected $fillable = [
        'id_provincia',
        'accion',
        'id_rol',
        'formulario',
        'pagina',
        'estado',
        'data',
        'edited_by'
    ];
    


}
