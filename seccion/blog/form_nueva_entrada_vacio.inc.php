<div class="row section" id="subida-imagen">
    <?php //subida de la imagen?>
    <div class="col-12 col-md-7 row valign-wrapper" style="padding: 3em;">
    	<div class="col-1"></div>
    	<div class="col-10">
        	<p class="textoBlack mayusculas" style="font-size: 2em;">Agrega una imagen de portada</p>
			<p><font color="grey">* Selecciona una imagen y luego presiona el boton subir.</font></p>
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
    		<p>Vista Previa</p> 		
    	</div>   	   	
    </div>
    <div class="col-12 row">
    	<div class="col-1"></div>
    	<div class="col-10">
		    <a href="#descripcion-texto" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
		</div>
	</div>
</div>

<div class="row section" id="descripcion-texto">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-1"></div>
    	<div class="col-10 row">
        	<div class="input-field col-6">
				<input type="text" name="titulo" id="titulo" class="validate">
				<label for="titulo">Escribe un título para esta entrada</label>
				<br><br><br>
			</div>
			<div class="col-1"></div>
			<div class="input-field col-5">
				<input type="text" name="etiqueta" id="etiqueta" class="validate">
				<label for="etiqueta">Categoría de la entrada</label>
			</div>
			<div class="input-field col-12">
				<textarea id="texto" name="texto" style="resize: none;" class="materialize-textarea" data-length="1500" minlength="10" maxlength="1500"></textarea>
				<label for="texto" style="transform: translateY(-25px) scale(0.8);">¿Qué deseas compartir?</label>
				<p><input id="bold" type="button" value="Bold" class="btn btn-principal"> 
					<a class="waves-effect waves-light btn btn-principal modal-trigger" href="#imgAdd">Imagen</a>
				</p>
				<p id="resultado" class="d-none"></p>
			</div>      	
        </div>
    </div>
    <div class="col-12 row">
    	<div class="col-1"></div>
    	<div class="col-10">
		    <a href="#" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <a href="#etiquetas" style="font-size: .8em;" class="textoBold btn btn-principal-animado">Siguiente</a>
		</div>
	</div>
</div>



<div class="row section" id="etiquetas">
    <?php //Agregar texto y contenido?>
    <div class="col-12 row valign-wrapper">
    	<div class="col-1"></div>
    	<div class="col-10">
			<div class="input-field col-12">
				<textarea id="url_externa" name="url_externa" class="materialize-textarea" data-length="1350" minlength="10"></textarea>
				<label for="url_externa">Enlace externo (Opcional)</label>
				<br><br>
			</div>   
        	<div class="input-field">
				<input type="text" name="url" id="url" class="validate">
				<label for="url">URL personalizada (Opcional)</label>
			</div>   	
        </div>
    </div>
    <div class="col-12 row">
    	<div class="col-1"></div>
    	<div class="col-10">
		    <a href="#descripcion-texto" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <button type="submit" class="btn btn-principal-animado" name="guardar">Publicar</button>
		</div>
	</div>
</div>






<!-- Modal Structure -->
<div id="imgAdd" class="modal" style="width: 70%;height: 70vh;overflow-y: scroll;">
	<div class="modal-header right">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">X</a>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col-md-7 col-12 row valign-wrapper" style="padding: 3em;">
		    	<div class="col-1"></div>
		    	<div class="col-10">
		        	<p class="textoBlack mayusculas" style="font-size: 2em;">Sube una imagen al sitio web</p>
					<p><font color="grey">* Selecciona la imagen y luego presiona el boton subir.</font></p>
					<br>
					<label for="archivoImagen" id="label-archivo-imagen" class="btn btn-principal">Seleccionar</label>
					<input type="file" name="archivoImagen" id="archivoImagen" class="d-none">		
					<input name="archivoImagen" class="d-none">					
					<input type="button" value="Subir" name="guardar_file_imagen" id="guardar_file_imagen" onclick="subirImagenes()"  class="btn btn-principal">
					<progress id="progressBarImagen" class="barra-progreso" value="0" max="100" style="width:100%;height: 0.5em;"></progress>	   	
		        </div>
		    </div>
		    <div class="col-md-5 center-align valign-wrapper">
		    	<div class="col-12 row">
		    		<h4 id="statusFile"></h4>		
		    	</div>   	   	
		    </div>	
		</div>
	</div>
</div>


