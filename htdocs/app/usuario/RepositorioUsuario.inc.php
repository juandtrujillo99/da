<?php
/*
peso
telefono
*/

//RepositorioUsuario: esta encargada de saber cuales y cuantos usuarios hay registrados en la base de datos 
class RepositorioUsuario{
	public static function obtener_todos($conexion){
		$usuarios = array();
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';
				$sql = "SELECT * FROM usuarios";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetchAll();

				if (count($resultado)){
					foreach ($resultado as $fila) {
						$usuarios[] = new Usuario(
							$fila['id'], $fila['cedula'], $fila['nombre'], $fila['apellido'], $fila['edad'], $fila['altura'], $fila['peso'], $fila['telefono'], $fila['porcentaje_grasa'], $fila['email'], $fila['password'], $fila['fecha_registro'], $fila['activo']
						);
					}
				} else{
					print 'No hay usuarios';
				}

			} catch(PDOException $ex){
				print "ERROR" . $ex -> getMessage();
			}
		}

		return $usuarios;
	}
	//obtener_numero_usuarios: esta encargada de contar el numero de usuarios que hay registrados en la base de datos 
	public static function obtener_numero_usuarios($conexion){
		$total_usuarios = null;
		if (isset($conexion)){
			try{
				$sql = "SELECT COUNT(*) as total FROM usuarios";
				$sentencia = $conexion -> prepare($sql);
				$sentencia -> execute();
				$resultado = $sentencia -> fetch();

				$total_usuarios = $resultado['total'];
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $total_usuarios;
	}

	//insertar_usuario: esta encargada de agregar nuevos usuarios a la base de datos
	public static function insertar_usuario($conexion, $usuario){
		$usuario_insertado = false;
		if (isset($conexion)) {
			try{
				$sql = "INSERT INTO usuarios(cedula, nombre, apellido, edad, altura, peso, telefono, porcentaje_grasa, email, password, fecha_registro, activo) VALUES(:cedula, :nombre, :apellido, :edad, :altura, :peso, :telefono, :porcentaje_grasa, :email, :password, NOW(), 0)";

				$sentencia = $conexion -> prepare($sql);

				$sentencia->bindParam(':cedula', $usuario -> obtener_cedula(), PDO::PARAM_STR);
				$sentencia->bindParam(':nombre', $usuario -> obtener_nombre(), PDO::PARAM_STR);
				$sentencia->bindParam(':apellido', $usuario -> obtener_apellido(), PDO::PARAM_STR);
				$sentencia->bindParam(':edad', $usuario -> obtener_edad(), PDO::PARAM_STR);
				$sentencia->bindParam(':altura', $usuario -> obtener_altura(), PDO::PARAM_STR);
				$sentencia->bindParam(':peso', $usuario -> obtener_peso(), PDO::PARAM_STR);
				$sentencia->bindParam(':telefono', $usuario -> obtener_telefono(), PDO::PARAM_STR);
				$sentencia->bindParam(':porcentaje_grasa', $usuario -> obtener_porcentaje_grasa(), PDO::PARAM_STR);
				$sentencia->bindParam(':email', $usuario -> obtener_email(), PDO::PARAM_STR);
				$sentencia->bindParam(':password', $usuario -> obtener_password(), PDO::PARAM_STR);

				$usuario_insertado = $sentencia -> execute();
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex->getMessage();
			}
		}
		return $usuario_insertado;
	}

	//cedula_existe: esta encargada de verificar que el cedula de usuario no se repite en la base de datos
	public static function cedula_existe($conexion, $cedula){

		$cedula_existe = true;

		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM usuarios WHERE cedula = :cedula";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':cedula', $cedula, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$cedula_existe = true;					
				}
				else{
					$cedula_existe = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $cedula_existe;
	}


	//email_existe: esta encargada de verificar que los correos no se repitan en la base de datos (un email puede ser utilizado solo una vez por usuario)
	public static function email_existe($conexion, $email){
		$email_existe = true;
		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM usuarios WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$email_existe = true;					
				}
				else{
					$email_existe = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $email_existe;
	}

	//telefono_existe: esta encargada de verificar que los correos no se repitan en la base de datos (un telefono puede ser utilizado solo una vez por usuario)
	public static function telefono_existe($conexion, $telefono){
		$telefono_existe = true;
		if (isset($conexion)) {
			try{
				$sql = "SELECT * FROM usuarios WHERE telefono = :telefono";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':telefono', $telefono, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetchAll();

				if(count($resultado)){
					$telefono_existe = true;					
				}
				else{
					$telefono_existe = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $telefono_existe;
	}

	//obtener_usuario_por_email: ayuda a identificar a cada usuario con su email
	public static function obtener_usuario_por_email($conexion, $email){
		$usuario = null;
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE email = :email";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':email', $email, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['cedula'],
						$resultado['nombre'],
						$resultado['apellido'],
						$resultado['edad'],
						$resultado['altura'],
						$resultado['peso'],
						$resultado['telefono'],
						$resultado['porcentaje_grasa'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}

	//obtener_usuario_por_telefono: ayuda a identificar a cada usuario con su telefono
	public static function obtener_usuario_por_telefono($conexion, $telefono){
		$usuario = null;
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE telefono = :telefono";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':telefono', $telefono, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['cedula'],
						$resultado['nombre'],
						$resultado['apellido'],
						$resultado['edad'],
						$resultado['altura'],
						$resultado['peso'],
						$resultado['telefono'],
						$resultado['porcentaje_grasa'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}

	//obtener_usuario_por_id: ayuda a identificar a cada usuario con su id
	public static function obtener_usuario_por_id($conexion, $id){
		$usuario = null;
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':id', $id, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['cedula'],
						$resultado['nombre'],
						$resultado['apellido'],
						$resultado['edad'],
						$resultado['altura'],
						$resultado['peso'],
						$resultado['telefono'],
						$resultado['porcentaje_grasa'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}
	
	//obtener_usuario_por_cedula: ayuda a identificar a cada usuario con su cedula
	public static function obtener_usuario_por_cedula($conexion, $cedula){
		$usuario = null;
		if (isset($conexion)){
			try{
				include_once 'Usuario.inc.php';

				$sql = "SELECT * FROM usuarios WHERE cedula = :cedula";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':cedula', $cedula, PDO::PARAM_STR);

				$sentencia -> execute();

				$resultado = $sentencia -> fetch();

				if (!empty($resultado)) {
					$usuario = new Usuario($resultado['id'],
						$resultado['cedula'],
						$resultado['nombre'],
						$resultado['apellido'],
						$resultado['edad'],
						$resultado['altura'],
						$resultado['peso'],
						$resultado['telefono'],
						$resultado['porcentaje_grasa'],
						$resultado['email'],
						$resultado['password'],
						$resultado['fecha_registro'],
						$resultado['activo']);
				}
			}
			catch(PDOException $ex){
				print 'ERROR' . $ex -> getMessage();
			}
		}
		return $usuario;
	}

	//actualizar_cedula: ayuda a actualizar la cedula de cada usuario
	public static function actualizar_cedula($conexion, $id_usuario, $nuevo_cedula){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET cedula = :cedula WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':cedula', $nuevo_cedula, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}


	//actualizar_nombre: ayuda a actualizar la nombre de cada usuario
	public static function actualizar_nombre($conexion, $id_usuario, $nuevo_nombre){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET nombre = :nombre WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':nombre', $nuevo_nombre, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_apellido: ayuda a actualizar la apellido de cada usuario
	public static function actualizar_apellido($conexion, $id_usuario, $nuevo_apellido){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET apellido = :apellido WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':apellido', $nuevo_apellido, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_email: ayuda a actualizar la email de cada usuario
	public static function actualizar_email($conexion, $id_usuario, $nuevo_email){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET email = :email WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':email', $nuevo_email, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_password: ayuda a actualizar las contraseñas de cada usuario
	public static function actualizar_password($conexion, $id_usuario, $nueva_clave){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET password = :password WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':password', $nueva_clave, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_edad: ayuda a actualizar la edad de cada usuario
	public static function actualizar_edad($conexion, $id_usuario, $nueva_edad){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET edad = :edad WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':edad', $nueva_edad, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_altura: ayuda a actualizar la altura de cada usuario
	public static function actualizar_altura($conexion, $id_usuario, $nueva_altura){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET altura = :altura WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':altura', $nueva_altura, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_peso: ayuda a actualizar la peso de cada usuario
	public static function actualizar_peso($conexion, $id_usuario, $nuevo_peso){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET peso = :peso WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':peso', $nuevo_peso, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_telefono: ayuda a actualizar la telefono de cada usuario
	public static function actualizar_telefono($conexion, $id_usuario, $nuevo_telefono){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET telefono = :telefono WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':telefono', $nuevo_telefono, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}

	//actualizar_porcentaje_grasa: ayuda a actualizar la porcentaje_grasa de cada usuario
	public static function actualizar_porcentaje_grasa($conexion, $id_usuario, $nuevo_porcentaje_grasa){
		$actualizacion_correcta = false;
		if (isset($conexion)) {
			try{
				$sql = "UPDATE usuarios SET porcentaje_grasa = :porcentaje_grasa WHERE id = :id";

				$sentencia = $conexion -> prepare($sql);

				$sentencia -> bindParam(':porcentaje_grasa', $nuevo_porcentaje_grasa, PDO::PARAM_STR);
				$sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
				
				$sentencia -> execute();

				$resultado = $sentencia -> rowCount();

				if (count($resultado)) {
					$actualizacion_correcta = true;
				}
				else{
					$actualizacion_correcta = false;
				}
			}
			catch(PDOException $ex){
				print 'ERROR'.$ex -> getMessage();
			}
		}
		return $actualizacion_correcta;
	}
}


