<?php
session_start();

switch($_SESSION['action']){
	case 'usuarios':
		$res = ['id', 'fechaEntrada', 'fechaSalida'];
		break;
	case 'auditorias':
		$res = ['id'];
		break;
	default:
		$res = [];
}

echo json_encode($res);
?>