<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\ModelNotFoundException as ModelNotFoundException;
use Auth;
class EmpresasControlantesSalta extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $table = 'empresas_controlantes_salta';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
    'id_formulario_alta_salta',
    'razon_social',
    'tipo',
    'cuit',
    'calle',
    'numero',
    'telefono',
    'provincia',
    'departamento',
    'localidad',
    'cp',
    'otro',
    'created_by',
    'updated_by'
    ];


    public static function crear_empresa($id_formulario_alta_salta,$empresa)
	{
        //dd($id_formulario_alta_salta);
        try {
                $empresa_created = EmpresasControlantesSalta::create([
                    'id_formulario_alta_salta' => $id_formulario_alta_salta,
                    'tipo' => $empresa["tipo"],
                    'razon_social' => $empresa["razon_social"],
                    
                    'cuit' => (string)$empresa["cuit"],
                    'calle' => $empresa["calle"],
                    'numero' => $empresa["numero"],
                    'telefono' => $empresa["telefono"],
                    'provincia' => $empresa["provincia"],
                    'departamento' => $empresa["departamento"],
                    'localidad' => $empresa["localidad"],
                    'cp' => $empresa["cp"],
                    'otro' => $empresa["otro"],
                    //$empresa->created_by = $empresa["created_by"];
                    //$empresa->updated_by = $empresa["updated_by"];
                    'created_by' => Auth::user()->id,
                    'updated_by' => Auth::user()->id

                ]);
            return ($empresa_created->id);
        } catch(ModelNotFoundException $e) {
            return (["error",$e]);
        }
    }
}
