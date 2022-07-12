<?php

abstract class Validador {

	protected $aviso_inicio;
	protected $aviso_cierre;

	protected $titulo;
	protected $url;
	protected $url_video;
	protected $texto;

	protected $error_titulo;
	protected $error_url;
	protected $error_url_video;
	protected $error_texto;

	function __construct(){
	}

	protected function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		}
		else{
			return false;
		}
	}

	protected function validar_titulo($conexion, $titulo){
		if (!$this -> variable_iniciada($titulo)) {
			return "Escribe un titulo";
		}
		else{
			$this -> titulo = $titulo;
		}

		if (strlen($titulo) >255) {
			return "El titulo no puede ocupar más de 255 caracteres";
		}

		if (RepositorioEntrada :: titulo_existe($conexion, $titulo)) {
			return "Ya existe una entrada con ese titulo, escoge uno diferente";
		}
	}
	protected function validar_url($conexion, $url){
		if (!$this -> variable_iniciada($url)) {
			return "inserta la url con la que quieres que aparezca tu entrada";
		}
		else{
			$this -> url = $url;
		}

		$url_tratada = str_replace(' ', '', $url);
		$url_tratada = preg_replace('/\s+/', '', $url_tratada);


		if (strlen($url) != strlen($url_tratada)) {
			return "La URL no puede contener espacios vacios, separalos con guiones (-)";
		}
		if (RepositorioEntrada :: url_existe($conexion, $url)) {
			return "Esa URL ya fue elegida, escoge otra";
		}

	}
	protected function validar_url_video($conexion, $url_video){
		if (!$this -> variable_iniciada($url_video)) {
			return "inserta la url del video";
		}
		else{
			$this -> url_video = $url_video;
		}

		$url_video_tratada = str_replace(' ', '', $url_video);
		$url_video_tratada = preg_replace('/\s+/', '', $url_video_tratada);


		if (strlen($url_video) != strlen($url_video_tratada)) {
			return "La URL no puede contener espacios vacios, asegurate de que este bien copiada";
		}
		if (RepositorioEjercicio :: url_existe($conexion, $url_video)) {
			return "Esa URL ya fue elegida antes";
		}

	}

	protected function validar_texto($conexion, $texto){
		if (!$this -> variable_iniciada($texto)) {
			return "Este cuadro no puede estar vacio";
		}
		else{
			$this -> texto = $texto;
		}
	}
	public function obtener_titulo(){
		return $this -> titulo;
	}
	public function obtener_url(){
		return $this -> url;
	}
	public function obtener_url_video(){
		return $this -> url_video;
	}
	public function obtener_texto(){
		return $this -> texto;
	}

	public function mostrar_titulo(){
		if ($this -> titulo != "") {
			echo 'value = "' . $this -> titulo . '"';
		}
	}
	public function mostrar_url(){
		if ($this -> url != "") {
			echo 'value = "' . $this -> url . '"';
		}
	}
	public function mostrar_url_video(){
		if ($this -> url_video != "") {
			echo 'value = "' . $this -> url_video . '"';
		}
	}
	public function mostrar_texto(){
		if ($this -> texto != "" && strlen(trim($this -> texto)) > 0) {
			echo $this -> texto;
		}
	}

	public function mostrar_error_titulo(){
		if ($this -> error_titulo != "") {
			echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_url(){
		if ($this -> error_url != "") {
			echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_url_video(){
		if ($this -> error_url_video != "") {
			echo $this -> aviso_inicio . $this -> error_url_video . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_texto(){
		if ($this -> error_texto != "") {
			echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;
		}
	}
	public function ejercicio_valido(){
		if ($this -> error_titulo == "" && $this -> error_url == "" && $this -> error_url_video == "" && $this -> error_texto == "") {
			return true;
		}
		else {
			return false;
		}
	}

	public function entrada_valida(){
		if ($this -> error_titulo == "" && $this -> error_url == "" && $this -> error_texto == "") {
			return true;
		}
		else {
			return false;
		}
	}

}