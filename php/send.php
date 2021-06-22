<?php

// Check for empty fields
if(empty($_POST['Name']))
{
	echo "No name Provided!";
	return false;
}
if(empty($_POST['Email']))
{
	echo "No email Provided!";
	return false;
}
if(empty($_POST['Message']))
{
	echo "No message Provided!";
	return false;
}

$name = $_POST['Name'];
$email_address = $_POST['Email'];
$phone = $_POST['Phone'];
$message = $_POST['Message'];

require("class.phpmailer.php");
$mail = new PHPMailer();

//ENCABEZADO DEL MAIL
$mail->AddReplyTo($email_address,$name);
$mail->From     = ("noreply@altainternacional.com"); //Dirección desde la que se enviarán los mensajes.
$mail->FromName = $name; 
$mail->AddAddress("info@altainternacional.com"); // Dirección a la que llegaran los mensajes.

//DATOS DEL SERVIDOR
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host       = "a2plcpnl0842.prod.iad2.secureserver.net"; 
$mail->Port       = "465";                    
$mail->Username   = 'noreply@altainternacional.com'; 
$mail->Password   = 'thehabbixt123';

//CUERPO DE MAIL
//$mail->	IsHTML(true);
$mail->	Subject = "Alta Internacional - Nueva consulta web:  $name"; 
$mail->	Body = "Alta Internacional - Nueva consulta web.\n"."\nNombre y Apellido: $name\n\nEmail: $email_address\n\nTelefono: $phone\n\nMensaje:\n$message";

//ENVIAR MAIL
$mail->Send();

?>

