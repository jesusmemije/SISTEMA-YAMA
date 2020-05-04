<?php require "includes/header.php" ?>
<?php require "includes/menu.php" ?>
<?php require "conexiones/conn.php"; ?>
<?php require "includes/functions.php" ?>

<?php 

$statement = $PDO->prepare("SELECT cate.idcategoria, idherramienta,herramienta,cantidad,nota,categoria,descripcion,fecha_creacion FROM herramientas herra INNER JOIN categorias cate ON herra.idcategoria = cate.idcategoria");
$statement->execute();
$filas = $statement->fetchAll();

$stm = $PDO->prepare("SELECT * FROM categorias");
$stm->execute();
$categorias = $stm->fetchAll();

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Herramientas</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active">Herramientas</li>
        </ol>
        <?php if ($_SESSION['rol'] == 'administrador') { ?>
        <button type="button" class="btn btn-outline-primary" role="button" data-toggle="modal" data-target="#add_herramienta"><i class="fas fa-plus"></i> Agregar Herramienta</button>
        <br><br>
        <?php } ?>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Inventario de herraminetas y materiales
            </div>                            
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="tablaInventario" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Herramienta | Material</th>
                                <th>Categoria</th>
                                <th>Existencias</th>
                                <th>Fecha creación</th>
                                <?php if ($_SESSION['rol'] == 'administrador') { ?>
                                <th>Opciones</th>
                                <?php  } ?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Herramienta | Material</th>
                                <th>Categoria</th>
                                <th>Existencias</th>
                                <th>Fecha creación</th>
                                <?php if ($_SESSION['rol'] == 'administrador') { ?>
                                <th>Opciones</th>
                                <?php  } ?>
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
                                <td>'.$fila['herramienta'].'</td>
                                <td>'.$fila['categoria'].'</td>
                                <td>'.$fila['cantidad'].'</td>
                                <td>'.$fecha_creacion.'</td>';

                                if ($_SESSION['rol'] == 'administrador') {

                                echo '<td class="text-center">
                                <button type="button" class="btn btn-outline-warning" role="button" data-toggle="modal" data-target="#editar'.$counter.'">
                                <i class="fas fa-edit"></i>
                                </button> 
                                <button type="button" class="btn btn-outline-danger" role="button" data-toggle="modal" data-target="#delete'.$counter.'">
                                <i class="fas fa-trash-alt"></i>
                                </button> 
                                </td>';

                                }

                                echo'</tr>';

                                if ($_SESSION['rol'] == 'administrador') {
                                include "includes/modals/herramienta_edit.php";
                                include "includes/modals/herramienta_delete.php";
                                }
                                
                                $counter++;

                            } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>

<div class="modal fade" id="add_herramienta">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva herramienta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="conexiones/herramienta_add.php" method="POST">
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-sm-3">Nombre:</div>
                        <div class="col-sm-9">
                            <input type="text" name="nombre" class="form-control" placeholder="EJ. Revolvedora" max="50" min="1">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">Categoría:</div>
                        <div class="col-sm-9">
                            <select name="idcategoria" class="custom-select">
                                <?php foreach ($categorias as $categoria) { ?>
                                <option value="<?php echo $categoria['idcategoria'] ?>">
                                <?php echo $categoria['categoria'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">Existencias:</div>
                        <div class="col-sm-9">
                            <input type="number" name="existencias" class="form-control" placeholder="EJ. 35" max="10000" min="1">
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

<?php include "includes/notificaciones/herramientas_noti.php" ?>

<?php require "includes/footer.php" ?>
