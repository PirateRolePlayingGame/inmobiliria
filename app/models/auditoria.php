<?php
class auditoria
{
	public $actividad;
	public $usuario;
	public $fecha;
	public $codigo;


	public function __construct($act, $us, $fec, $cod)
	{
		$this->actividad = $act;
		$this->usuario = $us;
		$this->fecha = $fec;
		$this->codigo = $cod; 
	}

	public static function obtAuditorias()
	{
		$V = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * from auditoria');

		foreach($req->fetchAll() as $a)
		{
			$V[] = new auditoria($a['actividad'], $a['idUsuario'], $a['fecha'], $a['idInmueble']);
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