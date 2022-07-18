<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/Usuario.inc.php';
include_once 'app/admin/Admin.inc.php';
include_once 'app/blog/Entrada.inc.php';
include_once 'app/blog/Comentario.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/blog/RepositorioEntrada.inc.php';
include_once 'app/blog/RepositorioComentario.inc.php';




$titulo = $entrada -> obtener_titulo();
$url = RUTA_ENTRADA_BLOG . '/' .$entrada -> obtener_url();
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/formatoFecha.php';
?>
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=625b4e8e85d62e001964c39a&product=sop' async='async'></script>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>sobreponer.css">
<link rel="canonical" href="<?php echo $url; ?>">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';

//entrada.php es el archivo encargado de crear las entradas, es una plantilla
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 bg-cover" style="background-image: url(<?php echo RUTA_BLOG_COVER;?><?php echo $entrada -> obtener_imagen(); ?>) ;">
            <div class="row">
                <div class="d-none d-sm-block section" style="background-color: rgba(0, 0, 0, .7);"></div>
                <div class="d-block d-sm-none" style="height: 50vh;"></div>
            </div>
        </div>
        <?php //para pc ?>
        <div class="col-6 d-none d-sm-block" style="height: 100vh;position: absolute;right: 0;overflow-y: scroll;padding: 3em 4em; scroll-behavior: smooth;">
            <h1 class="textoBlack"><?php echo $entrada -> obtener_titulo(); ?></h1>
            <div class="textoParrafo1a">Publicado el <?php echo convertirFecha($entrada -> obtener_fecha()); ?> por <?php echo $autor -> obtener_nombre(); ?></div>
            <br><br>
            <p align="justify"><?php echo nl2br($entrada -> obtener_texto()); ?></p>      
            <br><br>
            <div class="sharethis-inline-share-buttons"></div>
        </div>
        <?php //para moviles ?>
        <div class="col-12 d-block d-sm-none" style="overflow-y: scroll;padding: 3em 4em; scroll-behavior: smooth;">
            <h1 class="textoBlack"><?php echo $entrada -> obtener_titulo(); ?></h1>
            <div class="textoParrafo1a">Publicado el <?php echo convertirFecha($entrada -> obtener_fecha()); ?> por <?php echo $autor -> obtener_nombre(); ?></div>
            <br><br>
            <p align="justify"><?php echo nl2br($entrada -> obtener_texto()); ?></p>      
            <br><br>
            <div class="sharethis-inline-share-buttons"></div>
            <br><br>
            <script async src="https://comments.app/js/widget.js?3" data-comments-app-website="-69nWccB" data-limit="5" data-color="000"></script>
        </div>
        <div class="col-12" style="background-color: #0d0d0d; color: white;">
            <br>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 col-12">
                    <?php include_once 'seccion/blog/entradas_al_azar.inc.php';?>
                </div>
            </div>
        </div>
    </div>
</div>




<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
