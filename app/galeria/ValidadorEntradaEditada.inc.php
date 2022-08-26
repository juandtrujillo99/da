<?php
include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntradaEditadaGaleria extends ValidadorGaleria {
	private $cambios_realizados;

	private $checkbox;

	private $url_original;
	private $imagen_original;
	private $texto_original;
	private $checkbox_original;

	public function __construct($url, $url_original, $imagen, $imagen_original, $texto,
		$texto_original, $checkbox, $checkbox_original, $conexion) {

		$this -> url = $this -> devolver_variable_si_iniciada($url);
		$this -> imagen = $this -> devolver_variable_si_iniciada($imagen);
		$this -> texto = $this -> devolver_variable_si_iniciada($texto);
		$this -> checkbox = $this -> devolver_variable_si_iniciada($checkbox);

		$this -> url_original = $this -> devolver_variable_si_iniciada($url_original);
		$this -> imagen_original = $this -> devolver_variable_si_iniciada($imagen_original);
		$this -> texto_original = $this -> devolver_variable_si_iniciada($texto_original);
		$this -> checkbox_original = $this -> devolver_variable_si_iniciada($checkbox_original);

		if ($this -> url == $this -> url_original &&
			$this -> imagen == $this -> imagen_original &&
			$this -> texto == $this -> texto_original &&
			$this -> checkbox == $this -> checkbox_original) {

			$this -> cambios_realizados = false;
		} else {
			$this -> cambios_realizados = true;
		}

		if ($this -> cambios_realizados) {
			//echo 'Hay cambios';

			$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
			$this -> aviso_cierre = "</div>";

			if ($this -> url !== $this -> url_original) {
				$this -> error_url = $this -> validar_url($conexion, $this -> url);
			} else {
				$this -> error_url = "";
			}

			if ($this -> imagen !== $this -> imagen_original) {
				$this -> error_imagen = $this -> validar_imagen($conexion, $this -> imagen);
			} else {
				$this -> error_imagen = "";
			}

			if ($this -> texto !== $this -> texto_original) {
				$this -> error_texto = $this -> validar_texto($conexion, $this -> texto);
			} else {
				$this -> error_texto = "";
			}

		} else {
			echo 'No hay cambios';
			//redirigir
		}
	}

	private function devolver_variable_si_iniciada($variable) {
		if ($this -> variable_iniciada($variable)) {
			return $variable;
		} else {
			return "";
		}
	}

	public function hay_cambios() {
		return $this -> cambios_realizados;
	}

	public function obtener_url_original() {
		return $this -> url_original;
	}

	public function obtener_imagen_original() {
		return $this -> imagen_original;
	}

	public function obtener_texto_original() {
		return $this -> texto_original;
	}

	public function obtener_checkbox_original() {
		return $this -> checkbox_original;
	}

	public function obtener_checkbox() {
		return $this -> checkbox;
	}
}