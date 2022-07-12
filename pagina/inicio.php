<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

Conexion :: abrir_conexion();


$titulo = $nombreEmpresa;


include_once 'seccion/cabecera-inicio.inc.php';
?>

<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>aparecer.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<?php

include_once 'seccion/cabecera-cierre.inc.php';

/*

include_once 'seccion/cargando.inc.php';*/

include_once 'seccion/doc-navbar.inc.php';

?>



<?php //body ?>

<div class="container-fluid">

	<div class="row">
		<?php include 'seccion/inicio/portada.inc.php';?>
		<?php include 'seccion/inicio/servicios.inc.php';?>
		<?php include 'seccion/inicio/about.inc.php';?>
		<?php include 'seccion/inicio/opiniones.inc.php';?>
		<?php include 'seccion/inicio/contacto.inc.php';?>	
		<?php include 'seccion/copyright.inc.php';?>
	</div>

</div>



<?php //body ?>



<?php
include_once 'seccion/doc-terminacion.inc.php';
?>