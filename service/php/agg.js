indice = document.getElementById("sector").selectedIndex;
if (indice == "otro") {
    $(function() {

        event.preventDefault();
        var item = `
            <option name="sel_sector" value="otro">Otro</option>
      `;

        $("#sector").append(item);
    })

}


for ($i = 0; $i < count($_POST['nombre']); $i++) {
    $nombre = $_POST['nombre'][$i];
    $cargo = $_POST['cargo'][$i];
    $correo = $_POST['correo'][$i];
    $telcliente = $_POST['telcliente'][$i];
}