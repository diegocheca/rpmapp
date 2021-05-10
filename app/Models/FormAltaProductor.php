<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormAltaProductor extends Model
{
    use HasFactory;

    protected $table = 'form_alta_productors';
    protected $date = ['created_at', 'deleted_at', 'updated_at'];
    protected $fillable = [
        'tipo_productor',
        'cuit',
        'razonsocial',
        'numeroproductor',
        'email',
        'tiposociedad',
        'inscripciondgr',
        'constaciasociedad',
        'leal_calle',
        'leal_numero',
        'leal_telefono',
        'leal_pais',
        'leal_provincia',
        'leal_departamento',
        'leal_localidad',
        'leal_cp',
        'leal_otro',
        'administracion_calle',
        'administracion_numero',
        'administracion_telefono',
        'administracion_pais',
        'administracion_provincia',
        'administracion_departamento',
        'administracion_localidad',
        'administracion_cp',
        'administracion_otro',
        'numero_expdiente',
        'categoria',
        'nombre_mina',
        'descripcion_mina',
        'distrito_minero',
        'mina_cantera',
        'plano_inmueble',
        'minerales_variedad',
        'owner',
        'arrendatario',
        'concesionario',
        'otros',
        'titulo_contrato_posecion',
        'resolucion_concesion_minera',
        'constancia_pago_canon',
        'iia',
        'dia',
        'acciones_a_desarrollar',
        'actividad',
        'fecha_alta_dia',
        'fecha_vencimiento_dia',
        'localidad_mina_pais',
        'localidad_mina_provincia',
        'localidad_mina_departamento',
        'localidad_mina_localidad',
        'tipo_sistema',
        'longitud',
        'latitud',
        'created_by',
        'estado',
        'tipo_tramite'
    ];
    
    
    
    /*id
    cuit
    razonsocial
    numeroproductor
    tiposociedad
    inscripciondgr
    constaciasociedad
    leal_calle
    leal_numero
    leal_telefono
    leal_pais
    leal_provincia
    leal_departamento
    leal_localidad
    leal_cp
    administracion_calle
    administracion_numero
    administracion_telefono
    administracion_pais
    administracion_provincia
    administracion_departamento
    administracion_localidad
    administracion_cp
    numero_expdiente
    categoria
    nombre_mina
    descripcion_mina
    distrito_minero
    mina_cantera
    plano_inmueble
    caracter_invoca
    titulo_contrato_posecion
    resolucion_concesion_minera
    constancia_pago_canon
    iia
    dia
    acciones_a_desarrollar
    actividad
    fecha_alta_dia
    fecha_vencimiento_dia
    localidad_mina_pais
    localidad_mina_provincia
    localidad_mina_departamento
    localidad_mina_localidad
    longitud
    latitud
    created_by
    estado
    created_at
    deleted_at
    updated_at
    */
}
