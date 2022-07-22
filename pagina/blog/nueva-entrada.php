<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/blog/Entrada.inc.php';
include_once 'app/blog/RepositorioEntrada.inc.php';
include_once 'app/blog/ValidadorEntrada.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/Redireccion.inc.php';


if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}

$entrada_publica = 0;
if (isset($_POST['guardar'])) {
	Conexion :: abrir_conexion();
	
	$validador = new ValidadorEntradaBlog($_POST['titulo'], $_POST['url'], $_POST['imagen'], $_POST['url_externa'], $_POST['texto'], $_POST['etiqueta'], Conexion :: obtener_conexion());

	//var_dump($validador -> obtener_texto()); aun no se para que sirve, creo que solo es una prueba
	
	if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
		$entrada_publica = 1;
	}
	
	if ($validador -> entrada_valida()) {
		if (ControlSesionAdmin :: sesion_iniciada()) {
			
			$entrada = new EntradaBlog('', $_SESSION['id_admin'], $validador -> obtener_url(), $validador -> obtener_imagen(), $validador -> obtener_url_externa(), $validador -> obtener_titulo(),
				$validador -> obtener_texto(), $validador -> obtener_etiqueta(),'', $entrada_publica);//es muy importante que aqui el orden sea el mismo que el de la tabla de la base de datos
				
			$entrada_insertada = RepositorioEntradaBlog :: insertar_entrada(Conexion :: obtener_conexion(), $entrada);
			if ($entrada_insertada) {
				Redireccion::redirigir(RUTA_GESTOR_ENTRADAS_BLOG);
			}
		} else {
			Redireccion :: redirigir(RUTA_LOGIN);
		}
		
		Conexion :: cerrar_conexion();
	}
}

$titulo = "Nueva entrada";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/blog/barra-progreso.php';//script que sube las imagenes de las entradas
include_once 'scripts/blog/barra-progreso-archivo-imagen.php';//script que sube las imagenes de las entradas
include_once 'seccion/cabecera-cierre.inc.php';
?>
<div class="container-fluid">
	<div class="d-block d-sm-none" style="background-color: #202020;color: white;padding: .5em 1em;font-size: 1.5em;position: fixed;width: 100%;z-index: 99999;">
		<div class="row">
	        <div class="col-2">
	            <a style="color: white;" href="<?php echo RUTA_GESTOR_ENTRADAS_BLOG;?>"><i class="fa-solid fa-angle-left"></i></a>
	        </div>
	        <div class="col-10"><?php echo $titulo; ?></div>
        </div>
    </div>
	
	<div class="row">  
		<div class="col-md-2 valign-wrapper">
			<?php include 'seccion/blog/panel-ayuda-lateral.inc.php';?>
		</div>
		<div class="col-md-10 row">
			<div class="row valign-wrapper">
				<div class="col-12" style="padding: 3em 0 1em 0;">
				    <p class="text-center textoBlack mayusculas d-none d-sm-block" style="font-size:2em;padding:0 2em;line-height:1.1em"><?php echo $titulo; ?></p>
				</div>

				<div class="col-12 row">
					<div class="col-1"></div>
					<div class="col-10">
						<form method="post" action="<?php echo RUTA_NUEVA_ENTRADA_BLOG ?>">
							<?php
								if (isset($_POST['guardar'])) {
									include_once 'seccion/blog/form_nueva_entrada_validado.inc.php';
								} else {						
									include_once 'seccion/blog/form_nueva_entrada_vacio.inc.php';
								}
							?>					
						</form>
					</div>
				</div>
			</div>
			<?php include_once 'seccion/copyright.inc.php';?>
		</div>
	</div>
</div>


<?php //subir una imagen al servidor Modal ?>
<div id="imgAdd" class="modal" style="width: 70%;height: 70vh;overflow-y: scroll;">
	<div class="modal-header right">
		<a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cerrar</a>
	</div>
	<div class="modal-content">
		<div class="row">
			<div class="col-md-7 col-12 row valign-wrapper" style="padding: 1em;">
		    	<div class="col-md-1"></div>
		    	<div class="col-md-10">
		        	<p class="textoBlack mayusculas" style="font-size: 1.5em;line-height: 1.1;">Sube una imagen al sitio web</p>
		        	<br>
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
		    		<p id="logTarget"></p>		
		    	</div>   	   	
		    </div>	
		</div>
	</div>
</div>


<script src="<?php echo RUTA_JS; ?>formato-texto.js"></script>

<?php
include_once 'seccion/doc-terminacion.inc.php';
?>
