<?php

class Ubicacion
{
	public $id
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

	public static function actUbicacion($id, $val)
	{
		$db = Db::getInstace();
		$req = $db->prepare('UPDATE ubicacion SET direccion = :val WHERE idUbicacion = :id');
		$req->execute(array('val' => $val, 'id' => $id));
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