<input type="hidden" id="id-entrada" name="id-entrada" value="<?php echo $id_entrada; ?>">
<?php //modal que avisa al usuario que errores hay que corregir ?>
<div id="errores" class="modal" style="width: 90%;height: 75vh;overflow-y: scroll;z-index:999999;">
	<div class="modal-content">
		<div class="row">
			<div class="col-12 row center-align valign-wrapper" style="padding: 2em;">
		    	<div class="col-md-4"></div>
		    	<div class="col-md-4">
		        	<p class="textoBlack mayusculas" style="font-size: 1.5em;line-height: 1.1;">Por favor completa o corrige los siguientes campos</p>
		        	<br>
					<?php $validador -> mostrar_error_imagen(); ?>	
					<?php $validador -> mostrar_error_titulo(); ?> 
					<?php $validador -> mostrar_error_etiqueta(); ?> 
					<?php $validador -> mostrar_error_texto(); ?>
					<?php $validador -> mostrar_error_url_externa(); ?>
					<?php $validador -> mostrar_error_url(); ?>  
					<br><br>
					<a href="#!" class="modal-action modal-close waves-effect waves-green btn btn-principal-animado">Entendido</a>
		        </div>
		    </div>
		</div>
	</div>
</div>

<div class="row section" id="subida-imagen">
    <?php //subida de la imagen?>
    <div class="col-12 col-md-7 row valign-wrapper">
    	<div class="col-md-2"></div>
    	<div class="col-md-9">
			<?php
			$rutaFoto = RUTA_BLOG_COVER.$entrada_recuperada -> obtener_imagen();
			$foto = $entrada_recuperada -> obtener_imagen();

			if(!isset($rutaFoto)||empty($foto)){
				?>
				<p class="textoBlack mayusculas d-none d-sm-block" style="font-size: 2em;">Agrega una imagen de portada</p>
	        	<p class="textoBlack mayusculas d-block d-sm-none" style="font-size: 1.2em;">Agrega una imagen de portada</p>	
	        	<?php $validador -> mostrar_error_imagen();?>  		
				<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>
				<input type="file" name="file1" id="file1" class="d-none">		
				<input name="imagen" class="d-none">	
				<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()" class="btn btn-principal">
				<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>							
			<?php
			}else{
				?>

				<div class="row" style="padding: 1em 0;">
					<div class="col-12">						
						<p class="textoBlack mayusculas" style="font-size: 1.2em;padding-bottom:1em;">¿Deseas cambiar la imagen?</p>
					</div>
					<div class="col-md-12 col-3">				
						<input type="hidden" name="imagen" value="<?php echo $entrada_recuperada -> obtener_imagen(); ?>">
						<img src="<?php echo RUTA_BLOG_COVER.$entrada_recuperada -> obtener_imagen();?>" class="imagen d-block d-sm-none">
						<img src="<?php echo RUTA_BLOG_COVER.$entrada_recuperada -> obtener_imagen();?>" class="imagen-3 d-none d-sm-block">
					</div>
					<div class="col-1"></div>
					<div class="col-md-12 col">
						<div class="d-none d-sm-block"><br></div>
						<label for="file1" id="label-archivo" class="btn btn-principal" style="font-size:.8em">Seleccionar</label>
						<input type="file" name="file1" id="file1" class="d-none">
						<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()" class="btn btn-principal" style="font-size:.8em">
						<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>	
					</div>
				</div>
				<?php
			}
			?>		        	
        </div>
    </div>
    <div class="col-md-5 center-align valign-wrapper">
    	<div class="col-12 row">
    		<h4 id="status"></h4>
    		<input type="hidden" id="imagen-original" name="imagen-original" value="<?php echo $entrada_recuperada -> obtener_imagen(); ?>">		
    	</div>   	   	
    </div>
    <div class="col-12 row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
		    <a href="#descripcion-texto" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
		</div>
	</div>
</div>

