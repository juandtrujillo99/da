<!DOCTYPE html>
<html lang="es">
	<head>

		<meta charset="UTF-8">
		<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1">
		<script src="https://kit.fontawesome.com/b7d9edf076.js" crossorigin="anonymous"></script>
		<meta http-equiv="imagetoolbar" content="no">
		<meta name="theme-color" content="#940000">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="<?php echo RUTA_IMG; ?>logo/mini1.png" type="imagen/x-icon" rel="ahortcut icon" />
		<meta name="distribution" content="global" />


		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>materialize.php">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>normalize.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>general.php">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>aparecer.css">
    


	<?php
		
		include_once 'app/usuario/ControlSesion.inc.php';
		include_once 'app/admin/ControlSesionAdmin.inc.php';
		
		// el titulo se convirtio en una variable, por lo tanto, cada pagina puede tener su propio titulo
		if(!isset($titulo) || empty($titulo)){
			$titulo = $nombreEmpresa;
		}
		echo "<title>$titulo</title>" . PHP_EOL;

		// la descripcion de la Pagina se convirtio en una variable, por lo tanto, cada pagina puede tener su propia descripcion
		if(!isset($descripcionPagina) || empty($descripcionPagina)){
			$descripcionPagina = $descripcionNegocio . PHP_EOL;
		}
		echo '<meta name="description" content="'.$descripcionPagina .'"/>' . PHP_EOL;



		/*la imagen de la Pagina se convirtio en una variable, por lo tanto, cada pagina puede tener su propia imagen
		if(!isset($imagenCompartida) || empty($imagenCompartida)){
			$imagenCompartida = '<meta itemprop="image" content="'. RUTA_IMG_OPTIMIZADA .'Email-marketing.webp">' . PHP_EOL;
		}
		echo '<meta itemprop="image" content="'. $imagenCompartida .'"/>' . PHP_EOL;


		// la propiedad position de la navbar le permite ser fixed o absolute dependiendo de la pestaña, 
		// $navbar es una variable, por lo tanto, cada pagina puede tener su propia caracteristica
		if(!isset($navbar) || empty($navbar)){
			$navbar = "position: fixed;";
		}*/