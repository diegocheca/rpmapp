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
                        <td style="font-size:10px;"> <strong>SOLICITUD DE INSCRIPCIÓN EN EL REGISTRO DE PRODUCTORES COMERCIANTES E INDUSTRIALES MINEROS . LEY 6531/94</strong></td>
                        <td> <strong>R064 Hoja 1 </strong></td>
                    </tr>
                </tbody>
            </table>

    <!-- <main>
        <div class="container">
            <h5 style="text-align: center"><strong>TABLA DE PRODUCTOS</strong></h5>
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Existencia</th>
                        <th scope="col">Lote</th>
                        <th scope="col">Fecha</th>
                    </tr>
                </thead>
               <tbody>
                    <tr>
                        <th scope="row">12312</th>
                        <td>3</td>
                        <td>4</td>
                        <td>5</td>
                        <td>6</td>
                        <td>7</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main> -->
<!-- 
    <span>Ministerio de Mineria de San Juan</span>
    <p></p> -->
    <p style="font-size:12px;">Sr. Director de Registro <br>
    Minero y Catastral <br>
    S__________/__________D</p>
    <p style="font-size:12px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Solicito al Sr. Director, considere la inscrpción en el Registro de productores Comercaintes e Industriales Mineros. Como <strong>Productor Minero</strong> de la unidad económica que represento y cuyo datos indico a continuación, de acuerdo a lo dispuesto en el Capitulo 1 de la Ley 6531, cuyos alcances declaro conocer y cumplir. </p>
    <table class="table table-bordered">
       <tbody>
            <tr>
                <td style="font-size:10px;">1. &nbsp;&nbsp; APELLIDO Y NOMBRE O RAZON SOCIAL: (según corresponda) </td>
            </tr>
        </tbody>
    </table>

    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Razon Social: {{$razon_social}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> N° CUIT: {{$ciut}}</p></td>
        </tr>
      </tbody>
    </table>

    <!-- <p>Email: {{$email}}</p>
    <p>Número de Productor: {{$numeroproductor}}</p>
    <p>Tipo de Sociedad: {{$tiposociedad}}</p>
    <p>Inscripcion DGR: {{$inscripciondgr}}</p>
    <p>Constacia de Sociedad: {{$constaciasociedad}}</p>
     -->
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
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Calle: {{$leal_calle}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Numero: {{$leal_numero}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Localidad: {{$leal_localidad}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Departamento: {{$leal_departamento}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Telefono: {{$leal_telefono}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Codigo Postal: {{$leal_cp}}</p></td>
        </tr>
      </tbody>
    </table>




    <!-- <p></p>
    <p>Domicilio Legal Pais: {{$leal_pais}}</p>
    <p>Domicilio Legal Provincia: {{$leal_provincia}}</p>
    <p>Domicilio Legal Cp: {{$leal_cp}}</p>
    <p>Domicilio Legal Otro: {{$leal_otro}}</p>
 -->

    <!-- <span>Domicilio Administrativo</span> -->
    <table class="table table-bordered">
       <tbody>
            <tr>
                <td style="font-size:10px;">2. &nbsp;&nbsp; DOMICILIO DE LA ADMINISTRACIÓN PRINCIPAL</td>
            </tr>
        </tbody>
    </table>

    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Calle: {{$administracion_calle}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Numero: {{$administracion_numero}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Localidad: {{$administracion_localidad}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Departamento: {{$administracion_departamento}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Telefono: {{$administracion_telefono}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Codigo Postal: {{$administracion_cp}}</p></td>
        </tr>
      </tbody>
    </table>

<!--     <p>Domicilio Administrativo Pais: {{$administracion_pais}}</p>
    <p>Domicilio Administrativo Provincia: {{$administracion_provincia}}</p>
    <p>Domicilio Administrativo Otro: {{$administracion_otro}}</p> -->




    <!-- <span>Datos Mina</span> -->
    <table class="table table-bordered">
       <tbody>
            <tr>
                <td style="font-size:10px;">2. &nbsp;&nbsp; DATOS DE LA MINA O CANTERA</td>
            </tr>
        </tbody>
    </table>

    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Nombre: {{$nombre_mina}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Expediente: {{$numero_expdiente}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Departamento:: {{$localidad_mina_departamento}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Distrito Minero: {{$distrito_minero}}</p></td>
        </tr>
      </tbody>
    </table>
    <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Localidad:: {{$localidad_mina_localidad}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;"> Zona: {{$localidad_mina_provincia}}</p></td>
        </tr>
      </tbody>
    </table>
     <table class="table ">
      <tbody>
        <tr>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Mineral: {{$minerales_variedad}}</p></td>
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
    <table class="table table-borderless" >
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Dueño: {{$owner}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Arrendatario: {{$arrendatario}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Concesionario: {{$concesionario}}</p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Otro: {{$otros}}</p></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table class="table table-borderless">
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Titulo que adjunta:</p></td>
        </tr>
      </tbody>
    </table>
    <br>
    <table class="table table-borderless">
      <tbody>
        <tr style="border-bottom: 1px solid black;">
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Firma: </p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">Aclaracion: </p></td>
          <td style="border-bottom: 1px solid black;"><p style="font-size:12px;">D.N.I.: </p></td>
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