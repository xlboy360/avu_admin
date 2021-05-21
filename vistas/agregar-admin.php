<?php
// Hace una validación de que ehaya un usuario en sesión.
session_start();
if ($_SESSION["s_usuario"] === "null") {
    header("Location: ../log-in.php");
}
?>
<?php require_once "./parte_superior.php" ?>
<!-- INICIO CONTENIDO PRINCIPAL -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar un coordinador</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <div class="content">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <form class="formulario-agregar-admin" id="formulario-agregar-admin" method="POST">
                    <div class="form-group">
                        <span class="titulo-formulario">Agregar administrador</span>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del administrador</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario del administrador</label>
                        <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="contrasena">Contraseña del administrador</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="contrasena1">Repetir contraseña</label>
                        <input type="password" class="form-control" id="contrasena1" name="contrasena1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group" style="text-align:center;">
                        <button id="agregar-btn" type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
<!-- FIN DEL CONTENIDO PRINCIPAL -->
<?php require_once "./parte_inferior.php" ?>



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="../popper/popper.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script src="js/funcion.js"></script>