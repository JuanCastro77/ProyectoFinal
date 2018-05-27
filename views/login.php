<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<?php 
    include_once '../src/header.php';
     ?>
     <link rel="stylesheet" type="text/css" href="../resources/css/css.css">
</head>
<body background="../media/wallpaper.jpg">
	<div class="jumbotron boxlogin">
		<center><h3><b>METROFOOD</b></h3></center> <br>
		<form method="POST" action="../controller/verificacion.php">
			<div class="form-column col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<label for="usuario" class="control-label">Nombre de usuario: </label>
					<input class="form-control" type="text" name="user">
					<label for="pass" class="control-label">Contraseña: </label>
					<input class="form-control" type="password" name="pass">
				</div>
			</div>
			<div class="form-column col-md-12 col-sm-12 col-xs-12">
				<div class="form-group">
					<a class="link" href="#">¿Olvidó su contraseña?</a>
					<a class="link" href="registrar_usuario.php">Registrarse</a>
				</div>
			</div>
			<br>
			<div class="clearfix"></div>
			<center>
				<div class="form-column col-md-12 col-sm-12 col-xs-12">
					<div class="form-group">
						<input class="btn btn-info" type="submit" id="enviarDatos" name="enviarDatos" value="Iniciar">
					</div>
					<span id="resultado"></span>
				</div>
			</center>
		</form>
	</div>
</body>

</html>
