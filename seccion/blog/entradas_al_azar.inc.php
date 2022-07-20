<?php
include_once 'app/blog/EscritorEntradas.inc.php';
?>

<div class="row">	
	<?php
		for ($i = 0; $i < count($entradas_azar); $i++) {
			$entrada_actual = $entradas_azar[$i];
		?>		
		<a href="<?php echo $entrada_actual -> obtener_url(); ?>" class="col-md-3 col-12">
            <div class="row card" style="margin: .5em;background-color: none; border: none;">
				<div class="card-image">					
		            <div align="center">   
		                <div class="img-entrada bg-cover" style="background-image:url(<?php echo RUTA_BLOG_COVER.$entrada_actual -> obtener_imagen(); ?>);"></div>
		            </div>
		        </div>        
            </div>
        </a>
		<?php
		}
	?>
</div>
