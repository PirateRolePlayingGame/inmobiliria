<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Base Samuel! -->
	<!-- <base href="/Git/inmobiliaria/app/landing-page/"> -->

	<!-- Base Victor! -->
	<base href="/git/GitHub/inmobiliaria/app/landing-page/"> 

	<title>LH Grupo Inmobiliario</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="wefranco">
<meta name="description" content="Pagina inmobiliaria">
	 
<meta name="keywords" content="Grupo Inmobiliaio LH pagina de asesoria en compra y venta de casa y apartamentos">
<link href="css/modern-business.css" rel="stylesheet">    
<link rel="stylesheet" href="css/bootstrap.min.css">  
<link rel="stylesheet" href="css/bootstrap.css">  
<link rel="stylesheet" href="css/demo.css">
		
<link rel="stylesheet" href="css/footer-distributed.css">
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/nivo-slider.css">
<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />

<link rel="icon" type="image/png" href="img/favicon.png" />
<link rel="stylesheet" href="css/estilo.css">
 
</head>
<body>
		
		<?php include('includes/menu.php'); ?>
	<div class="container">
			 

		
		<?php include('includes/slider.php'); ?>
					 
		</div>    
		<br>
	 <div class="container">
		<!-- Page Content -->

				<div class="row">
					 <?php 
							if(!isset($_GET['pag']))
							{
								include('includes/busqueda.php');	
							}
							 
						?>
					 
			 
			 </div>
				
				<!-- Portfolio Section -->
				<div class="row">
						<?php 
							include('includes/reciente.php');
						?>
						
						
						 <?php
							if(isset($_GET['pag']))
							{
								$pag = $_GET['pag'];
								if($pag == "detalle")
								{
									include("detalle.php");
								}
							}

						 ?>
						
						
				</div>
				<!-- /.row -->

				<!-- Features Section -->
				<div class="row">
						 <?php 
							if(!isset($_GET['pag']))
							{
								include('includes/visto.php');	
							}
							 
						?>
						
						
				</div>
				<!-- /.row -->

				<hr>

				<!-- Call to Action Section -->
				<div class="">
						<div class="row">
								<?php include('includes/panelinf.php'); ?>
				

				
				<!-- Footer -->
				<footer>
						
						<div class="row">
								
				<hr>        
								<div class="col-lg-12" text-aling="center">
										<center><p></p></center>
								</div>
						</div>
						
						
						
						
						
						
				</footer>

		</div>
		</div>
		<!-- /.container -->

		<!-- jQuery -->
		<script src="js/jquery.js"></script>
		<script src="js/jquery.js"></script>        

		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>

		<!-- Script to Activate the Carousel -->
		<script>
		$('.carousel').carousel({
				interval: 5000 //changes the speed
		})
		</script>



		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"> </script>
		<script src="js/jquery.nivo.slider.js"> </script>
		
		
		
		
	 <script type="text/javascript" src="scripts/jquery-1.9.0.min.js"></script>
		<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
		<script type="text/javascript">
		$(window).load(function() {
				$('#slider').nivoSlider();
		});
		</script>
		
		
		
		

</body>
</html>
