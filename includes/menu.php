
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.php">Constructora Yama</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Name-->
        <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <label for="" class="nav-link text-white"><?php echo $_SESSION['nombre']." ".$_SESSION['apellidos']; ?></label>
        </div>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <!--<div class="dropdown-divider"></div>-->
                    <a class="dropdown-item" href="conexiones/logout.php">Cerrar sesión</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Inicio</div>
                        <a class="nav-link" href="index.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i>
                            </div>Dashboard
                        </a>
                        <a class="nav-link" href="obras.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-building"></i>
                            </div>Obras
                        </a>

                        <div class="sb-sidenav-menu-heading">Inventario</div>
                        <a class="nav-link" href="herramientas.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tools"></i>
                            </div>Herramientas
                        </a>
                        <a class="nav-link" href="categorias.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-list-alt"></i>
                            </div>Categorias
                        </a>
                        <div class="sb-sidenav-menu-heading">Sistema</div>
                        <a class="nav-link" href="usuarios.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i>
                            </div>Usuarios
                        </a>
                        <a class="nav-link" href="roles.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i>
                            </div>Roles
                        </a>
                    </div>
                </div>
            <div class="sb-sidenav-footer">
                <div class="small">Conectado en modo:</div>
                <?php echo $_SESSION['rol']; ?>
            </div>
        </nav>
    </div>
<div id="layoutSidenav_content">