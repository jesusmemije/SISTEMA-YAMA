<!-- The Modal -->
<div class="modal fade" id="editar<?php echo $counter ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar <strong><?php echo $fila['nombre']." ".$fila['apellidos'] ?></strong></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="conexiones/usuario_edit.php" method="POST">
        <div class="modal-body text-center">
          <input type="hidden" name="idusuario" value="<?php echo $fila['idusuario'] ?>">
          <div class="row">
            <div class="col-sm-3">Nombre:</div>
            <div class="col-sm-9">
              <input type="text" name="nombre" class="form-control" value="<?php echo $fila['nombre'] ?>" placeholder="EJ. Juan" max="30" min="1">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3">Apellidos:</div>
            <div class="col-sm-9">
              <input type="text" name="apellidos" class="form-control" value="<?php echo $fila['apellidos'] ?>" placeholder="EJ. Pérez López" max="30" min="1">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3">E-mail:</div>
            <div class="col-sm-9">
              <input type="email" name="correo" class="form-control" value="<?php echo $fila['email'] ?>" placeholder="EJ. ejemplo@ejemplo.com">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3">Contraseña:</div>
            <div class="col-sm-9">
              <input type="text" name="contrasena" class="form-control" value="<?php echo $fila['password'] ?>" placeholder="Ingresa la contraseña">
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
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">No, cancelar</button>
          <button type="submit" name="submit" class="btn btn-outline-warning">Si, actualizar</button>
        </div>
      </form>
    </div>
  </div>
</div>