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
    <title>Coordinador</title>
</head>
<body>
    <div class="content-fluid">
    
    </div>
</body>
</html>
<!-- FIN DEL CONTENIDO PRINCIPAL -->
<?php require_once "./parte_inferior.php" ?>
