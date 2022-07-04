<!DOCTYPE html>
<html>
<head>
<title>Nuevo mensaje de autoridad minera - RPM</title>
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

  </style>

</head>
<body>
        <div class="container box" style="width: 970px;">
            <h3 align="center">{{ $fecha_entrada }}</h3>
        </div>

        <div>{!! $mensaje !!}</div>

        <h4>Esperamos siga teniendo un gran día.</h4>
        <h4>Saludos.</h4>
        <br>
        <br>
        <h4>Has recibido este correo electrónico por parte de una autoridad minera. NO lo respondas, es de caracter informativo.</h4>

</body>
</html>