<!-- The Modal -->
<div class="modal fade" id="herramientas<?php echo $counter ?>">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
				<h4 class="modal-title">Obra detalles</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body text-center">
				
				<h2>Herramientas de la Obra</h2>
				<p>La siguiente lista muestra las HERRAMIENTAS y su CANTIDAD que se  tiene registrada para la Obra.</p>  
				<p>Nombre de la obra:<strong> <?php echo $fila['obra']; ?></strong></p>   


				<div class="row">
					<div class="col-1 col-lg-1 col-md-1 col-sm-1"></div>
					<div class="col-10 col-lg-10 col-md-10 col-sm-10">
						<ul class="list-group">
							
							<?php 
							
							$idobra = $fila['idobra'];

							$stm = $PDO->prepare('SELECT m.*, h.herramienta FROM materiales_obra m INNER JOIN herramientas h 
								ON m.idherramienta = h.idherramienta WHERE idobra="'.$idobra.'"');
							$stm->execute();
							$herramientas = $stm->fetchAll();

							$tabladetalles = "";
							$count_cantidad = 0;
							foreach ($herramientas as $herramienta) {
							?>

								<li class="list-group-item d-flex justify-content-between align-items-center">
									<?php echo $herramienta['herramienta'] ?>
									<span class="badge badge-primary badge-pill"><?php echo $herramienta['cantidad'] ?></span>
								</li>

							<?php 
								$quenty_uni = ( int ) $herramienta['cantidad'];
							    $count_cantidad = $count_cantidad + $quenty_uni;
							} 
							?>

							<li class="list-group-item d-flex justify-content-between align-items-center active">
								Total
								<span class="badge badge-dark badge-pill"><?php echo $count_cantidad ?></span>
							</li>
						</ul>   
					</div>
					<div class="col-1 col-lg-1 col-md-1 col-sm-1"></div>
				</div>
				
			</div>
			<!-- Modal footer -->
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-dark" data-dismiss="modal">Listo, salir</button>
			</div> 
		</div>
	</div>
</div>


