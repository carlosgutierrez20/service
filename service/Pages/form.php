
<!DOCTYPE html>
<html lang="ES">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css?v=<?php echo(rand()); ?>">
	<link rel="shortcut icon" href="../images/icono3.png">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>  

    <title>Servicios valor agregado - Equipos y Laboratorio de Colombia </title>
</head>

<body>
<script>
			
    		$(function(){
				// Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
				$("#adicional").on('click', function(){
					$("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla").find("input").val("");
				});
			 
				// Evento que selecciona la fila y la elimina 
				$(document).on("click",".eliminar",function(){
					var parent = $(this).parents().get(0);
					$(parent).remove();
				});
			});
		</script>

    <img src="../Images/ENCABEZADO.jpg" alt="Imagen Anuncio">

    <main>

        <form id="form" name="form" action="../php/guardar.php" method="POST" class="form">

            <fieldset class="normal contenedor seccion">

                <legend>INFORMACIÓN</legend>

                <label for="asesor">Asesor:</label>
                <input type="text" id="asesor" placeholder="Nombre del asesor" name="asesor">

                <label for="asesor">Correo electrónico: </label>
                <input type="email" id="correo" placeholder="Correo electrónico del asesor" name="correo">
                            
                <label for="cliente">Cliente:</label>
                <input type="text" id="cliente" placeholder="Nombre de cliente" name="cliente">

                <label for="contacto">Contacto:</label>
                <input type="text" id="contacto" placeholder="Nombre de contacto" name="contacto">

                <label for="telefono">Teléfono de contacto:</label>
                <input type="text" id="telefono" placeholder="Número de teléfono de contacto" name="telefono">
                            
            </fieldset>

            <fieldset class = "contenido-centrado cliente seccion">

                <div>
                    <table class="contenedor contenido-centrado seccion" id="tabla">

                    <thead>
                        <th>Nombre de equipo</th>
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Serial</th>
                        <th>Tipo de servicio</th>
                        <th>Fecha de ejecución</th>
                    </thead>
                    <tbody>
                        <tr class="fija-fija">
                            <td><input type="text" name="nomequipo[]" placeholder="Nombre del equipo"></td>
                            <td><input type="text" name="modelo[]" placeholder="Modelo"></td>
                            <td><input type="text" name="marca[]" placeholder="Marca"></td>
                            <td><input type="text" name="serial[]" placeholder="Serial"></td>
                            <td><select name="servicio[]" id="servicio">
                                    <option value=" ">Seleccione</option>
                                    <option value="Mantenimiento preventivo">Mantenimiento preventivo</option>
                                    <option value="Mantenimiento preventivo - Calibración">mantenimiento preventivo - Calibración</option>
                                    <option value="Mantenimiento preventivo - Validación">Mantenimiento preventivo - Validación</option>
                                    <option value="Mantenimiento preventivo - Calificación">Mantenimiento preventivo - Calificación</option>
                                    <option value="Mantenimiento preventivo - Calibración acreditada">Mantenimiento preventivo - Calibración acreditada</option>
                                    <option value="Calibración">Calibración</option>
                                    <option value="Validación">Validación</option>
                                    <option value="Calificación">Calificación</option>
                                    <option value="Calibración Acreditada">Calibración Acreditada</option>
                                                          
                                </select></td>
                            <td><input type="date" name="ejecucion[]" placeholder="Fecha de ejecución"></td>
                            <td class="eliminar"><button class="btn-eliminar"> - </button></td>
                        </tr>
                    </tbody>
                    </table>
                    <button id="adicional" name="adicional" type="button"> Más + </button>
                </div>

            </fieldset>
            

            <button class="boton boton-verde" name="enviar">Enviar</button>
        </form>
                
        <button id= "cta" class="cta">Buscar</button>

         <!-- The Modal -->
        <div class="modal-content">
            <!-- Modal content -->
            <div class="modal modal-close">
                <span class="close">&times;</span>
                <?php
                require_once("search.php")
                ?>
                <h1>Busqueda de servicios</h1>

                <form id="buscador" name="buscador" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">  
                <input id="buscar" name="buscar" type="search" placeholder="Buscar aquí…" autofocus >   
                <input type="submit" name="buscador" class="boton peque aceptar" value="buscar">

                </form>

                <table class= "table-search">
                <tr class = "btable">                  
                    <td>id</td>
                    <td>Fecha de solicitud</td>
                    <td>Cliente</td>
                    <td>Equipo y Modelo</td>
                    <td>Fecha de instalación</td>
                    <td>Contacto</td>
                    <td>Teléfono de contacto</td>
                    <td>Cantidad de mantenimientos</td>
                    <td>Fecha vencimiento 1</td>
                    <td>Fecha de vencimiento 2</td>
                    <td>Asesor</td>
                    <td>Correo</td>
                    <td>Observaciones</td>
                </tr>

                <?php
                echo $texto;
                ?>

                </table>
            </div>

        </div>
        
      

    </main>
    <script>
    $(document).ready(function(){

        $('#repeater').createRepeater();

        $('#repeater_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                url:"agregar.php",
                method:"POST",
                data:$(this).serialize(),
                success:function(data)
                {
                    $('#repeater_form')[0].reset();
                    $('#repeater').createRepeater();
                    $('#success_result').html(data);
                }
            })
        });

    });
        
    </script>
</body>

</html>


