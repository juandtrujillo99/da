<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';

include_once 'app/usuario/Usuario.inc.php';
include_once 'app/admin/Admin.inc.php';
include_once 'app/galeria/EscritorEntradas.inc.php';
include_once 'app/galeria/Entrada.inc.php';
include_once 'app/galeria/Comentario.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/galeria/RepositorioEntrada.inc.php';
include_once 'app/galeria/RepositorioComentario.inc.php';




$titulo = EscritorEntradasGaleria::resumir_titulo(nl2br($entrada -> obtener_texto()));
$url = RUTA_ENTRADA_GALERIA . '/' .$entrada -> obtener_url();
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_GALERIA_COVER.$entrada -> obtener_imagen();

include_once 'seccion/cabecera-inicio.inc.php';
include_once 'scripts/formatoFecha.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>scroll-x.php">
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
                    <a style="color: white;" href="<?php echo RUTA_GALERIA;?>"><i class="fa-solid fa-angle-left"></i></a>
                </div>
                <div class="col-10">Galeria</div>
            </div>
        </div>        
        <div class="col-1 d-none d-sm-block"></div>
        <div class="col-12 col-md-4 valign-wrapper">
            <div class="section bg-cover d-none d-sm-block"></div>
            <div class="center-align">
                <a href="<?php echo RUTA_GALERIA_COVER. $entrada -> obtener_imagen(); ?>">
                    <img class="sombra" style="padding: 2em;max-height: 80vh;max-width: 100%" src="<?php echo RUTA_GALERIA_COVER. $entrada -> obtener_imagen(); ?>">
                </a>
            </div>
        </div>
        <div class="col-md-1 d-none d-sm-block"></div>
        <div class="col-md-5">
            <div class="d-none d-sm-block" style="padding-top: 5em;"></div>
            <div class="col-12 galeria" style="max-height: 50vh;overflow-y: scroll;padding: 2em .5em 0 .5em; scroll-behavior: smooth;">
                <div class="row">
                    <div class="col-1">
                        <a href="<?php echo $instagramEmpresa; ?>" target="_blank">
                            <div class="bg-cover circle" style="width: 4em;height: 4em;background-position: center top;background-color: black;background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/admin/'.$autor->obtener_nombre(); ?>);"></div>                
                        </a>
                    </div> 
                    <div class="col">
                        <p style="font-size: 1.1em;padding:.8em 0 0 1.5em;line-height: 1.2em;">                
                            <b><?php echo $autor->obtener_nombre(); ?></b>
                            <font style="font-size:.8em;color: grey;display: block"><?php echo convertirFecha($entrada -> obtener_fecha()); ?></font>
                        </p>               
                    </div>                
                </div>
                <p style="font-size: 1.2em;padding-top:1.5em;">
                    <?php echo nl2br($entrada -> obtener_texto()); ?>
                </p>
            </div>
            <div class="col-12" style="padding:2em 0;">
                <div class="sharethis-inline-share-buttons"></div>
                <script style="padding-top:2em" async src="https://comments.app/js/widget.js?3" data-comments-app-website="-69nWccB" data-limit="5" data-color="000"></script>
            </div>
        </div>
        <div class="col-12" style="background-color: #0d0d0d; color: white;padding: 2em 1em;">
            <?php include_once 'seccion/galeria/entradas_al_azar.inc.php';?>
        </div>
    </div>
</div>




<?php
include_once 'seccion/copyright.inc.php';
include_once 'seccion/doc-terminacion.inc.php';
