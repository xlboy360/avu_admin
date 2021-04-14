<?php
session_start();

include_once 'conexion.php';
$objeto = new Conexion();
$conexion = $objecto->Conectar();

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$consulta = "SELECT * FROM administrador WHERE usuario='$usuario' AND contrasena='$password' ";
$resultado=mysqli_query($conexion,$consulta);

if(mysqli_num_rows( $resultado ) > 0){
   
    $_SESSION["s_usuario"] = $usuario;
}else{
    $_SESSION["s_usuario"] = null;
    $data=null;
}
print json_encode($data);
$conexion=null;

?>
