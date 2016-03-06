<?php 
class Filter
{
	public static function inmFilter($fil, $id)
	{
		include(__DIR__ . '/../models/filtro.php');
		include(__DIR__ . '/../models/cortos.php');
		switch($fil)
		{
			case "tipo":
				$v = obtTipo($idf);
				$img = imgUnica($v->id);
			break;

			case "municipio":
				$v = obtMunicipio($idf);
				$img = imgUnica($v->id);
			break;

			case "transaccion":
				$v = obtTransaccion($idf);
				$img = imgUnica($v->id);
			break;
		}
	}	
}


?>