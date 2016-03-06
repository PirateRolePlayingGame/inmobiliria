<?php 
class Filter
{
	public static function inmFilter($fil, $id)
	{
		include(__DIR__ . '/../models/filtro.php');
		switch($fil)
		{
			case "tipo":
				$v = obtTipo($idf);
			break;

			case "municipio":
				$v = obtMunicipio($idf);
			break;

			case "transaccion":
				$v = obtTransaccion($idf);
			break;
		}
	}	
}


?>