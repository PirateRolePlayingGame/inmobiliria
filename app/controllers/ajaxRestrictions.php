<?php
session_start();

$res = array();

switch($_SESSION['action']){
	case 'usuarios':
		$res['restricciones'] = ['id', 'fechaEntrada', 'fechaSalida', 'Imagenes'];
		$res['imagenes'] = false;
		break;
	case 'inmuebles':
		$res['restricciones'] = ['id', 'codigo', 'Imagenes'];
		$res['imagenes'] = true;
		break;
	case 'auditorias':
		$res['restricciones'] = ['id', 'idUsuario', 'actividad', 'usuario', 'fecha', 'codigo'];
		$res['imagenes'] = false;
		break;
	default:
		$res = [];
}

echo json_encode($res);
?>