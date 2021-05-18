<?php
// Hace una validación de que ehaya un usuario en sesión.
session_start();
if ($_SESSION["s_usuario"] === "null") {
    header("Location: ../index.php");
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
    <title>Super Administrador</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="estilos2.css">

    <!-- Script necesario para las gráficas -->
    <script src="../chartjs/chart.min.js"></script>
</head>

<body>
    <div class="content-fluid">
        <!-- Consultar -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Id Match"></div>
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Empresa"></div>
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Coordinador"></div>
            <div class="col-md-auto"><button type="submit" class="btn btn-primary" id="consultar">Consultar</button></div>
        </div>

        <!-- Graficación -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">

                <canvas id="myChart" width="1500px" height="400px"></canvas>
                <!-- Gráfica de barras para los totales de actividades realziadas y las que no -->
                <script>
                    // Función para cargar los datos de la BD a la gráfica
                    function cargarDatosGrafica() {
                        $.ajax({
                            url: '../bd/controlador_grafico.php',
                            type: 'POST'
                        }).done(function(resp) {
                            // Variables para los titulos y su contenido
                            var cantidadSi = [];
                            var cantidadNo = [];

                            var contadorSi = 0;
                            var contadorNo = 0;

                            var dataContenido = JSON.parse(resp);
                            console.log(dataContenido);
                            var titulos1 = [];
                            for (let i = 0; i < 30; i++)
                                titulos1[i] = i + 1

                            // For para recorrer los elementos de la tabala
                            for (var i = 0; i < dataContenido.length; i++) {
                                // console.log(dataContenido[i][3]);
                                console.log(dataContenido[i][1]);
                                console.log(titulos1[i]);

                                if (dataContenido[i][1] == titulos1[i]) {

                                }

                                if (dataContenido[i][3] == "si") {
                                    // console.log("Entro en si");
                                    cantidadSi[i]++;
                                    contadorSi++;
                                }
                                if (dataContenido[i][3] == "no") {
                                    // console.log("Entro en no");
                                    contadorNo++;
                                }
                                // cantidadSi[i] = contadorSi;
                                // cantidadNo[i] = contadorNo;
                                // console.log("SI:" + cantidadSi);
                                // console.log("NO:" + cantidadNo);
                            }

                            var ctx = document.getElementById('myChart').getContext('2d');
                            var myChart = new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: titulos1,
                                    datasets: [{
                                            label: 'Actividades realizadas',
                                            data: cantidadSi,
                                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                            borderColor: 'rgba(75, 192, 192, 1)',
                                            borderWidth: 1
                                        },
                                        {
                                            label: 'Actividades por realizar',
                                            data: cantidadNo,
                                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                            borderColor: 'rgba(255, 99, 132, 1)',
                                            borderWidth: 1
                                        }
                                    ]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        })
                    }
                </script>
            </div>
        </div>

        <!-- Paginación  -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">
                <table id="example" class="table table-striped table-bordered table-hover table-light" style="width:100%">
                    <thead>
                        <tr>
                            <th>Id Match</th>
                            <th>Nombre PAM</th>
                            <th>Nombre voluntario</th>
                            <th>Nombre coordinador</th>
                            <th>Empresa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../bd/conexion.php';
                        $con = new Conexion();
                        $con->Conectar();
                        $res = mysqli_query($con->conexion, "SELECT a.Id_match, b.nombre_pam, b.apellido, c.nombre, c.apellido, e.NOMBRE, d.empresa
                            FROM mtch a 
                            INNER JOIN pam b ON a.Id_pam = b.Id_PAM 
                            INNER JOIN voluntario c ON a.Id_voluntario = c.Id_voluntario 
                            INNER JOIN empresa d ON c.Id_empresas = d.Id_empresas
                            INNER JOIN coordinador e ON e.ID = a.ID_COORDINADOR");
                        while ($rec = mysqli_fetch_array($res)) {
                            echo '<tr>
                                <td>' . $rec["Id_match"] . '</td>
                                <td>' . $rec["nombre_pam"] . ' ' . $rec["apellido"] . '</td>
                                <td>' . $rec["nombre"] . ' ' . $rec["apellido"] . '</td>
                                <td>' . $rec["NOMBRE"] . '</td>
                                <td>' . $rec["empresa"] . '</td>
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

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    cargarDatosGrafica()
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
            scrollY: 200,
            //Cambia las las opciones de la tabla
            lengthMenu: [
                [10, 25, -1],
                [10, 25, "All"]
            ],
        });
    });
</script>