<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';


$titulo = "Escoge una opción";
$descripcionPagina = $descripcionNegocio;
$imagenCompartida = RUTA_IMG_OPTIMIZADA."fondo/portada-inicio.webp";


include_once 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.css">
<?php
include_once 'seccion/cabecera-cierre.inc.php';
?>


<div class="container-fluid" style="background-image: url(<?php echo RUTA_IMG_OPTIMIZADA.'linktree-m.webp';?>);background-size: cover;background-repeat: none;background-attachment: fixed;background-position: bottom center;color: white;">    

    <div class="row" align="center">
        <div class="col-12" style="margin-top: 8em;"></div>

        <div class="col-12">
            <div class="col-2 col-md-4"></div>
            <div class="col-8 col-md-4">
                <div class="bg-cover circle" style="width: 7em;height: 7em;background-position: center top;background-color: black;background-image:url(<?php echo SERVIDOR.'/assets/fotos-perfil/admin/Juan'; ?>);"></div>    
                <br><br>
                <p class="mayusculas textoBlack" style="font-size: 2.5em;">Juan David</p>  
                <br> 
                <p class="mayusculas textoBold" style="font-size: 1.1em;"><b>Escoge una opción y conoce un poco más sobre mí</b></p>               
            </div>
            <div class="col-2 col-md-4"></div>   
        </div> <?php ///bien?>

        <div class="d-none d-sm-block col-md-3"></div>
        <div class="anime-1 row col-12 col-md-6" >
            <div class="col-12" style="margin-top:4em;"></div>
            <div class="col-1"></div>  
            <div class="col-10 row">  
	            <div class="col-12">              
	                <a class="btn btn-principal modal-trigger black-text" style="background-color: white;width: 100%;" href="<?php echo SERVIDOR;?>"><p class="textoBold" style="padding: .5em 0;" itemprop="name">Sitio web</p></a>
	            </div>
                <div class="col-12">
                    <br>
                    <a class="btn btn-principal modal-trigger black-text" style="background-color: white;width: 100%;" href="<?php echo RUTA_BLOG;?>"><p class="textoBold" style="padding: .5em 0;" itemprop="name">Blog</p></a>
                </div> 
                <div class="col-12">
                    <br>
                    <a class="btn btn-principal modal-trigger black-text" style="background-color: white;width: 100%;" href="<?php echo RUTA_GALERIA;?>"><p class="textoBold" style="padding: .5em 0;" itemprop="name">Galeria</p></a>
                </div> 
                <div class="col-12">
                    <br>
                    <a class="btn btn-principal modal-trigger black-text" style="background-color: white;width: 100%;" href="<?php echo $whatsappEmpresa;?>"><p class="textoBold" style="padding: .5em 0;" itemprop="name">Contactar</p></a>
                </div> 
            </div>
            <div class="col-1"></div>  
        </div> 
        <div class="d-none d-sm-block col-md-3"></div>     


        <div id="contacto" class="row social-pc" align="center">
            <div class="col-12" style="padding: 1em 0;">
            	<div class="d-none d-sm-block" style="padding-top: 2em;"></div>
                <div class="social">
                    <?php include "seccion/social.inc.php";?>
                </div>
            </div>
        </div>
        <?php
include_once 'seccion/copyright.inc.php';
?>
    </div>
</div>

<?php //body ?>



<?php
include_once 'seccion/doc-terminacion.inc.php';
?>