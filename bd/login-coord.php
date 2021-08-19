<?php
session_start();

$conexion = mysqli_connect("localhost","root", "", "avumx_avuconectadb");

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

if($usuario == "admin" && $password == "prueba"){
    $_SESSION["s_usuario"] = 'admin@avu.mx';
}
else{
    $_SESSION["s_usuario"] = null;
}

$conexion=null;

?>
