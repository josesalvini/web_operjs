<?php

if(isset($_POST['submit'])) {
	$nombre = $_POST['name'];
	$email = $_POST['email'];
	$telefono = $_POST['telephone'];
	$mensajeuser = $_POST['message'];
	$asunto = $_POST['subject'];

	$header = 'From: ' . $email . " \r\n";
	$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
	$header .= "Mime-Version: 1.0 \r\n";
	$header .= "Content-Type: text/plain";

	$mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
	$mensaje .= "Su e-mail es: " . $email . " \r\n";
	$mensaje .= "Telefono: " . $telefono . " \r\n";
	$mensaje .= "Mensaje: " . $mensajeuser . " \r\n";
	$mensaje .= "Enviado el " . date('d/m/Y', time());

	$para = 'info@operjs.com';

	$resultado = mail($para, $asunto, utf8_decode($mensaje), $header);

	if($resultado){
		echo "<h4>Mail enviado</h4>";
		echo "Nombre: ".$nombre;
		//header("Location:index.html");
	}
}

?>