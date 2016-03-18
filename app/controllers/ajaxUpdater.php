<?php
session_start();

function mapIdToValue($arr){
	$ret = array();
	foreach($arr as $obj){
		$ret[$obj->id] = $obj->name;
	}
	return $ret;
}

class AjaxUpdater{
	static $begin = '{"data": ';
	static $end = '}';



	public static function usuarios(){
		include(__DIR__ . '/../models/usuario.php');
		include(__DIR__ . '/../models/cortos.php');
		
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
		include(__DIR__ . '/../models/ubicacion.php');
		
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
			case 'tipoUsuario':
				$upd = 'idTipoUsuario';
				$retArray = array(1 => 'Administrador', 2 => 'Asesor');
				break;
			case 'status':
				$upd = 'idStat';
				$retArray = array(1 => 'Activo', 2 => 'Pendiente', 3 => 'Eliminado', 4 => 'Mantenimiento');
				break;
			case 'estado':
				$upd = 'idEstado';
				return Ubicacion::actUbicacionInmueble($id, $val, $upd, 'estado');
				break;
			case 'municipio':
				$upd = 'idMunicipio';
				return Ubicacion::actUbicacionInmueble($id, $val, $upd, 'municipio');
				break;
			case 'ubicacion':
				$upd = 'idUbicacion';
				break;
			case 'estacionamiento':
				$upd = 'nEstacionamiento';
				break;
			case 'tlf':
				$upd = 'tlfDueño';
				break;
			case 'baños':
				$upd = 'nBaños';
				break;
			case 'habitaciones':
				$upd = 'nHabitaciones';
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
		return $retArray[$val];

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

print $info;
?>