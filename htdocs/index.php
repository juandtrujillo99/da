<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/usuario/Usuario.inc.php';
include_once 'app/entrada/Entrada.inc.php';
//include_once 'app/entrada/Comentario.inc.php';

include_once 'app/usuario/RepositorioUsuario.inc.php';
include_once 'app/entrada/RepositorioEntrada.inc.php';
//include_once 'app/entrada/RepositorioComentario.inc.php';

$componentes_url = parse_url($_SERVER['REQUEST_URI']);

$ruta = $componentes_url['path'];

$partes_ruta = explode("/", $ruta);
$partes_ruta = array_filter($partes_ruta);
$partes_ruta = array_slice($partes_ruta, 0);

$ruta_elegida = 'pagina/404.php';//siempre se redigirá a esta pagina en caso de que la url no se escriba correctamente o la redireccion se haga mal

if($partes_ruta[0] == 'da'){
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

			//nuevas partes
			case 'subida-archivo':
            $ruta_elegida = 'scripts/tienda/barra-progreso.php';
            break;
			//inicio para usuarios
			case 'tienda':
			$ruta_elegida = 'pagina/tienda/tienda.php';
			break;
			//Buscar entrada
			case 'buscar-entrada':
            $ruta_elegida = 'pagina/tienda/buscar-entrada.php';
            break;  


			case 'panel-entrada':
			$ruta_elegida = 'pagina/entrada/gestor.php';
			$gestor_actual = '';
			break;
			case 'nueva-entrada':
			$ruta_elegida = 'pagina/entrada/nueva-entrada.php';
			break;
			case 'editar-entrada':
			$ruta_elegida = 'pagina/entrada/editar-entrada.php';
			break;
			case 'borrar-entrada':
			$ruta_elegida = 'scripts/entrada/borrar-entrada.php';
			break;
			

			//USUARIO
				//registro de usuarios
				case 'registro':
				$ruta_elegida = 'pagina/usuario/registro/registro.php';
				break;
				//login de usuario
				case 'login':
				$ruta_elegida = 'pagina/usuario/login.php';
				break;
				case 'logout':
				$ruta_elegida = 'pagina/logout.php';
				break;
				//Perfil de usuario
				case 'perfil':
				$ruta_elegida = 'pagina/usuario/perfil.php';
				break;
				//editar datos usuario
				case 'editar-datos-usuario':
				$ruta_elegida = 'pagina/usuario/editar-datos.php';
				break;
				case 'generar-peticion-edicion-datos':
				$ruta_elegida = 'scripts/usuario/editar-datos.php';
				break;
				//recuperacion de contraseña para usuario
				case 'recuperar-clave':
				$ruta_elegida = 'pagina/usuario/recuperar-clave.php';
				break;
				case 'generar-url-secreta':
				$ruta_elegida = 'scripts/generar-url-secreta.php';
				break;
				//Aqui se muestran todas las rutinas creadas por el EscritosRutinas
				case 'rutinas':
				$ruta_elegida = 'pagina/rutina/rutinas.php';
				break;
			}
	}


	else if (count($partes_ruta) == 3) {

		//usuario registro correcto
		if($partes_ruta[1] == 'registro-correcto-usuario'){
			$nombre = $partes_ruta[2];
			$ruta_elegida = 'pagina/usuario/registro/registro-correcto.php';
		}


		//rutas para medidas del usuario
		if ($partes_ruta[1] == 'medida') {
			$url = $partes_ruta[2];

			Conexion::abrir_conexion();
			$medida = RepositorioControlMedida :: obtener_medida_por_url(Conexion::obtener_conexion(), $url);

			if ($medida != null) {
				$autor = RepositorioUsuario::obtener_usuario_por_id(Conexion::obtener_conexion(), $medida -> obtener_autor_id());
				$medidas_azar = RepositorioControlMedida::obtener_medidas_al_azar(Conexion::obtener_conexion(), 3);


				$ruta_elegida = 'pagina/control-medidas/medida.php';
			}
		}
		//Recuperacion de contraseña (no tocar)
		if ($partes_ruta[1] == 'recuperacion-clave') {
			$url_personal = $partes_ruta[2];
			$ruta_elegida = 'pagina/usuario/recuperacion-clave.php';
		}
		//edicion de datos del usuario
		if ($partes_ruta[1] == 'editar-datos-usuario') {
			$url_personal = $partes_ruta[2];
			$ruta_elegida = 'pagina/usuario/editar-datos.php';
		}


		//rutas para entradas
		if ($partes_ruta[1] == 'entrada') {
			$url = $partes_ruta[2];

			Conexion::abrir_conexion();
			$entrada = RepositorioEntrada :: obtener_entrada_por_url(Conexion::obtener_conexion(), $url);

			if ($entrada != null) {
				$autor = RepositorioEmpleado::obtener_empleado_por_id(Conexion::obtener_conexion(), $entrada -> obtener_autor_id());
				$comentarios = RepositorioComentario::obtener_comentarios(Conexion::obtener_conexion(), $entrada -> obtener_id());
				$entradas_azar = RepositorioEntrada::obtener_entradas_al_azar(Conexion::obtener_conexion(), 4);//aqui se cambia el numero de entradas que se va a mostrar


				$ruta_elegida = 'pagina/entrada/entrada.php';
			}
		}
		//panel de control de las entradas, favoritos y comentarios, sirve como referencia (no tocar)
		if ($partes_ruta[1] == 'panel-entrada') {
			switch ($partes_ruta[2]) {
				case 'entradas':
					$gestor_actual = 'entradas';
					$ruta_elegida = 'pagina/entrada/gestor.php';
					break;
				case 'comentarios':
        			$gestor_actual = 'comentarios';
        			$ruta_elegida = 'pagina/entrada/gestor.php';
        			break;
			}
		}
	}
}

include_once $ruta_elegida;