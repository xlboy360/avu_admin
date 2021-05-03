<?php 
    require_once '../bd/conexion.php';
    $con = new Conexion();
    $con->Conectar();

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $contrasena = (isset($_POST['contrasena'])) ? $_POST['contrasena'] : '';

    $res=mysqli_query($con->conexion,"INSERT INTO coordinador (NOMBRE, USUARIO, CONTRASENA) VALUES ('$nombre','$usuario','$contrasena')");

    print json_encode($res);
    $con->cerrar();
?>