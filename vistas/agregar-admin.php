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
    <title>Agregar un usuario</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="estilos2.css">
</head>

<body>
    <div class="content">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <form class="formulario-agregar-admin" id="formulario-agregar-admin" method="POST">
                    <div class="form-group">
                        <span class="titulo-formulario">Agregar usuario</span>
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre del usuario</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="email">Email del usuario</label>
                        <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="contrasena1">Contraseña</label>
                        <input type="text" class="form-control" id="contrasena1" name="contrasena1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="contrasena2">Repetir contraseña</label>
                        <input type="text" class="form-control" id="contrasena2" name="contrasena2" aria-describedby="emailHelp">
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



<script src="../jquery/jquery-3.6.0.min.js"></script>
<script src="../popper/popper.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script src="js/funcion.js"></script>