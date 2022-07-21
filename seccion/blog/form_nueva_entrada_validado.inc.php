<div class="row section" id="subida-imagen">
    <?php //subida de la imagen?>
    <div class="col-12 col-md-6 row valign-wrapper">
    	<div class="col-1"></div>
    	<div class="col-10">
        	<p class="textoBlack mayusculas" style="font-size: 2em;">Agrega una imagen de portada</p>
        	<?php $validador -> mostrar_error_imagen(); ?>
			<br>
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
        </div>
    </div>
    <div class="col-md-6 center-align valign-wrapper">
    	<h4 id="status"></h4>    	
    </div>
    <div class="col-12">
	    <a href="#descripcion-texto" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
	</div>
</div>

<div class="row section" id="descripcion-texto">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-1"></div>
    	<div class="col-10 row">
        	<div class="input-field col-6">
				<input placeholder="Escribe un título para esta entrada" type="text" name="titulo" id="titulo" class="validate"<?php $validador -> mostrar_titulo(); ?> >
				<?php $validador -> mostrar_error_titulo(); ?>
				<label for="titulo">Título</label>
				<br><br><br>
			</div>
			<div class="col-1"></div>
			<div class="input-field col-5">
				<input placeholder="Asignale una categoría a esta entrada" type="text" name="etiqueta" id="etiqueta" class="validate" <?php $validador -> mostrar_etiqueta(); ?> >
				<?php $validador -> mostrar_error_etiqueta(); ?>
				<label for="etiqueta">Categoría</label>
			</div>
			<div class="input-field col-12">
				<textarea placeholder="Escribe algo..." id="texto" name="texto" class="materialize-textarea"><?php $validador -> mostrar_texto(); ?></textarea>
				<?php $validador -> mostrar_error_texto(); ?>
				<label for="texto">Contenido</label>
			</div>      	
        </div>
    </div>
    <div class="col-12">
	    <a href="#etiquetas" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
	</div>
</div>



<div class="row section" id="etiquetas">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-1"></div>
    	<div class="col-10">
			<div class="input-field col-12">
				<input placeholder="Inserta aquí el código que copiaste" type="text" name="url_externa" id="url_externa" <?php $validador -> mostrar_url_externa(); ?> >
				<?php $validador -> mostrar_error_url_externa(); ?>
				<label for="url_externa">Enlace externo</label>
				<br><br>
			</div>   
        	<div class="input-field">
				<input placeholder="Escribe una URL única y personalizada" type="text" name="url" id="url" class="validate"<?php $validador -> mostrar_url(); ?> >
				<?php $validador -> mostrar_error_url(); ?>
				<label for="url">URL personalizada</label>
			</div>   	
        </div>
    </div>
    <div class="col-12">
	    <button type="submit" class="btn btn-principal-animado" name="guardar">Publicar</button>
	</div>
</div>
