<?php
/**@var  \App\Models\Servicio  $servicio*/
/**@var  \App\Models\Usuario  $usuario*/
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación de su contratación</title>
</head>
<body>
    <h1>Reserva de {{ $servicio->nombre }}</h1>

    <p>¡Hola {{ $usuario->nombre }}! Le enviamos este correo para confirmar su contratación de una {{ $servicio->nombre }}. Estará recibendo más información a la brevedad acerca del servicio contratado.</p>

    <p>
        Saludos cordiales, <br>
        WebExpert.
    </p>
</body>
</html>