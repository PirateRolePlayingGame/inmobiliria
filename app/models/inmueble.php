<?php
	
class Inmueble
{
	public $id;
	public $estatus;
	public $tipoInmueble;
	public $transaccion;
	public $ubicacion;
	public $nombre;
	public $baños;
	public $habitaciones;
	public $metros;
	public $precio;
	public $estacionamiento;
	public $tlf;
	public $codigo;
	public $descripcion;

	public function __construct($i, $est, $tipoIn, $trans, $ubc, $nom, $ba, $hab, $met, $prec, $est, $tl, $cod, $desc)
	{
		$this->id = $i;
		$this->estatus = $est;
		$this->tipoInmueble = $tipoIn;
		$this->transaccion = $trans;
		$this->ubicacion = $ubc;
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

		$req = $db->prepare('SELECT inmueble.idInmueble as id, inmueble.nombre as nombre, inmueble.nBaños as Nr Baños,
								inmueble.nHabitaciones as Nr Habitaciones, inmueble.metros as Metros, inmueble.precio as precio
								inmueble.nEstacionamiento as Estacionamiento, inmueble.tlfDueño as Telefono, inmueble.codigo as codigo,
								inmueble.descripcion as descripcion, estatus.nombre as estatus, '); 
	}
} 

?>