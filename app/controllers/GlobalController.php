<?php

//Global Controller class
class GC
{
	public static $controller;
	public static $action;
	public static $lang;
	
	// public static function subirImagen($file, $id, $ruta)
	// {
	// 	$id = $_POST['id'];
	// 	$uploadedfile_size = $file['size'];
	// 	$msg = '';

	// 	if($file['size'] > 500000)
	// 	{
	// 		throw new Exception('El archivo es mayor que 500KB, debes reduzcirlo antes de subirlo<br>');
	// 	}

	// 	$valid_img_types = ["image/jpeg", "image/gif", "image/png"];

	// 	if(!in_array($file['type'], $valid_img_types))
	// 	{
	// 		throw new Exception('Tu archivo tiene que ser JPG, GIF o PNG. Otros archivos no son permitidos<br>');
	// 	}

	// 	$file_name = $file['name'];
	// 	$add = $ruta . $file_name;

		if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $add))
		{
			print " Ha sido subido satisfactoriamente";
			return $file_name;
		}
		else
		{
			throw new Exception("Error al subir el archivo");
		}
	}

	public static function arrayToObject($arr)
	{
		$obj = new stdClass();
		foreach($arr as $key => $value)
		{
			$obj->$key = $value;
		}
		return $obj;
	}
}

?>