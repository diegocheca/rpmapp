<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reinscripciones extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reinscripciones';

    protected $date = ['created_at', 'deleted_at', 'updated_at', 'fecha_vto' ];
    protected $fillable = [
        'id_mina',
        'id_productor',
        'fecha_vto',
        'prospeccion',
        'exploracion',
        'explotacion',
        'desarrollo',
        'cantidad_productos',
        'porcentaje_venta_provincia',
        'porcentaje_venta_otras_provincias',
        'porcentaje_exportado',
        'personal_perm_profesional',
        'personal_perm_operarios',
        'personal_perm_administrativos',
        'personal_perm_otros',
        'personal_trans_profesional',
        'personal_trans_operarios',
        'personal_trans_administrativos',
        'personal_trans_otros',
        'nombre',
        'dni',
        'cargo',
        'created_by',
        'estado',
    ];

    public function productos()
    {
        return $this->hasMany(Productos::class, 'id_reinscripcion');
    }

}
