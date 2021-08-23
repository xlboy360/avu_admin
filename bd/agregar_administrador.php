<?php 
    require_once '../bd/conexion.php';
    $con = new Conexion();
    $con->Conectar();

    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $email = (isset($_POST['email'])) ? $_POST['email'] : '';
    $contrasena = (isset($_POST['contrasena1'])) ? $_POST['contrasena1'] : '';

    $contrasenaX = password_hash($contrasena, PASSWORD_DEFAULT);
    $hoy = date("Y-m-d H:i:s");

    $res=mysqli_query($con->conexion,"INSERT INTO users (name, email, email_verified_at, password, examen, role_id, remember_token, created_at, updated_at) VALUES ('$nombre','$email',NULL,'$contrasenaX',0,1,NULL,'$hoy','$hoy')");

    print json_encode($res);
    $con->cerrar();
?>