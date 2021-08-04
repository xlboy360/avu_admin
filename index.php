<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="#" />
    <meta charset="utf-8">
    <meta name="viewport" content="width-devide-width, initial-scale-1, shrink-to-fit-no">

    <title>LogIn</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link rel="stylesheet" href="plugins/sweetalert2/sweetalert2.min.css">

</head>

<body>
    <div class="login">

        <div class="container-login">
            <div class="wrap-login">
                <form class="login-form validate-form" id="form-login" action="" method="post">
                    <img src="./img/LOGOS VECTOR_CONECTA.png" alt="" width="300">
                    <h3 class="h4 text-center">Administrador</h3>
                    <div class="wrap-input100" data-validate="Usuario incorrecto">
                        <input class="input100" type="text" id="usuario" name="usuario" placeholder="Usuario">
                        <span class="focus-efecto"></span>
                    </div>

                    <div class="wrap-input100" data-validate="Password incorrecto">
                        <input class="input100" type="password" id="password" name="password" placeholder="Password">
                        <span class="focus-efecto"></span>
                    </div>

                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn"></div>
                            <button type="submit" name="submit" class="login-form-btn">Ingresar</button>
                        </div>
                    </div>
                    <!-- Codigo importante no borrar -->
                    <div class="container-login-form-btn">
                        <div class="wrap-login-form-btn">
                            <div class="login-form-bgbtn2"></div>
                            <a href="./vistas/log-in-coordinador.php" id="coord-btn">Coordinador</a>
                        </div>
                    </div>

                </form>
            </div>

        </div>

        <script src="jquery/jquery-3.6.0.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="popper/popper.min.js"></script>
        <script src="plugins/sweetalert2/sweetalert2.all.min.js"></script>
        <script src="codigo.js"></script>

</body>

</html>