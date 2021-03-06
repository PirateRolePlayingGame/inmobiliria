<?php
	function call($c, $a){
		require_once('/controllers/' . $c . 'Controller.php');
		
		switch($c){
			case 'main':
				$c = new MainController();
				break;
			case 'admin':
				require_once('/models/usuario.php');
				require_once('/models/auditoria.php');
				require_once('/models/inmueble.php');
				require_once('/models/cortos.php');
				$c = new AdminController();
				break;
			case 'userTest':
				require_once('/models/usuario.php');
				$c = new UserTestController();
				break;
			case 'auditoriaTest':
				require_once('/models/auditoria.php');
				$c = new AuditoriaTestController();
				break;
			case 'inmobTest':
				require_once('/models/inmueble.php');
				$c = new InmobiliariaTestController();
				break;
			case 'error':
				$c = new ErrorController();
				break;
		}

		$c->{$a}();
	}

	//LLenar con controladores y acciones validas
	$controllers = array('main' 	          => ['main', 'error'],
						 'admin' 	          => ['auditorias', 'usuarios', 'login', 'validar', 'inmuebles',
						 						 'subirImagenInmueble', 'cerrar', 'addAction', 'cambiarImagenUsuario',
						 						 'borrarImagen', 'estados', 'municipios'],
						 'userTest' 	      => ['test'],
						 'auditoriaTest' 	  => ['test'],
						 'inmobTest'   	      => ['test'],
						 'error' 	          => ['_404']
						);

	//Lenguajes validos
	$langs = array('es');

	if(!in_array(GC::$lang, $langs)){
		call('error', '404');
	}

	if(array_key_exists(GC::$controller, $controllers)){
		if(in_array(GC::$action, $controllers[GC::$controller])){
			call(GC::$controller, GC::$action);
		}else{
			call('error', '_404');
		}
	}else{
		call('error', '_404');
	}

?>