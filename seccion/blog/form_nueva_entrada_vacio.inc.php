<div class="row section" id="subida-imagen">
    <?php //subida de la imagen?>
    <div class="col-12 col-md-7 row valign-wrapper">
    	<div class="col-md-2"></div>
    	<div class="col-md-9">
        	<p class="textoBlack mayusculas d-none d-sm-block" style="font-size: 2em;">Agrega una imagen de portada</p>
        	<p class="textoBlack mayusculas d-block d-sm-none" style="font-size: 1.2em;">Agrega una imagen de portada</p>
        	<br>
			<p style="line-height: 1.2em;"><font color="grey">* Selecciona una imagen y luego presiona el boton subir.</font></p>
			<br>
			<label for="file1" id="label-archivo" class="btn btn-principal">Seleccionar</label>
			<input type="file" name="file1" id="file1" class="d-none">		
			<input name="imagen" class="d-none">					
			<input type="button" value="Subir" name="guardar_imagen" id="guardar_imagen" onclick="subirImagen()"  class="btn btn-principal">
			<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>	        	
        </div>
    </div>
    <div class="col-md-5 center-align valign-wrapper">
    	<div class="col-12 row">
    		<h4 id="status"></h4>		
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
				<input type="text" name="titulo" id="titulo" class="validate">
				<label for="titulo">Escribe un título para esta entrada</label>
				<div class="d-none d-sm-block"><br><br><br></div>
			</div>
			<div class="col-1"></div>
			<div class="input-field col-md-5 col-12">
				<input type="text" name="etiqueta" id="etiqueta" class="validate">
				<label for="etiqueta">Categoría de la entrada</label>
				<div class="d-block d-sm-none"><br><br></div>
			</div>
			<div class="input-field col-12">
			<textarea id="texto" name="texto" style="min-height: 10vh;max-height: 60vh;overflow-y: scroll;" class="materialize-textarea" data-length="1500" minlength="10" maxlength="1500"></textarea>
				<label for="texto">¿Qué deseas compartir?</label>
				<p>
					<input id="bold" type="button" value="B" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Negrita"> 
					<input id="italic" type="button" value="<?php echo '𝑰';?>" class="btn btn-principal tooltipped" data-position="bottom" data-tooltip="Cursiva"> 
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
				<textarea id="url_externa" name="url_externa" class="materialize-textarea" data-length="1350" minlength="10" style="resize: none;max-height: 40vh;overflow-y: scroll;"></textarea>
				<label for="url_externa">Enlace externo (Opcional)</label>
				<br><br><div class="d-block d-sm-none"><br></div>
			</div>   
        	<div class="row valign-wrapper">
        		<div class="col-md-4 d-none d-sm-block"><?php echo RUTA_ENTRADA_BLOG."/" ?></div>
        		<div class="input-field col-md-8 col-12">
        			<input type="text" name="url" id="url" class="validate">
					<label for="url">url-personalizada</label>
				</div>
			</div>   	
        </div>
    </div>
    <div class="col-12 row">
    	<div class="col-md-1"></div>
    	<div class="col-md-10">
		    <a href="#descripcion-texto" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <button type="submit" class="btn btn-principal-animado" name="guardar">Publicar</button>
		</div>
	</div>
</div>









