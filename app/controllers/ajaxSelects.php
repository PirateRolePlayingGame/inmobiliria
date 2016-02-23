<?php
session_start();

// funcion para mapear de id a valor en un arreglo asociativo
// dado un arreglo de objetos con los atributos id y name.
function mapIdToValue($arr){
	$ret = array();
	foreach($arr as $obj){
		$ret[$obj->id] = $obj->name;
	}
	return $ret;
}

include(__DIR__ . '/../connection.php');
include(__DIR__ . '/../models/cortos.php');

$nombres = ['estatus', 'tipoUsuario'];

$estatus = mapIdToValue(Corto::obtEstatus());
$tipoUsuario = mapIdToValue(Corto::obtTipoUsuario());

$data['nombres'] = $nombres;
$data['data'] = ['estatus'     => $estatus,
                 'tipoUsuario' => $tipoUsuario
                ];

echo json_encode($data);
?>