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

        function TraerDatosGraficoBarCoordinador(){
            $consulta = "SELECT R.Id_match, R.Id_actividad, nombre_actividad, realizo_actividad FROM registro_actividad as R 
                INNER JOIN actividad as A ON A.Id_actividad = R.Id_actividad 
                INNER JOIN mtch AS M ON M.Id_match =R.Id_match 
                INNER JOIN coordinador as C ON c.ID = M.ID_COORDINADOR WHERE C.USUARIO = '$this->usuario' ";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerDatosGraficoPieActivacion1(){
            $consulta = "SELECT M.ID_COORDINADOR FROM mtch AS M INNER JOIN VOLUNTARIO AS V ON V.Id_voluntario = M.Id_voluntario WHERE V.Id_empresas = 1";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerDatosGraficoPieActivacion2(){
            $consulta = "SELECT M.ID_COORDINADOR FROM mtch AS M INNER JOIN VOLUNTARIO AS V ON V.Id_voluntario = M.Id_voluntario WHERE V.Id_empresas = 2";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerDatosGraficoPieActivacion3(){
            $consulta = "SELECT M.ID_COORDINADOR FROM mtch AS M INNER JOIN VOLUNTARIO AS V ON V.Id_voluntario = M.Id_voluntario WHERE V.Id_empresas = 3";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }
    }
