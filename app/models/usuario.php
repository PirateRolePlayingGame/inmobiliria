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
	public $fechaEntrada;
	public $fechaSalida;

	
	public function __construct($id, $estatus, $tipoUsuario, $userName, $contraseña, $nombre, $correo, $telefono, $fechaEntrada, $fechaSalida){
		$this->id = $id;
		$this->estatus = $estatus;
		$this->tipoUsuario = $tipoUsuario;
		$this->userName = $userName;
		$this->contraseña = $contraseña;
		$this->nombre = $nombre;
		$this->correo = $correo;
		$this->telefono = $telefono;
		$this->fechaEntrada = $fechaEntrada;
		$this->fechaSalida = $fechaSalida;
	}

	
	public static function obtenerUsuarios(){
		$arr = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT usuario.idUsuario as id, usuario.nombre as nombre, usuario.usuario as user,
								usuario.contraseña as contraseña, usuario.correo as correo, usuario.telefono as telefono,
								estatus.estatus as estatus, tipoUsuario.tipoUsuario as tipoUsuario,
								usuario.fechaEntrada as fechaEntrada, usuario.fechaSalida as fechaSalida
								FROM usuario
								INNER JOIN estatus on usuario.idEstatus = estatus.idEstatus
								INNER JOIN tipoUsuario on usuario.idTipoUsuario = tipoUsuario.idTipoUsuario');
		$req->execute();
		foreach($req->fetchAll() as $usuario){
			$arr[] = new Usuario($usuario['id'], $usuario['estatus'], $usuario['tipoUsuario'],
									$usuario['user'], $usuario['contraseña'], $usuario['nombre'],
									$usuario['correo'], $usuario['telefono'], $usuario['fechaEntrada'], 
									$usuario['fechaSalida']);
		}

		return($arr);
	}

	
	public static function agregarUsuario($userName, $contraseña, $nombre, $correo, $telefono, $fechaEntrada){
		$db = Db::getInstance();
		
		$req = $db->prepare('SELECT usuario.usuario as user FROM usuario WHERE usuario.usuario = :usr');
		
		if($req->execute(array(':usr' => $userName)) && $req->fetch() == null){
			$req = $db->prepare('INSERT into usuario(idEstatus, idTipoUsuario, usuario, contraseña, nombre, telefono, correo, fechaEntrada)
									values(:idStatus, :idTipoUsr, :usr, :cont, :nomb, :tlf, :corr, :fec)');

			$req->execute(array(':idStatus' => 1, ':idTipoUsr' => 1,':usr' => $userName, ':cont' => $contraseña,
								':nomb' => $nombre, ':tlf' => $telefono, ':corr' => $correo, ':fec' => $fechaEntrada));
			return true;
		}
		
		return false;
	}

	
	public static function validarLogin($userName, $contraseña){
		$db = Db::getInstance();
		session_start();

		$req = $db->prepare('SELECT usuario.contraseña as cont, usuario.idTipoUsuario as tipo FROM usuario WHERE usuario = :usr');
		if($req->execute(array(':usr' => $userName)) && ($row = $req->fetch()) != NULL){
			if($row['cont'] == $contraseña)
			{
				$_SESSION['tipo'] = $row['tipo'];
				return 'Login Exitoso';
			}
			else
				return 'Contraseña Incorrecta';
		}else{
			return 'Usuario Inexistente';
		}
	}
}

?>