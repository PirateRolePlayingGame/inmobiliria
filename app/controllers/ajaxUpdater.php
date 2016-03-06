<?php
session_start();
class AjaxUpdater{
	static $begin = '{"data": ';
	static $end = '}';

	public static function usuarios(){
		include(__DIR__ . '/../models/usuario.php');
		
		$pos = strpos($_POST['id'], ' ');
		$upd = substr($_POST['id'], 0, $pos);
		$id = substr($_POST['id'], $pos+1);
		$val = $_POST['value'];
		$retArray = array($val => $val);	

		switch ($upd)
		{
			case 'userName':
				$upd = "usuario";
				break;
			case 'estatus':
				$upd = 'idestatus';
				$retArray = array(1 => 'Activo', 2 => 'Inactivo');
				break;
			case 'tipoUsuario':
				$upd = 'idTipoUsuario';
				$retArray = array(1 => 'Administrador', 2 => 'Asesor');
				break;
		}
		
		Usuario::actUsuario($upd, $id, $val);
		return $retArray[$val];
	}

	public static function inmuebles(){
		include(__DIR__ . '/../models/inmueble.php');
		
		$pos = strpos($_POST['id'], ' ');
		$upd = substr($_POST['id'], 0, $pos);
		$id = substr($_POST['id'], $pos+1);
		$val = $_POST['value'];
		$retArray = array($val => $val);	

		switch ($upd)
		{
			case 'tipoInmueble':
				$upd = "idTipoInmueble";
				$retArray = array(1 => 'Casa', 2 => 'Apartamento', 3 => 'Terreno',
					              4 => 'Local', 5 => 'TownHouse', 6 => 'Oficina',
					              7 => 'Galpon');
				break;
			case 'transaccion':
				$upd = 'idtransaccion';
				$retArray = array(1 => 'Nuevo');
				break;
			case 'tipoUsuario':
				$upd = 'idTipoUsuario';
				$retArray = array(1 => 'Administrador', 2 => 'Asesor');
				break;
			default:
				break;
		}
		
		Inmueble::actInmueble($upd, $id, $val);
		return $retArray[$val];
	}


	public static function ubicacion()
	{
		include(__DIR__ . '/../models/cortos.php');
		include(__DIR__ . '/../models/ubicacion.php');

		$pos = strpos($_POST['id'], ' ');
		$upd = substr($_POST['id'], 0, $pos);
		$id = substr($_POST['id'], $pos+1);
		$val = $_POST['value'];
		$retArray = array($val => $val);

		switch($upd)
		{
			case 'Direccion':
				Ubicacion::actUbicacion($id, $val);
				break;

			case 'Municipio':
				Corto::actMunicipio($id, $val);
				break;

			case 'Estado':
				Corto::actEstado($id, $val);
				break;
		}
		return $ratArray[$val];

	}
}
	
include(__DIR__ . '/../connection.php');

switch($_SESSION['action']){
	case 'usuarios':
		$info = AjaxUpdater::usuarios();
		break;
	case 'inmuebles':
		$info = AjaxUpdater::inmuebles();
		break;
	default:
		$info = '{"data": []}';
}

echo $info;
?>