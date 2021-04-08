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
    <title>Super Administrador</title>
</head>
<body>
    <div class="content-fluid">
        <!-- Consultar -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Id Match"></div>
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Empresa"></div>
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Coordinador"></div>
            <div class="col-md-auto"><button type="submit" class="btn btn-primary">Consultar</button></div>
        </div>

        <!-- Graficación -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">
                <img src="../static/img/pie-chart.png" alt="" width="300px">
            </div>
        </div>

        <!-- Paginación -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">
                <table border=3>
                    <tr>
                        <td>Id_Match</td><td>Nombre PAM</td><td>Nombre Voluntario</td><td>Nombre coordinador</td><td>Empresa</td>
                    </tr>
                    <tr>
                        <td>1</td><td>Prueba uno PAM</td><td>Prueba uno V</td><td>Prueba uno C</td><td>Prueba uno E</td>
                    </tr>
                    <tr>
                        <td>2</td><td>Prueba dos PAM</td><td>Prueba dos V</td><td>Prueba dos C</td><td>Prueba dos E</td>
                    </tr>
                    <tr>
                        <td>3</td><td>Prueba tres PAM</td><td>Prueba tres V</td><td>Prueba tres C</td><td>Prueba tres E</td>
                    </tr>
                </table>
            </div>            
        </div>
    </div>
</body>
</html>
<!-- FIN DEL CONTENIDO PRINCIPAL -->
<?php require_once "./parte_inferior.php" ?>
