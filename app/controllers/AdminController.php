<?php
class AdminController 
{
	public function auditorias()
	{
		if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1)
		{
			$tabla = Auditoria::obtAuditorias();
			require_once('/views/' . GC::$lang . "/sistema/panel.php");
		}
		else
		{
			header('Location: ../home');
		}
	}

	public function usuarios()
	{
		if(isset($_SESSION['tipoUsuario']) && $_SESSION['tipoUsuario'] == 1)
		{
			$tabla = Usuario::obtenerUsuarios();
			require_once('/views/' . GC::$lang . "/sistema/panel.php");
		}
		else
		{
			header('Location: ../home');
		}
	}

	public function inmuebles()
	{
		if(isset($_SESSION['tipoUsuario']))
		{
			$tabla = Inmueble::obtInmueble();
			require_once('/views/' . GC::$lang . "/sistema/panel.php");
		}
		else
		{
			header('Location: ../home');
		}
	}

	public function estados()
	{
		if(isset($_SESSION['tipoUsuario']))
		{
			$tabla = Corto::obtEstado();
			require_once('/views/' . GC::$lang . "/sistema/panel.php");
		}
		else
		{
			header('Location: ../home');
		}
	}

	public function municipios()
	{
		if(isset($_SESSION['tipoUsuario']))
		{
			$tabla = Corto::obtMunicipio();
			require_once('/views/' . GC::$lang . "/sistema/panel.php");
		}
		else
		{
			header('Location: ../home');
		}
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
				print " Se renombro exisotosamente. '" . explode('.', $res)[0] . "'";
			}else{
				print "ERROR";
			}
		}catch(Exception $e){
			print "ERROR: " . $e->getMessage() . '<br>';
		}
		
		header("Location: inmuebles");
	}

	public function cambiarImagenUsuario()
	{
		$file = $_FILES['uploadedfile'];
		$id = $_POST['id'];
		$ruta = __DIR__ . "/../assets/img/users/";

		try{
			$res = GC::subirImagen($file, $id, $ruta);
			print "Archivo subido exitosamente a: " . $res;
			
			$extension = explode('.', $res)[1];
			$newName = Usuario::actualizarImagen($id, $extension);
			
			if(rename($ruta . $res, $ruta . $newName)){
				print " Se renombro exisotosamente. '" . explode('.', $res)[0] . "'";
			}else{
				print "ERROR";
			}
		}catch(Exception $e){
			print "ERROR: " . $e->getMessage() . '<br>';
		}

		sleep(4);
		header("Location: usuarios");
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
				header("Location: inmuebles");
			}
		}
		else
		{
			header("Location: ../home");
		}
	}

	public function borrarImagen()
	{
		if(isset($_POST['id']))
		{
			try
			{
				$idImagen = $_POST['id'];
				print "id: " . $idImagen . '<br>';
				$nombreFoto = Inmueble::obtImagenPorIdYEliminar($idImagen);
				$ruta = __DIR__ . "/../assets/img/inmuebles/" . $nombreFoto;
				chown($ruta, 666);
				unlink($ruta);
				print "Imagen Borrada en: " . $ruta;
			}
			catch(Exception $e)
			{
				print "ERROR: " . $e->getMessage() . '<br>';
			}
		}
		header("Location: inmuebles");
	}

	public function cerrar()
	{
		session_unset();
		session_destroy();
		header("Location: ../home");
	}

	public function addAction()
	{
		if(isset($_POST['add']) && $_POST['add'] == "usuario" && (isset($_SESSION['user'])))
		{
			Usuario::agregarUsuario($_POST['usuario'], $_POST['pass'], $_POST['nombre'], $_POST['correo'], $_POST['tlf']);
			return header("Location: ../admin/usuarios");
		}

		if(isset($_POST['add']) && $_POST['add'] == "inmueble" && (isset($_SESSION['user'])))
		{
			//Auditoria de select a $_POST['nuevo valor'] al editar
			$idInm = Inmueble::agrInmueble($_POST['stat'], $_POST['tipo'], $_POST['estado'], $_POST['municipio'], 
				$_POST['transaccion'], $_POST['direccion'], $_POST['nombre'], $_POST['precio'], 
				$_POST['banos'], $_POST['habit'], $_POST['m'], $_POST['est'], $_POST['tlf'], $_POST['desc']);
			
			Auditoria::agrInmueble($_SESSION['id'], $idInm);
			return header("Location: ../admin/inmuebles");
		}

		if(isset($_POST['add']) && $_POST['add'] == "estado" && (isset($_SESSION['user'])))
		{
			Corto::agrEstado($_POST['est']);
			return header("Location: ../admin/estados");
		}

		if(isset($_POST['add']) && $_POST['add'] == "municipio" && (isset($_SESSION['user'])))
		{
			Corto::agrMunicipio($_POST['mun']);
			return header("Location: ../admin/municipios");
		}

		return header("Location: ../admin/usuarios");
	}
}	 

/* estatus, tipoInmueble, estado, municipio, transaccion, dir, nombre, precio, baños, hab, metros, estac, tlf, descrip*/
?>