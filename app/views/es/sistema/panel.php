<!DOCTYPE html>
<html>
<head>
	<base href="assets/">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
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

		<?php include("../../../controllers/AdminController.php"); ?>
		<?php include("tableH.php"); ?>
		<?php ?>

	</div>




	

	
		<!-- Scripts -->
		<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" language="javascript" src="js/dataTables.bootstrap.js"></script>
		
		<script src="https:://code.jquery.com/jquery-1.12.0.min.js"></script>
		<script src="https:://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		
		<script type="text/javascript">
			$(document).ready(function(){
				$("a.eliminar_dato").click( function(e) {
					e.preventDefault();
					var url = this.href;
					var titulo = this.title;
					jConfirm(titulo,'Accion !!', function(r) {
						if (r) 
						location.href = url;
					});
				});
			});
		</script>

		<script type="text/javascript" charset="utf-8">
			$(document).ready(function(){
				 $('#example').dataTable({
					 //ordering: false, me elimina el ordenamiento y la funcion de ordenar al darle clicl a los encabezados
					   "order": [[ 0, "desc" ]],
					"language": {
						"sProcessing":   "Procesando...",
						"sLengthMenu":   "Mostrar _MENU_ registros",
						"sZeroRecords":  "No se encontraron resultados",
						"sInfo":         "Mostrando desde _START_ hasta _END_ de _TOTAL_ registros",
						"sInfoEmpty":    "Mostrando desde 0 hasta 0 de 0 registros",
						"sInfoFiltered": "(filtrado de _MAX_ registros en total)",
						"sInfoPostFix":  "",
						"sSearch":       "Buscar:",
						"sUrl":          "",
						"oPaginate": {
							"sFirst":    "Primero",
							"sPrevious": "Anterior",
							"sNext":     "Siguiente",
							"sLast":     "Último"
						}
					}
				});
			});
		</script>
</body>
</html>