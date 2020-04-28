<!-- The Modal -->
<div class="modal fade" id="delete<?php echo $counter ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Eliminar registro</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
        
      <!-- Modal body -->
      <form action="conexiones/obra_delete.php" method="POST">
        <div class="modal-body text-center">
            <input type="hidden" name="idobra" value="<?php echo $fila['idobra']; ?>">
            <h3>Confirmar eliminación</h3>
            <p>¿Seguro de que desea eliminar la obra <br> <strong><?php echo $fila['obra'] ?></strong>?</p>
        </div>

         <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-dark" data-dismiss="modal">No, cancelar</button>
          <button type="submit" name="submit" class="btn btn-outline-danger">Si, eliminar</button> 
        </div>

      </form>  
    </div>
  </div>
</div>