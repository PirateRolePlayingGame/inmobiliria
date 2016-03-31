<?php
	
class Landing
{
	public $id;
	public $nombre;
	public $img;

	public function __construct($i, $nom, $im)
	{
		$this->id = $i;
		$this->nombre = $nom;
		$this->img = $im;
	}

	public static function obtLanding()  //Controlador que determine la cantidad de objetos landing en la pagina (rquao y lquao)
	{
		$v = array();
		$db = Db::getInstance();

		$req = $db->prepare('SELECT idInmueble, nombre from inmueble WHERE idStat = 1 ORDER BY idInmueble desc');
		$req->execute();
		foreach($req->fetchAll() as $itm)
		{
			$req2 = $db->prepare('SELECT foto from rinmueblefoto WHERE idInmueble = :id limit 1');
			$req2->execute(array(':id' => $itm['idInmueble']));
			$img = $req2->fetch();
			$v[] = new Landing($itm['idInmueble'], $itm['nombre'], $img['foto']);
		}
		return $v;
	}

	public static function landingFiltro($fil, $tip)
	{
		$v = array();
		$db = Db::getInstance();

		switch($tip)
		{
			case 1:
				$req = $db->prepare('SELECT idInmueble, nombre from inmueble WHERE idTipoInmueble = :fil and idStat = 1 ORDER BY idInmueble desc');
				$req->execute(array(':fil' => $fil));
				foreach($req->fetchAll() as $itm)
				{
					$req2 = $db->prepare('SELECT foto from rinmueblefoto WHERE idInmueble = :id limit 1');
					$req2->execute(array(':id' => $itm['idInmueble']));
					$img = $req2->fetch();
					$v[] = new Landing($itm['idInmueble'], $itm['nombre'], $img['foto']);
				}
			break;

			case 2:
				$req = $db->prepare('SELECT idInmueble, nombre from inmueble WHERE idTransaccion = :fil and idStat = 1 ORDER BY idInmueble desc');
				$req->execute(array(':fil' => $fil));
				foreach($req->fetchAll() as $itm)
				{
					$req2 = $db->prepare('SELECT foto from rinmueblefoto WHERE idInmueble = :id limit 1');
					$req2->execute(array(':id' => $itm['idInmueble']));
					$img = $req2->fetch();
					$v[] = new Landing($itm['idInmueble'], $itm['nombre'], $img['foto']);
				}
			break;

			case 3:
				$req = $db->prepare('SELECT idInmueble, nombre from inmueble INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio WHERE municipio.municipio = :fil ORDER BY idInmueble desc');
				$req->execute(array(':fil' => $fil));
				foreach($req->fetchAll() as $itm)
				{
					$req2 = $db->prepare('SELECT foto from rinmueblefoto WHERE idInmueble = :id limit 1');
					$req2->execute(array(':id' => $itm['idInmueble']));
					$img = $req2->fetch();
					$v[] = new Landing($itm['idInmueble'], $itm['nombre'], $img['foto']);
				}
			break;
		}
		return $v;
		
	}

	public static function contar($tip, $fil)
	{
		$db = Db::getInstance();
		$req = $db->prepare('SELECT count(*) as num from inmueble WHERE ' .$tip.' = :fil and idStat = 1');
		$req->execute(array(':fil' => $fil));

		return $req->fetch()['num'];
	}
}
?>