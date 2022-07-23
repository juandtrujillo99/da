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

//entrada.php es el archivo encargado de crear las entradas, es una plantilla
?>


<div class="container-fluid">
    <div class="row">
        <div style="background-color: #202020;color: white;padding: .5em 1em;font-size: 1.5em;position: relative;width: 100%;z-index: 1001;">
            <div class="row">
                <div class="col-2">
                    <a style="color: white;" href="<?php echo RUTA_BLOG;?>"><i class="fa-solid fa-angle-left"></i></a>
                </div>
                <div class="col-10">Newsletter</div>
            </div>
        </div>
        <div class="col-12 col-md-6 bg-cover" style="background-image: url(<?php echo RUTA_BLOG_COVER;?><?php echo $entrada -> obtener_imagen(); ?>) ;background-position: center;">
            <div class="row">
                <div class="d-none d-sm-block section" style="background-color: rgba(0, 0, 0, .7);"></div>
                <div class="d-block d-sm-none" style="height: 52vh;"></div>
            </div>
        </div>
        <?php //para pc ?>
        <div class="col-6 d-none d-sm-block" style="height: 100vh;position: absolute;right: 0;overflow-y: scroll;padding: 5em 4em; scroll-behavior: smooth;">
            <h1 class="textoBlack"><?php echo $entrada -> obtener_titulo(); ?></h1>
            <div class="textoParrafo1a">Publicado el <?php echo convertirFecha($entrada -> obtener_fecha()); ?> por <?php echo $autor -> obtener_nombre(); ?></div>
            <br><br>
            <p style="font-size: 1.1em;line-height: 1.8em"><?php echo nl2br($entrada -> obtener_texto()); ?></p>      
            <br><br>
            <div class="sharethis-inline-share-buttons"></div>
        </div>
        <?php //para moviles ?>
        <div class="col-12 d-block d-sm-none" style="padding: 1em;">
            <div class="row">
                <div class="col-2">
                    <a href="<?php echo $instagramEmpresa; ?>" target="_blank">
                        <div class="bg-cover circle" style="width: 4em;height: 4em;background-position: center center;background-color: black;background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/admin/'.$autor->obtener_nombre(); ?>);"></div>                
                    </a>
                </div> 
                <div class="col">
                    <p style="font-size: 1.1em;padding-top:.8em;">                
                        <b><?php echo $entrada -> obtener_etiqueta(); ?></b>
                        <p style="font-size:.8em;color: grey"><?php echo convertirFecha($entrada -> obtener_fecha()); ?></p>
                    </p>               
                </div>                
            </div>
            <p style="font-size: 1.2em;padding:1.5em 0;">
                <?php echo nl2br($entrada -> obtener_texto()); ?>
            </p>
            <br>
            <div class="sharethis-inline-share-buttons"></div>
            <br><br>
            <script async src="https://comments.app/js/widget.js?3" data-comments-app-website="-69nWccB" data-limit="5" data-color="000"></script>
        </div>
        <div class="col-12" style="background-color: #0d0d0d; color: white;padding: 2em 1em;">
            <?php include_once 'seccion/blog/entradas_al_azar.inc.php';?>
        </div>
    </div>
</div>




<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
