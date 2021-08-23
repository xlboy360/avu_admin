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
                <canvas id="Pepsico" width="250px" heigh="350px"></canvas>
            </div>
            <div class="col-md-auto">
                <canvas id="Enel" width="250px" heigh="350px"></canvas>
            </div>
            <!--<div class="col-md-auto">
                <canvas id="activacion3" width="250px" heigh="350px"></canvas>
            </div>-->
        </div>
        <br>

        <!-- Código para gráficas de pie pepsico -->
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
                    //var dataContenido = resp;
                    var titulos1 = []
                    titulos1[0] = "Asignados"
                    titulos1[1] = "No asignados"

                    var datos = [];

                    // For para recorrer los elementos de la tabala
                    for (var i = 0; i < dataContenido.length; i++) {
                        contadorSi++;        

                    }
                    datos[0] = contadorSi
                    datos[1] = 105-contadorSi
                    // Función para crear el gráfico
                    CrearGrafico('pie', titulos1, datos, 'Pepsico')
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
                            contadorSi++;
                    }

                    datos[0] = contadorSi
                    datos[1] = 50-contadorSi

                    // Función para crear el gráfico
                    CrearGrafico('pie', titulos1, datos, 'Enel')
                })
            }

            /*function cargarDatosGraficaActivacion3() {
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
            }*/

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
                            <th>ID usuario</th>
                            <th>Nombre usuario</th>
                            <th>Email usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../bd/conexion.php';
                        $con = new Conexion();
                        $con->Conectar();
                        $res = mysqli_query($con->conexion, "SELECT A.id, A.name, A.email from users as A WHERE NOT EXISTS(SELECT NULL FROM mayors as B WHERE B.user_id = A.id)");
                        while ($rec = mysqli_fetch_array($res)) {
                            echo 
                            '<tr class="text-center">
                                <td>' . $rec["id"] . '</td>
                                <td>' . $rec["name"] . '</td>
                                <td>' . $rec["email"] . '</td>
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
    //cargarDatosGraficaActivacion3();
</script>

<script src="../popper/popper.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>
<script src="js/funcion.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            language: {
                processing: "Tratamiento en curso...",
                search: "Buscar&nbsp;:",
                lengthMenu: "Agrupar de _MENU_ items",
                info: "Mostrando del registro _START_ al _END_ de un total de _TOTAL_ registros",
                infoEmpty: "No existen datos.",
                infoFiltered: "(filtrado de _MAX_ elementos en total)",
                infoPostFix: "",
                loadingRecords: "Cargando...",
                zeroRecords: "No se encontraron datos con tu busqueda",
                emptyTable: "No hay datos disponibles en la tabla.",
                paginate: {
                    first: "Primero",
                    previous: "Anterior",
                    next: "Siguiente",
                    last: "Ultimo"
                },
                aria: {
                    sortAscending: ": active para ordenar la columna en orden ascendente",
                    sortDescending: ": active para ordenar la columna en orden descendente"
                }
            },
            //Tamaño del scroll vertical
            scrollY: 500,
            //Cambia las las opciones de la tabla
            lengthMenu: [
                [10, 20, 40, 80, 160, -1],
                [10, 20, 40, 80, 160, "All"]
            ],
        });
    });
</script>