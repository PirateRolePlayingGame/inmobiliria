<!DOCTYPE html>
<html>
<head>
	<!-- Base Samuel! -->
	<base href="/Git/inmobiliaria/app/">

	<!-- Base Victor! -->
	<!-- <base href="/git/GitHub/inmobiliaria/app/">  -->
	
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"/>
</head>
<body>


	<div class="container-fluid">
		<div class="row">
			<?php include("menuAdmin.php"); ?>
		</div>
	</div>
	<div class="container">
		<br>
		<br>

		<?php include("tableH.php"); ?>
		<?php 
			Dibujo::tableOnlyHeader($tabla);
		?>

	</div>




	

	
		<!-- Scripts -->
		
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.1/js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.1/js/buttons.bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/select/1.1.0/js/dataTables.select.min.js"></script>
	<script type="text/javascript" src="assets/js/jquery.jeditable.js"></script>
	<script type="text/javascript" src="assets/js/jquery.datePicker.js"></script>

	<script type="text/javascript" src="assets/CustomJS/ajaxController.js"></script>
</body>
</html>