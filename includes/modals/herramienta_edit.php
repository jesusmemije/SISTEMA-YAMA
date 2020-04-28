<!-- The Modal -->
<div class="modal fade" id="editar<?php echo $counter ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Editar <strong><?php echo $fila['herramienta'] ?></strong></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form action="conexiones/herramienta_edit.php" method="POST">
        <div class="modal-body text-center">
          <input type="hidden" name="idherramienta" value="<?php echo $fila['idherramienta'] ?>">
          <div class="row">
              <div class="col-sm-3">Nombre:</div>
              <div class="col-sm-9">
                  <input type="text" name="nombre" class="form-control" value="<?php echo $fila['herramienta'] ?>" placeholder="EJ. Revolvedora" max="50" min="1">
              </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-3">Categoria</div>
            <div class="col-sm-9">
              <select name="idcategoria" class="custom-select">
                <option value="<?php echo $fila['idcategoria'] ?>">
                    <?php echo $fila['categoria'] ?>
                </option>
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
              <input type="number" name="existencias" class="form-control" value="<?php echo $fila['cantidad'] ?>" placeholder="EJ. 35" max="10000" min="1">
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