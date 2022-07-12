<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
//include_once 'app/usuario/RepositorioUsuario.inc.php';

		Conexion :: abrir_conexion();


$titulo = "Megapack ".$nombreEmpresa;

include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>aparecer.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
/*
include_once 'seccion/cargando.inc.php';*/
include_once 'seccion/doc-navbar.inc.php';
?>

<?php //body ?>
<div class="container-fluid">
	<div class="row">
		<?php include_once 'seccion/pack/mega/portada.inc.php';?>
		<?php include_once 'seccion/pack/mega/ejemplo.inc.php';?>
		<?php include_once 'seccion/pack/mega/detalles.inc.php';?>
		<?php include_once 'seccion/pack/mega/otros-productos.inc.php';?>
		<?php include_once 'seccion/footer.inc.php';?>
		<?php include_once 'seccion/copyright.inc.php';?>
	</div>
</div>

<?php //body ?>

<?php
include_once 'seccion/doc-terminacion.inc.php';
?>