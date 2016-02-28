<?php

class InmobiliariaTestController{
	public function test(){
		print '<br>' . 'probando modulo de inmobiliaria' . '<br>';
		Inmueble::agrImagenes(2);
	}
}

?>
