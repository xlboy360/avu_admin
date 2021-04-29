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

    <link rel="stylesheet" href="estilos2.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <form action="">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre del administrador</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Usuario del administrador</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Contraseña del administrador</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Repetir contraseña</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <button id="agregar-btn" type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<!-- FIN DEL CONTENIDO PRINCIPAL -->
<?php require_once "./parte_inferior.php" ?>