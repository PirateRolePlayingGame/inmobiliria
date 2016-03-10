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
		$file = $_FILES['uploadedfile'];
		$id = $_POST['id'];
		$ruta = __DIR__ . "/../assets/img/inmuebles/";

		try{
			$res = GC::subirImagen($file, $id, $ruta);
			print "Archivo subido exitosamente a: " . $res;
			
			$extension = explode('.', $res)[1];
			$newName = Inmueble::agrImagen($id, $extension);
			
			if(rename($ruta . $res, $ruta . $newName)){
				print " Se renombro exisotosamente. '" . explode('.', $res)[1] . "'";
			}else{
				print "ERROR";
			}
		}catch(Exception $e){
			print "ERROR: " . $e->getMessage() . '<br>';
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