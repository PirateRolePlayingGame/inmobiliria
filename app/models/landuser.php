<?php
class landUser
{
	public $nombre;
	public $correo;
	public $telefono;
	public $foto;


	public function __construct($nom, $cor, $tlf, $fo)
	{
		$this->nombre = $nom;
		$this->correo = $cor;
		$this->telefono = $tlf;
		$this->foto = $fo;
	}


	public static function landingUsers()
	{
		$v = array();
		$db = Db::getInstance();

		$req = $db->prepare('SELECT correo, telefono, nombre, foto from usuario WHERE idEstatus = 1 ORDER BY rand()');
		$req->execute();
		foreach($req->fetchAll() as $itm)
		{
			$v[] = new landUser($itm['nombre'], $itm['correo'], $itm['telefono'], $itm['foto']);
		}
		return $v;
	}
}
?>