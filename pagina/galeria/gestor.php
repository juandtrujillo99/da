<?php
include_once 'app/Conexion.inc.php';
include_once 'app/admin/ControlSesionAdmin.inc.php';
include_once 'app/admin/RepositorioAdmin.inc.php';
include_once 'app/galeria/EscritorEntradas.inc.php';
include_once 'app/galeria/RepositorioComentario.inc.php';
include_once 'app/Redireccion.inc.php';



if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}

$titulo = "Gestor de la galeria";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/formatoFecha.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
include_once 'seccion/panel_control_declaracion.inc.php';
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-10 row">
		<?php

		switch($gestor_actual) {
			case '':
				$cantidad_entradas_activas = RepositorioEntradaGaleria :: contar_entradas_activas_admin(Conexion::obtener_conexion(), $_SESSION['id_admin']);
				$cantidad_entradas_inactivas = RepositorioEntradaGaleria :: contar_entradas_inactivas_admin(Conexion::obtener_conexion(), $_SESSION['id_admin']);
			
				$cantidad_comentarios = RepositorioComentarioGaleria :: contar_comentarios_usuario(Conexion::obtener_conexion(), $_SESSION['id_usuario']);
			
				include_once 'seccion/galeria/gestor-generico.inc.php';
				break;
			case 'entradas-galeria':
				$array_entradas = RepositorioEntradaGaleria :: obtener_entradas_admin_fecha_descendente(Conexion::obtener_conexion(), $_SESSION['id_admin']);
			
				include_once 'seccion/galeria/gestor-entradas.inc.php';
				break;
			case 'comentarios':
				include_once 'seccion/galeria/gestor-comentarios.inc.php';
				break;
			case 'favoritos':
				include_once 'seccion/galeria/gestor-favoritos.inc.php';
				break;
		}
		?>
		</div>
	</div>
</div>
<?php
include_once 'seccion/panel_control_cierre.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
?>
