<?php
session_start();
class AjaxController{
	static $begin = '{"data": ';
	static $end = '}';

	public static function usuarios(){
		include(__DIR__ . '/../models/usuario.php');
		$obj = Usuario::obtenerUsuarios();
		
		foreach($obj as $var){
			$var->Imagenes = "<button type='button' id='image-viewer2' class='btn btn-primary' href='views/es/sistema/userPicture.php?id=$var->id'> Ver $var->id </button>";
		}

		$info = AjaxController::$begin . json_encode($obj) . AjaxController::$end;
		return $info;
	}

	public static function auditorias(){
		include(__DIR__ . '/../models/auditoria.php');
		$info = AjaxController::$begin . json_encode(Auditoria::obtAuditorias()) . AjaxController::$end;
		return $info;
	}

	public static function estados(){
		include(__DIR__ . '/../models/cortos.php');
		$info = AjaxController::$begin . json_encode(Corto::obtEstado()) . AjaxController::$end;
		return $info;
	}

	public static function municipios(){
		include(__DIR__ . '/../models/cortos.php');
		$info = AjaxController::$begin . json_encode(Corto::obtMunicipio()) . AjaxController::$end;
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

$info = '{"data": []}';
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
	case 'estados':
		$info = AjaxController::estados();
		break;
	case 'municipios':
		$info = AjaxController::municipios();
		break;
}

echo $info;
?>