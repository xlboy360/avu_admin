<?php
session_start();

$conexion = mysqli_connect("localhost","root", "", "id16169015_avuconecta");

//recepción de datos enviados mediante POST desde ajax
$usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';

$consulta = "SELECT * FROM coordinador WHERE USUARIO='$usuario' AND CONTRASENA='$password' ";
$resultado=mysqli_query($conexion,$consulta);
$data=null;

while($row = mysqli_fetch_assoc($resultado)){
    echo $row['USUARIO'];
    if($row>=1){
        $_SESSION["s_usuario"] = $row['USUARIO'];
        $data= $row['USUARIO'];
       
    }else{
        $_SESSION["s_usuario"] = null;
        $data=null;
    }
}
print json_encode($data);
$conexion=null;

?>
