<!DOCTYPE html>
<html>
<head>
	<!-- Base Samuel! -->
	<!-- <base href="/Git/inmobiliaria/app/"> -->

	<!-- Base Victor! -->
	<base href="/git/GitHub/inmobiliaria/app/"> 
	
	<title>Admin Panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="assets/fancyapps-fancyBox-18d1712/source/jquery.fancybox.css" media="screen">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap-image-gallery.css" media="screen">
	<link rel="stylesheet" href="https://blueimp.github.io/Gallery/css/blueimp-gallery.min.css">
</head>
<body>


	<div class="container-fluid">
		<a  id="image-viewer" href="views/es/sistema/imagenes.php">
			<button class="btn btn-primary">TRY THIS PLOX</button>
		</a>
	</div>


	<?php
		include("img-gallery.php");
	?>

	

	
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

	<!-- <script type="text/javascript" src="assets/CustomJS/ajaxController.js"></script> -->
	<script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/lib/jquery-1.9.0.min.js"></script>
	<script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/lib/jquery-1.10.1.min.js"></script>
	
	<script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	<script type="text/javascript" src="assets/fancyapps-fancyBox-18d1712/source/jquery.fancybox.js"></script>

	<script src="https://blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
	<script src="assets/js/bootstrap-image-gallery.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$("#image-viewer").fancybox({
				openEffect        : 'elastic',
	            closeEffect       : 'elastic',
		        width              : '80%',
		        height            : '50%',
		        transitionIn      : 'fade',
		        transitionOut     : 'fade',
		        type              : 'iframe',
		        closeBtn          : true
			});
		});
	</script>

</body>
</html>