<div class="modal fade" id="mas_herramienta<?php echo $counter ?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agregar herramienta</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="conexiones/mas_herramienta.php" method="POST">
                <input type="hidden" name="idobra" value=" <?php echo $fila['idobra'] ?> ">
                <div class="modal-body text-center">
                    <h3>Agregar herramienta a la Obra</h3>  
                    <p>Nombre de la obra:<strong> <?php echo $fila['obra']; ?></strong></p> 

                    <div class="row">
                        <div class="col-sm-3">Herramienta:</div>
                        <div class="col-sm-9">
                            <select name="idherramienta" class="custom-select">
                                <?php foreach ($herramientas_list as $herramienta) { ?>
                                <option value="<?php echo $herramienta['idherramienta'] ?>">
                                <?php echo $herramienta['herramienta'] ?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-3">Cantidad:</div>
                        <div class="col-sm-9">
                            <input type="number" name="cantidad" class="form-control" placeholder="EJ. 35" max="1000" min="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="submit" class="btn btn-outline-primary">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>  