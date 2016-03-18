<?php
session_start();

include(__DIR__ . '/../connection.php');
include(__DIR__ . '/../models/usuario.php');

sleep(1);

$userName = $_POST['username'];
$pass = $_POST['password'];

if(Usuario::validarLogin($userName, $pass) == 'Login Exitoso')
{
	print json_encode(true);
}
else
{
	print json_encode(false);
}

?>
