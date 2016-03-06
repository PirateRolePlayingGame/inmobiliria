<?php

class FiltroInm
{
	public $id;
	public $idu;
	public $nomb;
	public $tipo;
	public $municipio;
	public $transaccion;

	public function __construct($i, $iu, $nom, $tip, $mun, $trans)
	{
		$this->id = $i;
		$this->idu = $iu;
		$this->nomb = $nom;
		$this->tipo = $tip;
		$this->municipio = $mun;
		$this->transaccion = $trans;
	}

	public static function obtMunicipio($idf)
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT inmueble.idInmueble as id, inmueble.idUbicacion as ubicacion, inmueble.nombre as nombre, tipoinmueble.tipoInmueble 						as tipo, municipio.municipio as municipio, transaccion.transaccion as transaccion 
								FROM inmueble 
								INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion
								INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio
								INNER JOIN tipoinmueble on inmueble.idTipoInmueble = tipoinmueble.idTipoInmueble
								INNER JOIN transaccion on inmueble.idTransaccion = transaccion.idTransaccion
								WHERE municipio.idMunicipio = :idf'); 
		$req->execute(array(':idf' => $idf));
		foreach($req->fetchAll() as $fil)
		{
			$v[] = new FiltroInm($fil['id'], $fil['ubicacion'], $fil['nombre'], $fil['tipo'], $fil['municipio'], $fil['transaccion']);
		}
		return $v;
	}

	public static function obtTransaccion($idf)
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT inmueble.idInmueble as id, inmueble.idUbicacion as ubicacion, inmueble.nombre as nombre,  tipoinmueble.tipoInmueble as tipo, municipio.municipio as municipio, transaccion.transaccion as transaccion 
								FROM inmueble 
								INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion
								INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio
								INNER JOIN tipoinmueble on inmueble.idTipoInmueble = tipoinmueble.idTipoInmueble
								INNER JOIN transaccion on inmueble.idTransaccion = transaccion.idTransaccion
								WHERE transaccion.idTransaccion = :idf'); 
		$req->execute(array(':idf' => $idf));
		foreach($req->fetchAll() as $fil)
		{
			$v[] = new FiltroInm($fil['id'], $fil['ubicacion'], $fil['nombre'], $fil['tipo'], $fil['municipio'], $fil['transaccion']);
		}
		return $v;
	}


	public static function obtTipo($idf)
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT inmueble.idInmueble as id, inmueble.idUbicacion as ubicacion, inmueble.nombre as nombre, tipoinmueble.tipoInmueble as tipo, municipio.municipio as municipio, transaccion.transaccion as transaccion 
								FROM inmueble 
								INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion
								INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio
								INNER JOIN tipoinmueble on inmueble.idTipoInmueble = tipoinmueble.idTipoInmueble
								INNER JOIN transaccion on inmueble.idTransaccion = transaccion.idTransaccion
								WHERE tipoinmueble.idTipoInmueble = :idf'); 
		$req->execute(array(':idf' => $idf));
		foreach($req->fetchAll() as $fil)
		{
			$v[] = new FiltroInm($fil['id'], $fil['ubicacion'], $fil['nombre'], $fil['tipo'], $fil['municipio'], $fil['transaccion']);
		}
		return $v;
	}
}

?>