<?php 
session_start();
if (isset($_SESSION['conectado'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Constructora Yama</title>
    <link href="css/styles.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id ="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header"><h3 class="text-center font-weight-light my-4">Iniciar sesión</h3></div>
                                <div class="card-body">
                                    <form id="form-login" name="form-login">
                                        <div class="form-group">
                                            <label class="small mb-1" for="email">Correo Electrónico</label>
                                            <input class="form-control py-4" id="email" name="email" type="email" placeholder="Ingresa tu correo electrónico" />
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="password">Contraseña</label>
                                            <input class="form-control py-4" id="password" name="password" type="password" placeholder="Ingresa tu contraseña" />
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="rememberPasswordCheck" type="checkbox" />
                                                <label class="custom-control-label" for="rememberPasswordCheck">Recordar contraseña</label>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small" href="password.php">¿Olvidaste tu contraseña?</a>
                                            <input type="submit" class="btn btn-primary" name="login-button" id="login-button" value="Validar">
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center">
                                    <div class="small">Panel administrativo &middot; Contructura Yama</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">

<?php require "includes/footer.php" ?>

<script src="includes/scripts/login.js"></script>