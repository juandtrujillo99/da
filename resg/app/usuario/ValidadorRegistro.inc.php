<?php

include_once 'RepositorioUsuario.inc.php';

class ValidadorRegistroUsuario{

	private $aviso_inicio;
	private $aviso_cierre;

	private $cedula;
	private $nombre;
	private $apellido;
	private $edad;
	private $altura;
	private $peso;
	private $telefono;
	private $porcentaje_grasa;
	private $email;
	private $clave;

	private $error_cedula;
	private $error_nombre;
	private $error_apellido;
	private $error_edad;
	private $error_altura;
	private $error_peso;
	private $error_telefono;
	private $error_porcentaje_grasa;
	private $error_email;
	private $error_clave1;
	private $error_clave2;

	public function __construct($cedula, $nombre, $apellido, $edad, $altura, $peso, $telefono, $porcentaje_grasa, $email, $clave1, $clave2, $conexion){
		$this -> aviso_inicio = "<span class='alert alert-danger'>";
		$this -> aviso_cierre = "<a href='javascript:history.back(1)'> Clic aquí para corregir</a></span>";


		$this -> cedula = "";
		$this -> nombre = "";
		$this -> apellido = "";
		$this -> edad = "";
		$this -> altura = "";
		$this -> peso = "";
		$this -> telefono = "";
		$this -> porcentaje_grasa = "";
		$this -> email = "";
		$this -> clave = "";

		$this -> error_cedula = $this -> validar_cedula($conexion, $cedula);
		$this -> error_nombre = $this -> validar_nombre($conexion, $nombre);
		$this -> error_apellido = $this -> validar_apellido($conexion, $apellido);
		$this -> error_edad = $this -> validar_edad($conexion, $edad);
		$this -> error_altura = $this -> validar_altura($conexion, $altura);
		$this -> error_peso = $this -> validar_peso($conexion, $peso);
		$this -> error_telefono = $this -> validar_telefono($conexion, $telefono);
		$this -> error_porcentaje_grasa = $this -> validar_porcentaje_grasa($conexion, $porcentaje_grasa);
		$this -> error_email = $this -> validar_email($conexion, $email);
		$this -> error_clave1 = $this -> validar_clave1($clave1);
		$this -> error_clave2 = $this -> validar_clave2($clave1, $clave2);

		if ($this -> error_clave1 === "" && $this -> error_clave2 === "") {
			$this -> clave = $clave1;
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

	private function validar_cedula($conexion, $cedula){
		if(!$this -> variable_iniciada($cedula)){
			return "";
		}
		else {
			$this -> cedula = $cedula;
		}
		return "";
	}


	private function validar_nombre($conexion, $nombre){
		if(!$this -> variable_iniciada($nombre)){
			return "";
		}
		else {
			$this -> nombre = $nombre;
		}
		if (!empty($nombre) && strlen($nombre) < 2) {
			return "El nombre debe ser más largo.";
		}
		if (strlen($nombre) > 24) {
			return "El nombre no puede ser tan largo.";
		}
		return "";
	}


	private function validar_apellido($conexion, $apellido){
		if(!$this -> variable_iniciada($apellido)){
			return "";
		}
		else {
			$this -> apellido = $apellido;
		}
		if (!empty($apellido) && strlen($apellido) < 2) {
			return "El apellido debe ser más largo.";
		}
		if (strlen($apellido) > 24) {
			return "El apellido no puede ser tan largo.";
		}
		return "";
	}


	private function validar_edad($conexion, $edad){
		if(!$this -> variable_iniciada($edad)){
			return "";
		}
		else {
			$this -> edad = $edad;
		}
		if (!empty($edad) && $edad < 10) {
			return "La edad debe ser mayor que 10.";
		}
		if (!empty($edad) && $edad > 85) {
			return "La edad no puede ser superior a 85.";
		}
		return "";
	}


	private function validar_altura($conexion, $altura){
		if(!$this -> variable_iniciada($altura)){
			return "";
		}
		else {
			$this -> altura = $altura;
		}
		return "";
	}
	private function validar_peso($conexion, $peso){
		if(!$this -> variable_iniciada($peso)){
			return "";
		}
		else {
			$this -> peso = $peso;
		}
		return "";
	}
	private function validar_telefono($conexion, $telefono){
		if(!$this -> variable_iniciada($telefono)){
			return "";
		}
		else {
			$this -> telefono = $telefono;
		}
		if (RepositorioUsuario :: telefono_existe($conexion, $telefono)) {
			return "Otra cuenta ya ingreso este teléfono";
		}
		return "";
	}


	private function validar_porcentaje_grasa($conexion, $porcentaje_grasa){
		if(!$this -> variable_iniciada($porcentaje_grasa)){
			return "";
		}
		else {
			$this -> porcentaje_grasa = $porcentaje_grasa;
		}
		return "";
	}


	private function validar_email($conexion, $email){
		if(!$this -> variable_iniciada($email)){
			return "Agrega un email.";
		}
		else {
			$this -> email = $email;
		}

		if (RepositorioUsuario :: email_existe($conexion, $email)) {
			return "El email ya está en uso, prueba con otro.";
		}

		return "";
	}

	private function validar_clave1($clave1){
		if(!$this -> variable_iniciada($clave1)){
			return "Agrega una contraseña valida.";
		}
		return "";
	}

	private function validar_clave2($clave1, $clave2){
		if (!$this -> variable_iniciada($clave1)) {
			return "Primero debes rellenar la contraseña.";
		}


		if(!$this -> variable_iniciada($clave2)){
			return "Las contraseñas no coinciden.";
		}

		if($clave1 !== $clave2){
			return "Las contraseñas deben coincidir.";
		}
		return "";
	}
	
	public function obtener_cedula(){
		return $this -> cedula;
	}
	public function obtener_nombre(){
		return $this -> nombre;
	}
	public function obtener_apellido(){
		return $this -> apellido;
	}
	public function obtener_edad(){
		return $this -> edad;
	}
	public function obtener_altura(){
		return $this -> altura;
	}
	public function obtener_peso(){
		return $this -> peso;
	}
	public function obtener_telefono(){
		return $this -> telefono;
	}
	public function obtener_porcentaje_grasa(){
		return $this -> porcentaje_grasa;
	}
	public function obtener_email(){
		return $this -> email;
	}
	public function obtener_clave(){
		return $this -> clave;
	}




	public function obtener_error_cedula(){
		return $this -> error_cedula;
	}
	public function obtener_error_nombre(){
		return $this -> error_nombre;
	}
	public function obtener_error_apellido(){
		return $this -> error_apellido;
	}
	public function obtener_error_edad(){
		return $this -> error_edad;
	}
	public function obtener_error_altura(){
		return $this -> error_altura;
	}
	public function obtener_error_peso(){
		return $this -> error_peso;
	}
	public function obtener_error_telefono(){
		return $this -> error_telefono;
	}
	public function obtener_error_porcentaje_grasa(){
		return $this -> error_porcentaje_grasa;
	}
	public function obtener_error_email(){
		return $this -> error_email;
	}
	public function obtener_error_clave1(){
		return $this -> error_clave1;
	}
	public function obtener_error_clave2(){
		return $this -> error_clave2;
	}
	



	
	public function mostrar_cedula(){
		if ($this -> cedula !== "") {
			echo 'value="'. $this -> cedula . '"';
		}
	}
	public function mostrar_error_cedula(){
		if ($this -> error_cedula !== "") {
			echo $this -> aviso_inicio . $this -> error_cedula . $this -> aviso_cierre;
		}
	}
	public function mostrar_nombre(){
		if ($this -> nombre !== "") {
			echo 'value="'. $this -> nombre . '"';
		}
	}
	public function mostrar_error_nombre(){
		if ($this -> error_nombre !== "") {
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	}
	public function mostrar_apellido(){
		if ($this -> apellido !== "") {
			echo 'value="'. $this -> apellido . '"';
		}
	}
	public function mostrar_error_apellido(){
		if ($this -> error_apellido !== "") {
			echo $this -> aviso_inicio . $this -> error_apellido . $this -> aviso_cierre;
		}
	}
	public function mostrar_edad(){
		if ($this -> edad !== "") {
			echo 'value="'. $this -> edad . '"';
		}
	}
	public function mostrar_error_edad(){
		if ($this -> error_edad !== "") {
			echo $this -> aviso_inicio . $this -> error_edad . $this -> aviso_cierre;
		}
	}
	public function mostrar_altura(){
		if ($this -> altura !== "") {
			echo 'value="'. $this -> altura . '"';
		}
	}
	public function mostrar_error_altura(){
		if ($this -> error_altura !== "") {
			echo $this -> aviso_inicio . $this -> error_altura . $this -> aviso_cierre;
		}
	}
	public function mostrar_peso(){
		if ($this -> peso !== "") {
			echo 'value="'. $this -> peso . '"';
		}
	}
	public function mostrar_error_peso(){
		if ($this -> error_peso !== "") {
			echo $this -> aviso_inicio . $this -> error_peso . $this -> aviso_cierre;
		}
	}
	public function mostrar_telefono(){
		if ($this -> telefono !== "") {
			echo 'value="'. $this -> telefono . '"';
		}
	}
	public function mostrar_error_telefono(){
		if ($this -> error_telefono !== "") {
			echo $this -> aviso_inicio . $this -> error_telefono . $this -> aviso_cierre;
		}
	}
	public function mostrar_porcentaje_grasa(){
		if ($this -> porcentaje_grasa !== "") {
			echo 'value="'. $this -> porcentaje_grasa . '"';
		}
	}
	public function mostrar_error_porcentaje_grasa(){
		if ($this -> error_porcentaje_grasa !== "") {
			echo $this -> aviso_inicio . $this -> error_porcentaje_grasa . $this -> aviso_cierre;
		}
	}
	public function mostrar_email(){
		if ($this -> email !== "") {
			echo 'value="'. $this -> email . '"';
		}
	}
	public function mostrar_error_email(){
		if ($this -> error_email !== "") {
			echo $this -> aviso_inicio . $this -> error_email . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_clave1(){
		if ($this -> error_clave1 !== "") {
			echo $this -> aviso_inicio . $this -> error_clave1 . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_clave2(){
		if ($this -> error_clave2 !== "") {
			echo $this -> aviso_inicio . $this -> error_clave2 . $this -> aviso_cierre;
		}
	}
	public function registro_valido(){
		if ($this -> error_cedula === "" &&
			$this -> error_nombre === "" &&
			$this -> error_apellido === "" &&
			$this -> error_edad === "" &&
			$this -> error_altura === "" &&
			$this -> error_peso === "" &&
			$this -> error_telefono === "" &&
			$this -> error_porcentaje_grasa === "" &&
			$this -> error_email === "" &&
			$this -> error_clave1 === "" &&
			$this -> error_clave2 === "") {
			return true;			
		}
		else{
			return false;
		}
	}
}