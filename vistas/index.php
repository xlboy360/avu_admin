<?php
// Hace una validación de que ehaya un usuario en sesión.
session_start();
if ($_SESSION["s_usuario"] === "null") {
    header("Location: ../log-in.php");
}
?>
<?php require_once "./parte_superior.php" ?>
    <!-- INICIO CONTENIDO PRINCIPAL -->

    <!-- FIN DEL CONTENIDO PRINCIPAL -->

<?php require_once "./parte_inferior.php" ?>
