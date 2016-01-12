<?php
class auditoria
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
		$req = $db->query('SELECT idAuditoria as Id, auditoria.idUsuario as idU, usuario.nombre as nombre, inmueble.codigo as codigo, actividad, fecha from auditoria 
			INNER JOIN inmueble on auditoria.idInmueble = inmueble.idInmueble 
			INNER JOIN usuario on auditoria.idUsuario = usuario.idUsuario;');

		foreach($req->fetchAll() as $a)
		{
			$V[] = new auditoria($a['actividad'], $a['nombre'], $a['fecha'], $a['codigo'], $a['idUsuario'], $a['Id']);
		}
		return $V;
	}

	public static function agrAuditoria($idu, $idinm, $var)
	{
		$db = Db::getInstance();
		$this->{$var}($idu, $idinm, $i, $viejo);    //cuidado
	}

	public static function agrInmueble($idu, $idinm)
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$db->query('INSERT into auditoria(idUsuario, idInmueble, actividad, fecha) Values("$idu", "$idinm", "Agregó", "$fecha")');

	}

	public static function modInmueble($idu, $idinm, $i, $viejo) //Al modificar, se debe buscar el # relacionado con la columna que se modifico. Ese es $i.
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$inf = $db->query('SHOW COLUMNS from inmueble');
		$inf = $inf->fetchAll();
		$db->query('INSERT into auditoria(idUsuario, idInmueble, actividad, fecha) Values("$idu", "$idinm", "Modificó el "$i" de "$viejo"", "$fecha")');
		//Falta terminar de formatear.
	}

	public static function inhInmueble($idu, $idinm)
	{
		$db = Db::getInstance();
		$fecha = date('Y/m/d');
		$db->query('INSERT into auditoria(idUsuario, idInmueble, actividad, fecha) Values("$idu", "$idinm", "Inhabilitó", "$fecha")');

	}

} 
?>