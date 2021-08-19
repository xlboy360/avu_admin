<?php
 class Conexion{

    public $conexion;

    function Conectar(){
        $this->conexion = new mysqli("localhost","root", "", "avumx_avuconectadb");
        $this->conexion->set_charset("utf8");        
    }
    
    function cerrar() {
        $this->conexion->close();
    }

 }
 ?>