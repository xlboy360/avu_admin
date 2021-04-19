<?php
 class Conexion{

    public $conexion;

    function Conectar(){
        $this->conexion = new mysqli("localhost","root", "", "id16169015_avuconecta");
        $this->conexion->set_charset("utf8");        
    }
    
    function cerrar() {
        $this->conexion->close();
    }

 }
 ?>