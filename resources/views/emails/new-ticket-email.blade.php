<!DOCTYPE html>
<html>
<head>
<title>NUevo Ticket {{$id_ticket}}</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<style>
      html, body {
          background-color: #fff;
          color: #636b6f;
          font-family: 'Nunito', sans-serif;
          font-weight: 200;
          height: 100vh;
          margin: 0;
      }
      .content { text-align: center; }
      .title { font-size: 84px; }

      .info, .correcto, .ojo, .error, .validation {
    border: 1px solid;
    margin: 10px 0px;
    padding:15px 10px 15px 50px;
    background-repeat: no-repeat;
    background-position: 10px center;
    font-family:Arial, Helvetica, sans-serif;
    font-size:13px;
    text-align:left;
    width:auto;
}
.info {
    color: #00529B;
    background-color: #BDE5F8;
    background-image: url('imagenes/info.jpg');
}
.correcto {
    color: #4F8A10;
    background-color: #DFF2BF;
    background-image:url('imagenes/correcto.JPG');
}
.ojo {
    color: #9F6000;
    background-color: #FEEFB3;
    background-image: url('imagenes/ojo.JPG');
}
.error {
    color: #D8000C;
    background-color: #FFBABA;
    background-image: url('imagenes/error.jpg');
}

.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}

  </style>

</head>
<body>
        <div class="container box" style="width: 970px;">
            <h3 align="center">{{ $fecha_creado }}</h3>
            
        </div>
        <div class="info"><b>Se ha creado un nuevo mensaje para el administrador</b></div>
        <p>Saludos <strong>Admin</strong>, esperamos tenga un excelente día.</p>
        <p> Nos comunicamos desde RPM PNUD de San Juan. 
            Para comunicarle que el ha sido creado un nuevo ticket.</p>
        <p>Id: {{$id_ticket}}</p>
        <p>Nomnbre: {{$nombre}}</p>
        <p>Email: {{$email}}.</p>
        <p>Fecha: {{$fecha_creado}}.</p>
        <p>Mensaje: {{$mensaje}}</p>
        <p>Puede ver el camino ya recorrido por el expediente haciendo clic en el siguiente enlace:</p>
        <div class="form-group">
            <a href="{{url('admin/movimientos/') }}" ><button class="button">Ver Ticket de {{$id_ticket}}</button></a>
        </div>
        <p>Se le seguirán enviando novedades, gracias por utilizar este servicio.</p>
        <h4>Esperamos que siga teniendo un gran día.</h4>
        <h4>Saludos.</h4>
</body>
</html>