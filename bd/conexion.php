<?php
 class Conexion{

    public $conexion;

    function Conectar(){
        $conexion = new mysqli("localhost","root", "", "id16169015_avuconecta");
        $conexion->set_charset("utf8");        
    }
    
    function cerrar() {
        $conexion->close();
    }

 }
 ?>