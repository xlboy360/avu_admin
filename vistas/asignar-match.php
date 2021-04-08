<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilos-am.css">
    
</head>
<?php 
    $con=mysqli_connect("localhost","administrador","administrador","id16169015_avuconecta");
?>
<body>
    <div class="content-fluid">
        <div class="d-flex align-items-start" id="menu">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <h1>AVU Conecta</h1>
                <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Asignar Match</button>
                <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Configuración</button>
            </div>
            
            <div class="tab-content-fluid" id="v-pills-tabContent">
                
                <div class="tab-pane fade show active p-4" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                    <div class="row p-4" id="graficas-am">
                        <div class="col">
                            <img src="../static/img/pie-chart.png" alt="" width="100px">
                            <h2>Activación 1</h2>
                        </div>
                        <div class="col">
                            <img src="../static/img/pie-chart.png" alt="" width="100px">
                            <h2>Activación 2</h2>
                        </div>
                        <div class="col">
                            <img src="../static/img/pie-chart.png" alt="" width="100px">
                            <h2>Activación 3</h2>
                        </div>
                    </div>

                    <div class="row justify-content-md-center p-4" id="tabla-am">
                        <div class="col-md-auto">
                            <table class="tabla-coord" id="tabla-c">
                                <tr>
                                    <td>Coordinador</td><td>Match Asignados</td><td></td>
                                </tr>
                                <?php 
                                $res=mysqli_query ($con,"SELECT * FROM emocion");
                                if($rec=mysqli_fetch_array($res))
                                {
                                    echo '<tr><td>'.$rec["Id_emocion"].'</td><td>'.$rec["emocion"].'</td><td><button>Editar</button></td</tr>';
                                }
                                ?>
                            </table>  
                        </div>                                              
                    </div>
                </div>


                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">

                </div>
            </div>
        </div>
    </div>
</body>
</html>