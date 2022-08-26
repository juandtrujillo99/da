<div class="row">
	<div class="col-12" style="padding: 2em"></div>	
	<div class="col-md-2"></div>
	<div class="col-md-9 row">
		<div class="col-12 row">
			<div class="col-6" style="padding: 0 0 1.5em 0;">
				<h1 class="textoBlack textoTitulo"><?php echo $titulo ?></h1>
			</div>
			<div class="col-6 row">
				<div class="col-md-6 center-align"><a href="<?php echo RUTA_NUEVA_ENTRADA_GALERIA; ?>" class="btn btn-principal-animado" id="boton-nueva-entrada">Subir foto</a></div>
				<div class="col-md-6 center-align"><a href="<?php echo RUTA_GALERIA; ?>" class="btn btn-principal" id="boton-nueva-entrada">Ir a la galeria</a></div>
			</div>
		</div>		
		<div class="col-12"><hr></div>
		<div class="center-align valign-wrapper">
			<?php 
				if (count($array_entradas) > 0) {
					?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th></th>
								<th>Post</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
							for ($i = 0; $i < count($array_entradas); $i++) {
								$entrada_actual = $array_entradas[$i][0];
								$comentarios_entrada_actual = $array_entradas[$i][1];
								?>								
								<tr>										
									<td></td>
									<td>
										<a target="_blank" href="<?php echo RUTA_ENTRADA_GALERIA . '/' . $entrada_actual -> obtener_url(); ?>">
											<?php echo $entrada_actual -> obtener_fecha(); ?>																						
										</a>
									</td>									
									<td></td>	
									<td></td>					
									<td>
										<form method="post" action="<?php echo RUTA_EDITAR_ENTRADA_GALERIA; ?>">
											<input type="hidden" name="id_editar" value="<?php echo $entrada_actual -> obtener_id(); ?>">
											<button type="submit" class="btn btn-principal" name="editar_entrada">Editar</button>
										</form>
									</td>
									<td>
										<form method="post" action="<?php echo RUTA_BORRAR_ENTRADA_GALERIA; ?>">
											<input type="hidden" name="id_borrar" value="<?php echo $entrada_actual -> obtener_id(); ?>">
											<button type="submit" class="btn btn-principal" name="borrar_entrada">Borrar</button>
										</form>
									</td>
								</tr>								
								<?php
							}
							?>
						</tbody>
					</table>
					<?php
				} else {
					?>
					<p>Aquí aparecerán las publicaciones que hagas en la galeria</p>
					<br>
					<br>
					<?php
				}
			?>
		</div>
	</div>
</div>