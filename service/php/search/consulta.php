<?php
require "conexion_search.php";

class Consulta{
    private $_db;
    private  $lista_servicios;

    public function __construct(){
        $this->_db = new Conexion();
    }

    public function buscar(){
        
        $this->_db->conectar();

        $consulta = $this->_db->cnx->prepare("SELECT requests.id, requests.asesor, requests.correo, requests.cliente, requests.contacto, requests.telcontacto, desc_service.id_service, desc_service.nomequipo, desc_service.modelo, desc_service.marca, desc_service.serial, desc_service.servicio, desc_service.ejecucion from requests, desc_service where requests.id = desc_service.id_service");

        $consulta->execute();

        while($row = $consulta->fetch(PDO::FETCH_OBJ)){
            $this->lista_servicios[] =$row;
        }

        $this->_db->desconectar();
        return $this->lista_servicios;

    }

}