<?php
	function call($c, $a){
		require_once('/controllers/' . $c . 'Controller.php');

		switch($c){
			case 'main':
				$c = new MainController();
				break;
			case 'admin':
				require_once('/models/heroes.php');
				$c = new HeroesController();
				break;
			case 'userTest':
				require_once('/models/usuario.php');
				$c = new UserTestController();
				break;
			case 'auditoriaTest':
				require_once('/models/auditoria.php');
				$c = new AuditoriaTestController();
				break;
		}

		$c->{$a}();
	}

	//LLenar con controladores y acciones validas
	$controllers = array('main' 	=> ['main', 'error'],
						 'admin' 	=> ['showAll', 'show'],
						 'userTest' 	=> ['test']
						 );

	//Lenguajes validos
	$langs = array('es');

	if(!in_array(GC::$lang, $langs)){
		call('main', 'error');
	}

	if(array_key_exists(GC::$controller, $controllers)){
		if(in_array(GC::$action, $controllers[GC::$controller])){
			call(GC::$controller, GC::$action);
		}else{
			call('main', 'error');
		}
	}else{
		call('main', 'error');
	}

?>