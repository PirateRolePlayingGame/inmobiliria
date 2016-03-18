<?php
	//The PDO object construct parameters are as follow:
	//	public PDO::__construct ( string $dsn [, string $username [, string $password [, array $options ]]] )
	//		$dsn is a string in the format 'mysql:host="hostname";dbname="DataBaseName"'
	//the options array is actually an associative array (dictionary),
	//and in this code is used to store any errors when connecting to the database.
	//If there is an error whe connecting, php will stop and show the error when opening the file in a browser.
	class Db{
		private static $instance = NULL;

		private function __construct(){}

		private function __clone(){}

		public static function getInstance(){
			if(!isset(self::$instance)){
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO('mysql:host=localhost;dbname=inmobiliaria', 'root', '', $pdo_options);
				self::$instance->query("SET NAMES 'utf8'");
			}
			return(self::$instance);
		}
	}

	print "CONNECTION SE INCLUYO DE MANERA CORRECTA" . "<br>";
?>