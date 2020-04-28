<!-- The Modal -->
<div class="modal fade" id="editar<?php echo $counter ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar <strong><?php echo $fila['categoria'] ?></strong></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="conexiones/categoria_edit.php" method="POST">
        <div class="modal-body text-center">
          <input type="hidden" name="idcategoria" value="<?php echo $fila['idcategoria'] ?>">
          <div class="row">
            <div class="col-sm-3">Nombre:</div>
            <div class="col-sm-9">
              <input type="text" name="nombre" class="form-control" value="<?php echo $fila['categoria'] ?>" placeholder="EJ. Maquinaria nueva" max="30" min="1">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3">Descripción:</div>
            <div class="col-sm-9">
              <input type="text" name="descripcion" class="form-control" value="<?php echo $fila['descripcion'] ?>" placeholder="EJ. Se refiere a la nueva maquinaria" max="50" min="1">
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