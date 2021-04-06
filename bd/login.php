<?php 

    // Se inicializa la sesión
    session_start();

    include_once 'conexion.php';
    $objeto = new Conexion();

    $conexion = $objeto->Conectar();

    // Recepción de los datos mediante POST desde AJAX
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
    $password = (isset($_POST['password'])) ? $_POST['password'] : '';

    // Encriptación MD5
    $passwordCrypted = md5($password);
    $consulta = "SELECT * FROM administrador WHERE USUARIO = '$usuario' AND CONTRASENA = '$passwordCrypted'";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();

    print json_encode($passwordCrypted);
    print_r($usuario, $passwordCrypted);
    if($resultado -> rowCount() >= 1) {
        $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
        // Variables de sesión
        $_SESSION["s_usuario"] = $usuario;
    } else {
        $_SESSION["s_usuario"] = null;
        $data = null;
    }

    print json_encode($data);

    $conexion = null;

?>