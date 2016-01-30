<!DOCTYPE html>
<html>
<head>
	<base href="/Git/inmobiliaria/app/">
	<title>Administracion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body>
	<div class="container">
		<br>
		<br>
		<div class="text-center panel panel-default">
			<div class="panel-heading">
				Login
			</div>
			<form class="panel-body" action="admin/validar" method="post">
			  <div class="form-group">
			    <label for="user">Usuario</label>
			    <input type="text" class="form-control" id="user" placeholder="Usuario" name="user">
			  </div>
			  <div class="form-group">
			    <label for="pass">Contraseña</label>
			    <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass">
			  </div>
			  <button type="submit" class="btn btn-default">Entrar</button>
			</form>
		</div>
	</div>




	<script type="text/javascript" src="assets/js/jquery-1.7.1.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>