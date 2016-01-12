<?php

class ubicacion
{
	public $estado;
	public $municipio;
	public $direccion;


	public function __construct($est, $mun, $dir)
	{
		$this->estado = $est;
		$this->municipio = $mun;
		$this->direccion = $dir;
	}

	public function obtUbicacion()
	{
		$V = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * from ubicacion');
		foreach($req->fetchAll() as $a)
		{
			$V[] = new ubicacion($a['idEstado'], $a['idMunicipio'], $a['direccion']);
		}
		return $V;
	}
	//Falta agregar y eliminar
}

?>