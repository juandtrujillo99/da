<div class="row">
	<div class="media-scroller-m snaps-inline">
		<input type="hidden" name="buscar-tienda">
		<?php
		for ($i = 0; $i < count($entradas_azar); $i++) {
			$entrada_actual = $entradas_azar[$i];
			?>
			<a href="<?php echo RUTA_ENTRADA_GALERIA . '/' . $entrada_actual -> obtener_url() ?>">
				<div class="media-element">					
					<div class="img-aleatoria bg-cover" style="background-image:url(<?php echo RUTA_GALERIA_COVER. $entrada_actual -> obtener_imagen(); ?>);"></div>
					<p><?php echo EscritorEntradasGaleria::resumir_titulo(nl2br($entrada_actual -> obtener_texto()))?></p>					
				</div>
			</a>
			<?php
			}
		?>
		<a href="<?php echo RUTA_GALERIA; ?>">
			<div class="media-element">					
				<div class="img-aleatoria bg-cover" style="background-image:url(<?php echo RUTA_IMG_OPTIMIZADA."entradas-al-azar.webp"; ?>);"></div>				
			</div>			
		</a>
	</div>		
</div>	
