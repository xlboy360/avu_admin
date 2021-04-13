<?php
 class Conexion{
     public static function Conectar(){
        define("servidor", "localhost");
        define("nombre_bd", "id16169015_avuconecta");
        define("usuario","root");
        define("password","");
        $opciones = array(
            PDO::ATTR_EMULATE_PREPARES => FALSE, 
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        );
         try{
            $conexion = new PDO("mysql:host=".servidor.";dbname=".nombre_bd, usuario, password, $opciones);             
            return $conexion; 
         }catch (Exception $e){
             die("El error de Conexión es :".$e->getMessage());
         }         
     }
 }
?>