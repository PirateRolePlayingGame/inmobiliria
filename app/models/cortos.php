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
}


?>