<div class="container-fluid">
    <div class="container-fluid p-0 m-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Configuración</a>
            </div>
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="" alt=""> <span><?php echo $_SESSION["s_usuario"]; ?></span>
                </a>
                <ul class="dropdown-menu drop-down-menu-right ms-auto ms-md-0" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../bd/logout.php">Cerrar sesión</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>