<?php 
    require 'modelo_grafico.php';
    
    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';

    $MG = new Modelo_Grafico();
    $consulta = $MG->TraerDatosGraficoBarCoordinador($usuario);
    echo json_encode($consulta);
    
?>