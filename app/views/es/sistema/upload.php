<?php
$ruta_inmuebles = "../../../assets/img/inmuebles/";
$uploadedfileload = "true";
$id = $_POST['id'];
$uploadedfile_size = $_FILES['uploadedfile']['size'];
echo $_FILES['uploadedfile']['name'];

if($_FILES['uploadedfile']['size'] > 500000){
	$msg = $msg . "El archivo es mayor que 500KB, debes reduzcirlo antes de subirlo<br>";
	$uploadedfileload = "false";
}

$valid_img_types = ["image/jpeg", "image/gif", "image/png"];

if(!in_array($_FILES['uploadedfile']['type'], $valid_img_types)){
	$msg = $msg . " Tu archivo tiene que ser JPG, GIF o PNG. Otros archivos no son permitidos<br>";
	$uploadedfileload = "false";
}

$file_name = $_FILES['uploadedfile']['name'];
$add = $ruta_inmuebles . $file_name;

if($uploadedfileload == "true"){
	if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add)){
		echo " Ha sido subido satisfactoriamente";
	}else{
		echo "Error al subir el archivo";
	}
}else{
	echo $msg;
}
?>
