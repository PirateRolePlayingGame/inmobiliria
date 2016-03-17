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

		$req = $db->prepare('SELECT idInmueble, nombre from inmueble ORDER BY idInmueble desc');
		$req->execute();
		foreach($req->fetchAll() as $itm)
		{
			$req2 = $db->prepare('SELECT foto from rinmueblefoto WHERE idInmueble = :id limit 1');
			$req2->execute(array(':id' => $itm['idInmueble']));
			$img = $req2->fetch();
			$v[] = new Landing($itm['idInmueble'], $itm['nombre'], $img);
		}
		return $v;
	}
}
?>