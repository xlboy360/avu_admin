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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/sweetalert2/sweetalert2.min.css">
</head>

<body>
    <div class="content-fluid">

        <!--Graficas-->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto"> <input class="form-control" type="text" placeholder="Activación 1" readonly></div>
            <div class="col-md-auto"> <input class="form-control" type="text" placeholder="Activación 2" readonly></div>
            <div class="col-md-auto"> <input class="form-control" type="text" placeholder="Activación 3" readonly></div>
        </div>

        <div class="row justify-content-md-center">
            <div class="col-md-auto">
                <canvas id="activacion1" width="200px" heigh="150px"></canvas>
            </div>
            <div class="col-md-auto">
                <canvas id="activacion2" width="200px" heigh="150px"></canvas>
            </div>
            <div class="col-md-auto">
                <canvas id="activacion3" width="200px" heigh="150px"></canvas>
            </div>
        </div>

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
                    console.log(dataContenido)

                    var titulos1 = []
                    titulos1[0] = "Asignados"
                    titulos1[1] = "No asignados"

                    var datos = [];

                    // For para recorrer los elementos de la tabala
                    for (var i = 0; i < dataContenido.length; i++) {
                        if (dataContenido[i][8] != 0 && dataContenido[i][8] != null) {
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
                    console.log(dataContenido)

                    var titulos1 = []
                    titulos1[0] = "Asignados"
                    titulos1[1] = "No asignados"

                    var datos = [];

                    // For para recorrer los elementos de la tabala
                    for (var i = 0; i < dataContenido.length; i++) {
                        if (dataContenido[i][8] != 0 && dataContenido[i][8] != null) {
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
                    console.log(dataContenido)

                    var titulos1 = []
                    titulos1[0] = "Asignados"
                    titulos1[1] = "No asignados"

                    var datos = [];

                    // For para recorrer los elementos de la tabala
                    for (var i = 0; i < dataContenido.length; i++) {
                        if (dataContenido[i][8] != 0 && dataContenido[i][8] != null) {
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
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            }
        </script>
        <!-- Paginación -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Coordinador</th>
                            <th>Match asignados</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--Aqui va el codigo para consultar la bd con php
                select ID_COORDINADOR, count(ID_COORDINADOR) as total
                from mtch
                -->
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success" id="btn0" data-toggle="modal" data-target="#exampleModal">Agregar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success agregar" data-toggle="modal" data-target="#asignar-match">Agregar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#asignar-match">Agregar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success agregar" data-toggle="modal" data-target="#asignar-match">Agregar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#asignar-match">Agregar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#asignar-match">Agregar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Rhona Davidson</td>
                            <td>Integration Specialist</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#asignar-match">Agregar</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>
                                <button type="button" class="btn btn-warning">Editar</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#asignar-match">Agregar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!--Modals-->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Termina modals-->

    </div>
</body>

</html>
<!-- FIN DEL CONTENIDO PRINCIPAL -->
<?php require_once "./parte_inferior.php" ?>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    cargarDatosGraficaActivacion1()
    cargarDatosGraficaActivacion2()
    cargarDatosGraficaActivacion3()
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

<script src="../popper/popper.min.js"></script>
<script src="../plugins/sweetalert2/sweetalert2.all.min.js"></script>

<script src="funcion.js"></script>