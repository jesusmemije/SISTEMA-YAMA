<?php require "includes/header.php" ?>
<?php require "includes/menu.php" ?>
<?php require "conexiones/conn.php"; ?>
<?php require "includes/functions.php" ?>

<?php 

$statement = $PDO->prepare("SELECT * FROM roles rol INNER JOIN usuarios user ON rol.idrol = user.idrol");
$statement->execute();
$filas = $statement->fetchAll();

$stm = $PDO->prepare("SELECT * FROM roles");
$stm->execute();
$roles = $stm->fetchAll();

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Usuarios</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Usuarios</li>
        </ol>
        <button type="button" class="btn btn-outline-primary" role="button" data-toggle="modal" data-target="#add_usuario"><i class="fas fa-plus"></i> Agregar Usuario</button>
        <br><br>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Usuarios del sistema
            </div>                            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablaInventario" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>E-mail</th>
                                <th>Rol</th>
                                <th>Fecha creación</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>E-mail</th>
                                <th>Rol</th>
                                <th>Fecha creación</th>
                                <th>Opciones</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php 
                            $counter = 1; 
                            foreach ($filas as $fila) {

                                $fecha_creacion = $fila['fecha_creacion'];
                                $fecha_creacion = obtenerFechaEnLetra($fecha_creacion);

                                echo '<tr>
                                <td>'.$counter.'</td>
                                <td>'.$fila['nombre'].'</td>
                                <td>'.$fila['apellidos'].'</td>
                                <td>'.$fila['email'].'</td>
                                <td>'.$fila['rol'].'</td>
                                <td>'.$fecha_creacion.'</td>
                                <td class="text-center">
                                <button type="button" class="btn btn-outline-warning" role="button" data-toggle="modal" data-target="#editar'.$counter.'">
                                <i class="fas fa-edit"></i>
                                </button> 
                                <button type="button" class="btn btn-outline-danger" role="button" data-toggle="modal" data-target="#delete'.$counter.'">
                                <i class="fas fa-trash-alt"></i>
                                </button>
                                </td>
                                </tr>';

                                include "includes/modals/usuario_edit.php";
                                include "includes/modals/usuario_delete.php";

                                $counter++;

                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="add_usuario">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nuevo usuario</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="conexiones/usuario_add.php" method="POST">
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-sm-3">Nombre:</div>
                        <div class="col-sm-9">
                            <input type="text" name="nombre" class="form-control" placeholder="EJ. Juan" max="30" min="1">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">Apellidos:</div>
                        <div class="col-sm-9">
                            <input type="text" name="apellidos" class="form-control" placeholder="EJ. Pérez López" max="30" min="1">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">E-mail:</div>
                        <div class="col-sm-9">
                            <input type="email" name="correo" class="form-control" placeholder="EJ. ejemplo@ejemplo.com">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">Contraseña:</div>
                        <div class="col-sm-9">
                            <input type="text" name="contrasena" class="form-control" placeholder="Ingresa la contraseña">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">Rol:</div>
                        <div class="col-sm-9">
                            <select name="idrol" class="custom-select">
                                <?php foreach ($roles as $rol) { ?>
                                <option value="<?php echo $rol['idrol'] ?>">
                                <?php echo $rol['rol'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include "includes/notificaciones/usuarios_noti.php" ?>

<?php require "includes/footer.php" ?>
