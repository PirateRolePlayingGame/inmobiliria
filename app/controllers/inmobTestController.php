<?php

class InmobiliariaTestController{
	public function test(){
		print '<br>' . 'probando modulo de inmobiliaria' . '<br>';
		var_dump(Inmueble::obtInmueble());
	}
}

?>
