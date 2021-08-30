<?php

require 'conexion.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'c:/xampp/htdocs/survey_form(prueba)/phpmailer/Exception.php'; 
require 'c:/xampp/htdocs/survey_form(prueba)/phpmailer/PHPMailer.php';
require 'c:/xampp/htdocs/survey_form(prueba)/phpmailer/SMTP.php';

if(isset($_POST["add"])){
    
}
if(isset($_POST["enviar"])){
/**VAriables del servicio------------------------------------------------------------------- */
$nomequipo = $_POST["nomequipo"];
$modelo = $_POST["modelo"];
$marca = $_POST["marca"];
$serial = $_POST["serial"];
$servicio = $_POST["servicio"];
$ejecucion = $_POST["ejecucion"];


$fechaactual = date('y-m-d h:i:s');
if(isset($_POST['cliente'])){
$cliente = $_POST['cliente'];
}

$contacto = $_POST["contacto"];
$telefono = $_POST["telefono"];
$asesor = $_POST["asesor"];
$correo = $_POST["correo"];



//ENVIAR CORREO--------------------------------------------------------------------------------------------------

$body = " <!DOCTYPE html PUBLIC'-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'> <html xmlns='http://www.w3.org/1999/xhtml'>
<strong>Cliente: </strong>" . $cliente . "<br><strong>Equipo y Modelo: </strong>" . $equipo . "<br><strong>Fecha de instalación: </strong>" . $fechains . "<br><strong>Contacto: </strong>"
 . $contacto . "<br><strong>Teléfono de contacto: </strong>" . $telefono . "<br><strong>Cantidad de mantenimientos: </strong>" . $cantman . "<br><strong>Alcance del servicio agregado: </strong>". $mantprev . "<br>" . $cal . 
 "<br>". $val . "<br><strong>Asesor: </strong>" . $asesor . "<br><strong>Observaciones: </strong>" . $mensaje . "</html>";

 // Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function



// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'carlosgutierrezeyl@gmail.com';                     // SMTP username
    $mail->Password   = '1001845827';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('carlosgutierrezeyl@gmail.com', $empresa);
    $mail->addAddress('carlosgutierrez@equiposylaboratorio.com');               // Name is optional
	/*$mail->addCC('catalinagoez@equiposylaboratorio.com');*/
	
	



    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Envío de servicio para mantenimiento de valor agregado';
    $mail->Body    = $body;
    $mail->CharSet ='UTF-8';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    /*
    $mail->send();
    echo '<script type="text/javascript">
    alert("Tus respuestas han sido enviadas correctamente");
    window.history.go(-1);
    document.getElementById("miForm").reset();
    </script>';
    */
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    
}


//INSERTAR DATOS EN LA DB------------------------------------------------------------------------------------------

$query = "SELECT count(*) as tot_id from requests";

if ($result = mysqli_query($link, $query)) {

    $data=mysqli_fetch_assoc($result);
    
    $id = $data['tot_id'];
    
    $ticket = $id + 1;

}

$insertar = "INSERT INTO requests (cliente, contacto, telcontacto, asesor, correo) VALUES ('$cliente', '$contacto', '$telefono', '$asesor', '$correo')";

$resultado = mysqli_query($link, $insertar);



if($resultado){
    echo "Registro enviado exitosamente";
    while(true) {

        //// RECUPERAR LOS VALORES DE LOS ARREGLOS ////////
        $item1 = current($nomequipo);
        $item2 = current($modelo);
        $item3 = current($marca);
        $item4 = current($serial);
        $item5 = current($servicio);
        $item6 = current($ejecucion);

        
        ////// ASIGNARLOS A VARIABLES ///////////////////
        $nomeq=(( $item1 !== false) ? $item1 : ", &nbsp;");
        $mod=(( $item2 !== false) ? $item2 : ", &nbsp;");
        $marc=(( $item3 !== false) ? $item3 : ", &nbsp;");
        $seri=(( $item4 !== false) ? $item4 : ", &nbsp;");
        $serv=(( $item5 !== false) ? $item5 : ", &nbsp;");
        $ejec=(( $item6 !== false) ? $item6 : ", &nbsp;");
    
        $valores="('$ticket','$nomeq','$mod','$marc','$seri','$serv','$ejec'),";
        $valoresQ= substr($valores, 0, -1);
        
        ///////// QUERY DE INSERCIÓN ////////////////////////////
        $infoserv = "INSERT INTO desc_service (id_service, nomequipo, modelo, marca, serial, servicio, ejecucion) 
        VALUES $valoresQ";



        $reservice = mysqli_query($link, $infoserv);

            
        // Up! Next Value
        $item1 = next( $nomequipo);
        $item2 = next( $modelo);
        $item3 = next( $marca);
        $item4 = next( $serial);
        $item5 = next( $servicio);
        $item6 = next( $ejecucion);
        
        // Check terminator
        if($item1 === false && $item2 === false && $item3 === false && $item4 === false && $item5 === false && $item6 === false) break;

    }

    }else{
        echo "algo falló";
    }
}

?>






