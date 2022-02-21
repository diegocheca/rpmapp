<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>CREDENCIAL DE PRODUCTOR</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        @page {
            margin: 0px 0px 0px 0px !important;
            padding: 0px 0px 0px 0px !important;
        }
        body {
            margin: 0.5cm 2cm 2cm;
        }
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #46C66B;
            color: white;
            text-align: center;
            line-height: 30px;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #46C66B;
            color: white;
            text-align: center;
            line-height: 35px;
        }
        table tr {
          /*display: block;*/
          border-top: 0px solid white;
        }
    </style>
  </head>
<body>
  <p style="font-size:12px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Santiago del Estero, {{$dia}} de  {{$mes}}, de {{$anio}}</p>

    <p style="font-size:12px;"> A la directora <br>
    De la Dirección de General de Minería, Geología y Suelos<br>
    <strong>DRA. SUSANA ACOSTA
    S__________/__________D</strong></p>
    <p style="font-size:12px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Tengo el agrado de dirigirme a Ud., solicitando a mi INSCRIPCIÓN en el "Registro <br>
      de Productores Mineros" (Decreto Serie "B" 354/60), a cuyo fin y en carácter de DECLARACIÓN JURADA, <br>
      consigno datos:
    <br>
    <p style="font-size:12px;">  <strong> El productor minero: </strong> {{$razon_social}} </p>
    <p style="font-size:12px;">  <strong> Con CUIT: </strong> {{$ciut}} </p>


    <p style="font-size:12px;"> Domicilio Real: {{$administracion_calle}} {{$administracion_numero}} - {{$leal_localidad}}    - Codigo Postal: {{$administracion_cp}}  -Telefono: {{$administracion_telefono}}</p>

    <p style="font-size:12px;"> Domicilio Legal: {{$leal_calle}} {{$leal_numero}} - {{$leal_localidad}}    - Codigo Postal: {{$leal_cp}}  -Telefono: {{$leal_telefono}}</p>
    
    <p style="font-size:12px;"> <strong> Num Productor : </strong> {{$numeroproductor}}   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Beneficio Ley 3737 - Decreto:</p>
    
<p style="font-size:12px;"> Yacimiento/s o Cantera/s  del Productor: {{$mina_cantera}} </p>
<p style="font-size:12px;"> Nº Distrito Minero: {{$distrito_minero}} </p>
<p style="font-size:12px;"> Expediente de la Concesión Minera: {{$numero_expdiente}} </p>
<p style="font-size:12px;"> Mineral o Roca Explotada: {{$minerales_variedad}} </p>
<p style="font-size:12px;"> Situación: {{$minerales_variedad}} </p>
<p style="font-size:12px;"> Ubicación (Departamento): {{$localidad_mina_departamento}} </p>




    <table class="table table-bordered">
      <tbody>
            <tr>
                <td style="font-size:10px;">2. &nbsp;&nbsp; DOMICILIO DE LA ADMINISTRACIÓN PRINCIPAL</td>
            </tr>
        </tbody>
    </table>

    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Calle: {{$administracion_calle}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Numero: {{$administracion_numero}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Localidad: {{$administracion_localidad}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Departamento: {{$administracion_departamento}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Telefono: {{$administracion_telefono}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Codigo Postal: {{$administracion_cp}}</p></td>
        </tr>
      </tbody>
    </table>

<!--     <p>Domicilio Administrativo Pais: {{$administracion_pais}}</p>
    <p>Domicilio Administrativo Provincia: {{$administracion_provincia}}</p>
    <p>Domicilio Administrativo Otro: {{$administracion_otro}}</p> -->




    <!-- <span>Datos Mina</span> -->
    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
       <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
            <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
                <td style="font-size:10px;">2. &nbsp;&nbsp; DATOS DE LA MINA O CANTERA</td>
            </tr>
        </tbody>
    </table>

    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Nombre: {{$nombre_mina}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Expediente: {{$numero_expdiente}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Departamento:: {{$localidad_mina_departamento}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Distrito Minero: {{$distrito_minero}}</p></td>
        </tr>
      </tbody>
    </table>
    <table  class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Localidad:: {{$localidad_mina_localidad}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">  Zona: {{$localidad_mina_provincia}}</p></td>
        </tr>
      </tbody>
    </table>
     <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Mineral: {{$minerales_variedad}}</p></td>
        </tr>
      </tbody>
    </table>

    <!-- <span>Datos Mina</span> -->
    <table class="table table-bordered">
       <tbody>
            <tr>
                <td style="font-size:10px;">2. &nbsp;&nbsp; CARACTER QUE INVOCA</td>
            </tr>
        </tbody>
    </table>
    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Dueño: {{$owner}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Arrendatario: {{$arrendatario}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Concesionario: {{$concesionario}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Otro: {{$otros}}</p></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Titulo que adjunta:</p></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Firma: </p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> Aclaracion: </p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"> D.N.I.: </p></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table style="border-top: 0px solid white;" class="table " style="border-top: 0px solid white;">
      <tbody>
        <tr  style="border-bottom: 1px solid black;">
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Cargo en empresa: </p></td>
        </tr>
      </tbody>
    </table>
<br>


<!--     <p>Mina Cantera: {{$mina_cantera}}</p>
    <p>Mina Descripción: {{$descripcion_mina}}</p>
    <p>Mina Categoria: {{$categoria}}</p>
    <p>Mina Variedad: {{$minerales_variedad}}</p>

    <p>Mina owner: {{$owner}}</p>
    <p>Mina arrendatario: {{$arrendatario}}</p>
    <p>Mina concesionario Minero: {{$concesionario}}</p>
    <p>Mina otros: {{$otros}}</p>
    <p>Mina acciones_a_desarrollar: {{$acciones_a_desarrollar}}</p>
    <p>Mina actividad: {{$actividad}}</p>
    <p>Mina fecha_alta_dia: {{$fecha_alta_dia}}</p>
    <p>Mina fecha_vencimiento_dia: {{$fecha_vencimiento_dia}}</p>


    <p>Mina localidad_mina_pais: {{$localidad_mina_pais}}</p>
    <p>Mina localidad_mina_provincia Minero: {{$localidad_mina_provincia}}</p>
    <p>Mina tipo_sistema: {{$tipo_sistema}}</p>
    <p>Mina latitud: {{$latitud}}</p>
    <p>Mina longitud: {{$longitud}}</p>


    <p>Mina Expediente: {{$numero_expdiente}}</p>
    <p>Mina Distrito Minero: {{$distrito_minero}}</p>
    <p>Mina Descripción: {{$descripcion_mina}}</p>
    <p>Mina Nombre: {{$nombre_mina}}</p>
    <p>Mina Categoria: {{$categoria}}</p>
    <p>Mina Variedad: {{$minerales_variedad}}</p>
    <p>Mina Cantera: {{$mina_cantera}}</p>
    <p>Mina Expediente: {{$numero_expdiente}}</p>
    <p>Mina Distrito Minero: {{$distrito_minero}}</p>
    <p>Mina Descripción: {{$descripcion_mina}}</p>
    <p>Mina Nombre: {{$nombre_mina}}</p>
    <p>Mina Categoria: {{$categoria}}</p>
    <p>Mina Variedad: {{$minerales_variedad}}</p>
 -->
    <span style="font-size:8px;">*La presente solicitud debe estar acompañada de la plantilla de producción del año calendario inmediato anterior, aún cuando no se haya existido producción o actividad (Art. 13 - Cap. II - Ley 6531)</span>
    


</body>
</html>