<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FormAltaProdPaso2 extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'form_alta_prod_paso1s';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'id_formulario',
        'cuit',
        'razonsocial',
        'numeroproductor',
        'email',
        'tiposociedad',
        'inscripciondgr',
        'constaciasociedad',
        'created_by',
        'updated_by',
        'estado'
    ];
}