<?php
// Hace una validación de que ehaya un usuario en sesión.
session_start();
if ($_SESSION["s_usuario"] === "null") {
    header("Location: ../index.php");
}
?>

<?php 
    require_once "./navbar.php";
    require_once "../dashboard/dashboard.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
</head>

<body>

        <div class="container">
            <div class="row">
                <div class="row align-items-center justify-content-center">
                    <div class="col">ID_MATCH</div>
                    <div class="col">EMPRESA</div>
                    <div class="col">COORDINADOR</div>
                </div>
                <div class="row align-items-center justify-content-center">
                    Gráfica
                </div>
            </div>
            <div class="row align-items-center justify-content-center">

                TABLA

            </div>
        </div>
    </div>



    <script src="../jquery/jquery-3.6.0.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../popper/popper.min.js"></script>
    <script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="../codigo.js"></script>
</body>

</html>