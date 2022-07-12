<div class="col-12 row">	
	<div class="col-12 col-md-5 section3 row">
		<div class="col-12 row"></div>
		<div class="col-1 col-md-2"></div>
		<div class="col-10 row" align="center" style="position: relative;">
			<div class="col-1 d-none d-sm-block"></div>
			<div class="col-12 col-md-10">
				<img src="<?php echo RUTA_IMG; ?>pack/premium.webp" class="imagen" style="z-index: 2;position: relative;top: -1em;">
			</div>
		</div>
	</div>
	<div class="col-12 col-md-7 row">
		<div class="col-1"></div>
		<div class="col-10 col-md-8 row">
			<div class="col-12 row">
				<div class="col-12"><h1 style="font-size: 3.5em;line-height: 1.1em;" class="textoBlack">Premium Pack para redes sociales</h1></div>
				<div class="col-12"><br><br></div>
				<div class="col-5 col-md-4">
					<h6 style="font-size: 1.5em;padding:0 0 .2em 0;" class="textoBlack">€49.99 / Mes</h6>
					<h6 style="font-size: 1.5em;text-decoration: line-through;" class="textoBlack grey-text">€89.99 </h6>
				</div>
				<div class="col-7 col-md-6">
					<?php
					$cantidad = 49.99;
					$total = 89.99;
				  	$porcentaje = round($cantidad/$total*100);
				  	?>						  
					<a class="btn btn-descuento" style="font-size: .8em;"><?php echo $porcentaje-100 ."% OFF"; ?></a>
				</div>
			</div>
			<div class="col-12" style="padding-top: 2em;">
				<a href="<?php echo $whatsappEmpresa;?>" class="btn btn-compra" style="font-size: 1em;">Adquirir</a>
			</div>
			<div class="col-12">
				<p style="font-size: 1.2em;padding:2em 0">
					Este paquete fue diseñado para entrenadores personales, gimnasios y todos los profesionales del fitness. Con estas imágenes aumentará tu visibilidad, seguidores, interacción y ventas en las redes sociales.<br><br>
					Este paquete incluye 50 imágenes de alta calidad.<br><br>
					El estrés y la frustración se acabaron durante los próximos 30 días. Ahorra horas de tu valioso tiempo y energía con este contenido premium creado especialmente para tu marca.
				</p>					
			</div>				
		</div>	
	</div>
</div>




