<?php

include_once 'app/config.inc.php';

include_once 'app/Conexion.inc.php';

//include_once 'app/usuario/RepositorioUsuario.inc.php';



		Conexion :: abrir_conexion();





$titulo = "Servicio offline ".$nombreEmpresa;



include_once 'seccion/cabecera-inicio.inc.php';

?>

<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>aparecer.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">

<?php

include_once 'seccion/cabecera-cierre.inc.php';

include_once 'seccion/doc-navbar.inc.php';

?>



<?php //body ?>

<div class="container-fluid">

	<div class="row">
		<?php include 'seccion/servicios/offline.inc.php';?>
	</div>

</div>

<?php 
include 'seccion/footer.inc.php';	
include 'seccion/copyright.inc.php';
include 'seccion/doc-terminacion.inc.php';
?>