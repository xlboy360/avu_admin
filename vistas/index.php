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
    <title>Super Administrador</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
<body>
    <div class="content-fluid">
        <!-- Consultar -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Id Match"></div>
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Empresa"></div>
            <div class="col-md-auto"><input class="form-control" type="text" placeholder="Coordinador"></div>
            <div class="col-md-auto"><button type="submit" class="btn btn-primary">Consultar</button></div>
        </div>

        <!-- Graficación -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">
                <img src="../static/img/pie-chart.png" alt="" width="300px">
            </div>
        </div>

        <!-- Paginación -->
        <div class="row justify-content-md-center p-4">
            <div class="col-md-auto">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
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
                <!--Aqui va el codigo para consultar la bd con php
                select Id_match, nombre_pam, C.nombre, C.apellido, ID_COORDINADOR, D.empresa
                from mtch A inner join pam B on A.Id_pam=B.Id_PAM
                inner join voluntario C on A.Id_voluntario=C.Id_voluntario
                inner join empresa D on C.Id_empresas=D.Id_empresas
                -->
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                    </tr>
                    <tr>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                    </tr>
                    <tr>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>Edinburgh</td>
                        <td>22</td>
                        <td>2012/03/29</td>
                    </tr>
                    <tr>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>33</td>
                        <td>2008/11/28</td>
                    </tr>
                    <tr>
                        <td>Brielle Williamson</td>
                        <td>Integration Specialist</td>
                        <td>New York</td>
                        <td>61</td>
                        <td>2012/12/02</td>
                    </tr>
                    <tr>
                        <td>Herrod Chandler</td>
                        <td>Sales Assistant</td>
                        <td>San Francisco</td>
                        <td>59</td>
                        <td>2012/08/06</td>
                    </tr>
                    <tr>
                        <td>Rhona Davidson</td>
                        <td>Integration Specialist</td>
                        <td>Tokyo</td>
                        <td>55</td>
                        <td>2010/10/14</td>
                    </tr>
                    <tr>
                        <td>Colleen Hurst</td>
                        <td>Javascript Developer</td>
                        <td>San Francisco</td>
                        <td>39</td>
                        <td>2009/09/15</td>
                    </tr>
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
$(document).ready(function () {
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
                lengthMenu: [ [10, 25, -1], [10, 25, "All"] ],
            });
        });
</script>