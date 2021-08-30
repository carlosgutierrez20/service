<?php

/**Datos de la empresa */

$empresa = $_POST["empresa"];
$direccion = $_POST["direccion"];
$telefono = $_POST["telefono"];
$ods = $_POST["ods"];
$equipo = $_POST["equipo"];
$instructor = $_POST["instructor"];
$fecha = $_POST["fecha"];
$valor_sector = $_POST["sector"];

/**Datos de asistencia */
$nombre0 = $_POST["nombre0"];
$cargo0 = $_POST["cargo0"];
$correo0 = $_POST["correo0"];
$telefono0 = $_POST["telefono0"];

$nombre1 = $_POST["nombre1"];
$cargo1 = $_POST["cargo1"];
$correo1 = $_POST["correo1"];
$telefono1 = $_POST["telefono1"];

$nombre2 = $_POST["nombre2"];
$cargo2 = $_POST["cargo2"];
$correo2 = $_POST["correo2"];
$telefono2 = $_POST["telefono2"];

$nombre3 = $_POST["nombre3"];
$cargo3 = $_POST["cargo3"];
$correo3 = $_POST["correo3"];
$telefono3 = $_POST["telefono3"];

$nombre4 = $_POST["nombre4"];
$cargo4 = $_POST["cargo4"];
$correo4 = $_POST["correo4"];
$telefono4 = $_POST["telefono4"];

$nombre5 = $_POST["nombre5"];
$cargo5 = $_POST["cargo5"];
$correo5 = $_POST["correo5"];
$telefono5 = $_POST["telefono5"];

$nombre6 = $_POST["nombre6"];
$cargo6 = $_POST["cargo6"];
$correo6 = $_POST["correo6"];
$telefono6 = $_POST["telefono6"];

$nombre7 = $_POST["nombre7"];
$cargo7 = $_POST["cargo7"];
$correo7 = $_POST["correo7"];
$telefono7 = $_POST["telefono7"];



/**Evaluación */
$valor = $_POST["nivel"];
if (isset($_POST['mensaje']))
{$mensaje = $_POST["mensaje"];
}


$body = " <!DOCTYPE html PUBLIC'-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'> <html xmlns='http://www.w3.org/1999/xhtml'
><strong>Empresa: </strong>" . $empresa . "<br><strong>Dirección: </strong>" . $direccion . "<br><strong>Teléfono: </strong>" . $telefono . "<br><strong>Sector: </strong>" . $valor_sector . "<br><strong>Nº de ODS: </strong>" . $ods . "<br><strong>Equipo: </strong>" . $equipo .
 "<br><strong>Instructor: </strong>" . $instructor . "<br><strong>Fecha de capacitación: </strong>" . $fecha .  
 "<br><h2>Lista de asistencia</h2>" .
 "<table>
<tr><th>Nombre</th>
<th>Cargo</th>
<th>Correo</th>
<th>teléfono</th></tr>" .
"<tr> <td>". $nombre0 . "</td>" .
"<td>" . $cargo0 . "</td>" .
"<td>" . $correo0 . "</td>" . 
"<td>" . $telefono0 . "</td> </tr>" . 
"<tr> <td>". $nombre1 . "</td>" .
"<td>" . $cargo1 . "</td>" .
"<td>" . $correo1 . "</td>" . 
"<td>" . $telefono1 . "</td> </tr>" . 
"<tr> <td>". $nombre2 . "</td>" .
"<td>" . $cargo2 . "</td>" .
"<td>" . $correo2 . "</td>" . 
"<td>" . $telefono2 . "</td> </tr>" . 
"<tr> <td>". $nombre3 . "</td>" .
"<td>" . $cargo3 . "</td>" .
"<td>" . $correo3 . "</td>" . 
"<td>" . $telefono3 . "</td> </tr>" . 
"<tr> <td>". $nombre4 . "</td>" .
"<td>" . $cargo4 . "</td>" .
"<td>" . $correo4 . "</td>" . 
"<td>" . $telefono4 . "</td> </tr>" . 
"<tr> <td>". $nombre5 . "</td>" .
"<td>" . $cargo5 . "</td>" .
"<td>" . $correo5 . "</td>" . 
"<td>" . $telefono5 . "</td> </tr>" . 
"<tr> <td>". $nombre5 . "</td>" .
"<td>" . $cargo6 . "</td>" .
"<td>" . $correo6 . "</td>" . 
"<td>" . $telefono6 . "</td> </tr>" . 
"<tr> <td>". $nombre7 . "</td>" .
"<td>" . $cargo7 . "</td>" .
"<td>" . $correo7 . "</td>" . 
"<td>" . $telefono7 . "</td> </tr> </table>" . 
"<br><strong>Evaluación: </strong>". $valor ."<br>Comentarios: " . $mensaje . "</html>";

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'c:/xampp/htdocs/survey_form(prueba)/phpmailer/Exception.php'; 
require 'c:/xampp/htdocs/survey_form(prueba)/phpmailer/PHPMailer.php';
require 'c:/xampp/htdocs/survey_form(prueba)/phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'servclienteeyl@gmail.com';                     // SMTP username
    $mail->Password   = 'servicio.eyl2020';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('servclienteeyl@gmail.com', $empresa);
    $mail->addAddress('carlosgutierrez@equiposylaboratorio.com');               // Name is optional
	/*$mail->addCC('catalinagoez@equiposylaboratorio.com');*/
	
	




    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Información almacenada';
    $mail->Body    = $body;
    $mail->CharSet ='UTF-8';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo '<script type="text/javascript">
    alert("Tus respuestas han sido enviadas correctamente");
    window.history.go(-1);
    document.getElementById("miForm").reset();
    </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}