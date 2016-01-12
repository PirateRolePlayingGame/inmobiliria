<?php

class Usuario{
	public $id;
	public $estatus;
	public $tipoUsuario;
	public $userName;
	public $contraseña;
	public $nombre;
	public $correo;
	public $telefono;


	public function __construct($id, $estatus, $tipoUsuario, $userName, $contraseña, $nombre, $correo, $telefono){
		$this->id = $id;
		$this->estatus = $estatus;
		$this->tipoUsuario = $tipoUsuario;
		$this->userName = $userName;
		$this->contraseña = $contraseña;
		$this->nombre = $nombre;
		$this->correo = $correo;
		$this->telefono = $telefono;
	}

	public static function obtenerUsuarios(){
		$arr = [];
		$db = Db::getInstance();

		$req = $db->query('SELECT usuario.idUsuario as id, usuario.nombre as nombre, usuario.usuario as user,
							usuario.contraseña as contraseña, usuario.correo as correo, usuario.telefono as telefono,
							estatus.estatus as estatus, tipoUsuario.tipoUsuario as tipoUsuario
							FROM usuario
							INNER JOIN estatus on usuario.idEstatus = estatus.idEstatus
							INNER JOIN tipoUsuario on usuario.idTipoUsuario = tipoUsuario.idTipoUsuario;');

		foreach($req->fetchAll() as $usuario){
			$arr[] = new Usuario($usuario['id'], $usuario['estatus'], $usuario['tipoUsuario'],
									$usuario['user'], $usuario['contraseña'], $usuario['nombre'],
									$usuario['correo'], $usuario['telefono']);
		}

		return($arr);
	}
}

?>