<?
class Tabla 
{
	public static function crearAuditoria()
	{
		$tabla = Auditoria::obtAuditorias();
		require_once('/views/' . GVC::$lang . "/sistema/panel.php");
	}

	public static function crearUsuarios()
	{
		$tabla = Usuario::obtenerUsuarios();
		require_once('/views/' . GVC::$lang . "/sistema/panel.php");
	}
}	 
?>