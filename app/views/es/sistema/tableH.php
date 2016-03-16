<?php

class Dibujo
{
	public static function tableM($v)
	{
		echo "<div class='table-responsive'>";
		echo "<table id='data-table' class='table table-bordered well'>";

		echo "<thead>";
		echo "<tr class='text-center'>";
		foreach($v[0] as $key => $value)
		{
			print "<td>$key</td>";
		}
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach($v as $object)
		{
			echo "<tr class='text-center'>";
			foreach($object as $key => $value)
			{
				echo "<td> $value </td>";
			}
			echo "</tr>";
		}
		echo "</tbody>";
		echo "</table>";
		echo "</div>";
	}

	public static function tableOnlyHeader($v)
	{
		echo "<div class='table-responsive'>";
		echo "<table id='data-table' class='table table-striped table-bordered dt-responsive nowrap' cellspacing='0' width='100%''>";

		echo "<thead>";
		echo "<tr class='text-center'>";
		foreach($v[0] as $key => $value)
		{
			print "<td>$key</td>";
		}
		if(GC::$action == 'inmuebles'){
			print "<td>Imagenes</td>";
		}
		echo "</tr>";
		echo "</thead>";
		echo "</table>";
		echo "</div>";
	}

	/*	public static function aud($tabla)
	{
		echo "<table id='data-table'>";

		echo "<thead>";
		echo "<tr>";
		echo "<td> Id </td>";
		echo "<td> Usuario </td>";
		echo "<td> Inmueble </td>";
		echo "<td> Actividad </td>";
		echo "<td> Fecha </td>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach($tabla as $ta)
		{
			echo "<tr>";
			echo "<td> $ta->id </td>";
			echo "<td> $ta->usuario </td>";
			echo "<td> $ta->codigo </td>";
			echo "<td> $ta->actividad </td>";
			echo "<td> $ta->fecha </td>";
			echo "</tr>";
		}
		echo "</tbody>";	
		echo "</table>";
	}

	public static function usr($tabla)
	{
		echo "<table id='data-table'>";
		echo "<thead>";
		echo "<tr>";
		echo "<td> Id </td>";
		echo "<td> Estatus </td>";
		echo "<td> Nombre de Usuario </td>";
		echo "<td> Nombre personal </td>";
		echo "<td> Telefono </td>";
		echo "<td> Correo </td>";
		echo "<td> Fecha entrada</td>";
		echo "<td> Fecha salida</td>";
		echo "</tr>";
		echo "</thead>";
		echo "<tbody>";
		foreach($tabla as $ta)
		{
			echo "<tr>";
			echo "<td> $ta->id </td>";
			echo "<td> $ta->estatus </td>";
			echo "<td> $ta->userName </td>";
			echo "<td> $ta->nombre </td>";
			echo "<td> $ta->telefono </td>";
			echo "<td> $ta->correo </td>";
			echo "<td> $ta->fechaEntrada </td>";
			echo "<td> $ta->fechaSalida </td>";
			echo "</tr>";
		}	
		echo "</tbody>";
		echo "</table>";
	}
*/
	
}
?>