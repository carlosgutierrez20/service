<?php
include_once '../php/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->conectar();

$consulta = "SELECT * FROM requests";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$solicitud=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!--    Datatables  -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <title></title>
    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #0575E6, #00F260);
            color:white;
        }
    </style>  
      
  </head>
  <body>
    <h1 class="text-center">Datatables</h1>
      
    <h3 class="text-center">Consumiendo datos desde MySQL - PHP - Foreach</h3>
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Contacto</th>
                    <th>Télefono Contacto</th>
                    <th>Asesor</th>
                    <th>Correo</th>
                </thead>
                <tbody>
                    <?php
                        foreach($solicitud as $solicitud){
                    ?>
                    <tr>
                        <td><?php echo $solicitud['id']?></td>
                        <td><?php echo $solicitud['cliente']?></td>
                        <td><?php echo $solicitud['contacto']?></td>
                        <td><?php echo $solicitud['telcontacto']?></td>
                        <td><?php echo $solicitud['asesor']?></td>
                        <td><?php echo $solicitud['correo']?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
           </div>
           <a href="../php/search/plantilla.php">EXPORTAR REGISTROS</a>
       </div> 
    </div>
