<!DOCTYPE html>
<html>
<head>
	<!-- Base Samuel! -->
	<!-- <base href="/Git/inmobiliaria/app/"> -->

	<!-- Base Victor! -->
	<!-- <base href="/git/GitHub/inmobiliaria/app/">  -->

	<title>Login </title>
</head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
</head>
<body>

	<div class="container">    
		<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
			<div class="panel panel-info" >
				<div class="panel-heading">
					<div class="panel-title">Entra</div>
					<div id="mensaje"></div>
				</div>     

				<div style="padding-top:30px" class="panel-body" >

					<div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
						
					<form id="loginform" method="POST" class="form-horizontal" role="form">
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
							<input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">
						</div>
							
						<div style="margin-bottom: 25px" class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
							<input id="login-password" type="password" class="form-control" name="password" placeholder="password">
						</div>

						<div style="margin-top:10px" class="form-group">
							<!-- Button -->

							<div class="col-sm-6 controls">
								<button type="submit" class="btn btn-success">Login</button>
							</div>

							<div class="col-sm-6" id="loader">
								<img src="assets/img/482.gif" class="img-responsive">
							</div>
						</div>
					</form>     

					<form id="hiddenform" method="POST" action="loginExitoso.php">
						
					</form>

				</div>                     
			</div>  
		</div>
	</div>
	
	<!-- Script -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<script type="text/javascript" src="assets/CustomJS/ajaxLogin.js"></script>
</body>
</html>