<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Base Samuel! -->
	<!-- <base href="/Git/inmobiliaria/app/"> -->

	<!-- Base Victor! -->
	<base href="/git/GitHub/inmobiliaria/app/"> 

	<meta charset="UTF-8">
	<title>Galeria Imagenes</title>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/estilo.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container-fluid bg1" >
		<div class="container bg2">
			<div class="row">
				<div class="col-md-12">
					<nav class="navbar navbar-default" style="margin-top: 2em;">
						<div class="container-fluid">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								</button>
								
								<!-- Form Agregar imagen -->
								<?php
									require('formSubirImagen.php');
								?>
								<!--/-->

							</div>
							</div><!-- /.container-fluid -->
						</nav>
					</div>
				</div>
				<hr>
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-8">
								<?php
									require("cuadroImagen.php");
								?>
							</div>

							<!-- Cuadro Preview -->
							<div class="col-md-4">
								<div id="gay" style="display: none; ">
									<h2>Preview</h2>
									<hr>
									<img src="assets/img/gay.png" id="" height="362" width="480" alt="" class="img-responsive img-circle img-max-size image-preview">
									<br>
									<form action="admin/borrarImagen" class="form-inline" method="post">
										<input type="hidden" name="id" id="idSecreto" value=""/>
										<button type="submit" name="submit" onclick="parent.$.fancybox.close();" value="Borrar-Imagen"class="btn btn-primay">
											Borrar Permanentemente
										</button>
									</form>
								</div>
							</div>
							<!--/-->

						</div>
					</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src="assets/CustomJS/galeria1.js"></script>
		<!-- <script src="assets/CustomJS/galeria2.js"></script> -->
	</body>
</html>