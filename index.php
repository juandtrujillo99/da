<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/admin/Admin.inc.php';
include_once 'app/admin/RepositorioAdmin.inc.php';


include_once 'app/usuario/Usuario.inc.php';
include_once 'app/usuario/RepositorioUsuario.inc.php';


include_once 'app/blog/RepositorioEntrada.inc.php';
include_once 'app/blog/Entrada.inc.php';
include_once 'app/blog/RepositorioComentario.inc.php';
include_once 'app/blog/Comentario.inc.php';

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
            //pagina donde estan todas las vistas prvias del blog
			case 'blog':
			$ruta_elegida = 'pagina/blog.php';
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

             case 'panel-entrada-blog':
			$ruta_elegida = 'pagina/blog/gestor.php';
			$gestor_actual = '';
			break;
			case 'nueva-entrada-blog':
			$ruta_elegida = 'pagina/blog/nueva-entrada.php';
			break;
			case 'editar-entrada-blog':
			$ruta_elegida = 'pagina/blog/editar-entrada.php';
			break;
			case 'borrar-entrada-blog':
			$ruta_elegida = 'scripts/blog/borrar-entrada.php';
			break;
			//Buscar entrada
			case 'buscar-blog':
            $ruta_elegida = 'pagina/blog/buscar.php';
            break;
			//Buscar entrada
			case 'buscar-entrada-blog':
            $ruta_elegida = 'pagina/blog/buscar-entrada.php';
            break;

            //USUARIO
				//registro de usuarios
				case 'gestor-usuarios':
				$ruta_elegida = 'pagina/usuario/gestor.php';
				break;	
				case 'borrar-usuario':
				$ruta_elegida = 'scripts/usuario/borrar.php';
				break;			
				//registro de usuarios
				case 'registro':
				$ruta_elegida = 'pagina/usuario/registro.php';
				break;
				//login de usuario
				case 'iniciar-sesion':
				$ruta_elegida = 'pagina/usuario/login.php';
				break;
				case 'logout':
				$ruta_elegida = 'pagina/usuario/logout.php';
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
				case 'enviar-email':
				$ruta_elegida = 'scripts/enviar-mail.php';
				break;
				//pagina de redireccion antes de entregar url_personal para recuperar clave
				case 'email-recuperacion-clave-enviado':
				$ruta_elegida = 'pagina/usuario/email-recuperacion-clave-enviado.php';
				break;
				//pagina de redireccion antes de entregar url_personal para recuperar clave
				case 'clave-actualizada':
				$ruta_elegida = 'pagina/usuario/clave-actualizada.php';
				break;




			//ADMINISTRADOR
				//registro de admin
				case 'registro-colaborador':
				$ruta_elegida = 'pagina/admin/registro.php';
				break;
				
				//login de admin		
				case 'login-colaborador':
				$ruta_elegida = 'pagina/admin/login.php';
				break;
				case 'logout-admin':
				$ruta_elegida = 'pagina/admin/logout.php';
				break;

				//Perfil de admin
				case 'perfil-colaborador':
				$ruta_elegida = 'pagina/admin/perfil.php';
				break;

				//editar datos admin
				case 'editar-datos-colaborador':
				$ruta_elegida = 'pagina/admin/editar-datos.php';
				break;
				case 'generar-peticion-edicion-datos-colaborador':
				$ruta_elegida = 'scripts/admin/editar-datos.php';
				break;

				//recuperacion de contraseña para colaborador
				case 'recuperar-clave-colaborador':
				$ruta_elegida = 'pagina/admin/recuperar-clave.php';
				break;
				case 'generar-url-secreta-colaborador':
				$ruta_elegida = 'scripts/generar-url-secreta-admin.php';
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

		//edicion de datos del usuario
		if ($partes_ruta[1] == 'editar-datos-usuario') {
			$url_personal = $partes_ruta[2];
			$ruta_elegida = 'pagina/usuario/editar-datos.php';
		}



		//admin registro correcto
		if($partes_ruta[1] == 'registro-correcto-colaborador'){
			$nombre = $partes_ruta[2];
			$ruta_elegida = 'pagina/admin/registro-correcto.php';
		}


		//rutas para entradas de blog
		if ($partes_ruta[1] == 'entrada-blog') {
			$url = $partes_ruta[2];

			Conexion::abrir_conexion();
			$entrada = RepositorioEntradaBlog :: obtener_entrada_por_url(Conexion::obtener_conexion(), $url);

			if ($entrada != null) {
				$autor = RepositorioAdmin::obtener_admin_por_id(Conexion::obtener_conexion(), $entrada -> obtener_autor_id());
				$comentarios = RepositorioComentarioBlog::obtener_comentarios(Conexion::obtener_conexion(), $entrada -> obtener_id());
				$entradas_azar = RepositorioEntradaBlog::obtener_entradas_al_azar(Conexion::obtener_conexion(), 4);//aqui se cambia el numero de entradas que se va a mostrar


				$ruta_elegida = 'pagina/blog/entrada.php';
			}
		}
		//panel de control de las entradas, favoritos y comentarios, sirve como referencia (no tocar)
		if ($partes_ruta[1] == 'panel-entrada-blog') {
			switch ($partes_ruta[2]) {
				case 'entradas-blog'://Debe modificarse esta direccion porque con esto es que se visualizan las entradas en el gestor
					$gestor_actual = 'entradas-blog';
					$ruta_elegida = 'pagina/blog/gestor.php';
					break;
				case 'comentarios':
        			$gestor_actual = 'comentarios';
        			$ruta_elegida = 'pagina/blog/gestor.php';
        			break;
			}
		}
		if ($partes_ruta[1] == 'recuperacion-clave-colaborador') {
			$url_personal = $partes_ruta[2];
			$ruta_elegida = 'pagina/empleado/recuperacion-clave.php';
		}
		//edicion de datos del empleado
		if ($partes_ruta[1] == 'editar-datos-empleado') {
			$url_personal = $partes_ruta[2];
			$ruta_elegida = 'pagina/empleado/editar-datos.php';
		}	
	}

}

include_once $ruta_elegida;