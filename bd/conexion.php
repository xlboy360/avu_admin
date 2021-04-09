<?php
 class Conexion{

    private $servidor ;
    private $nombre_bd ;
    private $usuario ;
    private $password ;
    public function __construct()
    {
        $this->servidor = "localhost";
        $this->nombre_bd =  "id16169015_avuconecta";
        $this->usuario = "root";
        $this->password = "";

    }
    
     public function Conectar(){
        $opciones = array(
            PDO::ATTR_EMULATE_PREPARES => FALSE, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
         try{
            $conexion = new PDO($this->servidor,$this->nombre_bd,$this->usuario, $this->password, $opciones);             
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     }

     function cerrar() {
         $this->conexion->close();
     }
     
 }
?>