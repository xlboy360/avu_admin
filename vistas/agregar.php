<?php
  require_once '../bd/conexion.php';
  $con = new Conexion();
  $con->Conectar();

  $id=(isset($_POST['coordinador'])) ? $_POST['coordinador'] : '';
  $cantidad=(isset($_POST['cantidad'])) ? $_POST['cantidad'] : '';
  $empresa=(isset($_POST['empresa'])) ? $_POST['empresa'] : '';

  $consulta = "CALL AsignarCoordinador($cantidad,$id,$empresa);";

  $resultado=mysqli_query($con->conexion,$consulta);

  echo '<script> window.location.href = "asignar-match.php";  </script>';

  echo 
    "<script> window.onload = function() {
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

  $con->cerrar();
?>