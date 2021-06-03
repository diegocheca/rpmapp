<!DOCTYPE html>
<html>
<head>
    <!-- <title>Formulario de Alta de Productor Minero de San Juan</title> -->

     <meta charset="UTF-8">
    <title>TABLA DE PRODUCTOS</title>
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

    <table class="table text-center table-bordered">
        <tbody>
            <tr>
                <td style="font-size:8px;">Ministerio de Mineria <br> Secretaria Técnica</td>
                <td style="font-size:10px;"> <strong>Planilla de Produccion AÑO 2021. LEY 494-M</strong></td>
                <td> <strong>R067 <br> Hoja 1 </strong></td>
            </tr>
        </tbody>
    </table>
    <table class="table table-bordered">
       <tbody>
            <tr>
                <td style="font-size:10px;">1. &nbsp;&nbsp; APELLIDO Y NOMBRE O RAZON SOCIAL: (según corresponda) </td>
            </tr>
        </tbody>
    </table>

    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Razon Social: {{$razon_social}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> N° de Productor Minero: {{$numeroproductor}}</p></td>
        </tr>
      </tbody>
    </table>

    
     <!-- <span>Domicilio Legal</span> -->
    <table class="table table-bordered">
       <tbody>
            <tr>
                <td style="font-size:10px;">2. &nbsp;&nbsp; DOMICILIO LEGAL EN LA PROVINCIA DE SAN JUAN </td>
            </tr>
        </tbody>
    </table>
   


   <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Calle: {{$leal_calle}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Numero: {{$leal_numero}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Localidad: {{$leal_localidad}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Departamento: {{$leal_departamento}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Telefono: {{$leal_telefono}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Codigo Postal: {{$leal_cp}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
       <tbody>
            <tr>
                <td style="font-size:10px;">3. &nbsp;&nbsp; DATOS DE LA MINA O CANTERA</td>
            </tr>
        </tbody>
    </table>

    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Nombre: {{$nombre_mina}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Expediente: {{$numero_expdiente}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Departamento:: {{$localidad_mina_departamento}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Distrito Minero: {{$distrito_minero}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Localidad:: {{$localidad_mina_localidad}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Zona: {{$zona_mina_provincia}}</p></td>
        </tr>
      </tbody>
    </table>
     <table class="table ">
      <tbody>
 
        peccion [ x ]   Exploracion [  ]    Desarrollo [  ]   Explotacion [ x ]</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table table-bordered">
      <tbody>
           <tr>
               <td style="font-size:10px;">4. &nbsp;&nbsp; DATOS DE PRODUCCIÓN</td>
           </tr>
       </tbody>
   </table>
    <table class="table table-borderless" >
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Producto Extraido</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Variedad</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Producción (indicar unidades)*</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Precio de venta (en $)</p></td>
        </tr>
        <tr style="border-bottom: 1px solid gray;">
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Plata</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Variedad</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">125 m3</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">1585.58 $</p></td>
        </tr>
        <tr style="border-bottom: 1px solid gray;">
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Oro</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Variedad</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">12 m3</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">9585.58 $</p></td>
        </tr>

      </tbody>
    </table>
    <p>* indicar tn, m3, etc.</p>
    <br>
    <table class="table table-bordered">
      <tbody>
           <tr>
               <td style="font-size:10px;">5. &nbsp;&nbsp; DATOS DE LA PRODUCCIÓN **</td>
           </tr>
       </tbody>
   </table>
    <table class="table table-borderless" >
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Producto Vendido</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Nombre Empresa Compradora</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Direccion Empresa Compradora</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;"><p style="font-size:12px;">Actividad Empresa Compradora</p></td>
        </tr>
        <tr style="border-bottom: 1px solid gray;">
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Plata</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Variedad</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">125 m3</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">1585.58 $</p></td>
        </tr>
        <tr style="border-bottom: 1px solid gray;">
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Oro</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">Variedad</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">12 m3</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;"><p style="font-size:12px;">9585.58 $</p></td>
        </tr>

      </tbody>
    </table>
    <p>** Si la producción extraida o parde de esta se esta destina a plantas de tratamiento de la misma empresa, deberá llenar planilla de Industrial Minero (formulario 06) tn, m3, etc.</p>
    <br>
    <table class="table table-bordered">
      <tbody>
           <tr>
               <td style="font-size:10px;">6. &nbsp;&nbsp; MERCADO: (Indicar en que mercados vende su producto)</td>
           </tr>
       </tbody>
   </table>

   <table class="table ">
     <tbody>
       <tr>
         <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> En la provincia: 25 %</p></td>
         <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> En la otras provincias: 25 %</p></td>
         <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Exportación: 50 %</p></td>
       </tr>
     </tbody>
   </table>
   <br>
    <table class="table table-bordered">
      <tbody>
           <tr>
               <td style="font-size:10px;">7. &nbsp;&nbsp;  PERSONAL OCUPADO</td>
           </tr>
       </tbody>
   </table>
    <table class="table table-borderless" >
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 1px solid black;border-top: 1px solid rgb(255, 255, 255);border-left: 1px solid rgb(255, 255, 255);border-right: 1px solid black;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;"></p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">Profes y Técincos</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">Operarios / Obreros</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">Administrativos</p></td>
          <td style="border-bottom: 1px solid black;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">Otros</p></td>
        </tr>
        <tr style="border-bottom: 1px solid gray;">
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">Permanentes</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">15</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">58</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">10</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">14</p></td>
        </tr>
        <tr style="border-bottom: 1px solid gray;">
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">Transitorios</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">15</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">58</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">10</p></td>
          <td style="border-bottom: 0.5px solid gray;border-top: 0.5px solid gray;border-left: 0.5px solid gray;border-right: 0.5px solid gray;padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:12px;">14</p></td>
        </tr>

      </tbody>
    </table>
    <br>
    <table class="table table-borderless">
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Firma: </p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Aclaracion: </p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">D.N.I.: </p></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table style="border-top: 0px solid white;" class="table " style="border-top: 0px solid white;">
      <tbody>
        <tr  style="border-bottom: 1px solid black;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Cargo en empresa: </p></td>
        </tr>
      </tbody>
    </table>
<br>
    <span style="font-size:8px;">*La presente solicitud debe estar acompañada de la plantilla de producción del año calendario inmediato anterior, aún cuando no se haya existido producción o actividad (Art. 13 - Cap. II - Ley 6531)</span>
    


</body>
</html>