<?php
session_start();
class AjaxController{
	static $begin = '{"data": ';
	static $end = '}';

	public static function usuarios(){
		include(__DIR__ . '/../models/usuario.php');
		$info = AjaxController::$begin . json_encode(Usuario::obtenerUsuarios()) . AjaxController::$end;
		return $info;
	}

	public static function auditorias(){
		include(__DIR__ . '/../models/auditoria.php');
		$info = AjaxController::$begin . json_encode(Auditoria::obtAuditorias()) . AjaxController::$end;
		return $info;
	}

	public static function inmuebles(){
		include(__DIR__ . '/../models/inmueble.php');
		$obj = inmueble::obtInmueble();
		
		foreach($obj as $var){
			$var->Imagenes = "<button type='button' id='image-viewer' class='btn btn-primary' href='views/es/sistema/galeria2.php?id=$var->id'> Ver $var->id </button>";
		}
		
		$info = AjaxController::$begin . json_encode($obj) . AjaxController::$end;
		return $info;
	}
}

// __DIR__ guarda la ubicacion actual del archivo
include(__DIR__ . '/../connection.php');

switch($_SESSION['action']){
	case 'usuarios':
		$info = AjaxController::usuarios();
		break;
	case 'auditorias':
		$info = AjaxController::auditorias();
		break;
	case 'inmuebles':
		$info = AjaxController::inmuebles();
		break;
	default:
		$info = '{"data": []}';
}

echo $info;
?>