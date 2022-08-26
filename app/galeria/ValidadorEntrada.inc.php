<?php
include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntradaGaleria extends ValidadorGaleria {
	
	public function __construct($url, $imagen, $texto, $conexion) {
		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre = "</div>";
		
		$this -> url = "";
		$this -> imagen = "";
		$this -> texto = "";
		
		$this -> error_url = $this -> validar_url($conexion, $url);
		$this -> error_imagen = $this -> validar_imagen($conexion, $imagen);
		$this -> error_texto = $this -> validar_texto($conexion, $texto);
	}
}