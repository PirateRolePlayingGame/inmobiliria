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
								estatus.estatus as estatus, tipousuario.tipoUsuario as tipoUsuario,
								usuario.fechaEntrada as fechaEntrada, usuario.fechaSalida as fechaSalida
								FROM usuario
								INNER JOIN estatus on usuario.idEstatus = estatus.idEstatus
								INNER JOIN tipousuario on usuario.idTipoUsuario = tipousuario.idTipoUsuario');
		$req->execute();
		foreach($req->fetchAll() as $usuario){
			$arr[] = new Usuario($usuario['id'], $usuario['estatus'], $usuario['tipoUsuario'],
									$usuario['user'], $usuario['contraseña'], $usuario['nombre'],
									$usuario['correo'], $usuario['telefono'], $usuario['fechaEntrada'], 
									$usuario['fechaSalida']);
		}

		return($arr);
	}

	
	public static function agregarUsuario($userName, $contraseña, $nombre, $correo, $telefono){
		$db = Db::getInstance();
		

		$fechaEntrada = date('Y/m/d');
		$req = $db->prepare('SELECT usuario.usuario as user FROM usuario WHERE usuario.usuario = :usr');
		
		if($req->execute(array(':usr' => $userName)) && $req->fetch() == null){
			$req = $db->prepare('INSERT into usuario(idEstatus, idTipoUsuario, usuario, contraseña, nombre, telefono, correo, fechaEntrada, foto)
									values(:idStatus, :idTipoUsr, :usr, :cont, :nomb, :tlf, :corr, :fec, :fot)');

			$req->execute(array(':idStatus' => 1, ':idTipoUsr' => 2,':usr' => $userName, ':cont' => $contraseña,
								':nomb' => $nombre, ':tlf' => $telefono, ':corr' => $correo, ':fec' => $fechaEntrada, 'fot' => 'default.jpg'));
			return true;
		}
		
		return false;
	}

	
	public static function validarLogin($userName, $contraseña){
		$db = Db::getInstance();

		$req = $db->prepare('SELECT usuario.contraseña as cont, usuario.idTipoUsuario as tipo, usuario.idUsuario as id
							 FROM usuario WHERE usuario = :usr');
		if($req->execute(array(':usr' => $userName)) && ($row = $req->fetch()) != NULL){
			if($row['cont'] == $contraseña)
			{
				$_SESSION['tipoUsuario'] = $row['tipo'];
				$_SESSION['user'] = $userName;
				$_SESSION['id'] = $row['id'];
				return 'Login Exitoso';
			}
			else
				return 'Contraseña Incorrecta';
		}else{
			return 'Usuario Inexistente';
		}
	}


	public static function actUsuario($upd, $id, $val)
	{
		$db = Db::getInstance();
		// echo "Hello Nigger!";
		// echo $upd;
		// echo $id;
		// echo $val;
		// $query = "UPDATE usuario SET '$upd' = '$val' WHERE idUsuario = '$id'";
		// $db->query($query);
		// $upd = $db->quote($upd);


		$req = $db->prepare('UPDATE usuario SET ' . $upd . ' = :val WHERE idUsuario = :id');
		$req->execute(array('val' => $val, 'id' => $id));
	}

	public static function elimUsuario($id)
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$req = $db->prepare('UPDATE usuario SET idEstatus = 2, fechaSalida = :fec WHERE idUsuario = :id');
		$req->execute(array(':fec' => $fecha, ':id' => $id));
	}

	public static function obtImagen($id)
	{
		$db = Db::getInstance();
		
		$req = $db->prepare('SELECT usuario.foto as foto FROM usuario where idUsuario = :id');
		$req->execute(array('id' => $id));

		return $req->fetch()['foto'];
	}

	public static function actualizarImagen($id, $extension)
	{
		$db = Db::getInstance();
		
		$nombreFoto = 'u' . $id . '.' . $extension;
		
		$req = $db->prepare('UPDATE usuario SET foto = :val WHERE idUsuario = :id');
		$req->execute(array('val' => $nombreFoto, 'id' => $id));

		return $nombreFoto;
	}

	public static function obtUsuario($id)
	{
		$db = Db::getInstance();
		
		$req = $db->prepare('SELECT usuario.foto as foto,
							 usuario.nombre as nombre, tipousuario.tipoUsuario as tipo
							 FROM usuario
							 INNER JOIN tipousuario on tipousuario.idTipoUsuario = usuario.idTipoUsuario
							 WHERE idUsuario = :id');
		$req->execute(array('id' => $id));

		return GC::arrayToObject($req->fetch());
	}

	// public static function formUsuario()
	// {
	// 	$arr = array();
	// 	$cor = array();
	// 	$arr = ["Usuario", "Contraseña", "Nombre", "Correo", "Telefono"];
	// 	$v = array();
	// 	$v['nombre'] = "usuario";
	// 	$v['datos'] = $arr;
	// 	$v['drop'] = $cor;
	// 	return $v;
	// }
}

?>