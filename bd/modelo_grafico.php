<?php 
    class Modelo_Grafico {
        private $conexion;

        function __construct()
        {
            require_once './conexion.php';
            $this->conexion = new Conexion();
            $this->conexion->Conectar();
        }

        function TraerDatosGraficoBar(){
            $consulta = "SELECT Id_match, R.Id_actividad, nombre_actividad, realizo_actividad FROM registro_actividad as R INNER JOIN actividad as A ON A.Id_actividad = R.Id_actividad";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerTitulosGraficoBar(){
            $consulta = "SELECT * FROM actividad";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }
    }
