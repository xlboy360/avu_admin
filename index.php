<!DOCTYPE html>
<html>
    <head>
        <link rel ="shortcut icon" href="#" />
        <meta charset="utf-8">
        <meta name="viewport" content="width-devide-width, initial-scale-1, shrink-to-fit-no">

        <title>LogIn</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="estilos.css">
        <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">
        
    </head>

    <body >
        <div class="login">

            <h3 class="text-center text-light display-4 mt-5">AVU Conecta</h3>

            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12 bg-light text-dark px-4 py-2">

                        <form id="form-login" class="form" action="" method="POST">
                            <h3 class="text-center text-dark">Iniciar sesión</h3>
                            <div class="form-group">
                                <label for="usuario" class="text-dark">Usuario</label>
                                <input type="text" name="usuario" id="usuario" class="form-control">   
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-dark">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control mb-2" >   
                            </div>
                            <div class="form-group text-center d-grid gap-2" >
                                <input type="submit" name="submit" class="btn-outline-success btn-lg my-4" value="Iniciar">
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        
        <script src="jquery/jquery-3.6.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="popper/popper.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="codigo.js"></script>

    </body>
    
</html>