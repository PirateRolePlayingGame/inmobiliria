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
		switch ($upd) 
		{
			case 'userName':
				$upd = "usuario";
				break;
		}
		Usuario::actUsuario($upd, $id, $val);
		return $val;
	}
}
	
include(__DIR__ . '/../connection.php');

switch($_SESSION['action']){
	case 'usuarios':
		$info = AjaxUpdater::usuarios();
		break;
	default:
		$info = '{"data": []}';
}
echo $info;

?>