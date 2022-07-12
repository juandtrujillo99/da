<div class="col-12">
	<div class="input-field">
		<input placeholder="Escribe un título para esta entrada" type="text" name="titulo" id="titulo" class="validate"<?php $validador -> mostrar_titulo(); ?> >
		<?php $validador -> mostrar_error_titulo(); ?>
		<label for="titulo">Título de la entrada</label>
	</div>
	<br>
	<div class="input-field">
		<input placeholder="Escribe una URL única y personalizada" type="text" name="url" id="url" class="validate"<?php $validador -> mostrar_url(); ?> >
		<?php $validador -> mostrar_error_url(); ?>
		<label for="url">URL personalizada</label>
	</div>
	<br>
	<div class="col-12">
		<ul class="collapsible">
		    <li>
				<div class="collapsible-header" title="Selecciona y sube la imagen de portada">Sube una imagen para la portada</div>
				<?php $validador -> mostrar_error_imagen(); ?>
				<div class="collapsible-body">
					<span>
						<div class="form-group" id="upload_form">
							<?php
							$rutaFoto = RUTA_BLOG_COVER.$validador -> obtener_imagen();
							$foto = $validador -> obtener_imagen();

							if(!isset($rutaFoto)||empty($foto)){
								?>
								<h6><font color="grey">* Selecciona una imagen y luego presiona el boton subir.</font></h6>				
								<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>
								<input type="file" name="file1" id="file1" class="d-none">		
								<input name="imagen" class="d-none">							
							<?php
							}else{
								?>
								<h4><font color="grey">Ya seleccionaste una imagen</font></h4>					
								<input type="hidden" name="imagen" <?php $validador -> mostrar_imagen(); ?>>
								<img src="<?php echo RUTA_BLOG_COVER.$validador -> obtener_imagen();?>" class="imagen-3">
								<br><br>
								<h4>Cambiar foto</h4>
								<label for="file1" id="label-archivo" class="btn btn-principal" >Seleccionar</label>
								<input type="file" name="file1" id="file1" class="d-none">
								<?php
							}
							?>							
							<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()" class="btn btn-principal">
							<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>
							<h4 id="status"></h4>										
						</div>
					</span>
				</div>
		    </li>
		</ul>
	</div>
	<br><br>
	<div class="input-field">
		<input placeholder="Inserta aquí el código que copiaste" type="text" name="url_externa" id="url_externa" <?php $validador -> mostrar_url_externa(); ?> >
		<?php $validador -> mostrar_error_url_externa(); ?>
		<label for="url_externa">Enlace externo</label>
	</div>
	<br>
	<div class="input-field">
		<textarea placeholder="Escribe algo..." id="texto" name="texto" class="materialize-textarea"><?php $validador -> mostrar_texto(); ?></textarea>
		<?php $validador -> mostrar_error_texto(); ?>
		<label for="texto">Contenido</label>
    </div> 
	<br>   
	<div class="input-field">
		<input placeholder="Asignale una categoría a esta entrada" type="text" name="etiqueta" id="etiqueta" class="validate" <?php $validador -> mostrar_etiqueta(); ?> >
		<?php $validador -> mostrar_error_etiqueta(); ?>
		<label for="etiqueta">Categoría</label>
		<!-- tagline  -->
		<div class="chip chips-placeholder">
			<?php echo $validador -> obtener_etiqueta(); ?>
			<i class="close material-icons">close</i>
		</div>
	</div>
</div>