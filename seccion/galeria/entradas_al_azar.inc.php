<div class="row">	
	<?php
		for ($i = 0; $i < count($entradas_azar); $i++) {
			$entrada_actual = $entradas_azar[$i];
		?>		
		<a href="<?php echo RUTA_ENTRADA_GALERIA . '/' . $entrada_actual -> obtener_url() ?>" class="col-md-4 col-12">
            <div class="row card" style="margin: .5em;background-color: none; border: none;">
				<div class="card-image">					
		            <div align="center">   
		                <div class="img-galeria-m bg-cover" style="background-image:url(<?php echo RUTA_GALERIA_COVER. $entrada_actual -> obtener_imagen(); ?>);"></div>
		            </div>
		        </div>        
            </div>
        </a>
		<?php
		}
	?>
</div>


<div class="">
	<form role="form" id="busqueda" method="post" action="<?php echo RUTA_BUSCAR_ENTRADA_TIENDA; ?>">
		<div class="media-scroller snaps-inline sombra">
			<input type="hidden" name="buscar-tienda">
			<?php
			for($i = 0; $i < count($entradas_azar); $i++){
				?>
				<p style="color: white;">hola puto</p>
				<?php
				}
			?>
		</div>	
	</form>	
</div>