<?php

class MainController{
	public function main(){
		require_once('/views/' . GC::$lang . "/bootstrapDashboardTemplate/index.html");
		// var_dump(GC::$controller);
		// var_dump(GC::$action);
	}
}

?>
