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
    public static function guardar_paso($id_provincia ,$perfil, $formualrio, $accion , $estado, $i , $data) {
        $filas = Permission::select('*')
        ->where('id_provincia', '=', $id_provincia)
        ->where('id_rol', '=', $perfil)
        ->where('formulario', '=', $formualrio)
        ->where('accion', '=', $accion)
        ->where('estado', '=', $estado)
        ->first();

        $filas->data = $data;  
        $filas->edited_by = Auth::user()->id;      
        return $filas->save();
    }
    public static function query_permissions_all_page($id_provincia ,$perfil, $formualrio, $accion , $estado, $pagina) {
        $filas = Permission::select('*')
        ->where('id_provincia', '=', $id_provincia)
        ->where('id_rol', '=', $perfil)
        ->where('formulario', '=', intval($formualrio) )
        ->where('accion', '=', $accion)
        ->where('estado', '=', $estado)
        ->where('pagina', '=', $pagina)
        ->get();
        return $filas;
    }
    


}
