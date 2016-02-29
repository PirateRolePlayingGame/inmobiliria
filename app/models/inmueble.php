<?php
	
class Inmueble
{
	public $id;
	public $status;
	public $tipoInmueble;
	public $transaccion;
	public $ubicacion;
	public $municipio;
	public $estado;
	public $nombre;
	public $baños;
	public $habitaciones;
	public $metros;
	public $precio;
	public $estacionamiento;
	public $tlf;
	public $codigo;
	public $descripcion;

	public function __construct($i, $est, $tipoIn, $trans, $ubc, $mun, $estad, $nom, $ba, $hab, $met, $prec, $est, $tl, $cod, $desc)
	{
		$this->id = $i;
		$this->status = $st;
		$this->tipoInmueble = $tipoIn;
		$this->transaccion = $trans;
		$this->ubicacion = $ubc;
		$this->municipio = $mun;
		$this->estado = $estad;
		$this->nombre = $nom;
		$this->baños = $ba;
		$this->habitaciones = $hab;
		$this->metros = $met;
		$this->precio = $prec;
		$this->estacionamiento = $est;
		$this->tlf = $tl;
		$this->codigo = $cod;
		$this->descripcion = $desc;
	}

	public static function obtInmueble()
	{
		$v = [];
		$db = Db::getInstance();

		$req = $db->prepare('SELECT inmueble.idInmueble as Id, inmueble.nombre as Nombre, inmueble.nBaños as NrBaños,
								inmueble.nHabitaciones as NrHabitaciones, inmueble.metros as Metros, inmueble.precio as Precio,
								inmueble.nEstacionamiento as Estacionamiento, inmueble.tlfDueño as Telefono, inmueble.codigo as Codigo,
								inmueble.descripcion as Descripcion, statinmueble.estatus as Estatus, tipoinmueble.tipoInmueble as Tipo, 
								transaccion.transaccion as Transaccion, ubicacion.direccion as Direccion, municipio.municipio as Municipio,
								estado.estado as Estado
								from inmueble 
								INNER JOIN statinmueble on inmueble.idStat = statinmueble.idStat
								INNER JOIN tipoinmueble on inmueble.idTipoInmueble = tipoinmueble.idTipoInmueble
								INNER JOIN transaccion on inmueble.idTransaccion = transaccion.idTransaccion
								INNER JOIN ubicacion on inmueble.idUbicacion = ubicacion.idUbicacion
								INNER JOIN municipio on ubicacion.idMunicipio = municipio.idMunicipio
								INNER JOIN estado on ubicacion.idEstado = estado.idEstado'); 
		$req->execute();
		foreach($req->fetchAll() as $inm)
		{
			$v[] = new Inmueble($inm['Id'], $inm['Estatus'], $inm['Tipo'], $inm['Transaccion'], $inm['Direccion'], $inm['Municipio'], $inm['Estado'],
				$inm['Nombre'], $inm['NrBaños'], $inm['NrHabitaciones'], $inm['Metros'], $inm['Precio'], $inm['Estacionamiento'], $inm['Telefono'],
				$inm['Codigo'], $inm['Descripcion']);
		}
		return $v;
	}


	public static function obtImagenes($id)
	{
		$v = array();
		$db = Db::getInstance();
		$req = $db->prepare('SELECT rinmueblefoto.idRInmuebleFoto as Id, rinmueblefoto.foto as foto 
								from rinmueblefoto
								WHERE idInmueble = :id');
		$req->execute(array('id' => $id));
		foreach($req->fetchAll() as $img)
		{
			$v[] = $img['foto'];
		}
		return $v;
	}

	public static function agrImagenes($id)
	{
		$v = [];
		$db = Db::getInstance();
		$foto = "dummy";

		$req = $db->prepare('INSERT into rinmueblefoto(idInmueble, foto) values(:id, :foto)');
		$req->execute(array('id' => $id, 'foto' => $foto));
		$last = $db->lastInsertId();
		print "last = " . $last;

		$req = $db->prepare('UPDATE rinmueblefoto SET foto = :nombre WHERE idrinmueblefoto = :id');
		$req->execute(array('nombre' => ('f' . $last), 'id' => $last));
	}


	public static function elimInmueble($id)
	{
		// include(__DIR__ . '/auditoria.php');
		$db = Db::getInstance();
		$req = $db->prepare('UPDATE inmueble SET idStat = :est WHERE idInmueble = :id');
		$req->execute(array(':est' => 3, 'id' => $id));
	}
} 


//Generar año para el codigo:
		// $fecha = date('Y/m/d');
		// $ut = substr($fecha, 2, 2);
		// echo $ut;



?>