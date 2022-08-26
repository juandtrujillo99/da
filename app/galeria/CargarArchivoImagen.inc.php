<?php

header("Content-type: text/html; charset=utf8");
include '../../app/config.inc.php';


// subir archivos
if (empty($_FILES["archivoImagen"])) {
	echo "Olvidaste seleccionar un archivo válido.";
}

else{
	$fileName = $_FILES["archivoImagen"]["name"]; // The file name
	$fileTmpLoc = $_FILES["archivoImagen"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["archivoImagen"]["type"]; // The type of file it is
	$fileSize = $_FILES["archivoImagen"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["archivoImagen"]["error"]; // 0 for false... and 1 for true
	$carpeta = "../../assets/archivos";//carpeta donde se suben los archivos
	
	$fileName = str_replace(' ', '-', $fileName);

	$directorio = DIRECTORIO_RAIZ."/assets/archivos";//se crea la variable para la ruta de la carpeta
	$carpeta_objetivo = $directorio.basename($_FILES['archivoImagen']['name']);
	$tipo_imagen = pathinfo($carpeta_objetivo, PATHINFO_EXTENSION);


	if (!$fileTmpLoc) { // if file not chosen
	    echo "Selecciona un archivo válido antes de presionar el boton 'subir'";
	    exit();
	}


	$caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $numero_caracteres = strlen($caracteres);
    $string_aleatorio = '';
    

    for ($i = 0; $i < 3; $i++) {
        $string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
    }
  

	if(move_uploaded_file($fileTmpLoc, $carpeta."/".$nombreEmpresa.date("d-m-Y").$string_aleatorio.utf8_decode($fileName))){	
		?>
		<img style="box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.5);" src="<?php echo RUTA_GALERIA_FILES.$nombreEmpresa.date("d-m-Y").$string_aleatorio."$fileName";?>" class="imagen">
		<br><br>
		<p style="font-size: .5em;color: grey;">Vista Previa</p>
		<br>
		<input type="text" id="copiar" value="<img src='<?php echo RUTA_GALERIA_FILES.$nombreEmpresa.date("d-m-Y").$string_aleatorio."$fileName";?>' class='imagen'>">
		<?php
	} else {
	    echo "Falló la subida, error al mover el archivo";
	}
}




    

