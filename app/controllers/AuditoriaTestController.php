<?php

class AuditoriaTestController{
	public static function test(){
		echo 'testing user module';
		var_dump(Auditoria::obtAuditorias());
	}
}

?>