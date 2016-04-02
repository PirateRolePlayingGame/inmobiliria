<?php
	class Modal
	{
		public $id;
		public $nombre;

		public function __construct($i, $nom)
		{
			$this->id = $i;
			$this->nombre = $nom;
		}

		public static function obtModal($head)
		{
			switch($head)
			{
				case "usuarios":
					$v = new Modal("#form_us", "Agregar Usuario");
				break;

				case "inmuebles":
					$v = new Modal("#form_in", "Agregar Inmueble");
				break;

				case "estados":
					$v = new Modal("#form_es", "Agregar Estado");
				break;

				/*case auditorias:
					$v = new Modal("", "");
				break;*/

				case "municipios":
					$v = new Modal("#form_mu", "Agregar Municipio");
				break;
			}
			return $v;
		}
	}
?>