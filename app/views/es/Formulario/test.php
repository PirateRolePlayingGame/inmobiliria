<!DOCTYPE html>
<html>
<head>
	<title>TEST MODAL</title>
	<base href="/Git/inmobiliaria/app/">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<?php   
	include("../../../connection.php");
?>
        <div>
		<a class="btn btn-success" data-toggle="modal" href="#form_us">
        	       USUARIOS
                </a>

                <a class="btn btn-success" data-toggle="modal" href="#form_in">
                	 INMUEBLE
                </a>

                <a class="btn btn-success" data-toggle="modal" href="#form_es">
                	 ESTADOS
                </a>

                <a class="btn btn-success" data-toggle="modal" href="#form_mu">
                	 MUNICIPIOS
                </a>
        </div>

<?php include("form.php") ?>
</body>
</html>