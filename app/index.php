<?php
	session_start();
	header("Content-Type: text/html;charset=utf-8");
	
	print "SWAG" . "<br>";

	require_once('connection.php');
	
	require_once('controllers/GlobalController.php');

	if(isset($_GET['controller']) && isset($_GET['action'])){
		GC::$controller = $_GET['controller'];
		GC::$action = $_GET['action'];
	}else{
		GC::$controller = 'main';
		GC::$action = 'main';
	}
	var_dump($_GET);
	// if(isset($_GET['lang'])){
		// GC::$lang = $_GET['lang'];
	// }else{
		GC::$lang = 'es';
	// }

	$_SESSION['action'] = GC::$action;

	require_once('routes.php');

?>