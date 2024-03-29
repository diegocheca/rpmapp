<?php
 

namespace App\Http\Controllers\formWebController;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\CountriesController;
use App\Http\Controllers\formWebController\TipoDocumentoController;
use App\Http\Controllers\formWebController\MineralController;
use App\Http\Controllers\formWebController\EstadoTerrenoController;
use App\Http\Controllers\formWebController\TerrenoController;
use App\Http\Controllers\formWebController\EstadoSolicitudController;


//Modelos DB
use App\Models\formWebModels\formSolicitud;
use App\Models\formWebModels\formTipoDocumento;
use App\Models\formWebModels\formPersona;
use App\Models\formWebModels\formRazonSocial;
use App\Models\formWebModels\formRolPersona;
use App\Models\formWebModels\form_persona_form_solicitud;
use App\Models\formWebModels\form_razon_social_form_solicitud;
use App\Models\formWebModels\formMatriculaCatastral;
use App\Models\Minerales;
use App\Models\formWebModels\formEstadoTerreno;
use App\Models\formWebModels\formTerreno;
use App\Models\formWebModels\formMina;
use App\Models\formWebModels\formCoordenadasPoligonal;
use App\Models\formWebModels\formMCProvisoria; 
use App\Models\formWebModels\form_mineral_form_terreno;
use App\Models\formWebModels\formEstadoSolicitud; 
use App\Models\formWebModels\form_estado_solicitud_form_solicitud;
class SolicitudesController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {       
       
        return  Inertia::render('formWeb/mostrar');// muestra las dos op de solicitud q hay
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 

