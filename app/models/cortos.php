<?php

class Corto
{
	public $id;
	public $name;


	public function __construct($i, $n)
	{
		$this->id = $i;
		$this->name = $n;
	}

	public static function obtTipoInmueble()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idTipoInmueble as id, tipoInmueble as nombre from tipoinmueble');
		$req->execute();
		foreach($req->fetchAll() as $tip)
		{
			$v[] = new Corto($tip['id'], $tip['nombre']);
		}
		return $v;
	}

	public static function obtEstado()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idEstado as id, estado as nombre from estado');
		$req->execute();
		foreach($req->fetchAll() as $tip)
		{
			$v[] = new Corto($tip['id'], $tip['nombre']);
		}
		return $v;
	}

	public static function obtMunicipio()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idMunicipio as id, municipio as nombre from municipio');
		$req->execute();
		foreach($req->fetchAll() as $tip)
		{
			$v[] = new Corto($tip['id'], $tip['nombre']);
		}
		return $v;
	}

	public static function obtEstatus()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idEstatus as id, estatus as nombre from estatus');
		$req->execute();
		foreach($req->fetchAll() as $tip)
		{
			$v[] = new Corto($tip['id'], $tip['nombre']);
		}
		return $v;
	}

	public static function obtStat()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idStat as id, estatus as nombre from statinmueble');
		$req->execute();
		foreach($req->fetchAll() as $tip)
		{
			$v[] = new Corto($tip['id'], $tip['nombre']);
		}
		return $v;
	}


	public static function obtTipoUsuario()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idTipoUsuario as id, tipoUsuario as nombre from tipousuario');
		$req->execute();
		foreach($req->fetchAll() as $tip)
		{
			$v[] = new Corto($tip['id'], $tip['nombre']);
		}
		return $v;
	}


	public static function obtTransaccion()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idTransaccion as id, transaccion as nombre from transaccion');
		$req->execute();
		foreach($req->fetchAll() as $tip)
		{
			$v[] = new Corto($tip['id'], $tip['nombre']);
		}
		return $v;
	}

	public static function actUbicacion($id, $val)
	{
		$db = Db::getInstace();
		$req = $db->prepare('UPDATE ubicacion SET estado = :val WHERE idEstado = :id');
		$req->execute(array('val' => $val, 'id' => $id));
	}

	public static function actEstado($id, $val)
	{
		$db = Db::getInstace();
		$req = $db->prepare('UPDATE estado SET estado = :val WHERE idEstado = :id');
		$req->execute(array('val' => $val, 'id' => $id));
	}

	public static function actMunicipio($id, $val)
	{
		$db = Db::getInstace();
		$req = $db->prepare('UPDATE municipio SET municipio = :val WHERE idMunicipio = :id');
		$req->execute(array('val' => $val, 'id' => $id));
	}

	public static function imgUnica($id)
	{
		$db = Db::getInstance();
		$req = $db->prepare('SELECT rinmueblefoto.foto from rinmueblefoto WHERE idInmueble = :id limit 1');
		$req->execute(array('id' => $id));
		return $req->fetch();
	}

	public static function agrEstado($est)
	{
		$db = Db::getInstance();
		$req = $db->prepare('INSERT INTO estado(estado), VALUES(:est)');
		$req->execute(array(':est' => $est));
	}

	public static function agrMunicipio($mun)
	{
		$db = Db::getInstance();
		$req = $db->prepare('INSERT INTO municipio(municipio), VALUES(:mun)');
		$req->execute(array(':mun' => $mun));
	}

}


?>