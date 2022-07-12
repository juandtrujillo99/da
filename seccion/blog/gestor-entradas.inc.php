<div class="row">
	<div class="col-12" style="padding: 2em"></div>
	<div class="col-12" style="padding: 0 0 1.5em 0;">
		<h1 class="textoBlack textoTitulo text-center"><?php echo $titulo ?></h1>
	</div>
	<div class="col-2"></div>
	<div class="col-9">
		<br>
		<a href="<?php echo RUTA_NUEVA_ENTRADA_BLOG; ?>" class="btn btn-principal-animado" role="button" id="boton-nueva-entrada">Crear nueva entrada</a>
		<a href="<?php echo RUTA_BLOG; ?>" class="btn btn-principal-animado" role="button" id="boton-nueva-entrada">Ver newsletter</a>
		<br><br><hr><br>
		<div class="row">
			<?php 
				if (count($array_entradas) > 0) {
					?>
					<table class="table table-striped">
						<thead>
							<tr>
								<th>Fecha de creación</th>
								<th>Título</th>
								<th>Categoría</th>
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
									<td><?php echo convertirFecha($entrada_actual -> obtener_fecha()); ?></td>
									<td><a target="_blank" href="<?php echo RUTA_ENTRADA_BLOG . '/' . $entrada_actual -> obtener_url(); ?>"><?php echo $entrada_actual -> obtener_titulo(); ?></a></td>									
									<td><?php echo $entrada_actual -> obtener_etiqueta(); ?></td>	
									<td></td>					
									<td>
										<form method="post" action="<?php echo RUTA_EDITAR_ENTRADA_BLOG; ?>">
											<input type="hidden" name="id_editar" value="<?php echo $entrada_actual -> obtener_id(); ?>">
											<button type="submit" class="btn btn-principal" name="editar_entrada">Editar</button>
										</form>
									</td>
									<td>
										<form method="post" action="<?php echo RUTA_BORRAR_ENTRADA_BLOG; ?>">
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
					<h3 class="text-center">Todavía no has escrito ninguna entrada</h3>
					<br>
					<br>
					<?php
				}
			?>
		</div>
	</div>
</div>