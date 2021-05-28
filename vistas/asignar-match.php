<?php
// Hace una validación de que ehaya un usuario en sesión.
session_start();
if ($_SESSION["s_usuario"] === "null") {
    header("Location: ../log-in.php");
}
?>
<?php require_once "./parte_superior.php" ?>
<!-- INICIO CONTENIDO PRINCIPAL -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../bootstrap/datatables/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="estilos2.css">

    <script src="../chartjs/chart.min.js"></script>
</head>

<body>
    <div class="content">

        <!--Graficas-->
        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <canvas id="activacion1" width="250px" heigh="350px"></canvas>
            </div>
            <div class="col-md-auto">
                <canvas id="activacion2" width="250px" heigh="350px"></canvas>
            </div>
            <div class="col-md-auto">
                <canvas id="activacion3" width="250px" heigh="350px"></canvas>
            </div>
        </div>
        <br>

        <!-- Código para gráficas de pie -->
        <script>
            function cargarDatosGraficaActivacion1() {
                $.ajax({
                    url: '../bd/controlador_grafico_pie1.php',
                    type: 'POST'
                }).done(function(resp) {
                    // Variables para los titulos y su contenido
                    var contadorSi = 0;
                    var contadorNo = 0;

                    var dataContenido = JSON.parse(resp);

                    var titulos1 = []
                    titulos1[0] = "Asignados"
                    titulos1[1] = "No asignados"

                    var datos = [];

                    // For para recorrer los elementos de la tabala
                    for (var i = 0; i < dataContenido.length; i++) {
                        if (dataContenido[i][0] != 0 && dataContenido[i][0] != null) {
                            contadorSi++;
                        } else {
                            contadorNo++;
                        }
                    }
                    datos[0] = contadorSi
                    datos[1] = contadorNo
                    // Función para crear el gráfico
                    CrearGrafico('pie', titulos1, datos, 'activacion1')
                })
            }

            function cargarDatosGraficaActivacion2() {
                $.ajax({
                    url: '../bd/controlador_grafico_pie2.php',
                    type: 'POST'
                }).done(function(resp) {
                    // Variables para los titulos y su contenido
                    var contadorSi = 0;
                    var contadorNo = 0;

                    var dataContenido = JSON.parse(resp);

                    var titulos1 = []
                    titulos1[0] = "Asignados"
                    titulos1[1] = "No asignados"

                    var datos = [];

                    // For para recorrer los elementos de la tabala
                    for (var i = 0; i < dataContenido.length; i++) {
                        if (dataContenido[i][0] != 0 && dataContenido[i][0] != null) {
                            contadorSi++;
                        } else {
                            contadorNo++;
                        }
                    }

                    datos[0] = contadorSi
                    datos[1] = contadorNo

                    // Función para crear el gráfico
                    CrearGrafico('pie', titulos1, datos, 'activacion2')
                })
            }

            function cargarDatosGraficaActivacion3() {
                $.ajax({
                    url: '../bd/controlador_grafico_pie3.php',
                    type: 'POST'
                }).done(function(resp) {
                    // Variables para los titulos y su contenido
                    var contadorSi = 0;
                    var contadorNo = 0;

                    var dataContenido = JSON.parse(resp);

                    var titulos1 = []
                    titulos1[0] = "Asignados"
                    titulos1[1] = "No asignados"

                    var datos = [];

                    // For para recorrer los elementos de la tabala
                    for (var i = 0; i < dataContenido.length; i++) {
                        if (dataContenido[i][0] != 0 && dataContenido[i][0] != null) {
                            contadorSi++;
                        } else {
                            contadorNo++;

                        }
                    }

                    datos[0] = contadorSi
                    datos[1] = contadorNo

                    // Función para crear el gráfico
                    CrearGrafico('pie', titulos1, datos, 'activacion3')
                })
            }

            function CrearGrafico(tipo, titulo, datos, id) {
                var ctx = document.getElementById(id).getContext('2d');
                var myChart = new Chart(ctx, {
                    type: tipo,
                    data: {
                        labels: titulo,
                        datasets: [{
                            label: 'Actividades realizadas',
                            data: datos,
                            backgroundColor: [
                                // Color verde
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                            ],
                            borderColor: [
                                // Color verde
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: id
                            }
                        }
                    }
                });
            }
        </script>
        <!-- Paginación -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">
                <table id="example" class="table table-light table-striped table-bordered table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Coordinador</th>
                            <th>Match asignados</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../bd/conexion.php';
                        $con = new Conexion();
                        $con->Conectar();
                        $res = mysqli_query($con->conexion, "SELECT A.ID_COORDINADOR, B.NOMBRE,  count(A.ID_COORDINADOR) as total from mtch A 
                            INNER JOIN coordinador B on A.ID_COORDINADOR=B.ID WHERE A.ID_COORDINADOR > 0 group by A.ID_COORDINADOR 
                            UNION SELECT B.ID, B.NOMBRE, B.CANTIDAD_MATCH FROM coordinador B");
                        while ($rec = mysqli_fetch_array($res)) {
                            echo 
                            '<tr class="text-center">
                                <td>' . $rec["NOMBRE"] . '</td>
                                <td>' . $rec["total"] . '</td>
                                <td> <button type="button" class="btn btn-outline-success agregar"  value="' .
                                    $rec["ID_COORDINADOR"] . '" onclick="identidad (' . $rec["ID_COORDINADOR"] . ')" >Agregar</button>
                                </td>
                            </tr>';
                        }
                        $con->cerrar();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>
<!-- FIN DEL CONTENIDO PRINCIPAL -->
<?php require_once "./parte_inferior.php" ?>
<script src="../jquery/jquery-3.6.0.min.js"></script>
<script src="../bootstrap/datatables/jquery.dataTables.min.js"></script>
<script src="../bootstrap/datatables/dataTables.bootstrap4.min.js"></script>
<script>
    cargarDatosGraficaActivacion1();
    cargarDatosGraficaActivacion2();
    cargarDatosGraficaActivacion3();
</script>

<script src="../popper/popper.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="js/funcion.js"></script>