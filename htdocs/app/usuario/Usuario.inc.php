<?php

/**
 **/
class Usuario{

	private $id;
	private $cedula;
	private $nombre;
	private $apellido;
	private $edad;
	private $altura;
	private $peso;
	private $telefono;
	private $porcentaje_grasa;
	private $email;
	private $password;
	private $fecha_registro;
	private $activo;

	public function __construct($id, $cedula, $nombre, $apellido, $edad, $altura, $peso, $telefono, $porcentaje_grasa, $email, $password, $fecha_registro, $activo){
		$this -> id = $id;
		$this -> cedula = $cedula;
		$this -> nombre = $nombre;
		$this -> apellido = $apellido;
		$this -> edad = $edad;
		$this -> altura = $altura;
		$this -> peso = $peso;
		$this -> telefono = $telefono;
		$this -> porcentaje_grasa = $porcentaje_grasa;
		$this -> email = $email;
		$this -> password = $password;
		$this -> fecha_registro = $fecha_registro;
		$this -> activo = $activo;
	}

	public function obtener_id(){
		return $this -> id;
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
	public function obtener_password(){
		return $this -> password;
	}
	public function obtener_fecha_registro(){
		return $this -> fecha_registro;
	}
	public function esta_activo(){
		return $this -> activo;
	}

	public function cambiar_nombre($nombre){
		$this -> nombre = $nombre;
	}
	public function cambiar_apellido($apellido){
		$this -> apellido = $apellido;
	}
	public function cambiar_edad($edad){
		$this -> edad = $edad;
	}
	public function cambiar_altura($altura){
		$this -> altura = $altura;
	}
	public function cambiar_peso($peso){
		$this -> peso = $peso;
	}
	public function cambiar_telefono($telefono){
		$this -> telefono = $telefono;
	}
	public function cambiar_porcentaje_grasa($porcentaje_grasa){
		$this -> porcentaje_grasa = $porcentaje_grasa;
	}
	public function cambiar_email($email){
		$this -> email = $email;
	}
	public function cambiar_password($password){
		$this -> password = $password;
	}
	public function cambiar_activo($activo){
		$this -> activo = $activo;
	}

}