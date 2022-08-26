<?php



abstract class ValidadorGaleria {

	protected $aviso_inicio;
	protected $aviso_cierre;

	protected $url;
	protected $imagen;
	protected $texto;

	protected $error_url;
	protected $error_imagen;
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


	protected function validar_url($conexion, $url){
		if (!$this -> variable_iniciada($url)) {
			
			$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $numero_caracteres = strlen($caracteres);
		    $string_aleatorio = '';
		    

		    for ($i = 0; $i < 7; $i++) {
		        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
		    }

		    $this -> url = $string_aleatorio;

		}
		else{
			$this -> url = $url;
		}


		$url_tratada = str_replace(' ', '-', $url);
		$url_tratada = preg_replace('/\s+/', '', $url_tratada);


		if (strlen($url) != strlen($url_tratada)) {
			$this -> url = $url_tratada;
		}
		if (RepositorioEntradaGaleria :: url_existe($conexion, $url)) {
			$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		    $numero_caracteres = strlen($caracteres);
		    $string_aleatorio = '';
		    

		    for ($i = 0; $i < 7; $i++) {
		        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
		    }

		    $this -> url = $string_aleatorio;
		}
	}


	protected function validar_imagen($conexion, $imagen){
		if (!$this -> variable_iniciada($imagen)) {
			return "Selecciona y sube una imagen para esta entrada";
		}
		else{
			$this -> imagen = $imagen;
		}
	}



	protected function validar_texto($conexion, $texto){
		if (!$this -> variable_iniciada($texto)) {
			return "¿Qué deseas compartir?";
		}
		else{

			$texto_tratado = str_replace('"', "'", $texto);
			htmlspecialchars($texto_tratado);
			$this -> texto = $texto_tratado;
		}
	}


	public function obtener_url(){return $this -> url;}
	public function obtener_imagen(){return $this -> imagen;}
	public function obtener_texto(){return $this -> texto;}
	


	public function mostrar_url(){
		if ($this -> url != "") {
			echo 'value = "' . $this -> url . '"';
		}
	}

	public function mostrar_imagen(){
		if ($this -> imagen != "") {
			echo 'value = "' . $this -> imagen . '"';
		}
	}

	public function mostrar_texto(){
		if ($this -> texto != "" && strlen(trim($this -> texto)) > 0) {
			echo $this -> texto;
		}
	}



	public function mostrar_error_url(){
		if ($this -> error_url != "") {
			echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_imagen(){
		if ($this -> error_imagen != "") {
			echo $this -> aviso_inicio . $this -> error_imagen . $this -> aviso_cierre;
		}
	}

	public function mostrar_error_texto(){
		if ($this -> error_texto != "") {
			echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;
		}
	}

	public function entrada_valida(){
		if ($this -> error_url == "" && $this -> error_imagen == "" && $this -> error_texto == "") {
			return true;
		}
		else {
			return false;
		}
	}
}