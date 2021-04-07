<?php 
    class Conexion {
        public static function Conectar() {
            define("servidor", "localhost");
            define("nombre_bd", "id16169015_avuconecta");
            define("usuario","root");
            define("password","");
            $opciones = array(
                PDO::ATTR_EMULATE_PREPARES => FALSE, 
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
            );

            try {
                // $conexion = new PDO("mysql:dbname-".nombre_bd.";host-".servidor, usuario, password, $opciones);
                $conexion = mysqli_connect(servidor, usuario, password, nombre_bd,'3306');
                if (!$conexion) {
                    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
                    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
                    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
                    exit;
                }
                return $conexion;
            } catch(Exception $e) {
                die("El error de conexión es: ".$e->getMessage());
            }
        }
    }
