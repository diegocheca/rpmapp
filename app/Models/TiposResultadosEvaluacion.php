<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposResultadosEvaluacion extends Model
{
    use HasFactory;

    protected $table = 'tipos_resultados_evaluacion';

 	public $fillable = ['nombre'];

}
