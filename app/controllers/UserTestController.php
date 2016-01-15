<?php

class UserTestController{
	public static function test(){
		echo 'testing user module';
		var_dump(Usuario::obtenerUsuarios());

		// Usuario::agregarUsuario('Penguin_Blue', '123', 'Swag Master', 'Swag@gmail.com', '123456');

		// var_dump(Usuario::validarLogin('Penguin_Blue', '123'));
		// var_dump(Usuario::validarLogin('Penguin_Blue', '1235'));
		// var_dump(Usuario::validarLogin('PenguinAdmin', '1235'));
		// var_dump(Usuario::validarLogin('PenguinAdmin', '1234'));
		// var_dump(Usuario::validarLogin('PenguinAdmin2', '1234'));

		// $db = DB::getInstance();
		// $req = $db->query('SHOW COLUMNS from inmueble');
		// $req = $req->fetchAll();
		// var_dump($req[1]['Field']);
	}
}

?>
