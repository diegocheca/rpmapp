<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movimiento;
use App\Expediente;
use App\Area;
use App\Persona;
use App\Log;
use Carbon\Carbon;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\MovimientoNuevoEmail;
use App\Mail\MovimientoConSubsanacionEmail;
use App\Mail\MovimientoConSubsanacionOnlineEmail;
use App\Mail\SubsanacionResueltaPorAgente;
use App\Mail\SubsanacionResueltaPorProfesional;
use App\Mail\SubsanacionAvisoAprobada;
use App\Mail\SubsanacionAvisoRechazada;

use File;

use TCG\Voyager\Models\User;

class MovimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    
    public function probando_la_fecha()
    {
        //
        // $mov = Movimiento::select('*')->where('id', '=', 2)->get();
        // $mov = $mov->toJson();
        $mov = Movimiento::first()->created_at;
        //var_dump($mov->diffForHumans());
        Carbon::setLocale('es');
        setlocale(LC_TIME, 'es_AR.UTF-8');
        $date = Carbon::now()->locale('es_AR.UTF-8');
        //echo $date->locale();
        echo "\n";
        //echo $date->monthName;
        echo "\n";
        echo $date->isoFormat('LLLL');
        echo "\n";
        $date = Carbon::now('America/Argentina/Salta');
        //echo Carbon::parse($date)->formatLocalized('%d %B %Y');
        //var_dump(Carbon::parse($mov)->formatLocalized('%d %B %Y'));
    }
    public function traer_movimientos_para_expediente($numero)
    {
       //var_dump($numero);die();
       $id = Expediente::select('id')->where('numero_expediente', '=', $numero)->first();
       //var_dump($id->id);die();
       $mov = Movimiento::select('movimientos.id','movimientos.orden','movimientos.fecha_entrada','movimientos.evaluacion_subsanacion', 'movimientos.fecha_evaluacion_subsanacion', 'movimientos.aprobado', 'movimientos.fecha_salida','movimientos.comentario','movimientos.bandera_observacion','movimientos.observacion','movimientos.online','movimientos.fechartasubsanacion','movimientos.subsanacion','movimientos.id_area','movimientos.id_expediente','movimientos.tramite_finalizado','movimientos.confirmado','movimientos.fecha_confirmacion','movimientos.quien_confirmacion','movimientos.comentario_confirmacion','movimientos.created_by','movimientos.created_at', 'areas.nombre')
       ->join('areas','areas.id','=', 'movimientos.id_area')
       ->where('id_expediente', '=', $id->id)
       ->orderBy('movimientos.created_at', 'desc')->get();
       //var_dump($mov);die();
       return response()->json($mov);

    }
    public function traer_oficinas_para_select(){
        $oficinas = Area::select('id','nombre','descripcion')->get();
        return response()->json($oficinas);
    }
    
    public function traer_expediente_para_component($num_exp){
        $expediente = Expediente::select('expedientes.*', 'tramites.nombre as nomtramite')
        ->join('tramites', 'tramites.id', '=', 'expedientes.id_tramite')
        ->where('numero_expediente', '=', $num_exp)->first();
        //$exp = Expediente::select('*')->where('numero_expediente', '=', $num_exp)->first();

        //$ultimo_movimiento = Movimiento::select('*')->where('id_expediente','=', $expediente->id)->get();
        //$expediente = Expediente::join('movimientos', 'movimientos.id_area', '=', 'expedientes.')select('*')->where('numero_expediente', '=', $num_exp)->first();
        //var_dump($exp);die();

        return response()->json($expediente);
    }
    public function traer_ultimo_mov_exp($num_exp){
        $expediente = Expediente::select('*')->where('numero_expediente', '=', $num_exp)->first();
        $ultimo_movimiento = Movimiento::join('areas', 'areas.id', '=', 'movimientos.id_area')->select('movimientos.*', 'areas.nombre')->where('movimientos.id_expediente','=', $expediente->id)->latest('created_at')->first();
        //$expediente = Expediente::join('movimientos', 'movimientos.id_area', '=', 'expedientes.')select('*')->where('numero_expediente', '=', $num_exp)->first();
        //var_dump($ultimo_movimiento);die();

        return response()->json($ultimo_movimiento);

        
        
    }
    public function traer_penultimo_mov_exp($num_exp){
        $expediente = Expediente::select('*')->where('numero_expediente', '=', $num_exp)->first();
        $ultimo_movimiento = Movimiento::select('*')->where('movimientos.id_expediente','=', $expediente->id)->latest('created_at')->first();
        //$ordennuevo = intval($ultimo_movimiento->orden)-1;
        //var_dump($ordennuevo);die();
        $penultimo_movimiento = Movimiento::
        join('areas', 'areas.id', '=', 'movimientos.id_area')
        ->select('movimientos.*', 'areas.nombre')
        ->where('movimientos.orden','=', intval($ultimo_movimiento->orden)-1)
        ->where('movimientos.id_expediente','=', $expediente->id)
        ->first();
        return response()->json($penultimo_movimiento);
    }

    public function traer_ultimo_mov_exp_ajax($num_exp){
        $expediente = Expediente::select('*')->where('numero_expediente', '=', $num_exp)->first();
        $ultimo_movimiento = Movimiento::join('areas', 'areas.id', '=', 'movimientos.id_area')
        ->join('expedientes', 'expedientes.id', '=', 'movimientos.id_expediente')
        ->join('users', 'users.id', '=', 'expedientes.id_persona')
        ->select('movimientos.*', 'areas.nombre', 'users.name as profesional', 'users.email as profesionalemail')
        ->where('movimientos.id_expediente','=', $expediente->id)
        ->latest('created_at')
        ->first();
        //$expediente = Expediente::join('movimientos', 'movimientos.id_area', '=', 'expedientes.')select('*')->where('numero_expediente', '=', $num_exp)->first();
        //var_dump($ultimo_movimiento);die();

        return response()->json($ultimo_movimiento);
        
    }
    
    public function traer_datos_creado_exp($num_exp){
        $expediente = Expediente::select('*')->where('numero_expediente', '=', $num_exp)->first();
        
        $persona = User::select('*')->where('id','=', $expediente->id_persona)->first();
        //$expediente = Expediente::join('movimientos', 'movimientos.id_area', '=', 'expedientes.')select('*')->where('numero_expediente', '=', $num_exp)->first();
        //var_dump($persona);die();

        return response()->json($persona);
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    
    public function subsanar_movimiento_desde_componente(Request $request, $id_mov){
        /* PASOS A SEGUIR PARA HACER ESTA FUNCION:
        Paso 1 - Buscar el movimiento a actualizar
        Paso 2 - guardar el log
        Paso 3 - modificar el ultimo movimiento
        Paso 4 - actualizar el registro
        Paso 5 responder en base a los resultados
        */
        $movimiento_a_subsanar = Movimiento::find($id_mov);
        //var_dump($movimiento_a_subsanar->online,  $movimiento_a_subsanar->id_expediente);
        //var_dump("-----------------------");
        //Paso 2 - guardar el log
        $valor_anteriores ="
        {
            'orden': ".(string)$movimiento_a_subsanar->orden.",
            'fecha_entrada': '".(string)$movimiento_a_subsanar->fecha_entrada."',
            'fecha_salida': '".(string)$movimiento_a_subsanar->fecha_salida."',
            'comentario': '".(string)$movimiento_a_subsanar->comentario."',
            'bandera_observacion': ".(string)$movimiento_a_subsanar->bandera_observacion.",
            'observacion': '".(string)$movimiento_a_subsanar->observacion."',
            'subsanacion': '".(string)$movimiento_a_subsanar->subsanacion."',
            'id_area': ".(string)$movimiento_a_subsanar->id_area.",
            'id_expediente': ".(string)$movimiento_a_subsanar->id_expediente.",
            'tramite_finalizado': ".(string)$movimiento_a_subsanar->tramite_finalizado.",
            'confirmado': ".(string)$movimiento_a_subsanar->confirmado.",
            'fecha_confirmacion': '".(string)$movimiento_a_subsanar->fecha_confirmacion."',
            'quien_confirmacion': ".(string)$movimiento_a_subsanar->quien_confirmacion.",
            'comentario_confirmacion': '".(string)$movimiento_a_subsanar->comentario_confirmacion."',
            'created_by': ".(string)$movimiento_a_subsanar->created_by.",
        }";
        $log = new Log;
        $log->nombretabla = 'Movimientos';
        $log->accion = 'subsanar';
        $log->valores_nuevos = null;
        $log->valores_viejos = $valor_anteriores;
        $log->id_modificado = $id_mov ;
        $log->estado = 'sin ver'; // "sin ver" - "sin aprobar" - "apronado" - "devuelto" - "archivado"
        $log->created_by = Auth::user()->id;
        $resultado2 = $log->save();
        //Paso 3 - modificar el ultimo movimiento
        //compruebo si es una subsanacion online o no
        $date = Carbon::now('America/Argentina/Salta');
        $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
        if($movimiento_a_subsanar->online == 1 && Auth::user()->role_id == 3) // soy agrimensor q cargo la subsanacion online
        {
            //echo "entre donde tendria q entrar";
            //pasos
            // paso 1 aviso interno para el agente de la dgc
            // paso 2 aviso por email para el agente de la dgc
            $exp = Expediente::find($movimiento_a_subsanar->id_expediente);
            //var_dump($movimiento_a_subsanar->id_expdiente);die();
            $agrimensor = User::select('name','email')->where('id','=',$exp->id_persona)->first();
            //$to_email = "diegochecarelli@gmail.com";
            $area = Area::select('nombre')->where('id','=',$movimiento_a_subsanar->id_area)->first();
            $el_q_recibio = User::select('name','email')->where('id','=',$movimiento_a_subsanar->quien_confirmacion)->first();
            //$to_email = $agrimensor->email;
            $to_email = $el_q_recibio->email;
            
            $link_de_carpeta = "admin/media/files_subsanacion/".$movimiento_a_subsanar->id."/".$exp->id;
            Mail::to($to_email)->send(new SubsanacionResueltaPorProfesional($agrimensor->nombre , $updatedDateFormat ,$request->subsanacion,
            $area->nombre, $el_q_recibio->name, $exp->id, $exp->numero_expediente, $link_de_carpeta, $movimiento_a_subsanar->id));
            // paso 3 actualizar fechas
            $movimiento_a_subsanar->fechartasubsanacion = $date;
            $movimiento_a_subsanar->updated_at = $date;
            $movimiento_a_subsanar->subsanacion = $request->subsanacion;
        }
        elseif($movimiento_a_subsanar->online == 1 && Auth::user()->role_id == 4 || Auth::user()->role_id == 5 || Auth::user()->role_id == 1 ){ // subsano online, pero no soy agrimensor
           // echo "estoy acaasdasd";
            // paso 1 avisar al agrimensor
            $exp = Expediente::find($movimiento_a_subsanar->id_expdiente);
            $agrimensor = User::select('name','email')->where('id','=',$exp->id_persona)->first();
            //$to_email = "diegochecarelli@gmail.com";
            $area = Area::select('nombre')->where('id','=',$movimiento_a_subsanar->id_area)->first();
            $to_email = $agrimensor->email;
            $link_de_carpeta = "admin/media/files_subsanacion/".$movimiento_a_subsanar->id."/".$exp->id;
            Mail::to($to_email)->send(new SubsanacionResueltaPorAgente($agrimensor->nombre , $updatedDateFormat ,$request->subsanacion,
            $area->nombre, Auth::user()->name, $exp->numero_expediente, $link_de_carpeta));
            // paso 2 actualizar movimiento
            // paso 3 actualizar fechas
            $movimiento_a_subsanar->fechartasubsanacion = $date;
            $movimiento_a_subsanar->updated_at = $date;
            $movimiento_a_subsanar->subsanacion = $request->subsanacion;
        }
        else { //subsanacion desde mesa de entrada,
            //var_dump($request->subsanacion);
            $movimiento_a_subsanar->fechartasubsanacion = $date;
            $movimiento_a_subsanar->updated_at = $date;
            $movimiento_a_subsanar->subsanacion = $request->subsanacion;


            $exp = Expediente::find($movimiento_a_subsanar->id_expediente);
            $agrimensor = User::select('name','email')->where('id','=',$exp->id_persona)->first();
            $area = Area::select('nombre')->where('id','=',$movimiento_a_subsanar->id_area)->first();
            $to_email = $agrimensor->email;
            $link_de_carpeta = "admin/media/files_subsanacion/".$movimiento_a_subsanar->id."/".$exp->id;
            Mail::to($to_email)->send(new SubsanacionAvisoAprobada($agrimensor->nombre , $updatedDateFormat ,$request->subsanacion,
            $area->nombre, Auth::user()->name, $exp->numero_expediente, $link_de_carpeta));
            $movimiento_a_subsanar->fecha_evaluacion_subsanacion = $date;
            $movimiento_a_subsanar->aprobado = true;
            $movimiento_a_subsanar->evaluacion_subsanacion = "Aprobación automatica por ser subsanado en Mesa de Entrada.";
            // como lo subsanao desde ME , voy a aprobar automaticamente la subsanacion

        }
        
        
        //Paso 4 - actualizar el registro
        $resultado3 = $movimiento_a_subsanar->save();
        //var_dump($resultado2);
        //var_dump("-----------------------");
        //Paso 4 - buscar el movimiento anterior
        //Paso 7 responder en base a los resultados
        if($resultado3)
            return response('ok', 200);
        else return response('mal', 200);
    }





    public function aprobar_subsanar_movimiento_desde_componente(Request $request, $id_mov, $apro){
        //es la misma funcion para aprobar o rechazar la subsanacion
        /* PASOS A SEGUIR PARA HACER ESTA FUNCION:
        Paso 1 - Buscar el movimiento a actualizar
        Paso 2 - guardar el log
        Paso 3 - modificar el ultimo movimiento
        Paso 4 - actualizar el registro
        Paso 5 responder en base a los resultados
        */
        //var_dump($apro);die();
        $movimiento_a_subsanar = Movimiento::find($id_mov);
        //var_dump($movimiento_a_subsanar->id_expediente);die();
        //var_dump($movimiento_a_subsanar->online,  $movimiento_a_subsanar->id_expediente);
        //var_dump("-----------------------");
        //Paso 2 - guardar el log
        $valor_anteriores ="
        {
            'orden': ".(string)$movimiento_a_subsanar->orden.",
            'fecha_entrada': '".(string)$movimiento_a_subsanar->fecha_entrada."',
            'fecha_salida': '".(string)$movimiento_a_subsanar->fecha_salida."',
            'comentario': '".(string)$movimiento_a_subsanar->comentario."',
            'bandera_observacion': ".(string)$movimiento_a_subsanar->bandera_observacion.",
            'observacion': '".(string)$movimiento_a_subsanar->observacion."',
            'subsanacion': '".(string)$movimiento_a_subsanar->subsanacion."',
            'id_area': ".(string)$movimiento_a_subsanar->id_area.",
            'id_expediente': ".(string)$movimiento_a_subsanar->id_expediente.",
            'tramite_finalizado': ".(string)$movimiento_a_subsanar->tramite_finalizado.",
            'confirmado': ".(string)$movimiento_a_subsanar->confirmado.",
            'fecha_confirmacion': '".(string)$movimiento_a_subsanar->fecha_confirmacion."',
            'quien_confirmacion': ".(string)$movimiento_a_subsanar->quien_confirmacion.",
            'comentario_confirmacion': '".(string)$movimiento_a_subsanar->comentario_confirmacion."',
            'created_by': ".(string)$movimiento_a_subsanar->created_by.",
        }";
        $log = new Log;
        $log->nombretabla = 'Movimientos';
        $log->accion = 'subsanar';
        $log->valores_nuevos = null;
        $log->valores_viejos = $valor_anteriores;
        $log->id_modificado = $id_mov ;
        $log->estado = 'sin ver'; // "sin ver" - "sin aprobar" - "apronado" - "devuelto" - "archivado"
        $log->created_by = Auth::user()->id;
        $resultado2 = $log->save();
        //Paso 3 - modificar el ultimo movimiento
        //compruebo si es una subsanacion online o no
        $date = Carbon::now('America/Argentina/Salta');
        if($movimiento_a_subsanar->online == 1 && Auth::user()->role_id == 4 || Auth::user()->role_id == 5 || Auth::user()->role_id == 1 ){ // subsano online, pero no soy agrimensor
            // paso 1 avisar al agrimensor
            $exp = Expediente::find($movimiento_a_subsanar->id_expediente);
            //var_dump($movimiento_a_subsanar->id_expdiente);die();
            $agrimensor = User::select('name','email')->where('id','=',$exp->id_persona)->first();
            //$to_email = "diegochecarelli@hotmail.com";
            $area = Area::select('nombre')->where('id','=',$movimiento_a_subsanar->id_area)->first();
            $to_email = $agrimensor->email;
            $link_de_carpeta = "admin/media/files_subsanacion/".$movimiento_a_subsanar->id."/".$exp->id;

            if($apro == 1)
            { // significa que aprobo la subsanación
                $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
                Mail::to($to_email)->send(new SubsanacionAvisoAprobada($agrimensor->nombre , $updatedDateFormat ,$request->subsanacion,
                $area->nombre, Auth::user()->name, $exp->numero_expediente, $link_de_carpeta));
                // paso 2 actualizar movimiento
                // paso 3 actualizar fechas
                $movimiento_a_subsanar->fecha_evaluacion_subsanacion = $date;
                $movimiento_a_subsanar->aprobado = true;
                
                $movimiento_a_subsanar->updated_at = $date;
                $movimiento_a_subsanar->evaluacion_subsanacion = $request->subsanacion;

                $resultado3 = $movimiento_a_subsanar->save();
                return response('ok', 200);

            }
            elseif(intval($apro) == 0){
                // significa que rechazo la subsanación
                $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
               
               
                Mail::to($to_email)->send(new SubsanacionAvisoRechazada($agrimensor->nombre , $updatedDateFormat ,$request->subsanacion,
                $area->nombre, Auth::user()->name, $exp->numero_expediente, $link_de_carpeta));

                // paso 2 actualizar movimiento
                // paso 3 actualizar fechas
                $movimiento_a_subsanar->fecha_evaluacion_subsanacion = $date;
                $movimiento_a_subsanar->aprobado = false;
                
                $movimiento_a_subsanar->updated_at = $date;
                $movimiento_a_subsanar->evaluacion_subsanacion = $request->subsanacion;
                $movimiento_a_subsanar->save();

                // voy a mover el expediente automaticamente a mesa de entrada
                //var_dump
                $ultimo_movimiento = Movimiento::select('*')->where('movimientos.id_expediente','=', $movimiento_a_subsanar->id_expediente)->latest('created_at')->first();
                $ultimo_movimiento->fecha_salida = date("Y-m-d H:i:s");
                //var_dump($movimiento_a_subsanar->id_expdiente, $ultimo_movimiento, );
                $resultado_paso_3 = $ultimo_movimiento->save();
                $bandera_observacion = false;
                $bandera_fin = false;
                $movimento_nuevo = new Movimiento;
                $online = 0;
                $movimento_nuevo->id_area = 3; // si o si va a mesa de entrada
                $movimento_nuevo->orden = intval($ultimo_movimiento->orden)+1;
                $movimento_nuevo->fecha_entrada = $date;
                $movimento_nuevo->fecha_salida = null;
                $movimento_nuevo->comentario = "Este expediente posee una subsanación que fue rechazada por el Agente de la DGC.";
                $movimento_nuevo->bandera_observacion = true;
                $movimento_nuevo->observacion = $movimiento_a_subsanar->observacion;
                $movimento_nuevo->online = 0;
                $movimento_nuevo->subsanacion = null;
                $movimento_nuevo->id_expediente = $movimiento_a_subsanar->id_expediente;
                $movimento_nuevo->tramite_finalizado = false;
                $movimento_nuevo->confirmado = 0;
                $movimento_nuevo->fecha_confirmacion = null ;
                $movimento_nuevo->quien_confirmacion= null ;
                $movimento_nuevo->comentario_confirmacion = null;
                $movimento_nuevo->created_by = Auth::user()->id;
                $resultado_paso_4 = $movimento_nuevo->save();
                $valor_nuevos ="
                {
                    'orden': ".(string)$movimento_nuevo->orden.",
                    'fecha_entrada': '".(string)$movimento_nuevo->fecha_entrada."',
                    'fecha_salida': '".(string)$movimento_nuevo->fecha_salida."',
                    'comentario': '".(string)$movimento_nuevo->comentario."',
                    'bandera_observacion': ".(string)$movimento_nuevo->bandera_observacion.",
                    'observacion': '".(string)$movimento_nuevo->observacion."',
                    'subsanacion': '".(string)$movimento_nuevo->subsanacion."',
                    'id_area': ".(string)$movimento_nuevo->id_area.",
                    'id_expediente': ".(string)$movimento_nuevo->id_expediente.",
                    'tramite_finalizado': ".(string)$movimento_nuevo->tramite_finalizado.",
                    'confirmado': ".(string)$movimento_nuevo->confirmado.",
                    'fecha_confirmacion': '".(string)$movimento_nuevo->fecha_confirmacion."',
                    'quien_confirmacion': ".(string)$movimento_nuevo->quien_confirmacion.",
                    'comentario_confirmacion': '".(string)$movimento_nuevo->comentario_confirmacion."',
                    'created_by': ".(string)$movimento_nuevo->created_by.",
                }";
                $log = new Log;
                $log->nombretabla = 'Movimiento';
                $log->accion = 'add';
                $log->valores_nuevos = $valor_nuevos;
                $log->valores_viejos = null;
                $log->id_modificado = $movimento_nuevo->id ;
                $log->estado = 'sin ver'; // "sin ver" - "sin aprobar" - "apronado" - "devuelto" - "archivado"
                $log->created_by = Auth::user()->id;
                $resultado8 = $log->save();
                return response('ok', 200);

            }
            else return response('mala opcion', 200);
            
        }
        return response('mal', 200);
    }

    public function devolver_movimiento_desde_component($id_mov){
        /* PASOS A SEGUIR PARA HACER ESTA FUNCION:
        Paso 1 - Buscar el movimiento actual
        Paso 2 - guardar el log
        Paso 3 - eliminar el ultimo movimiento
        Paso 4 - buscar el movimiento anterior
        Paso 5 - modificar el ultimo movimiento
        Paso 6 - actualizar el registro
        Paso 7 responder en base a los resultados
        */
        $movimiento_a_borrar = Movimiento::find($id_mov);
        $orden_anterior = $movimiento_a_borrar["orden"];
        //var_dump($movimiento_a_borrar);
        //var_dump("-----------------------");
        //Paso 2 - guardar el log
        $valor_anteriores ="
        {
            'orden': ".(string)$movimiento_a_borrar->orden.",
            'fecha_entrada': '".(string)$movimiento_a_borrar->fecha_entrada."',
            'fecha_salida': '".(string)$movimiento_a_borrar->fecha_salida."',
            'comentario': '".(string)$movimiento_a_borrar->comentario."',
            'bandera_observacion': ".(string)$movimiento_a_borrar->bandera_observacion.",
            'observacion': '".(string)$movimiento_a_borrar->observacion."',
            'subsanacion': '".(string)$movimiento_a_borrar->subsanacion."',
            'id_area': ".(string)$movimiento_a_borrar->id_area.",
            'id_expediente': ".(string)$movimiento_a_borrar->id_expediente.",
            'tramite_finalizado': ".(string)$movimiento_a_borrar->tramite_finalizado.",
            'confirmado': ".(string)$movimiento_a_borrar->confirmado.",
            'fecha_confirmacion': '".(string)$movimiento_a_borrar->fecha_confirmacion."',
            'quien_confirmacion': ".(string)$movimiento_a_borrar->quien_confirmacion.",
            'comentario_confirmacion': '".(string)$movimiento_a_borrar->comentario_confirmacion."',
            'created_by': ".(string)$movimiento_a_borrar->created_by.",
        }";
        $log = new Log;
        $log->nombretabla = 'Movimiento';
        $log->accion = 'delete';
        $log->valores_nuevos = null;
        $log->valores_viejos = $valor_anteriores;
        $log->id_modificado = $id_mov ;
        $log->estado = 'sin ver'; // "sin ver" - "sin aprobar" - "apronado" - "devuelto" - "archivado"
        $log->created_by = Auth::user()->id;
        $resultado2 = $log->save();
        //Paso 3 - eliminar el ultimo movimiento
        //Para el caso de que mesa de entrada quiera borrar el movimiento, pero este a su vez tiene comentario y subsanacion
        if($movimiento_a_borrar->observacion != null) // este es el caso de que el movimiento tiene una obseracion y no puede ser eleminado
        //cuando se crea la segunda subsanación, se debe , si o si, mandar a mesa de entrada, y este lo puede rechaz y perder todo
            if(Auth::user()->role_id == 6) // soy mesa de entrada
            {
                echo "entre a los ifs";
                $resultado3 = $movimiento_a_borrar->delete(); //////// revisar esto, creo q de todas mnaeras hay q borrar el ultimo movimiento
            }
                

        
        else  // este esl caso comun de hacer un mal movmiento
            $resultado3 = $movimiento_a_borrar->delete();
        //var_dump($resultado2);
        //var_dump("-----------------------");
        //Paso 4 - buscar el movimiento anterior
        $movimiento_anterior = Movimiento::select('*')->where('id', '=', intval($id_mov)-1)->first();
        //var_dump($movimiento_anterior);
        //var_dump("-----------------------");
        //Paso 5 - modificar el ultimo movimiento
        $movimiento_anterior->fecha_salida = null;
        $movimiento_anterior->confirmado = 0;
        $movimiento_anterior->fecha_confirmacion = null;
        $movimiento_anterior->quien_confirmacion = null;
        $movimiento_anterior->comentario_confirmacion = null;
        //Paso 6 - actualizar el registro
        $resultado5= $movimiento_anterior->save();
        //var_dump($resultado5);
        //var_dump("-----------------------");
        //Paso 7 responder en base a los resultados
        if($resultado2 && $resultado5 && $resultado3)
            return response('ok', 200);
        else return response('mal', 200);
    }
    
    public function crear_movimiento_desde_component(Request $request)
    {
        if($request->bandera_subsanacion == true)
        {//caso de hacer subnacion online
            /* Pasos a seguir
            Paso 1: actualizar el comentario y la bandera online
            Paso 2: buscar persona
            Paso 3: crear carpeta de la subsanacion
            Paso 4: mando email al agrimensor avisando que se espera su intervencion online
            Paso 5: responder al front
             */
            //Paso 1
            $date = Carbon::now('America/Argentina/Salta');
            //var_dump($request->all());die();
            $ultimo_movimiento = Movimiento::select('*')->where('movimientos.id_expediente','=', $request->id_expdiente)->latest('created_at')->first();
            $ultimo_movimiento->online = true;
            $ultimo_movimiento->observacion = $request->observacion;
            $ultimo_movimiento->fechartasubsanacion = null;
            $ultimo_movimiento->updated_at = $date;
            //var_dump($request->observacion);die();
            $ultimo_movimiento->save();
            //Paso 2: buscar persona
            $exp = Expediente::find($request->id_expdiente);
            //Paso 3
            $agrimensor = User::select('name','email')->where('id','=',$exp->id_persona)->first();


            $path = "archivos_agrimensores/".(string)$agrimensor->name."/subnacion".(string)$ultimo_movimiento->id;
            //$result = File::makeDirectory(storage_path($path));
            $result = File::makeDirectory(public_path().'/'.$path,0777,true);
            //una vez creada la carpeta ahora se la voy a asociar al expediente recien creado
            //Fin paso 3
            //Paso 5 - envio email a agrimensor asociado
            //obtener el email del agrimensor
            //$exp = Expediente::select('*')->where('id','=',$request->id_expdiente)->first();
            //$to_email = "diegochecarelli@hotmail.com";
            $to_email = $agrimensor->email;
            $area = Area::select('nombre')->where('id','=',$request->id_area)->first();
            //movimiento con subsanacion online
            $bandera_observacion = true;
            $bandera_fin = false;
            $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');
            $link_de_carpeta = "admin/media/files_subsanacion/".$ultimo_movimiento->id."/".$exp->id;
            Mail::to($to_email)->send(new MovimientoConSubsanacionOnlineEmail($agrimensor->nombre , $updatedDateFormat ,$request->observacion,
            $bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente,$request->observacion , $link_de_carpeta));
            //Fin Paso 5
            return response()->json("ok");
        }
        else{ //caso de subsanacion en persona
            //Proceso a realizar
            /*
            CU: CREAR MOVIMIENTO
            Paso 1 - validar datos en el front
            Paso 2 - validar datos en el back
            Paso 3 - obtener el orden relativo del ultimo movimiento
            Paso 3 - cerrar el movimiento anterior / le pongo fecha salida y obtengo el ultimo orden de mov
            Paso 4 - crear nuevo movimiento

            // El PASO 5 se suspende xq pasa a estar al momento de recibir el expediente
            Paso 5 - veo si tiene subsanacion o no
            Paso 5.1 - Caso: No tiene subsanacion -->envio email a agrimensor asociado
            Paso 5.2 - Caso: Si tiene subsanacion -->envio email de subsanacion

            Paso 6 - crear notificacion para empleados de la nueva area a la que va el expediente.
            Paso 7 - hacer algo de confirmacion de pase o algo asi
            Paso 8 - Fin
            */
            //  Paso 2:validar los datos
            // Paso 3: cerrar el movimiento anterior
            $date = Carbon::now('America/Argentina/Salta');
            //var_dump($request->id_expdiente);
            //$request->id_expdiente = 52;
            $ultimo_movimiento = Movimiento::select('*')->where('movimientos.id_expediente','=', $request->id_expdiente)->latest('created_at')->first();
            $ultimo_movimiento->fecha_salida = $date;
            $resultado_paso_3 = $ultimo_movimiento->save();
            //Paso 4 - crear nuevo movimiento
            $bandera_observacion = $request->bandera_observacion == 'true'? 1: 0;
            $bandera_fin = $request->tramite_finalizado == 'true'? true: false;
            //var_dump($bandera_fin);die();
            $movimento_nuevo = new Movimiento;
            $online = 0;
            /*if($request->bandera_subsanacion == true)
                $online = 1;*/
            if($bandera_fin == true) // entonces se termina el expediente
            {
                $movimento_nuevo->id_area = 9; // id fijo del departamento archivo
            }
            else // entonces es un movimiento intermedio
            {
                $movimento_nuevo->id_area = $request->id_area;
            }
            $movimento_nuevo->orden = intval($ultimo_movimiento->orden)+1;
            $movimento_nuevo->fecha_entrada = date("Y-m-d H:i:s");
            $movimento_nuevo->fecha_salida = null;
            $movimento_nuevo->comentario = $request->comentario;
            $movimento_nuevo->bandera_observacion = $bandera_observacion;
            $movimento_nuevo->observacion = $request->observacion;
            $movimento_nuevo->online = $online;
            $movimento_nuevo->subsanacion = $request->subsanacion;
            //$movimento_nuevo->id_area = $request->id_area;
            $movimento_nuevo->id_expediente = $request->id_expdiente;
            $movimento_nuevo->tramite_finalizado = $bandera_fin;
            $movimento_nuevo->confirmado = 0;
            $movimento_nuevo->fecha_confirmacion = null ;
            $movimento_nuevo->quien_confirmacion= null ;
            $movimento_nuevo->comentario_confirmacion = null;
            $movimento_nuevo->created_by = Auth::user()->id;
            //var_dump($movimento_nuevo);die();
            $resultado_paso_4 = $movimento_nuevo->save();
            //PASO 5 suspendido , pasa a formar parte de la recepcion del expediente
            /*
            //Paso 5 - envio email a agrimensor asociado
            //obtener el email del agrimensor
            $exp = Expediente::select('*')->where('id','=',$request->id_expdiente)->first();
            $agrimensor = User::select('email')->where('id','=',$exp->id_persona)->first();
            $to_email = "diegochecarelli@gmail.com";
            //$to_email = $agrimensor->email;
            $area = Area::select('*')->where('id','=',$request->id_area)->first();
            //var_dump($agrimensor->nombre ,date("Y-m-d H:i:s") ,$request->comentario,
            //$bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente);die();
            if($movimento_nuevo->subsanacion == null )
            {// este es el caso de un movimiento normal sin subsanacion
                Mail::to($to_email)->send(new MovimientoNuevoEmail($agrimensor->nombre ,date("Y-m-d H:i:s") ,$request->comentario,
                $bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente));
            }
            else{
                //movimiento con subsanacion
                Mail::to($to_email)->send(new MovimientoConSubsanacionEmail($agrimensor->nombre ,date("Y-m-d H:i:s") ,$request->comentario,
                $bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente));

            }


            //Mail::to($to_email)->send(new MovimientoNuevoEmail($agrimensor->nombre ,date("Y-m-d H:i:s") ,$request->comentario,
            //$bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente));
            */
            //Fin Paso 5
            
            //  Paso 6 - crear notificacion para empleados de la nueva area a la que va el expediente.
            //ni idea de esto

            // Paso 7 - hacer algo de confirmacion de pase o algo asi
            //ni idea de esto

            //Paso 8 - guardar el log

            $valor_nuevos ="
            {
                'orden': ".(string)$movimento_nuevo->orden.",
                'fecha_entrada': '".(string)$movimento_nuevo->fecha_entrada."',
                'fecha_salida': '".(string)$movimento_nuevo->fecha_salida."',
                'comentario': '".(string)$movimento_nuevo->comentario."',
                'bandera_observacion': ".(string)$movimento_nuevo->bandera_observacion.",
                'observacion': '".(string)$movimento_nuevo->observacion."',
                'subsanacion': '".(string)$movimento_nuevo->subsanacion."',
                'id_area': ".(string)$movimento_nuevo->id_area.",
                'id_expediente': ".(string)$movimento_nuevo->id_expediente.",
                'tramite_finalizado': ".(string)$movimento_nuevo->tramite_finalizado.",
                'confirmado': ".(string)$movimento_nuevo->confirmado.",
                'fecha_confirmacion': '".(string)$movimento_nuevo->fecha_confirmacion."',
                'quien_confirmacion': ".(string)$movimento_nuevo->quien_confirmacion.",
                'comentario_confirmacion': '".(string)$movimento_nuevo->comentario_confirmacion."',
                'created_by': ".(string)$movimento_nuevo->created_by.",
            }";

            $log = new Log;
            $log->nombretabla = 'Movimiento';
            $log->accion = 'add';
            $log->valores_nuevos = $valor_nuevos;
            $log->valores_viejos = null;
            $log->id_modificado = $movimento_nuevo->id ;
            $log->estado = 'sin ver'; // "sin ver" - "sin aprobar" - "apronado" - "devuelto" - "archivado"
            $log->created_by = Auth::user()->id;
            $resultado8 = $log->save();

            //if($resultado == "true")
            return response()->json("ok");

            // return response()->json([$request->all()]);
        }
        
    }
    //es llamada desde un modal de vuejs
    public function recibir_exp_por_movimiento(Request $request)
    {
        //
        /*Paso a segir:
        Paso 1: buscar el registro del mov
        Paso 2: crear objeeto actualizado
        Paso 3: actualizar
        Paso 4 - veo si tiene subsanacion o no
        Paso 4.1 - Caso: No tiene subsanacion -->envio email a agrimensor asociado
        Paso 4.2 - Caso: Si tiene subsanacion -->envio email de subsanacion
        */
        $date = Carbon::now('America/Argentina/Salta');
        //Paso 1
        $moviento_a_actualizar = Movimiento::find($request->movimiento_id);
        //Fin Paso 1
        //Paso 2
        $moviento_a_actualizar->confirmado = 1;
        $moviento_a_actualizar->fecha_confirmacion = $date;
        $moviento_a_actualizar->quien_confirmacion = Auth::user()->id;
        $moviento_a_actualizar->comentario_confirmacion = $request->comentario_confirmacion;
        //Fin Paso 2
        //Paso 3
        $resultado_update = $moviento_a_actualizar->save();
        //Fin Paso 3
        //Paso 4 - envio email a agrimensor asociado
        //obtener el email del agrimensor
        $exp = Expediente::find($moviento_a_actualizar->id_expediente);
        $agrimensor = User::find($exp->id_persona);
        //$to_email = "diegochecarelli@hotmail.com"; // esto en desarrollo
        $orden_anterior = intval($moviento_a_actualizar->orden)-1;
        $exp_anterior =  Movimiento::select('*')
        ->where('id_expediente', '=', $moviento_a_actualizar->id_expediente)
        ->where('orden', '=', $orden_anterior)
        ->first();
        $area_anterior = Area::find($exp_anterior->id_area);
        //var_dump($area_anterior->nombre);die();
        
        
        $to_email = $agrimensor->email; // esto es en produccion
        $area = Area::find($moviento_a_actualizar->id_area);
        //$bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente);die();
        $bandera_observacion = ($request->comentario!= null) ? true : false;
        $bandera_fin = false; // no puede ser final si estoy recibiendo

        $updatedDateFormat =  Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y H:i:s');

        if($moviento_a_actualizar->observacion == null )
        {// este es el caso de un movimiento normal sin observacion
            Mail::to($to_email)->send(new MovimientoNuevoEmail($agrimensor->name , $updatedDateFormat ,$request->comentario,
            $bandera_observacion , $area->nombre, $bandera_fin, $exp->id, $exp->numero_expediente));
        }
        else{
            //movimiento con observacion
            Mail::to($to_email)->send(new MovimientoConSubsanacionEmail($agrimensor->name , $updatedDateFormat ,$moviento_a_actualizar->observacion,
            $moviento_a_actualizar->bandera_observacion , $area_anterior->nombre, $bandera_fin, $exp->id, $exp->numero_expediente, $moviento_a_actualizar->subsanacion));
        }
        //Fin Paso 4
        if($resultado_update)
            return response()->json("ok");
        else
            return response()->json("mal");
        //Mail::to($to_email)->send(new MovimientoNuevoEmail($agrimensor->nombre ,date("Y-m-d H:i:s") ,$request->comentario,
        //$bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente));
    }

    
    public function mandar_notificacion_desde_component($id_exp)
    {
        //SIN HACER
        /*Paso a segir:
        */
        //Paso 1
        /*$exp = Expediente::find($id_exp);
        $agrimensor = User::find($exp->id_persona);
        //$to_email = "diegochecarelli@hotmail.com"; // esto en desarrollo
        $orden_anterior = intval($moviento_a_actualizar->orden)-1;
        $to_email = $agrimensor->email; // esto es en produccion
        $area = Area::find($moviento_a_actualizar->id_area);
        Mail::to($to_email)->send(new MovimientoNuevoEmail($agrimensor->name ,date("Y-m-d H:i:s") ,$request->comentario,
        $bandera_observacion , $area->nombre, $bandera_fin, $exp->id, $exp->numero_expediente));
        if($resultado_update)*/
            return response()->json("ok");
       /* else
            return response()->json("mal");*/
        //Mail::to($to_email)->send(new MovimientoNuevoEmail($agrimensor->nombre ,date("Y-m-d H:i:s") ,$request->comentario,
        //$bandera_observacion , $area->nombre, $bandera_fin, $request->id_expdiente, $exp->numero_expediente));
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
