<?php 
    require 'modelo_grafico.php';

    $MG = new Modelo_Grafico();
    $consulta = $MG->TraerTitulosGraficoBar();
    echo json_encode($consulta);
?>