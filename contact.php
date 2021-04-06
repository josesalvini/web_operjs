<?php

ini_set( 'display_errors', 1 );
error_reporting( E_ALL );

if($_POST) {
    $_name = "";
    $_email = "";
    $_subject = "";
    $_telephone = "";
    $_message = "";

    $text_email  = htmlentities($_POST["email"]);
    $text_nombre = htmlentities($_POST['name']);

    if(isset($_POST['name'])) {
      $_name = filter_var(htmlentities($_POST['name']), FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['email'])) {
        $_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', htmlentities($_POST["email"]));
        $_email = filter_var($_email, FILTER_VALIDATE_EMAIL);
    }

    if(isset($_POST['telephone'])) {
        $_telephone = filter_var($_POST['telephone'], FILTER_SANITIZE_STRING);
    }

    if(isset(htmlspecialchars($_POST['subject']))) {
        $_subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
    }

    if(isset($_POST['message'])) {
        $_message = htmlspecialchars($_POST['message']);
    }

	$mensaje = "Este mensaje fue enviado por " . $_name . ",\r\n";
	$mensaje .= "Su e-mail es: " . $_email . " \r\n";
	$mensaje .= "Telefono: " . $_telephone . " \r\n";
	$mensaje .= "Mensaje: " . $_message . " \r\n";
	$mensaje .= "Enviado el " . date('d/m/Y', time());

    $recipient = "info@operjs.com";

    $headers  = 'MIME-Version: 1.0' . "\r\n"
     .'Content-Type: text/html; charset=utf-8' . "\r\n"
     .'X-Mailer: PHP/' . phpversion() . "\r\n"
     .'From: ' . $_email . "\r\n";

    $respuesta = mail($recipient, $_subject, $mensaje, $headers);

    if($respuesta) {
        echo "<script>alert('Mensaje enviado correctamente $text_nombre.!!!') </script>";
        echo "<script>setTimeout('history.go(-2)', 1000);</script>";
    } else {
        echo '<p>We are sorry but the email did not go through.</p>';
    }
} else {
    echo '<p>Something went wrong</p>';
}

?>