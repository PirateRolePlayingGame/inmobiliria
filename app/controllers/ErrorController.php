<?php

class ErrorController{
	public function _404(){
		require_once('/views/' . GC::$lang . "/Error/error404.html");
	}
}

?>