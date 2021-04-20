<?php 
    require 'modelo_grafico.php';

    $MG = new Modelo_Grafico();
    $consulta = $MG->TraerDatosGraficoPieActivacion3();
    echo json_encode($consulta);
    
?>