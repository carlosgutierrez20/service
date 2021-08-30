<?php
require "consulta.php";
$usuario = new Consulta();
$salida = "";
$salida .= "<table>";
$salida .= "<thead> <th>ID</th> <th>Asesor</th><th>correo</th><th>cliente</th><th>contacto</th><th>telcontacto</th><th>idservice</th><th>nomequipo</th>
<th>modelo</th><th>marca</th><th>serial</th><th>servicio</th><th>ejecucion</th></thead>";
foreach($usuario->buscar() as $r){
    $salida .= "<tr><td>".$r->id."</td> <td>".$r->asesor."</td><td>".$r->correo."</td><td>".$r->cliente."</td><td>".$r->contacto."</td><td>".
    $r->telcontacto."</td><td>".$r->id_service."</td><td>".$r->nomequipo."</td><td>".$r->modelo."</td><td>".$r->marca."</td><td>".$r->serial."</td><td>".$r->servicio."</td><td>".$r->ejecucion."</td></tr>";
}
$salida .= "</table>";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=servicios_".time().".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;