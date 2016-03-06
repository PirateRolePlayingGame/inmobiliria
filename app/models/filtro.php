<?php

class FiltroInm
{
	public $id;
	public $idu;
	public $nomb;
	public $foto;
	public $tipo;
	public $municipio;
	public $transaccion;

	public function __construct($i, $iu, $nom, $fot, $tip, $mun, $trans)
	{
		$this->id = $i;
		$this->idu = $iu;
		$this->nomb = $nom;
		$this->foto = $fot;
		$this->tipo = $tip;
		$this->municipio = $mun;
		$this->transaccion = $trans;
	}

	public static function obtMunicipio($idf)
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT inmueble.idInmueble as id, inmueble.idUbicacion as ubicacion, inmueble.nombre as nombre, rinmueblefoto.foto as 						foto, tipoinmueble.tipoInmueble as tipo, municipio.municipio as municipio, transaccion.transaccion as transaccion 
								FROM inmueble 
								INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion
								INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio
								INNER JOIN rinmueblefoto on inmueble.idInmueble = rinmueblefoto.idInmueble
								INNER JOIN tipoinmueble on inmueble.idTipoInmueble = tipoinmueble.idTipoInmueble
								INNER JOIN transaccion on inmueble.idTransaccion = transaccion.idTransaccion
								WHERE municipio.idMunicipio = :idf'); 
		$req->execute(array(':idf' => $idf));
		foreach($req->fetchAll() as $fil)
		{
			$v[] = new FiltroInm($fil['id'], $fil['ubicacion'], $fil['nombre'], $fil['foto'], $fil['tipo'], $fil['municipio'], $fil['transaccion']);
		}
		return $v;
	}

	public static function obtTransaccion($idf)
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT inmueble.idInmueble as id, inmueble.idUbicacion as ubicacion, inmueble.nombre as nombre, rinmueblefoto.foto as 						foto, tipoinmueble.tipoInmueble as tipo, municipio.municipio as municipio, transaccion.transaccion as transaccion 
								FROM inmueble 
								INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion
								INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio
								INNER JOIN rinmueblefoto on inmueble.idInmueble = rinmueblefoto.idInmueble
								INNER JOIN tipoinmueble on inmueble.idTipoInmueble = tipoinmueble.idTipoInmueble
								INNER JOIN transaccion on inmueble.idTransaccion = transaccion.idTransaccion
								WHERE transaccion.idTransaccion = :idf'); 
		$req->execute(array(':idf' => $idf));
		foreach($req->fetchAll() as $fil)
		{
			$v[] = new FiltroInm($fil['id'], $fil['ubicacion'], $fil['nombre'], $fil['foto'], $fil['tipo'], $fil['municipio'], $fil['transaccion']);
		}
		return $v;
	}


	public static function obtTipo($idf)
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT inmueble.idInmueble as id, inmueble.idUbicacion as ubicacion, inmueble.nombre as nombre, rinmueblefoto.foto as 						foto, tipoinmueble.tipoInmueble as tipo, municipio.municipio as municipio, transaccion.transaccion as transaccion 
								FROM inmueble 
								INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion
								INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio
								INNER JOIN rinmueblefoto on inmueble.idInmueble = rinmueblefoto.idInmueble
								INNER JOIN tipoinmueble on inmueble.idTipoInmueble = tipoinmueble.idTipoInmueble
								INNER JOIN transaccion on inmueble.idTransaccion = transaccion.idTransaccion
								WHERE tipoinmueble.idTipoInmueble = :idf'); 
		$req->execute(array(':idf' => $idf));
		foreach($req->fetchAll() as $fil)
		{
			$v[] = new FiltroInm($fil['id'], $fil['ubicacion'], $fil['nombre'], $fil['foto'], $fil['tipo'], $fil['municipio'], $fil['transaccion']);
		}
		return $v;
	}
}

?>