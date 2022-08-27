<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/ControlSesion.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/galeria/EscritorEntradas.inc.php';

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

$titulo = "Galeria ".$nombreEmpresa;
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

<div class="container-fluid">

	<?php //previas ?>
	<div class="row" style="padding: 5em 0 2em 0;" align="center">
	    <div class="col-1 col-md-4"></div>
	    <div class="col-10 col-md-4">
	        <img class="imagen-2" itemprop="image" alt="logo <?php echo $nombreEmpresa; ?>" src="<?php echo RUTA_IMG; ?>logo/2.png">     
	    </div>    
	    <div class="col-1 col-md-4"></div>	        
	    <div class="col-1"></div>
        <div class="col-10">
            <div class="social-2">
            	<?php include "seccion/social.inc.php";?>
            </div>
        </div>  
        <div class="col-1"></div>
	</div>
	<div class="row">
		<div class="col-md-1 d-none d-sm-block"></div>
		<div class="col-12 col-md-10" style="padding-bottom: 2em;">			
			<div id="galeria">
				<?php EscritorEntradasGaleria::escribir_entradas(); ?>
			</div>
		</div>
		<div class="col-md-1 d-none d-sm-block"></div>
	</div>
</div>

<?php //body ?>

<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>