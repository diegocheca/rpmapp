<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/**
 * Logs en archivos personalizados.
 * El paramero $canal puede ser rpm, api o se puede no enviar, rpm guardará el mensaje en el archivo rpm.log, api en el archivo api.log y si no lo enviamos guardará en laravel.log. El parametro $mensaje, es el mensaje que quiero que se enviee al log, según el canal.
 *
 */
class Logs extends Controller
{
    public static function info($mensaje, $canal = null)
    {
        if (isset($canal)) {
            Log::channel($canal)->info($mensaje);
            return;
        } else {
            # Se agrega al canal 'stack' y guarda el mensaje en el archivo 'laravel.log'
            Log::info($mensaje);
            return;
        }
    }
    public static function error($mensaje, $canal = null)
    {
        if (isset($canal)) {
            Log::channel($canal)->error($mensaje);
            return;
        } else {
            # Se agrega al canal 'stack' y guarda el mensaje en el archivo 'laravel.log'
            Log::error($mensaje);
            return;
        }
    }
}
