<?php 
    class Conexion {
        public static function Conectar() {
            define("servidor", "localhost:3306");
            define("nombre_bd", "id16169015_avuconecta");
            define("usuario","root");
            define("password","");
            $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');

            try {
                $conexion = new PDO("mysql:host-".servidor.";dbname-".nombre_bd, usuario, password, $opciones);
                // $conexion = mysqli_connect(servidor, usuario, password, nombre_bd,'3306');
                // if (!$conexion) {
                //     echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                //     echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                //     echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                //     exit;
                // }
                return $conexion;
            } catch(Exception $e) {
                die("El error de conexión es: ".$e->getMessage());
            }
        }
    }
?>