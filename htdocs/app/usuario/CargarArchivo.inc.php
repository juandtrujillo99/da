<?php
header("Content-type: text/html; charset=utf8");
include '../../app/config.inc.php';

if (empty($_FILES["file1"])) {
	echo "Olvidaste seleccionar un archivo.";
}
else{
	$fileName = $_FILES["file1"]["name"]; // The file name
	$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
	$fileType = $_FILES["file1"]["type"]; // The type of file it is
	$fileSize = $_FILES["file1"]["size"]; // File size in bytes
	$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true
	$carpeta = "../../img/control-medidas";//carpeta donde se suben los archivos
	if (!$fileTmpLoc) { // if file not chosen
	    echo "Selecciona un archivo antes de presionar el boton 'subir'";
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
		<input type="text" name="imagen" value="<?php echo $nombreEmpresa.date("d-m-Y").$string_aleatorio.$fileName;?>" class="d-none">
		<img src="<?php echo RUTA_IMG."control-medidas/".$nombreEmpresa.date("d-m-Y").$string_aleatorio."$fileName";?>" class="imagen-3">
		<br>
		<p>Se subió correctamente</p>
		<?php
	} else {
	    echo "Falló la subida, error al mover el archivo";
	}
}
?>