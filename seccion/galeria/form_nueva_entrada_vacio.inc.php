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
    	<div class="col-md-10 row" style="background-color: white; z-index: 99;">
			<div class="input-field col-12">
			<textarea id="texto" name="texto" style="min-height: 30vh;max-height: 40vh;overflow-y: scroll;font-size: .9em;" class="materialize-textarea" data-length="3000" minlength="1" maxlength="3000"></textarea>
				<label for="texto">¿Qué deseas compartir?</label>
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
    		<input name="url" id="url" class="d-none">
		    <a href="#" style="font-size: .8em;" class="textoBold btn btn-principal">Anterior</a>
		    <button type="submit" class="btn btn-principal-animado" name="guardar">Publicar</button>
		</div>
	</div>
</div>