<div class="row section" id="descripcion-texto">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-md-1"></div>
    	<div class="col-md-10 row">
        	<div class="input-field col-md-6 col-12">
				<input type="text" name="titulo" id="titulo" class="validate" value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>">
				<input type="hidden" id="titulo-original" name="titulo-original" value="<?php echo $entrada_recuperada -> obtener_titulo(); ?>">
				<?php $validador -> mostrar_error_titulo(); ?>
				<label for="titulo">Escribe un título para esta entrada</label>
				<div class="d-none d-sm-block"><br><br><br></div>
			</div>
			<div class="col-1"></div>
			<div class="input-field col-md-5 col-12">
				<input type="text" name="etiqueta" id="etiqueta" class="validate" value="<?php echo $entrada_recuperada -> obtener_etiqueta(); ?>">
				<input type="hidden" id="etiqueta-original" name="etiqueta-original" value="<?php echo $entrada_recuperada -> obtener_etiqueta(); ?>">
				<?php $validador -> mostrar_error_etiqueta(); ?>
				<label for="etiqueta">Categoría de la entrada</label>
				<div class="d-block d-sm-none"><br><br></div>
			</div>
			<div class="input-field col-12">
				<textarea id="texto" name="texto" style="min-height: 20vh;max-height: 30vh;overflow-y: scroll;font-size: .9em;" class="materialize-textarea" data-length="3000" minlength="10" maxlength="3000"><?php echo $entrada_recuperada -> obtener_texto(); ?></textarea>
				<input type="hidden" id="texto-original" name="texto-original" value="<?php echo $entrada_recuperada -> obtener_texto(); ?>">
				<?php $validador -> mostrar_error_texto(); ?>
				<label for="texto">Contenido</label>
				<p>
					<input id="bold" type="button" value="B" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Negrita"> 
					<input id="italic" type="button" value="<?php echo '𝑰';?>" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Cursiva"> 
					<input id="underline" type="button" value="U&#818;" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Subrayar">  
					<input id="enlazado" type="button" value="url" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Insertar enlace">  
					<a class="waves-effect waves-light btn btn-principal modal-trigger tooltipped" data-position="bottom" data-tooltip="Insertar imagen" href="#imgAdd">
						<i class="fa-regular fa-image"></i>
					</a>
				</p>
				<p id="resultado" class="d-none"></p>
			</div>      	
        </div>
    </div>
    <div class="col-12 row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
		    <a href="#" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <a href="#etiquetas" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
		</div>
	</div>
</div>

<div class="row section" id="etiquetas" style="display: flex;position: relative;">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
			<div class="input-field col-12">
				<textarea id="url_externa" name="url_externa" class="materialize-textarea" data-length="300" style="min-height: 10vh;max-height: 60vh;overflow-y: scroll;" placeholder="Empieza por <iframe ..."><?php echo $entrada_recuperada -> obtener_url_externa(); ?></textarea>
				<input type="hidden" id="url_externa-original" name="url_externa-original" value="<?php echo $entrada_recuperada -> obtener_url_externa(); ?>">
				<?php $validador -> mostrar_error_url_externa(); ?>
				<label for="url_externa">Enlace externo (Opcional)</label>
				<br><br><br>
			</div>   
        	<div class="row valign-wrapper">
        		<div class="col-md-4 d-none d-sm-block"><?php echo RUTA_ENTRADA_BLOG."/" ?></div>
        		<div class="input-field col-md-8 col-12" style="padding-top: 1.2em;">
        			<input type="text" name="url" id="url" class="validate" value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
					<input type="hidden" id="url-original" name="url-original" value="<?php echo $entrada_recuperada -> obtener_url(); ?>">
					<?php $validador -> mostrar_error_url(); ?>
					<label for="url">url-personalizada</label>
				</div>
			</div>   	
        </div>
    </div>
    <div class="col-12 row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
		    <a href="#descripcion-texto" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <button type="submit" class="btn btn-principal-animado" name="guardar_cambios_entrada">Guardar cambios</button>
		</div>
	</div>
</div>
