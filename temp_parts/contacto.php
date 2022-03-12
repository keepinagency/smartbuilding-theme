<?php
//error_reporting(0);
if (isset($_POST['nombre'])){
    $nombre = $_POST['nombre'];
}else{
    echo "Por favor debe colocar un nombre" . "<br>";
}
if (isset($_POST['correo'])){
    $correo = $_POST['correo'];
}else{
    echo "Por favor debe colocar un correo" . "<br>";
}
if (isset($_POST['telefono'])){
    $telefono = $_POST['telefono'];
}else{
    echo "Por favor debe colocar un telefono" . "<br>";
}
if (isset($_POST['mensaje'])){
    $mensaje = $_POST['mensaje'];
}else{
    echo "Por favor debe colocar un mensaje" . "<br>";
}
    $from = $_POST['nombre'];
    $to = "kmestizo@gmail.com";
    $subject = "SmartBuilding - Email de contáctanos";
    $message =" <html>
        <head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
            <title>SmartBuilding - Eficiencia energética que hace sentido - Email enviado de la Web</title>
        </head>
        <body>

            Nueva solicitud de más información desde formulario de contáctanos en www.smartbuilding.cl<br><br>
            
            Solicitud de: <b>".$from."</b><br>
            correo: <b>".$correo."</b><br>
            telefono: <b>".$telefono."</b><br>
            Mensaje: <b>".$mensaje."</b><br>

            www.smartbuilding.cl <br>
            (by <a href='www.smartbuilding.cl'>smartbuilding</a>)
        </body>
        </html>
    ";

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
    $headers .= "From:" . $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
    header('Location: '.$_SERVER['HTTP_REFERER'], true, 301); 
    exit();

?>
