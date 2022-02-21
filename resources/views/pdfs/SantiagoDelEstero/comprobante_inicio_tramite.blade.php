<!DOCTYPE html>
<html>
<head>
    <!-- <title>Formulario de Alta de Productor Minero de San Juan</title> -->

     <meta charset="UTF-8">
    <title>TRAMITE INICIADO</title>
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
                <td style="font-size:8px;">Direccion General de Mineria, Geologia y Suelos
                <td style="font-size:10px;"> <strong>COMPROBANTE DE INICIO DE TRAMITE 
                <br><br> Direccion General de Mineria, Geologia y Suelos</strong></td>
                <td> </td>
            </tr>
        </tbody>
    </table>
    <table>
      <tbody>
        <tr>
            <td style="font-size:10px;">
              <br>A la Sra. Directora
              <br>de la Direccion General de Mineria, Geologia y Suelos
              <br>DRA. Suana Acosta
              <br>S__________/__________D
            </td>
        </tr>
        <tr>
            <td style="font-size:10px;">
              <br><p style="text-indent:100"> Tengo el agrado de dirigirme a Ud, solicitando mi <b>Inscripción</b> en el "Registro<br>
                de Productores Mineros" (Decreto Serie "B" N°354/60), a cuyo fin y en carácter de DECLARACION JURADA,<br>
                consigno datos:</p>
              </td>
        </tr>
      </tbody>


    </table>
    
    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Nombre o razón social: {{$razon_social}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> N° de CUIT {{$ciut}} </p></td>
        </tr>
      </tbody>
    </table>

    <table class="table"  style="margin: 0px 0px 0px 0px !important;padding: 0px 0px 0px 0px !important;">
      <tbody style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
        <tr style="margin: 0px 0px 0px 0px !important; padding: 0px 0px 0px 0px !important;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Numero de Inscripción: {{$id}}</p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;"> Calle: {{$leal_calle}} </p></td>
        </tr>
      </tbody>
    </table>


    
    
    <!--- firmas finales --->
    <br>
    <table class="table table-borderless">
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Firma:_________________ </p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Aclaración:_________________ </p></td>
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">D.N.I.:_________________ </p></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table style="border-top: 0px solid white;" class="table " style="border-top: 0px solid white;">
      <tbody>
        <tr  style="border-bottom: 1px solid black;">
          <td style="border-bottom: 0px solid rgb(255, 255, 255);border-top: 0px solid rgb(255, 255, 255);padding: 0px 0px 0px 0px !important; margin: 0px 0px 0px 0px !important;"><p style="font-size:10px;">Cargo en empresa:_________________ </p></td>
        </tr>
      </tbody>
    </table>
<br>

</body>
</html>