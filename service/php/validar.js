function validar() {

    var asesor, correo, cliente, nit, ciudad, contacto, telefono, correo_cliente;
    var nomequipo, modelo, marca, serial;


    asesor = document.getElementById("asesor").value;
    correo = document.getElementById("correo").value;
    cliente = document.getElementById("cliente").value;
    nit = document.getElementById("nit").value;
    ciudad = document.getElementById("ciudad").value;
    contacto = document.getElementById("contacto").value;
    telefono = document.getElementById("telefono").value;
    correo_cliente = document.getElementById("correo_cliente").value;

    nomequipo = document.getElementById("nomequipo").value;
    modelo = document.getElementById("modelo").value;
    marca = document.getElementById("marca").value;
    serial = document.getElementById("serial").value;




    if (asesor == "") {
        alert("El nombre del asesor es un campo obligatorio");
        return false;
    } else {
        if (correo == "") {
            alert("El correo electrónico del asesor es un campo obligatorio");
            return false;
        } else {

            if (cliente == "") {
                alert("El nombre de la empresa o cliente es un campo obligatorio");
                return false;
            } else {
                if (nit == "") {
                    alert("El NIT de la empresa es un campo obligatorio");
                    return false;
                } else {
                    if (ciudad == "") {
                        alert("La ciudad de ubicación es un campo obligatorio");
                        return false;
                    } else {
                        if (contacto == "") {
                            alert("El nombre del contacto es un campo obligatorio");
                            return false;
                        } else {
                            if (telefono == "") {
                                alert("El número de teléfono del contacto es un campo obligatorio");
                                return false;
                            } else {
                                if (correo_cliente == "") {
                                    alert("El correo electrónico del contacto es un campo obligatorio");
                                    return false;
                                }
                            }
                        }
                    }
                }
            }

        }
    }

    if (nomequipo == "") {
        alert("Se deben diligenciar todos los items de la información del servicio");
        return false;
    } else {
        if (modelo == "") {
            alert("Se deben diligenciar todos los items de la información del servicio");
            return false;
        } else {
            if (marca == "") {
                alert("Se deben diligenciar todos los items de la información del servicio");
                return false;
            } else {
                if (serial == "") {
                    alert("Se deben diligenciar todos los items de la información del servicio");
                    return false;
                }
            }
        }
    }

    servicio = document.getElementById("servicio").selectedIndex;
    if (indice == null || indice == 0) {
        alert("Se deben diligenciar todos los items de la información del servicio");
        return false;
    }

}