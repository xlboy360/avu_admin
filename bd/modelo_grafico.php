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
            $consulta = "SELECT actividad_id, realizo FROM llamadas ORDER BY actividad_id ASC";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerDatosGraficoBarCoordinador($usuario){
            $consulta = "SELECT R.Id_match, R.Id_actividad, nombre_actividad, realizo_actividad FROM registro_actividad as R 
                INNER JOIN actividad as A ON A.Id_actividad = R.Id_actividad 
                INNER JOIN mtch AS M ON M.Id_match =R.Id_match 
                INNER JOIN coordinador as C ON c.ID = M.ID_COORDINADOR WHERE C.USUARIO = '$usuario' ";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerDatosGraficoPieActivacion1(){
            $consulta = "SELECT A.user_id FROM mayors as A INNER JOIN users as B on B.id = A.user_id WHERE B.email LIKE 'pepsico%'";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerDatosGraficoPieActivacion2(){
            $consulta = "SELECT A.user_id FROM mayors as A INNER JOIN users as B on B.id = A.user_id WHERE B.email LIKE 'enel%'";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }

        function TraerDatosGraficoPieActivacion3(){
            $consulta = "SELECT M.ID_COORDINADOR FROM mtch AS M INNER JOIN voluntario AS V ON V.Id_voluntario = M.Id_voluntario WHERE V.Id_empresas = 3";
            $arreglo = array();
            if($consulta = $this->conexion->conexion->query($consulta)){ 
                while($consulta_VU = mysqli_fetch_array($consulta))
                    $arreglo[] = $consulta_VU;
            }
            return $arreglo;
        }
    }
