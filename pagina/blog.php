<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/ControlSesion.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/blog/EscritorEntradas.inc.php';

if(!ControlSesion::sesion_iniciada() && !ControlSesionAdmin::sesion_iniciada()) {
    Conexion :: abrir_conexion();
} else {

    if (ControlSesionAdmin::sesion_iniciada()) {
        Conexion :: abrir_conexion();
        $id = $_SESSION['id_admin'];
        $admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
    }
    elseif (ControlSesion::sesion_iniciada()) {
        Conexion :: abrir_conexion();
        $id = $_SESSION['id_usuario'];
        $usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
    }
}

$titulo = "Newsletter ".$nombreEmpresa;
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";



include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<?php //body ?>

<div class="container-fluid" style="background-color: #0d0d0d; color: white;">

	<?php //previas ?>
	<div class="row" style="padding: 5em 0 2em 0;" align="center">
	    <div class="col-1 col-md-4"></div>
	    <div class="col-10 col-md-4">
	        <img class="imagen-2" itemprop="image" alt="logo <?php echo $nombreEmpresa; ?>" src="<?php echo RUTA_IMG; ?>logo/3.png">     
	    </div>    
	    <div class="col-1 col-md-4"></div>	        
	    <div class="col-1"></div>
        <div class="col-10">
            <div class="social">
            	<?php include "seccion/social.inc.php";?>
            </div>
        </div>  
        <div class="col-1"></div>
        <div class="col-1 col-md-3"></div>
        <div class="col-9 col-md-6">
            <form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_BLOG; ?>">
				<div class="input-field">
					<i class="material-icons prefix">search</i>
					<input type="text" id="autocomplete-input" name="termino-buscar-blog" required class="autocomplete" style="color:white">
					<label for="autocomplete-input">¿Buscas algo en específico?</label>					
					<input type="hidden" name="buscar-blog">
				</div>
            </form>	
        </div> 
	</div>
	<div class="col-12 row">
		<div class="col-1"></div>
		<div class="col-10 row">
			<?php EscritorEntradasBlog::escribir_entradas(); ?>
		</div>
	</div>
</div>

<?php //body ?>

<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>