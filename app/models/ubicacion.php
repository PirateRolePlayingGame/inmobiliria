<?php

class Ubicacion
{
	public $id;
	public $estado;
	public $municipio;
	public $direccion;


	public function __construct($i, $est, $mun, $dir)
	{
		$this->id = $i;
		$this->estado = $est;
		$this->municipio = $mun;
		$this->direccion = $dir;
	}

	public static function obtUbicacion()
	{
		$V = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT ubicacion.idUbicacion as Id, ubicacion.direccion as Direccion, estado.estado as Estado, 
							municipio.municipio as Municipio
							from ubicacion
							INNER JOIN estado on ubicacion.idEstado = estado.idEstado
							INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio');
		foreach($req->fetchAll() as $a)
		{
			$V[] = new Ubicacion($a['Id'], $a['Estado'], $a['Municipio'], $a['Direccion']);
		}
		return $V;
	}

	public static function actUbicacionInmueble($idInmueble, $val, $toUpd, $table)
	{
		$db = Db::getInstance();

		$idUbicacion = Inmueble::obtIdUbicacion($idInmueble);

		$req = $db->prepare('UPDATE ubicacion SET ' . $toUpd . ' = :val WHERE idUbicacion = :id');
		$req->execute(array('val' => $val, 'id' => $idUbicacion));

		$req = $db->prepare('SELECT ubicacion.idMunicipio as municipio, ubicacion.idEstado as estado
							 FROM ubicacion WHERE idUbicacion = :id');
		$req->execute(array('id' => $idUbicacion));
		
		switch($table){
			case 'municipio':
				$idRet = $req->fetch()['municipio'];
				$req2 = $db->prepare('SELECT municipio.municipio as municipio
									  FROM municipio WHERE idMunicipio = :id');
				$req2->execute(array('id' => $idRet));
				return $req2->fetch()['municipio'];
				break;
			case 'estado':
				$idRet = $req->fetch()['estado'];
				$req2 = $db->prepare('SELECT estado.estado as estado
									  FROM estado WHERE idMunicipio = :id');
				$req2->execute(array('id' => $idRet));
				return $req2->fetch()['estado'];
				break;
		}
		return 'Error';
	}

	
	public static function agrUbicacion($ide, $idm, $dir)
	{
		$db = Db::getInstance();
		
		$req = $db->prepare('INSERT into ubicacion(idEstado, idMunicipio, direccion) values(:ide, :idm, :dir)');
		$req->execute(array(':ide' => $ide, ':idm' => $idm, ':dir' => $dir));
	}

	//Falta agregar y eliminar
}

?>