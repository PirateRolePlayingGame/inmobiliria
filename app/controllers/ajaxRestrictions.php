<?php
session_start();

$res = array();

switch($_SESSION['action']){
	case 'usuarios':
		$res['restricciones'] = ['id', 'fechaEntrada', 'fechaSalida', 'Imagen'];
		$res['imagenes'] = false;
		break;
	case 'auditorias':
		$res['restricciones'] = ['id'];
		$res['imagenes'] = false;
		break;
	case 'inmuebles':
		$res['restricciones'] = ['id', 'codigo', 'Imagenes'];
		$res['imagenes'] = true;
		break;
	default:
		$res = [];
}

echo json_encode($res);
?>