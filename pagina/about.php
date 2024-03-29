<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';


Conexion :: abrir_conexion();



$titulo = "Sobre ".$nombreEmpresa;


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

		<div class="d-none d-sm-block about">
			<div class="row">
				<div class="col-1"></div>
				<div class="col-10 row">
					<div class="col-8">
						<div class="col-12 anime-1">
							<br><br><br><br>
							<h1 class="textoBlack bordeRojoIzq2" style="font-size: 4em;">Directos y sin enredos</h1>
							<p style="font-size: 1.5em;padding: 2em 0;line-height: 1.2em;">Mis servicios y productos están adaptados a centros deportivos como gimnasios y a personas como preparadores físicos y deportistas que buscan mejorar su presencia online.</p>
							<br><br>
						</div>
					</div>
					<div class="col-12 row anime-1" align="center">
						<div class="col-1"></div>
						<div class="col-11 row">
							<div class="col-4 row">
								<div class="col-10 bordeadoRojo">
									<img loading="lazy" src="<?php echo RUTA_IMG;?>fondos/5.webp" class="imagen">
									<p style="padding: 2em;">Obtén un servicio de excelente calidad al mejor precio.</p>
								</div>
							</div>
							<div class="col-4 row">
								<div class="col-10 bordeadoRojo">
									<img loading="lazy" src="<?php echo RUTA_IMG;?>fondos/6.webp" class="imagen">
									<p style="padding: 2em;">Consigue que tu marca se destaque del montón.</p>
								</div>
							</div>
							<div class="col-4 row">
								<div class="col-10 bordeadoRojo">
									<img loading="lazy" src="<?php echo RUTA_IMG;?>fondos/7.webp" class="imagen">
									<p style="padding: 2em;">Llega de manera profesional a un público más amplio.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12"><br><br><br><br><br><br></div>
				</div>
				<div class="col-12 section3 anime-1a" style="background-image:url(<?php echo RUTA_IMG;?>fondos/9.webp);"></div>
				<div class="col-12 row section2 bggrey2 valign-wrapper">
					<div class="col-3"></div>
					<div class="col-6 row" style="position: relative;">
						<div class="col-1"></div>
						<div class="col-3 anime-1">
							<h6 class="textoBlack" style="font-size: 3em;margin-top: .5em;">Mi misión</h6>
							<div class="bordeRojoAba"></div>
						</div>
						<div class="col-8 row anime-1" style="padding-left: 2em;">
							<p>Quiero sobrepasar tus expectativas con un servicio excepcional, totalmente adaptado a las tendencias del momento y con una asombrosa capacidad para ir realizando cambios en el futuro.</p>
						</div>
					</div>
				</div>
				<div class="col-12 row anime-1">
					<div class="col-7" style="margin-top: 4em">
						<div class="row" style="background-position: center;width: 90%;height: 90%;background-image:url(<?php echo RUTA_IMG;?>fondos/11.webp);background-repeat: no-repeat;background-attachment: fixed;background-size: cover;" >
							<div class="col-8"></div>
							<div class="col-1 row"><div class="col-4" style="background-color: white;"></div></div>
							<div class="col-3"></div>
						</div>
					</div>
					<div class="col-5 row section valign-wrapper">
						<div class="col-2"></div>
						<div class="col-7 anime-1">
							<h6 class="textoBlack" style="font-size: 3em;margin-top: .5em;">Mi Visión</h6>
							<div class="bordeRojoAba"></div>
							<div><br><br><br></div>
							<p>Voy a construir un equipo que ayude a sus clientes diseñando estrategias efectivas para ser reconocidos por trabajar con los mayores estándares de calidad en la ciudad.</p>
						</div>
					</div>
				</div>
				<div class="col-12 row section3">
					<div class="col-1"></div>
					<div class="col-10 row anime-1 bggrey section2 valign-wrapper" style="max-height: 90%;">
						<div class="col-1"></div>
						<div class="col-4" align="center">
							<div class="bg-cover circle" style="width: 15em;height: 15em;background-position: center center;background-color: black;background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/admin/Juan'; ?>);"></div>  
						</div>
						<div class="col-6" style="padding:1em 4em;">
							<p>
								Me apasiona crear contenido digital para redes sociales de gimnasios y preparadores físicos porque el ejercicio me cambió la vida. Combinar mis dos amores me mantiene motivado trabajando sin sentir que lo estoy haciendo.
								<br><br>
								<b>- Juan David, Diseñador, community manager y creador de contenido.</b>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>





		<div class="d-block d-sm-none">
			<div class="col-12 row">
		        <div class="col-1"></div>
		        <div class="col-10" align="left" style="padding: 2em .5em;">
		        	<br>
		            <p style="font-size: 3em;line-height: 1em;text-transform: uppercase;" class="bordeRojoIzq textoBlack">Directo y sin enredos</p>
		            <br><br>
		            <p style="font-size: 1.5em;">Mis servicios y productos están adaptados a centros deportivos como gimnasios y a personas como preparadores físicos y deportistas que buscan mejorar su presencia online.</p>
			    </div>
			</div>
			<div class="col-12 about2">
				<div class="anime-3 paralelograma" style="background-image: url(<?php echo RUTA_IMG_OPTIMIZADA;?>whoami.webp);">
					<div align="center" class="texto-contenido4 white-text">
						<h6 class="texto2Black">Obtén un servicio de excelente calidad al mejor precio.</h6>
					</div>
				</div>
				<div class="anime-3 paralelograma" style="background-image: url(<?php echo RUTA_IMG_OPTIMIZADA;?>website-dareads.webp);">				
					<div align="center" class="texto-contenido4 white-text">
						<h6 class="texto2Black">Consigue que tu marca se destaque del montón.</h6>
					</div>
				</div>
				<div class="anime-3 paralelograma" style="background-image: url(<?php echo RUTA_IMG_OPTIMIZADA;?>whoami3.webp);">
					<div align="center" class="texto-contenido4 white-text">
						<h6 class="texto2Black">Incrementa tus posibilidades de llegar a un público más amplio.</h6>
					</div>
				</div>
			</div>
			<div class="col-12 row anime-3"  style="margin-bottom: 4em;">
				<p style="font-size: 3em;background-color: #940000;padding-right: 1em;z-index: 2;margin-top: 2em;text-transform: uppercase;" align="right" class="textoBlack white-text col-8">Mi misión</p>
		        <div class="col-4"></div>
		        <div class="col-1"></div>
		        <div class="col-10">
		        	<br>
		        	<p class="bordeRojoIzq anime-3" style="font-size: 1.5em;">Quiero sobrepasar tus expectativas con un servicio excepcional, totalmente adaptado a las tendencias del momento y con una asombrosa capacidad para ir realizando cambios en el futuro.</p>
		        </div>
		    </div>
			<div class="col-12 row">
				<div class="col-12"><br></div>
				<p style="font-size: 3em;background-color: #940000;padding-right: 1em;text-transform: uppercase;" align="right" class="textoBlack white-text col-8 anime-3">Mi Visión</p>
		        <div class="col-4"></div>
		        <div class="col-1"></div>
		        <div class="col-10">          
		            <br>
		            <p class="bordeRojoIzq anime-3" style="font-size: 1.5em;">Estoy construyendo un equipo que ayude a sus clientes diseñando estrategias efectivas para ser reconocidos por trabajar con los mayores estándares de calidad en la ciudad.</p>
			    </div>
			</div>
			<div class="col-12 row">
				<div class="col-3"></div>
				<div class="col-6 anime-3" style="z-index: 3;margin-top: 4em;">
					<br><br>
					<div class="bg-cover circle" style="width: 15em;height: 15em;background-position: center center;background-color: black;background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/admin/Juan'; ?>);"></div>  
				</div>
				<div class="col-3"></div>
		        <div class="col-1"></div>
		        <div class="col-10">
		            <br>
		            <p class="bordeadoNegro anime-3" style="font-size: 1.3em; padding:2em; margin-top: -3em;position: relative;background-color: white;">Me apasiona crear contenido digital para redes sociales de gimnasios y preparadores físicos porque el ejercicio me cambió la vida. Combinar mis dos amores me mantiene motivado trabajando sin sentir que lo estoy haciendo.
		            <br><br>
		            <b>- Juan David, Diseñador y creador de contenido.</b>
		            </p>
			    </div>
			</div>
			<div class="col-12">
				<br><br><br>
			</div>
		</div>
	</div>
</div>
<?php //body ?>



<?php
include 'seccion/footer.inc.php';
include 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';

?>