<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

Conexion :: abrir_conexion();


$titulo = "Servicio online ".$nombreEmpresa;


include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>aparecer.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>


<?php //body ?>
<div class="container-fluid">
	<div class="row">
		<?php include_once 'seccion/servicios/online.inc.php';?>	
	</div>
</div>
<?php //body ?>



<?php
include_once 'seccion/doc-terminacion.inc.php';
?>