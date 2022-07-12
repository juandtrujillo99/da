<?php

include_once 'RepositorioUsuario.inc.php';


class ValidadorLogin{
	private $usuario;

	private $error;


	//esta funcion se encarga de decirte que hay un error con el inicio de sesion si no pones los datos correctos
	public function __construct($email, $clave, $conexion){

		$this -> error = "";

		if (!$this -> variable_iniciada($email) || !$this -> variable_iniciada($clave)) {
			$this -> usuario = null;
			$this -> error = "Debes introducir tu email y tu contraseña";
		}

		else{
			$this -> usuario = RepositorioUsuario::obtener_usuario_por_email($conexion, $email);
			if (is_null($this -> usuario) || !password_verify($clave, $this -> usuario -> obtener_password())) {
				$this -> error = "Datos incorrectos";
			}
		}
	}


	//se encarga de decirte que se ha insertado un dato en una variable, es decir, la variable no esta vacia y notifica si lo esta
	private function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		}
		else{
			return false;
		}
	}


	public function obtener_usuario(){
		return $this -> usuario;
	}

	public function obtener_error(){
		return $this -> error;
	}

	public function mostrar_error(){
		if ($this -> error !== '') {
			echo "<div class='alert alert-danger' role='alert'>";
			echo $this -> error;
			echo "</div><br>";
		}
	}
}