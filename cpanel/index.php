<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

$componentes_url = parse_url($_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode("/", $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'pagina/404.php';//siempre se redigirá a esta pagina en caso de que la url no se escriba correctamente o la redireccion se haga mal

if($partes_ruta[0] == 'juandtrujillo.cf'){
	if (count($partes_ruta) == 1) {
		$ruta_elegida = 'pagina/inicio.php';
	}
	else if (count($partes_ruta) == 2) {
		switch($partes_ruta[1]){

			//sobre nosotros
			case 'about':
            $ruta_elegida = 'pagina/about.php';
            break;
            //servicios
			case 'servicio-offline':
            $ruta_elegida = 'pagina/offline.php';
            break;
			case 'servicio-online':
            $ruta_elegida = 'pagina/online.php';
            break;
			case 'servicio-desarrollo-web':
            $ruta_elegida = 'pagina/servicio-desarrollo-web.php';
            break;
			case 'servicio-gestion-redes':
            $ruta_elegida = 'pagina/gestion-redes.php';
            break;
			case 'servicio-pauta-digital':
            $ruta_elegida = 'pagina/social-ads.php';
            break;
			case 'descuento-zaragoza':
            $ruta_elegida = 'pagina/descuento.php';
            break;
			case 'paquetes':
            $ruta_elegida = 'pagina/packs.php';
            break;
			case 'starter-pack':
            $ruta_elegida = 'pagina/pack/starter.php';
            break;
			case 'premium-pack':
            $ruta_elegida = 'pagina/pack/premium.php';
            break;
			case 'megapack':
            $ruta_elegida = 'pagina/pack/mega.php';
            break;
		}
	}


	else if (count($partes_ruta) == 3) {

		//usuario registro correcto
		if($partes_ruta[1] == 'registro-correcto-usuario'){
			$nombre = $partes_ruta[2];
			$ruta_elegida = 'pagina/usuario/registro/registro-correcto.php';
		}		
		//Recuperacion de contraseña (no tocar)
		if ($partes_ruta[1] == 'recuperacion-clave') {
			$url_personal = $partes_ruta[2];
			$ruta_elegida = 'pagina/usuario/recuperacion-clave.php';
		}
	}
}

include_once $ruta_elegida;