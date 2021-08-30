<?php

require '../php/conexion.php';

/*function desconectar(){

global $link; mysql_close($link);

}*/

//Variable que contendrá el resultado de la búsqueda

$texto = " ";

//Variable que contendrá el número de resgistros encontrados

$registros = " ";

$fila = " ";

if($_POST){

$busqueda = trim($_POST['buscar']);

$entero = 0;

if (empty($busqueda)){

$texto = "Búsqueda sin resultados";

}else{

//Contulta para la base de datos, se utiliza un comparador LIKE para acceder a todo lo que contenga la cadena a buscar

$sql = "SELECT * FROM requests WHERE id LIKE '$busqueda' GROUP BY 'servicios'";

$resultado = mysqli_query($link, $sql); //Ejecución de la consulta

//Si hay resultados…

if (mysqli_num_rows($resultado) > 0){

// Se recoge el número de resultados

$registros = "<p>HEMOS ENCONTRADO " . mysqli_num_rows($resultado) . " registros </p>";

// Se almacenan las cadenas de resultado

while($fila = mysqli_fetch_assoc($resultado)){
    $texto = 
    "<tr> <td>" . $fila['id'] ."</td> 
    <td>" . $fila['fechasoli'] ."</td> 
    <td>" . $fila['cliente'] . "</td>
    <td>" . $fila['equipomodelo'] . "</td>
    <td>" . $fila['fechains'] . "</td>
    <td>" . $fila['contacto'] . "</td>
    <td>" . $fila['telcontacto'] . "</td>
    <td>" . $fila['cantmant'] . "</td>
    <td>" . $fila['fechaven1'] . "</td>
    <td>" . $fila['fechaven2']  . "</td>
    <td>" . $fila['asesor'] . "</td>
    <td>" . $fila['correo'] . "</td>
    <td>" . $fila['observacion'] . "</td> </tr>";
}
    
    
    }else{ $texto = 'NO HAY RESULTADOS EN LA BBDD';
    
    }
// Cerramos la conexión (por seguridad, no dejar conexiones abiertas) mysql_close($conexion);

}

}

?>

