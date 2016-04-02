<?php
class Auditoria
{

	public $id;
	public $idUsuario;
	public $actividad;
	public $usuario;
	public $fecha;
	public $codigo;
	

	public function __construct($act, $us, $fec, $cod, $idu, $ida)
	{
		$this->actividad = $act;
		$this->usuario = $us;
		$this->fecha = $fec;
		$this->codigo = $cod;
		$this->id = $ida;
		$this->idUsuario = $idu;
	}

	public static function obtAuditorias()
	{
		$V = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT idAuditoria as Id, usuario.idUsuario as idU, usuario.nombre as nombre, inmueble.codigo as codigo, actividad, fecha 
							from auditoria 
							INNER JOIN inmueble on auditoria.idInmueble = inmueble.idInmueble 
							INNER JOIN usuario on auditoria.idUsuario = usuario.idUsuario ORDER BY idAuditoria DESC');

		foreach($req->fetchAll() as $a)
		{
			$V[] = new Auditoria($a['actividad'], $a['nombre'], $a['fecha'], $a['codigo'], $a['idU'], $a['Id']);
		}
		return $V;
	}

	public static function agrAuditoria($idUsuario, $idInmueble, $cambio)
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$req = $db->prepare('INSERT into auditoria(idUsuario, idInmueble, actividad, fecha) Values(:idu, :idinm, :actv, :fec)');
		$req->execute(array(':idu' => $idUsuario, ':idinm' => $idInmueble, ':actv' => $cambio, ':fec' => $fecha));
	}

	public static function agrInmueble($idu, $idinm)
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$req = $db->prepare('INSERT into auditoria(idUsuario, idInmueble, actividad, fecha) Values(:idu, :idinm, "Agregó", :fec)');
		$req->execute(array(':idu' => $idu, ':idinm' => $idinm, ':fec' => $fecha));
	}

	public static function modInmueble($idu, $idinm, $i, $viejo, $nuevo) //Al modificar, se debe buscar el # relacionado con la columna que se modifico. Ese es $i.
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$req = $db->prepare('INSERT into auditoria(idUsuario, idInmueble, actividad, fecha) Values(:idu, :$idinm, "Modificó el :i de :viejo a :nuevo", :fec)');
		$req->execute(array(':idu' => $idu, ':idinm' => $idinm, ':i' => $i, ':viejo' => $viejo, ':nuevo' => $nuevo, ':fec' => $fecha));
	}

	public static function inhInmueble($idu, $idinm)
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$req = $db->prepare('INSERT into auditoria(idUsuario, idInmueble, actividad, fecha) Values(:idu, :idinm, "Inhabilitó el inmueble", :fec)');
		$req->execute(array(':idu' => $idu, ':idinm' => $idinm, ':fec' => $fecha));
	}
} 
?>