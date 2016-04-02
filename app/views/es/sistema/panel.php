<!DOCTYPE html>
<html>
<head>
	<!-- Base Samuel! -->
	<!-- <base href="/Git/inmobiliaria/app/"> -->

	<!-- Base Victor! -->
	<base href="/git/GitHub/inmobiliaria/app/"> 
	
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fancyapps-fancyBox-18d1712/source/jquery.fancybox.css" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/css/userPicture.css">
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<?php $_SESSION['tipoUsuario'] == 1 ? include("menuAdmin.php") : include("menuUser.php"); ?>
			<?php require('controllers/modalController.php'); ?>
		</div>
	</div>
	<div class="text-center"> 
		<?php 
			if($_GET['action'] != "auditorias")
			{ 
				$v = Modal::obtModal(GC::$action);
				?>
				<a class="btn btn-success" data-toggle="modal" href="<?php print $v->id; ?>">
       				<?php print $v->nombre; ?>
        		</a> <?php
			}
		?>
	</div>
	<div class="container">
		
		<br>
		<br>
		<div class="row">
			<?php include("tableH.php"); ?>
			<?php 
				Dibujo::tableOnlyHeader($tabla);
			?>
		</div>
	</div>
	
	
	<!-- Scripts -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
	<!-- <script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/lib/jquery-1.10.1.min.js"></script> -->
	<!-- <script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/lib/jquery-1.9.0.min.js"></script> -->
	<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script> -->
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script> -->
	<!-- <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script> -->

	<script type="text/javascript" src="assets/js/jquery.jeditable.js"></script>
	<script type="text/javascript" src="assets/CustomJS/ajaxController.js"></script>
	
	<script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/source/jquery.fancybox.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#image-viewer").fancybox({
				openEffect        : 'elastic',
	            closeEffect       : 'elastic',
		        width             : '80%',
		        height            : '80%',
		        transitionIn      : 'fade',
		        transitionOut     : 'fade',
		        type              : 'iframe',
		        closeBtn          : true
			});

			$("#image-viewer2").fancybox({
				openEffect        : 'elastic',
	            closeEffect       : 'elastic',
		        width             : '40%',
		        height            : '80%',
		        transitionIn      : 'fade',
		        transitionOut     : 'fade',
		        type              : 'iframe',
		        closeBtn          : true
			});
		});
	</script>
	<?php include("views/es/Formulario/form.php"); ?>
</body>
</html>