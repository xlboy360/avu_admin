<?php

$conexion = mysqli_connect("localhost","root", "", "id16169015_avuconecta");

$id=(isset($_POST['coordinador'])) ? $_POST['coordinador'] : '';
$cantidad=(isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
$empresa=(isset($_POST['empresa'])) ? $_POST['empresa'] : '';
 
 


$consulta = "CALL AsignarCoordinador($cantidad,$id);";


$resultado=mysqli_query($conexion,$consulta);

$conexion=null;

echo '<script> window.location.href = "asignar-match.php";  </script>';

echo " <script> window.onload = function() {
    swalWithBootstrapButtons.fire({
    title: '¡Registro guardado!',
    text: '¿Desea agregar otro? ',
    icon: 'success',
    showCancelButton: true, 
    focusConfirm: false,
    reverseButtons: true,
    confirmButtonText: 'Agregar',
    cancelButtonText: 'Cancelar',

    
  }).then((result2)=> {
    if(result2.isConfirmed){
   agregar();
    } }
    </script>";


?>