<?php
include_once 'RepositorioUsuario.inc.php';

class ValidadorLogin{
	private $usuario;
	private $error;

	public function __construct($telefono, $clave, $conexion){

		$this -> error = "";

		if (!$this -> variable_iniciada($telefono) || !$this -> variable_iniciada($clave)) {
			$this -> usuario = null;
			$this -> error = "Debes introducir tu telefono y tu contraseña";
		}
		else{
			$this -> usuario = RepositorioUsuario::obtener_usuario_por_telefono($conexion, $telefono);
			if (is_null($this -> usuario) || !password_verify($clave, $this -> usuario -> obtener_password())) {
				$this -> error = "Datos incorrectos";
			}
		}
	}

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