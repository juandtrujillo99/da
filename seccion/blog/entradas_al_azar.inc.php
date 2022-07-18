<?php
include_once 'app/blog/EscritorEntradas.inc.php';
?>

<div class="row">	
	<?php
		for ($i = 0; $i < count($entradas_azar); $i++) {
			$entrada_actual = $entradas_azar[$i];
		?>		
		<a href="<?php echo $entrada_actual -> obtener_url(); ?>" class="col-md-3 col-6">
            <div class="row card" style="margin: .5em;">
				<div class="card-image">					
		            <div align="center">   
		                <div class="img-entrada bg-cover d-none d-sm-block" style="background-image:url(<?php echo RUTA_BLOG_COVER.$entrada_actual -> obtener_imagen(); ?>);"></div>
		                <div class="img-entrada-m bg-cover d-block d-sm-none" style="background-image:url(<?php echo RUTA_BLOG_COVER.$entrada_actual -> obtener_imagen(); ?>);"></div>
		            </div>
		        </div>        
            </div>
        </a>
		<?php
		}
	?>
</div>
