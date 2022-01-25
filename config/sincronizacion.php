<?php

return [

    /*
    |--------------------------------------------------------------------------
    | SCRIPT - SINCRONIZACION
    |--------------------------------------------------------------------------
    |
    | Aca van las variables globales de sincronizacion
    |
    */

    'provincia_id' => env('ID_PROV', 0),
    'provincia' => env('PROVINCIA', 'Desconocida'),

    /*
    |--------------------------------------------------------------------------
    | URL SERVER DE NACIÓN
    |--------------------------------------------------------------------------
    */
    'servidorNacion' => env('SERVER_NACION', 'Desconocido'),
    'tokenNacion' => env('SERVER_TOKEN', 'Ninguno'),

];
