<?php require "includes/header.php" ?>
<?php require "includes/menu.php" ?>
<?php require "conexiones/conn.php" ?>
<?php require "includes/functions.php" ?>

<?php 

$statement = $PDO->prepare("SELECT o.*, u.nombre, u.apellidos FROM obras o INNER JOIN usuarios u ON o.idusuario = u.idusuario");
$statement->execute();
$filas = $statement->fetchAll();

$stm = $PDO->prepare("SELECT * FROM herramientas");
$stm->execute();
$herramientas_list = $stm->fetchAll();

?>
<main>
	<div class="container-fluid">
		<h1 class="mt-4">Obras</h1>
		<ol class="breadcrumb mb-4">
			<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
			<li class="breadcrumb-item active">Obras</li>
		</ol>
		<button type="button" class="btn btn-outline-primary" role="button" data-toggle="modal" data-target="#add_obra"><i class="fas fa-plus"></i> Agregar Obra</button>
        <br><br>
		<div class="card mb-4">
			<div class="card-header"><i class="fas fa-table mr-1"></i>Obras registradas
			</div>                            
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-bordered" id="tablaInventario" width="100%" cellspacing="0">
						<thead>
							<tr>
								<th>#</th>
								<th>Obra</th>
								<th>Usuario registro</th>
								<th>Fecha creación</th>
								<th class="text-center">Herramientas</th>
								<th class="text-center">Opciones</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>#</th>
								<th>Obra</th>
								<th>Usuario registro</th>
								<th>Fecha creación</th>
								<th class="text-center">Herramientas</th>
								<th class="text-center">Opciones</th>
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
								<td>'.$fila['obra'].'</td>
								<td>'.$fila['nombre']." ".$fila['apellidos'].'</td>
								<td>'.$fecha_creacion.'</td>
								<td class="text-center">
								<button type="button" class="btn btn-outline-dark" role="button" data-toggle="modal" data-target="#herramientas'.$counter.'">
									<i class="fas fa-eye"></i>
								</button> 
								<button type="button" class="btn btn-outline-primary" role="button" data-toggle="modal" data-target="#mas_herramienta'.$counter.'">
									<i class="fas fa-plus"></i>
								</button> 
								</td>
								<td class="text-center">
								<button type="button" class="btn btn-outline-warning" role="button" data-toggle="modal" data-target="#editar'.$counter.'">
									<i class="fas fa-edit"></i>
								</button> 
								<button type="button" class="btn btn-outline-danger" role="button" data-toggle="modal" data-target="#delete'.$counter.'">
									<i class="fas fa-trash-alt"></i>
								</button> 
								</td>
								</tr>';

								include "includes/modals/obra_herramientas.php";
								include "includes/modals/obra_edit.php";
								include "includes/modals/obra_delete.php";
								include "includes/modals/mas_herramienta.php";

								$counter++;

							} ?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>

<div class="modal fade" id="add_obra">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Nueva obra</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="conexiones/obra_add.php" method="POST">
                <div class="modal-body text-center">
                    <div class="row">
                        <div class="col-sm-3">Nombre:</div>
                        <div class="col-sm-9">
                            <input type="text" name="nombre" class="form-control" placeholder="EJ. Obra-Puente" max="50" min="1">
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

<?php include "includes/notificaciones/obras_noti.php" ?>

<?php require "includes/footer.php" ?>
