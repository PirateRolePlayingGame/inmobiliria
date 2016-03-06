<?php
class AdminController 
{
	public function auditorias()
	{
		$tabla = Auditoria::obtAuditorias();
		require_once('/views/' . GC::$lang . "/sistema/panel.php");
	}

	public function usuarios()
	{
		$tabla = Usuario::obtenerUsuarios();
		require_once('/views/' . GC::$lang . "/sistema/panel.php");
	}

	public function inmuebles()
	{
		$tabla = Inmueble::obtInmueble();
		require_once('/views/' . GC::$lang . "/sistema/panel.php");
	}

	public function login()
	{
		require_once('/views/' . GC::$lang . "/sistema/login.php");
	}

	public function subirImagenInmueble()
	{
		if(isset($_FILES['uploadedfile']))
		{
			$ruta_inmuebles = __DIR__ . "/../assets/img/inmuebles/";
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
		}
		else
		{
			if(isset($_POST['id'])){
				print $_POST['id'] . '<br>';
			}

			if(isset($_POST['submit'])){
				print 'submit correcto' . '<br>';
			}
			if(isset($_POST['uploadedfile'])){
				print 'error archivo: ' . $_FILES['uploadedfile']['name'] . '<br>';
			}
			print "entro en else";
			// header("Location: home");
		}
	}
	
	public function validar()
	{
		if(isset($_POST['user']) && isset($_POST['pass']))
		{
			$cad = Usuario::validarLogin($_POST['user'], $_POST['pass']);
			echo $cad;	
			echo $_SESSION['tipo'];
			if($cad == "Login Exitoso")
			{
				header("Location: usuarios");
			}
		}
		else
		{
			header("Location: home");
		}
	}


}	 
?>