<?php
class AdminController 
{
	public function auditorias()
	{
		$tabla = Auditoria::obtAuditorias();
		require_once('/views/' . GC::$lang . "/sistema/panel.php");
	}

	public function usuarios()
	{
		$tabla = Usuario::obtenerUsuarios();
		require_once('/views/' . GC::$lang . "/sistema/panel.php");
	}
}	 
?>