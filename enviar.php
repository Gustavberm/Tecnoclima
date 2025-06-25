<?php

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

if(!empty($email) && !empty($name) && !empty($message)){

    $destino = 'saultecnoclima@gmail.com';
    $asunto = 'Contacto Tecnoclima';

    $cuerpo = '
    <html>
        <head>
            <title>Prueba de correo </title>
        </head>
        <body> 
        <h1>Remitente : ' .$name. ' </h1>
        <h1>Mail : ' .$email. ' </h1>
        <p> '.$message. ' </p>
        
        </body>
        </html>
        ';

//envio en formato html
$headers = "MINE-Version: 1.0\r\n";
$headers .= "content-type: text/html; charset-utf-8\r\n";

//direccion del remitente
$headers .= "From: $name <$email>\r\n";

//ruta del mensaje desde origen a destino
$headers .= "Return-path: $destino\r\n";

mail($destino,$asunto,$cuerpo,$headers);

echo "<script>alert('Mensaje enviado correctamente');
window.location.href = 'index.html#contact';
</script>";

}else {
    echo "<script>alert('Error al enviar el mensaje');
    window.location.href = 'index.html#contact';
    </script>";

}