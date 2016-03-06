<?php
$uploadedfileload = "true";
$uploadedfile_size = $_FILES['uploadedfile']['size'];
echo $_FILES['uploadedfile']['name'];

if($_FILES['uploadedfile']['size'] > 400000){
	$msg = $msg . "El archivo es mayor que 400KB, debes reduzcirlo antes de subirlo<br>";
	$uploadedfileload = "false";
}

$valid_img_types = ["image/jpeg", "image/gif", "image/png"];

if(!in_array($_FILES['uploadedfile']['type'], $valid_img_types)){
	$msg = $msg . " Tu archivo tiene que ser JPG o GIF. Otros archivos no son permitidos<br>";
	$uploadedfileload = "false";
}

$file_name = $_FILES['uploadedfile']['name'];
$add = "uploads/$file_name";

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
