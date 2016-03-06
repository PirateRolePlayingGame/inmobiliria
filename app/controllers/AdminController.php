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
		
	}
}	 
?>