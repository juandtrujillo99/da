<ul class="collapsible">
	<li class="row">
		<div class="col-12">
			<h3 class="textoBlack mayusculas">Información general</h3> 
		</div>
		<div class="col-12 row">
			<div class="col-12">
				<br>
				<p class="textoBold" style="font-size: 1.2em;"><?php echo $admin -> obtener_nombre(); ?>, es una cuenta de administrador</p>		
				<br>
				<p class="textoBook">Correo electrónico:</p>
				<?php 
				if (!empty($admin -> obtener_email())) {
					?>
					<p class="textoBold truncate" style="font-size: 1.2em;"><?php echo $admin -> obtener_email(); ?></p>
					<?php
					}
				?>		
			</div>							
		</div>
	</li>
</ul>