     //solicitud_exploracion
public function create()
   {
            $provinces = CountriesController::getProvinces();       
            $tipo_documento = TipoDocumentoController::getTipoDocumento();
            $estado_terreno = EstadoTerrenoController::getEstadoTerreno(); 
            $estado_solicitud=EstadoSolicitudController::getEstadoSolicitud();       
      
            return Inertia::render('formWeb/Form', [
            'action' => "create",
            'saveUrl' => "solicitudes.store",            
            'saveFileUrl' => "solicitudes.update",             
            'province' => env('PROVINCE', 'sanjuan') . "/s_exploracion_wizard",          
            'folder' => 'solicitudes',
            'reinscripcion' => [],
            'titleForm' => 'Crear Solicitud Exploración',
            'evaluate' => false,
            'provincia' => $provinces,            
            'tipo_documento'=>$tipo_documento,            
            'estado_solicitud'=>$estado_solicitud,
            'estado_terreno'=> $estado_terreno,            
        ]);    
   }  

//solicitud_descubrimiento
public function create2()
    { 
        $provincia = CountriesController::getProvinces();         
        $tipo_doc = TipoDocumentoController::getTipoDocumento();
        $mineral = MineralesController::getMineral();
        $estado_terr = EstadoTerrenoController::getEstadoTerreno();
        $estado_solicitud=EstadoSolicitudController::getEstadoSolicitud();
       
        return Inertia::render('formWeb/Form2', [
            'action' => "create2",
            'saveUrl' => "solicitudes.store",            
            'saveFileUrl' => "solicitudes.update",
            'province' => env('PROVINCE', 'sanjuan') . "/s_descubrimiento_wizard",
            'titleForm' => 'Crear Solicitud Descubrimeinto',
            'provincia' => $provincia,            
            'tipo_documento'=>$tipo_doc,  
            'mineral'=>$mineral,
            'estado_terreno'=> $estado_terr,
            'estado_solicitud'=>$estado_solicitud,
        ]);

    }

   
/**
 * Store a newly created resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @return \Illuminate\Http\Response
 */
         
//procesa datos de solicitud_exploracion
public function postSolicitudes(Request $request)
    {        
          $Step = $request->step;
          $Datos = $request->datos;  
      
        switch ($Step) 
            {   
            case 1: //DATOS SOLICITUD 
                             
                $plazo= $Datos['plazo_soli'];
                $n_exp= $Datos['num_expediente'];
                $periodo = $Datos['periodo']['value'];
                $programa = $Datos['programa_adjunto']['value'];
                $pro=$Datos['prov_explo']['label'];
                $dptos=$Datos['dpto_explo']['label'];
                $locali=$Datos['loc_explo']['label'];
                $paraj=$Datos['paraje1'];
                $tipo = 'Exploracion';

                $datoSoli =[
                'plazo_solicitado' =>$plazo,
                'programa_trabajo' =>$programa,
                'periodo_trabajo' =>$periodo,  
                'tipo_solicitud' => $tipo,
                'nro_expediente' => $n_exp,
                'provSolicitud' => $pro,
                'dptoSolicitud' => $dptos,
                'locSolicitud'  => $locali,
                'paraje' => $paraj,                               
                ];
                $solicitud_id=formSolicitud::create($datoSoli); 
               // $solicitud_id= formSolicitud::all()->last()->id;//recupero el ultimo id de solicitud 
               $idS= $solicitud_id->id;

                $estados=formEstadoSolicitud::all();
                 
                foreach($estados as $estado){
                    if($estado->nom_estado_solicitud == 'DatosSolicitud'){
                        $idEstado=$estado->id;

                        $arrayEst=[
                            'form_estado_solicitud_id'=>$idEstado,
                            'form_solicitud_id'=>$idS,
                        ];
                        form_estado_solicitud_form_solicitud::create($arrayEst);
                    } 
                }
                break;

            
            case 2: //DATOS SOLICITANTE              
                                                        
                    $domicilio= $Datos['domicilio']; 
                    $provincia = $Datos['provincia']['label'];
                    $departamento = $Datos['departamento']['label'];
                    $localidad = $Datos['localidad']['label'];
                    $domicilioLegal = $Datos['domicilioLegal'];                    
                    $provinciaLegal= $Datos['provinciaLegal']['label'];
                    $departamentoLegal = $Datos['departamentoLegal']['label'];
                    $localidadLegal= $Datos['localidadLegal']['label'];
                    $rs= $Datos['nombrers']; 
                    $t_persona= $Datos['opcion']['value'];
                    $estado_civil = $Datos['estado_civil']['value'];
                    $tipo_documento= $Datos['tipo_documento']['value'];
                    $nombre = $Datos['nombre'];
                    $apellido = $Datos['apellido'];
                    $dni = $Datos['dni'];
                    $nacionalidad = $Datos['nacionalidad'];
                    $profesion = $Datos['profesion'];
                    $fecha_nacimiento= $Datos['fecha_nacimiento'];
                    $sexo= $Datos['sexo']['value'];

                    $p= formPersona::all('id')->count(); 

                     //si esta vacia cargo en tabla persona y pivit
                    if (empty($p))
                    {
                        $per=[                        
                            'domicilio'=>$domicilio,
                            'provincia' => $provincia,
                            'departamento' => $departamento,
                            'localidad' => $localidad,                            
                            'domicilioLegal' => $domicilioLegal,
                            'provinciaLegal'=> $provinciaLegal,
                            'departamentoLegal' => $departamentoLegal,
                            'localidadLegal'=> $localidadLegal, 
                            'razon_social' => $rs,                            
                            'sexo' => $sexo,
                            'estado_civil' => $estado_civil,
                            'tipodocumento_id'=>$tipo_documento,
                            'nombre' =>$nombre,
                            'apellido' =>$apellido,
                            'dni' => $dni,
                            'nacionalidad' => $nacionalidad,
                            'profesion' => $profesion,
                            'fecha_nacimiento'=>$fecha_nacimiento, 
                                                     
                        ];        
                        
                        $id_persona= formPersona::create($per); 
                        $id_persona->id; 
                        $rol='Solicitante';
                        
                        $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud                  
                        $id_persona->solicitud()->attach($solicitud_id,["rol" => $rol, "tipo_persona" => $t_persona]); 
                        
                    }
                    else
                    {
                        $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                        
                        foreach ($personas as $persona)
                        {
                            if(($persona->dni == $dni)&& ($persona->sexo == $sexo)) //la persona existe en la tabla persona, cargo en tabla pivot directamente
                            {  
                                $id_persona=$persona->id;
                                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud 
                                $rol='Solicitante';   
                                $array=[                                    
                                    'form_persona_id'=> $id_persona,
                                    'form_solicitud_id'=> $solicitud_id,
                                    'rol'=>$rol,
                                    'tipo_persona'=> $t_persona,
                                    ] ;
                                   
                             form_persona_form_solicitud::create($array);
                            } 
                            else 
                            {
                                $per=[                        
                                    'domicilio'=>$domicilio,
                                    'provincia' => $provincia,
                                    'departamento' => $departamento,
                                    'localidad' => $localidad,                                    
                                    'domicilioLegal' => $domicilioLegal,
                                    'provinciaLegal'=> $provinciaLegal,
                                    'departamentoLegal' => $departamentoLegal,
                                    'localidadLegal'=> $localidadLegal, 
                                    'razon_social' => $rs,                                    
                                    'sexo' => $sexo,
                                    'estado_civil' => $estado_civil,
                                    'tipodocumento_id'=>$tipo_documento,
                                    'nombre' =>$nombre,
                                    'apellido' =>$apellido,
                                    'dni' => $dni,
                                    'nacionalidad' => $nacionalidad,
                                    'profesion' => $profesion,
                                    'fecha_nacimiento'=>$fecha_nacimiento,                           
                                ];  
                                $id_persona= formPersona::create($per); 
                                $id_persona->id; 
                                $rol='Solicitante'; 
                        
                                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud                  
                                $id_persona->solicitud()->attach($solicitud_id,["rol" => $rol, "tipo_persona" => $t_persona]); 

                            }                          
                        } 
                    }   
                 break;
               
            case 3: //DATOS REPRESENTANTE LEGAL               
               
                    $nom_rl= $Datos['nombre_rl']; 
                    $ap_rl= $Datos['apellido_rl']; 
                    $tipo_dni= $Datos['tipo_documento_rl']['value'];
                    $num_dni=$Datos['dni_rl'];
                    $dom_rl=$Datos['domi_rl'];
                    $sex = $Datos['sexoRL']['value'];
                   
                    $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                                    
                        foreach ($personas as $persona)
                         {
                           if(($persona->dni == $num_dni)&& ($persona->sexo == $sex))
                           {   
                             $id_persona=$persona->id;
                             $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud
                             $rol='Representante Legal';   
                             $array=[                             
                                  'form_persona_id'=> $id_persona,
                                  'form_solicitud_id'=> $solicitud_id,
                                  'rol'=>$rol,                                  
                             ] ;
                            form_persona_form_solicitud::create($array);  
                           }
                           else
                           {
                            $rep_legal1 =[                        
                                'nombre'=>$nom_rl,
                                'apellido' => $ap_rl,
                                'tipodocumento_id' => $tipo_dni,
                                'dni' => $num_dni,
                                'domicilio' => $dom_rl,
                                'sexo' => $sex,
                              ];
          
                            $id_rep_legal1= formPersona::create($rep_legal1); 
                            $id_rep_legal1->id;                   
                            $rol='Representante Legal'; //rol es representante legal
                            $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud
                            $id_rep_legal1->solicitud()->attach($solicitud_id,["rol" => $rol]);
                           }
                         }               
                break;
                
            case 4: //DATOS TERRENO-CATEGORIA-MATRICULA CATASTRAL Y COORDENADAS
                                                               
              
                $categoria= $Datos['categoria']['value'];
                $supH= $Datos['sup_hectarias'];
                $estado_terreno= $Datos['estado_terreno']['value'];
                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud

                $terreno=[
                    'superficie'=>$supH,
                    'solicitud_id'=>$solicitud_id,
                    'categoria'=>$categoria,
                ];                               
                
                $id_terreno=formTerreno::create($terreno);
                $id_terreno->id;//guardo id terreno
                $id_t=$id_terreno->id;                
                $id_terreno->estado_terreno()->attach($estado_terreno); //inserta tabla pivot terreno-estadoterreno
                
                //matricula catastral
                $ne_x = $Datos['ne_x'];
                $ne_y = $Datos['ne_y'];
                $so_x = $Datos['so_x'];
                $so_y = $Datos['so_y'];
                $terreno_id= formTerreno::all()->last()->id;             
              
                $mc=[
                    'NE_X'=>$ne_x,
                    'NE_Y'=>$ne_y,
                    'SO_X'=>$so_x,
                    'SO_Y'=>$so_y,     
                    'terreno_id'=>$terreno_id,             
                ];                             
               formMatriculaCatastral::create($mc);  
                
                //coordenadas     
               if (count ($Datos)>=0){
                  foreach($Datos as $key => $dato){
                      echo $key.'--';
                   if (is_numeric($key)){ 
                        if(!!($dato)){
                            $x= $dato['x'];                   
                            $y= $dato['y'];
                                $cor=[
                                'X'=>$x,
                                'Y'=>$y,
                                'terreno_id'=> $id_t,
                                ];                        
                        formCoordenadasPoligonal::create($cor);  
                       }                       
                    }               
                 }
                }  
                break;
           
            case 5: //DATOS PROPIETARIO   

                     $nombre = $Datos['nombre_prop'];
                     $apellido = $Datos['apellido_prop'];
                     $dni = $Datos['dni_prop'];
                     $tipo_documento= $Datos['tipo_documento']['value'];
                     $provincia = $Datos['prov_prop']['value'];                    
                     $domicilio = $Datos['domi_prop'];                    

                     $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                                    
                     foreach ($personas as $persona)
                      {
                        if($persona->dni == $dni){ //la persona ya existe
                                                   
                        $id_persona=$persona->id;
                        $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud  
                        $rol='Propietario';   
                          $array1=[                          
                               'form_persona_id'=> $id_persona,
                               'form_solicitud_id'=> $solicitud_id,
                               'rol'=>$rol,
                          ] ;
                         form_persona_form_solicitud::create($array1);                    
                                               
                        }
                        else
                        {
                           $prop =[                      
                            'nombre'=>$nombre,
                            'apellido' => $apellido,
                            'tipodocumento_id' => $tipo_documento,
                            'dni' => $dni,
                            'provincia'=> $provincia,                                         
                            'domicilio'=>$domicilio,                                         
                            ];
                              
                               $id_propietario= formPersona::create($prop); 
                               $id_propietario->id;                   
                               $rol='Propietario'; 
                               
                               $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud 
                               $id_propietario->solicitud()->attach($solicitud_id,["rol" => $rol]);
                        }   
                      } 
                break;
            case 6: //RESUMEN DE SOLICITUD
                break;
            }  
               
         // dd($request);
         return response()->json('ok');
     
    }

//procesa datos de solicitud_descubrimiento
public function procesa (Request $request)
    {
        $Step2 = $request->step;
        $Datos2 = $request->datos; 
        
        switch ($Step2) 
        {   
                case 1: //DATOS SOLICITUD DESCUBRIMIENTO   
                                  
                     $exp = $Datos2['num_expediente'];
                     $descubrimiento= $Datos2['descubrimiento_directo']['value'];
                     $tipoSoli = 'Descubrimiento';
                     $prov=$Datos2['prov_manifiesto']['label'];
                     $dpto=$Datos2['dpto_manifiesto']['label'];
                     $loc=$Datos2['loc_manifiesto']['label'];
                     $paraje=$Datos2['paraje'];
                     $muestra=$Datos2['muestra']['value'];

                     $dato=[
                        'des_directo' =>$descubrimiento,
                        'nro_expediente' => $exp,
                        'tipo_solicitud' => $tipoSoli,
                        'provSolicitud' => $prov,
                        'dptoSolicitud' => $dpto,
                        'locSolicitud' => $loc,
                        'paraje'=> $paraje,
                        'muestra'=>$muestra,
                    ];
                 
                    formSolicitud::create($dato);
                    
                break;

                case 2: //DATOS SOLICITANTE-RAZON SOCIAL
                   
                    $op2= $Datos2['opcion2']['value'];
                    $nom_soli= $Datos2['nombre_soli'];
                    $ap_soli=$Datos2['apellido_soli'];
                    $rsocial_soli=$Datos2['nombrers_soli'];
                    $sexoSoli=$Datos2['sexo_soli']['value'];
                    $tipoDoc=$Datos2['tipo_documento_soli']['value'];
                    $num_docu=$Datos2['dni_soli'];
                    $fecha_nac_soli=$Datos2['fecha_nacimiento_soli'];
                    $nacion=$Datos2['nacionalidad_soli'];                    
                    $prof=$Datos2['profesion_soli'];
                    $estCivil=$Datos2['estado_civil_soli']['value'];

                    $domLegalSoli=$Datos2['domicilioLegal_soli'];
                    $provSoli=$Datos2['provinciaLegal_soli']['label'];
                    $dptoSoli=$Datos2['departamentoLegal_soli']['label'];
                    $locSoli=$Datos2['localidadLegal_soli']['label'];

                    $domiRealSoli=$Datos2['domicilio_soli'];
                    $provReal=$Datos2['provincia_soli']['label'];
                    $dptoReal=$Datos2['departamento_soli']['label'];
                    $locReal=$Datos2['localidad_soli']['label'];

                    $per= formPersona::all('id')->count(); //verifica q la tabla este vacia
                    
                    if (empty($per))
                    {
                        $per=[                        
                            'domicilio'=>$domiRealSoli,
                            'provincia' => $provReal,
                            'departamento' => $dptoReal,
                            'localidad' => $locReal,
                            'domicilioLegal' => $domLegalSoli,
                            'provinciaLegal'=> $provSoli,
                            'departamentoLegal' => $dptoSoli,
                            'localidadLegal'=> $locSoli, 
                            'razon_social' => $rsocial_soli,                            
                            'sexo' => $sexoSoli,                            
                            'estado_civil' => $estCivil,
                            'tipodocumento_id'=>$tipoDoc,
                            'nombre' =>$nom_soli,
                            'apellido' =>$ap_soli,
                            'dni' => $num_docu,
                            'nacionalidad' => $nacion,
                            'profesion' => $prof,
                            'fecha_nacimiento'=>$fecha_nac_soli,                           
                        ];

                        $id_per= formPersona::create($per); 
                        $id_per->id; 
                        $rol='Solicitante';
                        
                        $Solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud                  
                        $id_per->solicitud()->attach($Solicitud_id,["rol" => $rol, "tipo_persona" => $op2]);

                    }
                    else
                    {
                        $Personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                        
                        foreach ($Personas as $persona)
                        {
                            if(($persona->dni == $num_docu)&& ($persona->sexo == $sexoSoli)) //la persona existe en la tabla persona, cargo en tabla pivot directamente
                            {  
                                $id_persona=$persona->id;
                                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud 
                                $rol='Solicitante';   
                                $array=[                                    
                                    'form_persona_id'=> $id_persona,
                                    'form_solicitud_id'=> $solicitud_id,
                                    'rol'=>$rol,
                                    'tipo_persona'=> $op2,
                                    ] ;
                                   
                             form_persona_form_solicitud::create($array);
                            } 
                            else 
                            {
                                $per=[                        
                                    'domicilio'=>$domiRealSoli,
                                    'provincia' => $provReal,
                                    'departamento' => $dptoReal,
                                    'localidad' => $locReal,
                                    'domicilioLegal' => $domLegalSoli,
                                    'provinciaLegal'=> $provSoli,
                                    'departamentoLegal' => $dptoSoli,
                                    'localidadLegal'=> $locSoli, 
                                    'razon_social' => $rsocial_soli,                            
                                    'sexo' => $sexoSoli,                            
                                    'estado_civil' => $estCivil,
                                    'tipodocumento_id'=>$tipoDoc,
                                    'nombre' =>$nom_soli,
                                    'apellido' =>$ap_soli,
                                    'dni' => $num_docu,
                                    'nacionalidad' => $nacion,
                                    'profesion' => $prof,
                                    'fecha_nacimiento'=>$fecha_nac_soli,                           
                                ];  
                                $id_persona= formPersona::create($per); 
                                $id_persona->id; 
                                $rol='Solicitante'; 
                        
                                $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud                  
                                $id_persona->solicitud()->attach($solicitud_id,["rol" => $rol, "tipo_persona" => $op2]); 

                            }                          
                        } 
                    }
                break; 
                       
                case 3: //DATOS REPRESENTANTE LEGAL

                    $nom_rl_soli= $Datos2['nombre_rl_soli']; 
                    $ap_rl_soli= $Datos2['apellido_rl_soli']; 
                    $tipo_dni_soli= $Datos2['tipo_doc_rl_soli']['value'];
                    $numero_dni=$Datos2['dni_rl_soli'];
                    $domi_rl=$Datos2['domi_rl_soli'];
                    $sexo = $Datos2['sexoRL_soli']['value'];
                   
                    $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                                    
                        foreach ($personas as $persona)
                         {
                           if(($persona->dni == $numero_dni)&& ($persona->sexo == $sexo))
                           {   
                             $id_persona=$persona->id;
                             $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud
                             $rol='Representante Legal';   
                             $array=[                             
                                  'form_persona_id'=> $id_persona,
                                  'form_solicitud_id'=> $solicitud_id,
                                  'rol'=>$rol,                                  
                             ] ;
                            form_persona_form_solicitud::create($array);  
                           }
                           else
                           {
                            $rep_legal =[                        
                                'nombre'=>$nom_rl_soli,
                                'apellido' => $ap_rl_soli,
                                'tipodocumento_id' => $tipo_dni_soli,
                                'dni' => $numero_dni,
                                'domicilio' => $domi_rl,
                                'sexo' => $sexo,
                            ];
          
                            $id_rep_legal= formPersona::create( $rep_legal); 
                            $id_rep_legal->id;                   
                            $rol='Representante Legal'; //rol es representante legal
                            $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud
                            $id_rep_legal->solicitud()->attach($solicitud_id,["rol" => $rol]);
                           }
                         }               
                break;

                case 4: //DATOS TERRENO-MINERAL-CATEGORIA-MATRICULA CATASTRAL Y COORDENADAS
                     
                        //recupero datos 
                        $x=$Datos2['x2_provi'];
                        $y=$Datos2['y2_provi'];
                        $nom_mina=$Datos2['nom_mina'];
                        $cat= $Datos2['cat_mineral']['value'];                    
                        $mineral= $Datos2['mineral']['value'];
                        $estado_terr= $Datos2['estado_terr']['value'];
                        $supH= $Datos2['sup_hect'];
                        
                        $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud

                        $terr=[
                            'superficie'=>$supH,
                            'solicitud_id'=>$solicitud_id,
                            'categoria'=>$cat,
                        ];                       
                        
                        $id_terreno=formTerreno::create($terr);

                        $id_terreno->id;//guardo id terreno
                        $id_t=$id_terreno->id;
                            
                        $id_terreno->mineral()->attach($mineral); //guarda en tabla mineral_terreno  
                        
                        $mina=[
                            'nombre_mina'=>$nom_mina,
                            'terreno_id'=>$id_t,
                        ];
                        
                        $id_mina=formMina::create($mina);
                        $id_mina->id;
                        $id=$id_mina->id;

                        $id_mina->minerales()->attach($mineral,["categoria" => $cat]);
                        $id_mina->estadoterreno()->attach($estado_terr);
                   
                        
                        //matricula catastral
                        $ne_x = $Datos2['ne_x2'];
                        $ne_y = $Datos2['ne_y2'];
                        $so_x = $Datos2['so_x2'];
                        $so_y = $Datos2['so_y2'];
                        $terreno_id= formTerreno::all()->last()->id;             
              
                        $matrCata=[
                            'NE_X'=>$ne_x,
                            'NE_Y'=>$ne_y,
                            'SO_X'=>$so_x,
                            'SO_Y'=>$so_y,     
                            'terreno_id'=>$terreno_id,             
                        ];

                        formMatriculaCatastral::create($matrCata); 
                        
                        $mcProvi=[
                            'PD_X'=>$x,
                            'PD_Y'=>$y,
                            'terreno_id'=>$terreno_id,
                            'mina_id'=>$id,
                        ];

                        formMCProvisoria::create($mcProvi);
                        
                        //coordenadas     
                        if (count ($Datos2)>=0){
                            foreach($Datos2 as $key => $dato2){
                                echo $key.'--';
                            if (is_numeric($key)){ 
                                    if(!!($dato2)){
                                        $x2= $dato2['x2'];                   
                                        $y2= $dato2['y2'];

                                            $cordenadas=[
                                            'X'=>$x2,
                                            'Y'=>$y2,
                                            'terreno_id'=> $id_t,
                                            ];                        
                                    formCoordenadasPoligonal::create($cordenadas);  
                                    }                       
                                }               
                            }
                        }                    
                break;

                case 5: //DATOS PROPIETARIO
                   
                     $nom = $Datos2['nom_prop'];
                     $ape = $Datos2['ape_prop'];
                     $dni_prop = $Datos2['num_dni_prop'];
                     $tipo_doc= $Datos2['tipo_doc_pro']['value'];
                     $provincia = $Datos2['provincia_prop']['value'];                    
                     $domicilio = $Datos2['domicilio_prop'];                    

                     $personas=\DB::table('formPersona')->select('dni','sexo','id')->get();
                                    
                     foreach ($personas as $persona)
                      {
                        if($persona->dni == $dni_prop)
                      
                        {   
                          $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud  
                          $id_persona=$persona->id;                           
                          $rol='Propietario'; 

                          $array=[                          
                               'form_persona_id'=> $id_persona,
                               'form_solicitud_id'=> $solicitud_id,
                               'rol'=>$rol,
                          ] ;

                         form_persona_form_solicitud::create($array);                    
                                               
                        }
                        else
                        {
                           $propietrario =[                      
                            'nombre'=>$nom,
                            'apellido' => $ape,
                            'tipodocumento_id' =>$tipo_doc,
                            'dni' => $dni_prop,
                            'provincia'=> $provincia,                                         
                            'domicilio'=>$domicilio,                                         
                            ];
                              
                               $id_propietario= formPersona::create( $propietrario); 
                               $id_propietario->id;                   
                               $rol='Propietario'; 
                               $solicitud_id= formSolicitud::all()->last()->id; //busco el id de solicitud 
                               $id_propietario->solicitud()->attach($solicitud_id,["rol" => $rol]);
                        }   
                      } 
                break;
                case 6: //RESUMEN DE SOLICITUD
                    break;
                }  
                   
             return response()->json('ok');  
    
    }
    

public function store(Request $request)
    {        
        //  formSolicitud::create($request->all()); //content
           return Redirect::route('solicitudes.index');

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



