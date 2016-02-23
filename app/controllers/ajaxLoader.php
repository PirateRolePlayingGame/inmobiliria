<?php
session_start();

if($_GET['info'] == 'estatus'){
	$array['1'] = 'Activo';
	$array['2'] = 'Inactivo';
	$array['selected'] = '1';
}

print json_encode($array);
?>