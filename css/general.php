<?php
    header("Content-type: text/css; charset: UTF-8");
    include_once 'identidad-corporativa.inc.php';
    /* las lineas estan corridas 5 casillas, es decir, si te dicen linea 10 en realidad se refiere a la linea 27*/
?>
/*estilos para pc*/
html{scroll-behavior: smooth;}
*{margin: 0;padding: 0;box-sizing: border-box;text-decoration: none;}
*::-moz-selection{background: <?php echo $colorMarca3;?>;color: #0d0d0d;}
*::selection {background: <?php echo $colorMarca3;?>;color: #0d0d0d;}
body{font-family: <?php echo $textoRegular;?>;}
/*barra de scroll*/
body::-webkit-scrollbar {width: 6px;background: <?php echo $colorMarca;?>;}
body::-webkit-scrollbar-thumb {background: <?php echo $colorMarca2;?>;border-radius: 10px;border-right: 2px solid <?php echo $colorMarca2;?>;}
/*barra de scroll*/



.sombra{box-shadow: 0px .1px 5px 0px rgba(0,0,0,0.5);}

.textoBlack{font-family: <?php echo $textoBlack;?>;font-style: italic;}
.texto2Black{font-family: <?php echo $texto2Black;?>}
.textoBold{font-family: <?php echo $texto2Bold;?>}
.textoBoldItalic{font-family: <?php echo $textoBoldItalic;?>}
.textoItalic{font-family: <?php echo $textoItalic;?>}
.textoRegular{font-family: <?php echo $textoRegular;?>}

.colorMarca{color: <?php echo $colorMarca?>;}
.btn-sombra{box-shadow: 0px .1px 5px 0px rgba(0,0,0,0.1); width:100%;padding:.5em}

.btn-principal{box-shadow: 0px .1px 5px 0px rgba(0,0,0,0.5);line-height: 1.5em;color:<?php echo $colorMarca?>;text-transform: uppercase; font-family:<?php echo $texto2Black?>;}
.btn-principal:hover{background-color:<?php echo $colorMarca?>;color: <?php echo $colorMarca4?>;transition: .3s;}

.btn-secundario{box-shadow: inset 0px 0px 0px 4px white;line-height: 1.5em;padding: 0.4em 2em; text-transform: uppercase; font-family:<?php echo $texto2Black?>;color: white;}
.btn-secundario:hover{box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca?>;color: white;}

.btn-compra{background-color: #0d0d0d;color:#fff;padding: 0.4em 2em;text-transform: uppercase; font-family:<?php echo $texto2Black?>;}
.btn-compra:hover, .btn-principal-animado:active{color: #0d0d0d;
  background-image: transparent 50%;  
  background-size: 200%;
  background-position: 0% 50%;
  transition: .3s;
  border-radius: 0;color: #fff;
  background-position: 100% 50%;transition: .4s;
background-image: linear-gradient(to right, transparent 50%, <?php echo $colorMarca;?> 50%, <?php echo $colorMarca;?> 100%);}

.btn-descuento{box-shadow: inset 0px 0px 0px 4px #1FC826;color:#1FC826;padding: 0.4em 2em;text-transform: uppercase; font-family:<?php echo $texto2Black?>;}

.btn-oscuro{background-color: transparent; padding: .1em 4em;color: white;}
.btn-claro{
  box-shadow: inset 0px 0px 0px 4px white;
  color: white;
  background-image: transparent 50%;  
  background-size: 200%;
  background-position: 0% 50%;
  transition: .3s;
  border-radius: 0;}
.btn-claro:hover, .btn-principal:active{color: #0d0d0d;
  background-position: 100% 50%;transition: .4s;
background-image: linear-gradient(to right, transparent 50%, <?php echo $colorMarca;?> 50%, <?php echo $colorMarca;?> 100%);}

.btn-principal-animado{
  box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca;?>;line-height: 1.5em;padding: 0.5em 2em; text-transform: uppercase; font-family:<?php echo $texto2Black?>;
  color: #0d0d0d;
  background-image: transparent 50%;  
  background-size: 200%;
  background-position: 0% 50%;
  transition: .3s;
  border-radius: 0;}
.btn-principal-animado:hover, .btn-principal-animado:active{color: #fff;box-shadow: inset 0px 0px 0px 4px <?php echo $colorMarca;?>;
  background-position: 100% 50%;transition: .4s;
background-image: linear-gradient(to right, transparent 50%, <?php echo $colorMarca;?> 50%, <?php echo $colorMarca;?> 100%);}


.btn-secundario-animado{
  box-shadow: inset 0px 0px 0px 4px #fff;
  color: #fff;
  background-image: transparent 50%;  
  background-size: 200%;
  background-position: 0% 50%;
  transition: .3s;
  border-radius: 0;}
.btn-secundario-animado:hover, .btn-principal-animado:active{color: #0d0d0d;
  background-position: 100% 50%;transition: .4s;
background-image: linear-gradient(to right, transparent 50%, <?php echo $colorMarca;?> 50%, <?php echo $colorMarca;?> 100%);}


.btn:focus, .btn-large:focus,
.btn-floating:focus {
  background-color: #0d0d0d;
  color: #fff;
}


.imagen{max-width: 100%;width: 100%}
.imagen-2{max-width: 50%;width: 50%}
.imagen-3{max-width: 33.3%;width: 33.3%}
.imagen-4{max-width: 25%;width: 25%}
.imagen-5{max-width: 10%;width: 10%}

.imagenh{max-height: 100%;height: 100%}

.sqrRojoStriped{background-image: linear-gradient(
    45deg, <?php echo $colorMarca?> 25%, #ffffff 25%, #ffffff 50%, <?php echo $colorMarca?> 50%, <?php echo $colorMarca?> 75%, #ffffff 75%, #ffffff 100%);
    background-size: 28.28px 28.28px;width: 20em;height: 15em; position: absolute;right: 6em;z-index: 1}
.sqrBlack{background-color: #0d0d0d;background-size: 10px 10px;width: 15em;height: 10em; position: absolute;z-index: 1}
.bordeRojo{box-shadow: -35px -45px 0px 0px <?php echo $colorMarca; ?>;}
.bordeRojoIzq{border-left: .2em solid <?php echo $colorMarca; ?>; padding-left: .5em;}
.bordeRojoIzq2{border-left: .1em solid <?php echo $colorMarca; ?>; padding-left: .2em;}
.bordeRojoAba{border-bottom: .5em solid <?php echo $colorMarca; ?>;max-width: 4em}
.bordeadoNegro{box-shadow: 0 0 0 .5em <?php echo $colorMarca2; ?>; background: white; z-index: 2;transition: .3s;}
.bordeadoNegro2{box-shadow: 0 0 0 .5em <?php echo $colorMarca2; ?>; background: white; z-index: 2;transition: .3s ease;}
.bordeadoNegro2:hover{background-color: <?php echo $colorMarca; ?>;color: white;transition: .3s ease;}
.bordeadoBlanco{box-shadow: 0 0 0 .5em #fff; background: transparent; z-index: 2;color: white;}
.bordeadoBlanco2{border: .2em solid white; background: transparent;color: white;padding: 6em 0; align-items: center;vertical-align: center;}
.bordeadoRojo{box-shadow: 0 0 0 .2em <?php echo $colorMarca; ?>; z-index: 2;}
h1{text-transform: uppercase;}
h2{text-transform: uppercase;}
h3{text-transform: uppercase;}
h4{text-transform: uppercase;}
h5{text-transform: uppercase;}
h6{text-transform: uppercase;}
.bg{background-repeat: none;background-position: center;background-attachment: fixed;background-size: cover;}
.bg2{background-position: center;background-attachment:absolute;background-size: cover;}
.bggrey{background-color: #f1f1f1;}
.bggrey2{background: linear-gradient(135deg, rgba(255,255,255,1) 0%, rgba(241,241,241,1) 100%);}


/*Sobre nosotros en la pagina de inicio*/
.about1 .bordeadoRojo .div1{top: 30%;position: relative; padding: 0 4em;}
.about1 .bordeadoRojo .div2{position: relative; padding: 4em;top: 8%;}

.about2 .bordeadoRojo .div1{top: 30%;position: relative; padding: 0 4em;}
.about2 .bordeadoRojo .div2{position: relative; padding: 4em;top: 8%;}
.about2 h2{font-size: 3em;color: #0d0d0d;margin-left: .6em;margin-top: 1em;}
.about2 .paralelograma{transform: skewY(-3deg); background-size: cover;position: relative;margin-top: 1em;}

/*Pagina about*/
.about .bordeadoRojo{box-shadow: 0px 2px 16px -3px rgba(0,0,0,9);}
.about .bordeadoRojo p{padding: 1em 2.5em;}
.about .section3{background-repeat: none;background-position: center;background-attachment: fixed;background-size: cover;}
.about p{font-size: 1.2em;line-height: 1.4em;}

/*Nuestros servicios en la pagina de inicio*/
.service1 .bordeadoNegro div, .service1 .bordeadoNegro2 div{padding: .5em 2em 2.5em 2em;}
.service1 .bordeadoNegro div p, .service1 .bordeadoNegro2 div p{font-size: .8em; line-height: 1.2em;}

.service1 .div1{top: 27%;position: relative;padding: 0 1em;}
.service1 h5{font-size: 2em; position: relative;}
.service1 a{color:<?php echo $colorMarca2?>;}

.tareas{padding: 2em 0;}
.tareas div{padding: 1.2em 0;}
.tareas span{padding: 0 .5em;position: relative;top: 15%;color: <?php echo $colorMarca?>;}
.tareas p{padding: 0 .5em;position: relative;top: .2em;font-family: <?php echo $texto2Black;?>;text-transform: uppercase;}

.pack a{color: <?php echo $colorMarca2;?>}
.pack .paquete{padding: 1em;transition: ease 1s;}
.pack .paquete:hover{box-shadow: 0 0 0 .2em <?php echo $colorMarca; ?>;padding: 1em;transition: ease 1s;}
.pack h6{font-family: <?php echo $texto2Black;?>;padding: 1.5em 0 0 0;font-size: 1.3em;}
.pack p{font-family: <?php echo $texto2Black;?>;text-transform: uppercase;color: #c9c9c9;font-size: 1.2em}

.otros-productos {margin-top: 5em;margin-bottom: 5em;}
.otros-productos .producto:hover{}
.otros-productos h5{text-align: center;font-size: 2em;padding-bottom: 1em;}
.otros-productos a{padding: 2em 0;border-bottom: .5em solid transparent;color:<?php echo $colorMarca2;?>;}
.otros-productos a:hover{border-bottom: .5em solid <?php echo $colorMarca; ?>;color:<?php echo $colorMarca;?>;}
.otros-productos a span{display: inline-block;font-size: 4em;position: relative;top: 1.7vh;}
.otros-productos a p{display: inline-block;font-size: 2em;position: relative;padding-left: .5em}


/*opiniones*/
.opiniones span{color:#fab919;}
.opiniones h5{color: <?php echo $colorMarca?>; font-size: 1.5em; position: relative;}
.opiniones h6{font-size: 1.2em; position: relative;}
.opiniones a{color:<?php echo $colorMarca2?>;}
.opiniones .contenedor{background-color: #f1f1f1;padding: 2em 0;border-radius: .5em;}
.opiniones img{box-shadow: 0px 2px 16px -3px rgba(0,0,0,9);}
.opiniones .img{padding: 1em;}
.opiniones .texto{padding:0 1.2em;}
.opiniones p{font-size: 1em;padding:.4em 0;}

/*Social en la pagina de inicio*/
.contact1 a, .contact2 a, .contact2-m a{color:#0d0d0d;}
.contact1 .div1{position: relative;margin-top: 10vh;}
.contact1 .div1 h5{font-size: 3em;padding: 0 0 1em 0;}
.contact1 .div1 h6{font-size: 1.3em;text-transform: none;border-bottom: 1px solid <?php echo $colorMarca3?>;padding: 1em 0 .5em 0;}
.contact1 .div1 p{font-size: 1.2em;padding: 0 0 2em 0;}
.contact1 .div1 p span{padding: 0 .5em;position: relative;text-align: center;top: .2em;}

.contact2 {margin-top: 10vh;padding:0 0 5em 1em;}
.contact2 img{padding: 1em;}
.contact2 h5{font-size: 3em;}
.contact2 h6{padding: 2em 0;}

.contact2-m {margin-top: 15vh;padding-bottom: 10vh;}

.footer{padding: 2em 0;}
.footer .contacto a{color: <?php echo $colorMarca2?>;font-family:<?php echo $textoBold;?>;}
.footer .contacto i{font-size: 3em;padding: 0 .2em;color: <?php echo $colorMarca2?>;}

.social {padding: 2em 0;color: <?php echo $colorMarca2;?>;}
.social a{font-size: 2.5em;padding: 0 .2em;color: <?php echo $colorMarca4;?>;}
.social a:hover,.social-m a:focus {color: <?php echo $colorMarca;?>;}

.copyright{background-color: #262626; color: white;}
.copyright a{color: <?php echo $colorMarca4;?>;}
.copyright a:hover{color: <?php echo $colorMarca3;?>;}
.copyright p{padding: 1em 0;}
.copyright p span{position: relative;font-size: 1.2em;top: .2em;}

.side-nav {
  position: fixed;
  width: 300px;
  left: 0;
  top: 0;
  margin: 0;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
  height: 100%;
  height: calc(100% + 60px);
  height: -moz-calc(100%);
  background-color: #0d0d0d;
  z-index: 999;
  overflow-y: auto;
  will-change: transform;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform: translateX(-115%);
          transform: translateX(-115%);
  font-family: <?php echo $texto2Black; ?>; text-transform: uppercase;
}

.side-nav::-webkit-scrollbar {width:.5em;background-color: <?php echo $colorMarca;?>;}
.side-nav::-webkit-scrollbar-thumb{background-color: <?php echo $colorMarca2;?>;}

.side-nav .enlaces {margin-top: 20vh;}
.side-nav .enlaces .logo{max-width: 150px;}
.side-nav .enlaces .redes a {font-size: 1.5em;text-decoration: none;color: #fff;}
.side-nav .enlaces .redes a:hover {font-size: 1.9em;text-decoration: none;color: #fff;transition: 1s;}
.side-nav .enlaces a {font-size: 1.5em;text-decoration: none;color: #fff;letter-spacing: .05em;transition: 1s;padding-left: .2em;}
.side-nav .enlaces a:hover {color:<?php echo $colorMarca;?>;  padding-left: 1em;transition: 1s;}


.admon {
  position: fixed;
  left: 0;
  top: 0;
  margin: 0;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
  height: 100%;
  height: calc(100% + 60px);
  height: -moz-calc(100%);
  background-color: #0d0d0d;
  z-index: 999;
  overflow-y: auto;
  will-change: transform;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform: translateX(-115%);
          transform: translateX(-115%);
  font-family: <?php echo $texto2Black; ?>; text-transform: uppercase;
}

.admon::-webkit-scrollbar {width:.5em;background-color: <?php echo $colorMarca4;?>;}
.admon::-webkit-scrollbar-thumb{background-color: <?php echo $colorMarca2;?>;}

.admon .enlaces {margin-top: 20vh;}
.admon .enlaces .logo{max-width: 150px;}
.admon .enlaces .redes a {font-size: 1.5em;text-decoration: none;color: <?php echo $colorMarca2;?>;}
.admon .enlaces .redes a:hover {font-size: 1.9em;text-decoration: none;color: <?php echo $colorMarca2;?>;transition: 1s;}
.admon .enlaces a {font-size: 1.5em;text-decoration: none;color: <?php echo $colorMarca2;?>;letter-spacing: .05em;transition: 1s;padding-left: .2em;}
.admon .enlaces a:hover {color:<?php echo $colorMarca;?>;  padding-left: 1em;transition: 1s;}



.divider {height: 1px;overflow: hidden;background-color: rgba(0, 0, 0, 0.05);}
.menu {position: fixed;right: 1em;top: 1em;z-index: 999;cursor: pointer;background-color: white;border-radius: 100%;padding:1em 1em .5em 1em;;color:black }

.tabs .tab a:hover, .tabs .tab a.active {
  color: <?php echo $colorMarca;?>;
}

.tabs .tab a {color: #6d6d6d;}

.slider .indicators .indicator-item.active {
  background-color: #6d6d6d;
}

.pc .collapsible-header h5{font-size: 1.8em;}
.pc .collapsible-header span{font-size: 2em; position: absolute;margin-top: .1em;right: 5em}
.pc .collapsible-body p{padding-left: 1em;}