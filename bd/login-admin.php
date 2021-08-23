<?php
session_start();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$data = null;

if($usuario == "admin" && $password == "prueba"){
    $_SESSION["s_usuario"] = 'admin@avu.mx';
    $data = 'good';
}
else{
    $_SESSION["s_usuario"] = null;
    $data = null;
}

print json_encode($data);
?>
