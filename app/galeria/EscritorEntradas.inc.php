<?php
include_once 'app/Conexion.inc.php';
include_once 'app/galeria/RepositorioEntrada.inc.php';
include_once 'app/galeria/Entrada.inc.php';

class EscritorEntradasGaleria {

    public static function escribir_entradas() {
        $entradas = RepositorioEntradaGaleria::obtener_todas_por_fecha_descendiente(Conexion::obtener_conexion());

        if (count($entradas)) {

            foreach ($entradas as $entrada) {

                self::escribir_entrada($entrada);
            }
        }
    }

    public static function escribir_cuatro_entradas() {
        $entradas = RepositorioEntradaGaleria::obtener_cuatro_por_fecha_descendente(Conexion::obtener_conexion());
        if (count($entradas)) {
            foreach ($entradas as $entrada) {
                self::escribir_preview_entradas($entrada);
            }
        }
    }

    public static function escribir_entrada($entrada) {//Este se usa en la pestaña del blog que tiene todos los enlaces hacia las entradas
        if (!isset($entrada)) {
            return;
        }
        ?>
        <a class="col" href="<?php echo RUTA_ENTRADA_GALERIA . '/' . $entrada -> obtener_url() ?>" style="color: black;">
            <img class="img-galeria sombra" src="<?php echo RUTA_GALERIA_COVER. $entrada -> obtener_imagen(); ?>">
        </a>
        <?php
    }


    public static function escribir_preview_entradas($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>
        <a href="<?php echo RUTA_ENTRADA_GALERIA . '/' . $entrada -> obtener_url() ?>" class="col-4" style="padding:.5em 1em;">
            <div class="row card" style="background-color: white;color: black;box-shadow: none;border: 0;">
                <div class="card-image">                    
                    <div align="center">   
                        <div loading="lazy" class="img-galeria bg-cover" style="background-image:url(<?php echo RUTA_GALERIA_COVER. $entrada -> obtener_imagen(); ?>);"></div>
                    </div>
                </div>          
            </div>
        </a>
        <?php
    }

    public static function mostrar_entradas_busqueda($entradas) {
        for ($i = 1; $i <= count($entradas); $i++) {
            if($i % 25 == 0) {
                ?>
            <div class="col">
                <?php
            }

            $entrada = $entradas[$i - 1];
            self::mostrar_entrada_busqueda($entrada);

            if($i % 25 == 0) {
                ?>
            </div>
                <?php
            }
        }
    }

    public static function mostrar_entradas_busqueda_multiple($entradas) {
        for ($i = 0; $i < count($entradas); $i++) {
            ?>
            <div class="col">
            <?php

            $entrada = $entradas[$i];
            self::mostrar_entrada_busqueda_multiple($entrada);

            ?>
            </div>
            <?php
        }
    }

    public static function mostrar_entrada_busqueda($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>
        <a target="_blank" href="<?php echo RUTA_ENTRADA_GALERIA . '/' . $entrada -> obtener_url() ?>" class="col-12 col-md-3" style="padding:.5em">
            <div class="row card" style="background-color: white;color: black;box-shadow: none;border: 0;">
                <div class="card-image">                    
                    <div align="center">   
                        <div loading="lazy" itemprop="image" class="img-entrada bg-cover" style="background-image:url(<?php echo RUTA_GALERIA_COVER. $entrada -> obtener_imagen(); ?>);"></div>
                    </div>
                </div> 
                <div class="card-content" style="padding:.2em 0;">
                    <p>
                        <?php echo EscritorEntradasGaleria::resumir_texto(nl2br($entrada -> obtener_texto())); ?>
                        <font color="grey">Ver más</font>
                    </p>
                </div>         
            </div>
        </a>
        <?php
    }

    public static function mostrar_entrada_busqueda_multiple($entrada) {
        if (!isset($entrada)) {
            return;
        }
        ?>
        <a target="_blank" href="<?php echo RUTA_ENTRADA_GALERIA . '/' . $entrada -> obtener_url() ?>" class="col-12 col-md-3" style="padding:.5em">
            <div class="row card" style="background-color: white;color: black;box-shadow: none;border: 0;">
                <div class="card-image">                    
                    <div align="center">   
                        <div loading="lazy" itemprop="image" class="img-entrada bg-cover" style="background-image:url(<?php echo RUTA_GALERIA_COVER. $entrada -> obtener_imagen(); ?>);"></div>
                    </div>
                </div> 
                <div class="card-content" style="padding:.2em 0;">
                    <p>
                        <?php echo EscritorEntradasGaleria::resumir_texto(nl2br($entrada -> obtener_texto())); ?>
                        <font color="grey">Ver más</font>
                    </p>
                </div>         
            </div>
        </a>
        <?php
    }

    public static function resumir_titulo($titulo) {
        $longitud_maxima = 30;

        $resultado = '';

        if (strlen($titulo) >= $longitud_maxima) {

            $resultado = substr($titulo, 0, $longitud_maxima);

            $resultado .= '...';
        } else {
            $resultado = $titulo;
        }

        return $resultado;
    }

    public static function resumir_texto($texto) {
        $longitud_maxima = 100;

        $resultado = '';

        if (strlen($texto) >= $longitud_maxima) {

            $resultado = substr($texto, 0, $longitud_maxima);

            $resultado .= '...';
        } else {
            $resultado = $texto;
        }

        return $resultado;
    }

}
