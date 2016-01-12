<?php

class UserTestController{
	public static function test(){
		echo 'testing user module';
		var_dump(Usuario::obtenerUsuarios());
		// $db = DB::getInstance();
		// $req = $db->query('SHOW COLUMNS from inmueble');
		// $req = $req->fetchAll();
		// var_dump($req[1]['Field']);
	}
}

?>