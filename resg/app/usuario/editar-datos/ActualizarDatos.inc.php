<?php

Conexion::abrir_conexion();

$id_usuario = $_SESSION['id_usuario'];

if (isset($_POST['guardar-email'])) {
	$email = $_POST['email'];	
	if (isset($email)&&!empty($email)) {
		$email_actualizado = RepositorioUsuario::actualizar_email(Conexion::obtener_conexion(), $id_usuario, $email);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}
	else{//informar error
		return;
	}
}

if (isset($_POST['guardar-cedula'])) {
	$cedula = $_POST['cedula'];	
	if (isset($cedula)&&!empty($cedula)) {
		$cedula_actualizado = RepositorioUsuario::actualizar_cedula(Conexion::obtener_conexion(), $id_usuario, $cedula);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}
	else{//informar error
		return;
	}
}

if (isset($_POST['guardar-clave'])) {
	$clave_cifrada = password_hash($_POST['clave'], PASSWORD_DEFAULT);
	if (isset($clave_cifrada)&&!empty($clave_cifrada)) {
		$clave_actualizada = RepositorioUsuario::actualizar_password(Conexion::obtener_conexion(), $id_usuario, $clave_cifrada);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}
	else{//informar error
		return;
	}
}


if (isset($_POST['guardar-nombre'])||isset($_POST['guardar-apellido'])) {
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];

	if (isset($nombre)&&!empty($nombre)) {
		$nombre_actualizado = RepositorioUsuario::actualizar_nombre(Conexion::obtener_conexion(), $id_usuario, $nombre);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}	
	if (isset($apellido)&&!empty($apellido)) {
		$apellido_actualizado = RepositorioUsuario::actualizar_apellido(Conexion::obtener_conexion(), $id_usuario, $apellido);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}	
	else{//informar error
		return;
	}
}



if (isset($_POST['guardar-telefono'])) {
	$telefono = $_POST['telefono'];	
	if (isset($telefono)&&!empty($telefono)) {
		$telefono_actualizado = RepositorioUsuario::actualizar_telefono(Conexion::obtener_conexion(), $id_usuario, $telefono);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}
	else{//informar error
		return;
	}
}

if (isset($_POST['guardar-edad'])) {
	$edad = $_POST['edad'];	
	if (isset($edad)&&!empty($edad)) {
		$edad_actualizado = RepositorioUsuario::actualizar_edad(Conexion::obtener_conexion(), $id_usuario, $edad);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}
	else{//informar error
		return;
	}
}


if (isset($_POST['guardar-altura'])||isset($_POST['guardar-peso'])) {
	$altura = $_POST['altura'];
	$peso = $_POST['peso'];

	if (isset($altura)&&!empty($altura)) {
		$altura_actualizado = RepositorioUsuario::actualizar_altura(Conexion::obtener_conexion(), $id_usuario, $altura);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}	
	if (isset($peso)&&!empty($peso)) {
		$peso_actualizado = RepositorioUsuario::actualizar_peso(Conexion::obtener_conexion(), $id_usuario, $peso);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}	
	else{//informar error
		return;
	}
}


if (isset($_POST['guardar-porcentaje_grasa'])) {
	$porcentaje_grasa = $_POST['porcentaje_grasa'];	
	if (isset($porcentaje_grasa)&&!empty($porcentaje_grasa)) {
		$porcentaje_grasa_actualizado = RepositorioUsuario::actualizar_porcentaje_grasa(Conexion::obtener_conexion(), $id_usuario, $porcentaje_grasa);
		?>
		<p class="desaparecer-automaticamente h-5 text-white textoBold new blue fixed-top text-center">
			El cambio se realizó correctamente.
		</p>
		<?php
	}
	else{//informar error
		return;
	}
}


Conexion::cerrar_conexion();